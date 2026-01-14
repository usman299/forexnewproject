<?php

namespace App\Http\Controllers;

use App\Helpers\Helper\Helper;
use App\Mail\TransferMail;
use App\Mail\WithdrawMail;
use App\Models\Deposit;
use App\Models\Gateway;
//use http\Env\Request;
use App\Models\Metamask;
use App\Models\PivortUser;
use App\Models\Referral;
use App\Models\Template;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DepositController extends Controller
{
    public function deposit()
    {
        $data['gateways'] = Gateway::where('status', 1)->latest()->get();

        $data['title'] = "Payment Methods";

        $data['type'] = 'deposit';

        return view(Helper::theme(). "user.gateway.gateways")->with($data);
    }
    public function dailyEarning()
    {
        $data['gateways'] = Gateway::where('status', 1)->latest()->get();
        $data['title'] = "Daily Earning";
        $data['profit'] = Transaction::where('type_two','=',5)->where('rec_id','=',0)->where('user_id',auth()->user()->id)->get();
        $data['type'] = 'earning';
        return view(Helper::theme() . 'user.gateway.earning')->with($data);

    }
    public function depositCreate()
    {
        $addresses = [
            '0x70626AE1FB199D577B739A6e9E539e0AD50C7aFe',
            '0xAe9848A337Cc86182b0A5201AdF3354bd5E8d81c',
            '0x2Bb0a9F6Ae241c373ef1568d225ed2D24ABB696A',
            '0x5154349Cb69f72A4158685e9Cf6F6A948C68468a',
            '0x42DE50Accdd417c93A328495848c817FA72E4321',
        ];
        $color = [156, 10, 193];
        $data['randomAddress'] = $addresses[array_rand($addresses)];
        $data['qrCode'] = QrCode::size(200)->color($color[0], $color[1], $color[2])->generate($data['randomAddress']);
        return view(Helper::theme().'user.deposit.create',compact('data'));
    }
    public function depositStore(Request $request)
    {
        if ($request->has('payment_proof')) {
            $filename = Helper::saveImage($request->payment_proof, Helper::filePath('admin'));
            $payment_proof = $filename;
        }
        $user = auth()->user();
        $deposit = Deposit::create([
            'trx' => Str::upper(Str::random(16)),
            'amount' => $request->amount,
            'total' => $request->amount,
            'address' => $request->address,
            'randomAddress' => $request->randomAddress,
            'btrx_id' => $request->btrx_id,
            'charge' => 0,
            'gateway_id' => 16,
            'status' => 1,
            'type' => '+',
            'user_id' => auth()->id(),
            'payment_proof' => $payment_proof ,

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
        return back()->with('success', 'Your Deposit Added Successfully');
    }
    public function store(Request $request)
    {


        if(!empty($request->txHash)) {
            $user = auth()->user();
            $existingTransaction = Metamask::where('trx', $request->txHash)->first();
            if (!$existingTransaction) {
                $tra = Transaction::create([
                    'trx' => Str::upper(Str::random(16)),
                    'amount' => $request->amount,
                    'details' => 'Payment Transfer  P2P Wallet',
                    'charge' => 0,
                    'type' => '+',
                    'type_two' => 7,
                    'rec_id' => 0,
                    'user_id' => $user->id,
                ]);
                Metamask::create([
                    'trx_id' => $tra->id,
                    'trx' => $request->txHash,
                    'amount' => $request->amount,
                    'user_id' => $user->id,
                    'user_address' => $request->address,
                    'admin_address' => $request->randomAddress,
                ]);
                $user->ptop = $user->ptop + $request->amount;
                $user->update();
                return response()->json(['message' => 'Transaction hash stored successfully.']);
            }
            else {
                return response()->json(['message' => 'Transaction hash already exists in the system.']);
            }
        }
        else{
            return response()->json(['message' => 'Transaction hash Not stored successfully.Something Wrong']);
        }

//        $deposit = Deposit::create([
//            'trx' => Str::upper(Str::random(16)),
//            'amount' => $request->amount,
//            'total' => $request->amount,
//            'address' => $request->address,
//            'random_address' => $request->randomAddress,
//            'btrx_id' => $request->txHash,
//            'charge' => 0,
//            'gateway_id' => 16,
//            'status' => 1,
//            'type' => 1,
//            'user_id' => auth()->id(),
//        ]);
//        Transaction::create([
//            'trx' => $deposit->trx,
//            'amount' => $deposit->amount,
//            'details' => 'Payment Deposit Successfully',
//            'charge' => 0,
//            'type' => '+',
//            'type_two' => 1,
//            'rec_id' => 0,
//            'user_id' => auth()->id()
//        ]);


//        if($user->tx >$user->ttx){
//            $user->balance = $user->balance + $request->amount;
//            $user->tx =  $user->tx + ($request->amount * 3);
//            $user->update();
//        }
//        else{
//            $user->balance =  $request->amount;
//            $user->tx = $user->tx +  ($request->amount * 3);
//            $user->update();
//        }

//        <------------->
//        if($user->ref_id!=0){
//            $deposit = Deposit::where('user_id',$user->ref_id)->sum('amount');
//            $reffer_user = User::where('status', '=', 1)->where('id', $user->ref_id)->first();
//            if($deposit!=0) {
//                $userDeposit = $reffer_user->tx;
////                $profit = Transaction::where('user_id', '=', $user->id)->whereIn('type_two', [5, 3])->sum('amount');
//                $calculateamount  = $request->amount * 0.05;
//                $check = $reffer_user->ttx + $calculateamount;;
//                if($userDeposit >= $check){
//
//                    $reffer_user->ttx = $reffer_user->ttx + ($request->amount * 0.05);
//                    $reffer_user->update();
//                    Transaction::create([
//                        'trx' => Str::upper(Str::random(16)),
//                        'amount' => ($request->amount * 0.05),
//                        'details' => 'Deposit Profit added by ' . $user->username2 ?? ' ',
//                        'charge' => 0,
//                        'type' => '+',
//                        'type_two' => 3,
//                        'rec_id' => auth()->id(),
//                        'user_id' => $reffer_user->id,
//                    ]);
//                }
//                else {
//                    $subammount = $reffer_user->tx - $reffer_user->ttx;
//                    if($subammount > 0.0) {
//                        $reffer_user->ttx = $reffer_user->ttx + $subammount;
//                        $reffer_user->update();
//
//                        Transaction::create([
//                            'trx' => Str::upper(Str::random(16)),
//                            'amount' => $subammount,
//                            'details' => 'Deposit Profit added by ' . $user->username2 ?? ' ',
//                            'charge' => 0,
//                            'type' => '+',
//                            'type_two' => 3,
//                            'rec_id' => auth()->id(),
//                            'user_id' => $reffer_user->id,
//                        ]);
//
//                    }
//                }
//            }
//
//        }
        //        <------------->

    }
    public function withdrawCreate()
    {
        return view(Helper::theme().'user.withdraw.create');
    }
    public function withdrawStore(Request $request)
    {
        $user = auth()->user();
        $details = '';
        $balance = $user->ttx - $user->tttx;

        if ($balance >= $request->amount1) {

            if ($request->userType == 1) {
                $data['amount1'] = $request->amount1;
                $data['address'] = $request->address;
                $data['note'] = $request->note;
                $data['randomNumber'] = rand(0, 999999);
                Mail::to($user->email)->send(new WithdrawMail($data));
                return view(Helper::theme() . 'user.withdraw.verify', compact('data'));

            } else {
                Transaction::create([
                    'trx' => Str::upper(Str::random(16)),
                    'amount' => $request->amount1,
                    'details' => 'Payment Transfer  P2P Wallet',
                    'charge' => 0,
                    'type' => '-',
                    'type_two' => 7,
                    'rec_id' => 0,
                    'user_id' => auth()->id()
                ]);
                $user->tttx = $user->tttx + $request->amount1;
                $user->update();
                $user->ptop = $user->ptop + $request->amount1;
                $user->update();
                return back()->with('success', 'Payment Transfer  P2P Wallet');
            }

        }
        else{
            return back()->with('success', 'Your balance is Insufficient');
        }
    }
    public function roadMap()
    {
        return view(Helper::theme().'user.roadmap');
    }
    public function person()
    {
        return view(Helper::theme().'user.p2p.create');
    }
    public function getUserName(Request $request)
    {
        $userId = $request->input('userId');

        if (strlen($userId) === 6 && is_numeric($userId)) {
            $user = User::where('username', $userId)->first();
            if ($user) {
                return response()->json(['success' => true, 'userName' => $user->username2 ]);
            }
        }

        return response()->json(['success' => false]);
    }
    public function getUserNameNext(Request $request)
    {
        $user = auth()->user();
        $balance = $user->ptop;
        if ($balance >= $request->amount) {
            if($request->userType==1) {
                $data['userid'] = $request->userid;
                $data['amount'] = $request->amount;
                $data['user_name'] = $user->username2;
                $data['randomNumber'] = rand(0, 999999);
                $data['message'] = 1;
//                    Mail::to($user->email)->queue(new TransferMail($data));
                Mail::to($user->email)->send(new TransferMail($data));
                return view(Helper::theme() . 'user.p2p.verify', compact('data'));
            }
            else {
                $trx = strtoupper(Str::random());
                $deposit = Deposit::create([
                    'trx' => $trx,
                    'amount' => $request->amount,
                    'total' => $request->amount,
                    'address' => '-',
                    'random_address' => '-',
                    'btrx_id' => '-',
                    'charge' => 0,
                    'gateway_id' => 16,
                    'status' => 1,
                    'type' => 1,
                    'user_id' => $user->id,
                ]);
                Transaction::create([
                    'trx' => $deposit->trx,
                    'amount' => $deposit->amount,
                    'details' => 'Your Own Payment Added Successfully',
                    'charge' => 0,
                    'type' => '+',
                    'type_two' => 1,
                    'rec_id' => 0,
                    'user_id' => $user->id
                ]);
                $user->balance = $user->balance + $request->amount;
                $user->tx =  $user->tx + ($request->amount * 3);
                $user->ptop = $user->ptop - $request->amount;
                $user->update();
                if($user->ref_id!=0){
                    $deposit = Deposit::where('user_id',$user->ref_id)->sum('amount');
                    if($deposit!=0) {
                        $reffer_user = User::where('status', '=', 1)->where('id', $user->ref_id)->first();
                        $userDeposit = $reffer_user->tx;
                        $calculateamount  = $request->amount * 0.05;
                        $check = $reffer_user->ttx + $calculateamount;
                        if($userDeposit >= $check){
                            $reffer_user->ttx = $reffer_user->ttx + ($request->amount * 0.05);
                            $reffer_user->update();
                            Transaction::create([
                                'trx' => Str::upper(Str::random(16)),
                                'amount' => ($request->amount * 0.05),
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
                                $reffer_user = User::where('status', '=', 1)->where('id', $user->ref_id)->first();
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
                return back()->with('success', 'Your Own Payment Added Successfully');
            }

        } else {
            return back()->with('success', 'Your balance is Insufficient');
        }


    }
    public function verifyDeposit(Request $request)
    {
        $user = auth()->user();
        if ($request->has('submitBtn')) {
            // 6 type is jiss ko send ki he p2p 7 jis ne send ki
            if ($request->otp == $request->otp1) {
                $user2 = User::where('username',$request->userid)->first();
                Transaction::create([
                    'trx' => Str::upper(Str::random(16)),
                    'amount' => $request->amount,
                    'details' => 'Payment Received Successfully by '.$user->username,
                    'charge' => 0,
                    'type' => '+',
                    'type_two' => 6,
                    'rec_id' => $user->id,
                    'user_id' => $user2->id,
                ]);
                $trasection = Transaction::create([
                    'trx' => Str::upper(Str::random(16)),
                    'amount' => $request->amount,
                    'details' => 'Payment Transfer user '. $user2->username.' Successfully  ',
                    'charge' => 0,
                    'type' => '-',
                    'type_two' => 7,
                    'rec_id' => $user2->id,
                    'user_id' => $user->id,
                ]);
//                $withdraw = Withdraw::create([
//                    'trx' => $trasection->trx,
//                    'withdraw_method_id' => 16,
//                    'withdraw_amount' => $request->amount,
//                    'withdraw_charge' => 0,
//                    'total' => $request->amount,
//                    'status' => 1,
//                    'proof' => '-',
//                    'reject_reason' => '',
//                    'user_id' => $user->id,
//                ]);
                $user->ptop = $user->ptop - $request->amount;
                $user->update();
                $user2->ptop = $user2->ptop + $request->amount;
                $user2->update();



                $template = Template::where('name', 'payment_confirmed')->where('status', 1)->first();

                if ($template) {
                    Helper::fireMail([
                        'username'=>  $user2->username2,
                        'email' =>  $user2->email,
                        'app_name' => 'Dotcoinverse',
                        'amount' => $request->amount,
                        'recuser' => $user->username2,
                        'date' => $trasection->created_at->format('Y-m-d H:i:s'),
                        'currency' => 'USD'
                    ], $template);

                }

                return  redirect()->route('user.withdraw.all')->with('success', ' Amount '.$request->amount .' USD Transfer Successfully to '.$user2->username);
            }
            else{
                $data['userid'] = $request->userid;
                $data['amount'] = $request->amount;
                $data['randomNumber'] =$request->otp1;
                $data['user_name'] = $user->username2;
                $data['message'] = 'Your OTP has expired.';
                return view(Helper::theme().'user.p2p.verify',compact('data'));
            }
        } elseif ($request->has('resetBtn')) {
            $data['userid'] = $request->userid;
            $data['amount'] = $request->amount;
            $data['randomNumber'] = rand(0, 999999);
            $data['user_name'] = $user->username2;
            $data['message'] = 'Your OTP has been successfully resent';
//            Mail::to($user->email)->queue(new TransferMail($data));
            Mail::to($user->email)->send(new TransferMail($data));

//            $delayInSeconds = 10;
//            Mail::to($user->email)->later(Carbon::now()->addSeconds($delayInSeconds), new TransferMail($data));
            return view(Helper::theme().'user.p2p.verify',compact('data'));
        }


    }
    public function verifyWithdraw(Request $request)
    {       $user = auth()->user();
        if ($request->has('submitBtn')) {
            $validatedData = $request->validate([
                'otp' => 'required', // Example validation rule
            ]);

            if ($request->otp == $request->otp1) {

                $charge = $request->amount1 * 0.05;
                $withdraw = Withdraw::create([
                    'trx' => Str::upper(Str::random(16)),
                    'withdraw_method_id' => 16,
                    'withdraw_amount' => $request->amount1,
                    'withdraw_charge' => $charge,
                    'total' => $request->amount1 - $charge,
                    'status' => 0,
                    'proof' => $request->address,
                    'reject_reason' => $request->note,
                    'user_id' => auth()->id(),
                ]);
                Transaction::create([
                    'trx' => Str::upper(Str::random(16)),
                    'amount' => $request->amount1,
                    'details' => 'Payment Withdraw Request Added',
                    'charge' => $charge,
                    'type' => '+',
                    'type_two' => 2,
                    'rec_id' => 0,
                    'user_id' => $user->id,
                ]);
                $user->tttx = $user->tttx + $request->amount1;
                $user->update();
                return  redirect()->route('user.withdraw.all')->with('success', 'Payment Withdraw Request Added ');
            }
            else{
                $data['amount1'] = $request->amount1;
                $data['address'] = $request->address;
                $data['note'] = $request->note;
                $data['randomNumber'] =$request->otp1;
                return view(Helper::theme().'user.withdraw.verify',compact('data'))->with('success', 'Your OTP is not valid ');
            }
        } elseif ($request->has('resetBtn')) {
            $data['amount1'] = $request->amount1;
            $data['address'] = $request->address;
            $data['note'] = $request->note;
            $data['randomNumber'] =rand(0, 999999);
            Mail::to($user->email)->send(new WithdrawMail($data));
            return view(Helper::theme().'user.withdraw.verify',compact('data'))->with('success', 'OTP Sent Successfully ');
        }



    }
}
