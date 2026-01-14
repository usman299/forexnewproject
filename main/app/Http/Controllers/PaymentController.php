<?php

namespace App\Http\Controllers;

use App\Helpers\Helper\Helper;
use App\Http\Requests\PaymentRequest;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\Payment;
use App\Models\PivortUser;
use App\Models\Plan;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Gateway\Gourl;
use App\Services\Gateway\Manual;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }

    public function gateways(Request $request, $id)
    {

        $data['plan'] = Plan::findOrFail($id);

        $data['gateways'] = Gateway::where('status', 1)->latest()->get();

        $data['title'] = "Payment Methods";

        return view(Helper::theme() . "user.gateway.gateways")->with($data);
    }

    public function paynow(PaymentRequest $request)
    {
        $isSuccess = $this->payment->payNow($request);
        if ($isSuccess['type'] === 'error') {
            return redirect()->back()->with('error', $isSuccess['message']);
        }
        return redirect()->to($isSuccess['message']);
    }

    public function gatewaysDetails($id)
    {
        $isSuccess = $this->payment->details($id);
        if ($isSuccess['type'] === 'error') {
            return redirect()->back()->with('error', $isSuccess['message']);
        }
        return view($isSuccess['view'])->with($isSuccess['data']);
    }

    public function gatewayRedirect(Request $request, $id)
    {
        $gateway = Gateway::where('status', 1)->findOrFail($id);
        if (session('type') == 'deposit') {
            $deposit = Deposit::where('trx', session('trx'))->firstOrFail();
        } else {
            $deposit = Payment::where('trx', session('trx'))->firstOrFail();
        }

        if ($gateway->type == 0) {
            $data = Manual::process($request, $gateway, $deposit->total, $deposit);
        } else {
            $class = 'App\Services\Gateway\\' . ucwords($gateway->name).'Service';

            if (strstr($gateway->name, 'gourl')) {
                $method = new Gourl;
            } else {
                $method = new $class;
            }

            $data = $method::process($request, $gateway, $deposit->total, $deposit);
        }

        if ($data['type'] === 'error') {
            return redirect()->back()->with('error', $data['message']);
        }


        if ($gateway->name == 'mercadopago') {
            return redirect()->to($data['message']);
        }


        if (strstr($gateway->name, 'gourl')) {
            return redirect()->to($data['data']);
        }

        if ($gateway->name == 'nowpayments') {

            return redirect()->to($data['data']->invoice_url);
        }

        if ($gateway->name == 'mollie') {

            return redirect()->to($data['redirect_url']);
        }

        if ($gateway->name == 'paghiper') {
            return redirect()->to($data['data']);
        }

        if ($gateway->name == 'coinpayments') {

            if (isset($data['result']['checkout_url'])) {

                return redirect()->to($data['result']['checkout_url']);
            }
        }

        if ($gateway->name == 'paypal') {

            $data = json_decode($data);

            return redirect()->to($data->links[1]->href);
        }
        if ($gateway->name == 'paytm') {

            return view(Helper::theme() . 'user.gateway.auto', compact('data'));
        }

        $is_manual = session('manual') != null && session('manual') == 'yes' ? 1 : 0;


        if ($is_manual) {
            return redirect()->route('user.dashboard')->with('success', 'Your Payment is Successfully Processing');
        }


        return redirect()->route('user.dashboard')->with('success', 'Your Payment is Successfully Recieved');
    }

    public function paymentSuccess(Request $request, $gateway)
    {
        $gateway = Gateway::where('name', $gateway)->first();

        $class = 'App\Services\Gateway\\' . ucwords($gateway->name).'Service';


        if (strstr($gateway->name, 'gourl')) {
            $method = new Gourl;
        } else {
            $method = new $class;
        }

        $isSuccess = $method::success($request);

        if ($isSuccess['type'] == 'error') {
            return redirect()->route('user.dashboard')->with('error', $isSuccess['message']);
        }

        return redirect()->route('user.dashboard')->with('success', $isSuccess['message']);
    }
    function test(){
        $user = auth()->user();
        $deposit = Deposit::create([
            'trx' => Str::upper(Str::random(16)),
            'amount' => $request->amount,
            'total' => $request->amount,
            'address' => $request->address,
            'random_address' => $request->randomAddress,
            'btrx_id' => $request->txHash,
            'charge' => 0,
            'gateway_id' => 16,
            'status' => 1,
            'type' => 1,
            'user_id' => auth()->id(),
        ]);
        Transaction::create([
            'trx' => $deposit->trx,
            'amount' => $deposit->amount,
            'details' => 'Payment Deposit Successfully',
            'charge' => 0,
            'type' => '+',
            'type_two' => 1,
            'rec_id' => 0,
            'user_id' => auth()->id()
        ]);
        $user->balance = $user->balance + $request->amount;
        $user->update();
        $levelProfit = PivortUser::where('user_id',$user->id)->get();

        $levelPercantage = Referral::where('type','invest')->where('status', 1)->pluck('commission');
        foreach($levelProfit as $item){
            $user_profit  = User::where('id','=',$item->ref_id)->where('status','=',1)->first();
            $profit_ammount = $request->amount * ($levelPercantage[0][$item->level-1]/100);
            $user_profit->balance = $user_profit->balance + $profit_ammount;
            $user_profit->update();
            Transaction::create([
                'trx' => Str::upper(Str::random(16)),
                'amount' => $profit_ammount,
                'details' => 'Deposit Profit added by '.$user->username,
                'charge' => 0,
                'type' => '+',
                'type_two' => 3,
                'rec_id' => auth()->id(),
                'user_id' => $user_profit->id,
            ]);
        }
        // You can return a response if required
        return response()->json(['message' => 'Transaction hash stored successfully.']);
    }
}
