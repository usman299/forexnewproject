<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\Template;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class ManageDepositController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->status === 'online' ? 1 : 0;

        $deposit = Deposit::query();

        if($request->search){
//            $deposit->search($request->search);
            $deposit->where('trx', 'like', '%' . $request->search . '%');
        }

        if($request->date){

            $date = array_map(function($item){
                return Carbon::parse($item);
            },explode(' - ', $request->date));

            $deposit->whereBetween('created_at', $date);
        }


        if($type == 1){
            $deposit->where('status',1);
        }else{
            $deposit->where('type', $type);
        }

        $data['deposits'] = $deposit->with('gateway','user')->latest()->paginate( Helper::pagination());

        $data['title'] = 'Manage Deposits';

        return view('backend.deposit.index')->with($data);

    }


    public function details($trx)
    {
        $data['deposit'] = Deposit::where('trx', $trx)->firstOrFail();

        $data['title'] = 'Deposit Details';


        return view('backend.deposit.details')->with($data);
    }

    public function accept(Request $request)
    {

        $deposit = Deposit::where('trx', $request->trx)->firstOrFail();
        
        $general = Configuration::first();
        $gateway = Gateway::find($deposit->gateway_id);
        $deposit->status = 1;
        $deposit->save();
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
        $user = User::find($deposit->user->id);
       
        if($user->tx >$user->ttx){
           $user->balance = $user->balance + $deposit->amount;
           $user->tx =  $user->tx + ($deposit->amount * 3);
           $user->update();
       }
       else{
           $user->balance =  $deposit->amount;
           $user->tx = $user->tx +  ($deposit->amount * 3);
           $user->update();
       }

    //    <------------->
       if($user->ref_id!=0){
           $deposit = Deposit::where('user_id',$user->ref_id)->sum('amount');
           $reffer_user = User::where('status', '=', 1)->where('id', $user->ref_id)->first();
           if($deposit!=0) {
               $userDeposit = $reffer_user->tx;
//                $profit = Transaction::where('user_id', '=', $user->id)->whereIn('type_two', [5, 3])->sum('amount');
               $calculateamount  = $deposit->amount * 0.07;
               $check = $reffer_user->ttx + $calculateamount;
               if($userDeposit >= $check){

                   $reffer_user->ttx = $reffer_user->ttx + ($deposit->amount * 0.07);
                   $reffer_user->update();
                   Transaction::create([
                       'trx' => Str::upper(Str::random(16)),
                       'amount' => ($deposit->amount * 0.07),
                       'details' => 'Deposit Profit added by ' . $user->username2 ?? ' ',
                       'charge' => 0,
                       'type' => '+',
                       'type_two' => 3,
                       'rec_id' => auth()->id(),
                       'user_id' => $reffer_user->id,
                   ]);
               }
               else {
                   $subammount = $reffer_user->tx - $reffer_user->ttx;
                   if($subammount > 0.0) {
                       $reffer_user->ttx = $reffer_user->ttx + $subammount;
                       $reffer_user->update();

                       Transaction::create([
                           'trx' => Str::upper(Str::random(16)),
                           'amount' => $subammount,
                           'details' => 'Deposit Profit added by ' . $user->username2 ?? ' ',
                           'charge' => 0,
                           'type' => '+',
                           'type_two' => 3,
                           'rec_id' => auth()->id(),
                           'user_id' => $reffer_user->id,
                       ]);

                   }
               }
           }

       }
        $template = Template::where('name','payment_confirmed')->where('status',1)->first();

        if($template){

            $data = [
                'username' => $deposit->user->username,
                'email' => $deposit->user->email,
                'app_name' => $general->appname,
                'trx' => $deposit->trx,
                'amount' => $deposit->amount,
                'charge' => number_format($gateway->charge, 4),
                'plan' => '',
                'currency' => $general->currency
            ];

            Helper::fireMail($data, $template);
        }

        return redirect()->back()->with('success', "Payment Confirmed Successfully");

    }

    public function reject(Request $request)
    {

        $deposit = Deposit::where('trx', $request->trx)->firstOrFail();

        $general = Configuration::first();

        $gateway = Gateway::find($deposit->gateway_id);

        $deposit->status = 3;
        $deposit->save();


        $template = Template::where('name','payment_rejected')->where('status',1)->first();

        if($template){

            $data = [
                'username' => $deposit->user->username,
                'email' => $deposit->user->email,
                'app_name' => $general->appname,
                'trx' => $deposit->trx,
                'amount' => $deposit->amount,
                'charge' => 0,
                'plan' => '',
                'currency' => $general->currency
            ];

            Helper::fireMail($data, $template);
        }


        return back()->with('success', "Payment Rejected Successfully");

    }
}
