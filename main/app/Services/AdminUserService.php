<?php

namespace App\Services;

use App\Models\Configuration;
use App\Models\Deposit;
use App\Models\PivortUser;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;

class AdminUserService
{
    public function update($request)
    {
        $user = User::find($request->user);

        $data = [
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
        ];

        $user->phone = $request->phone;
        $user->address = $data;
        $user->status = $request->status == 'on' ? 1 : 0;
        $user->is_email_verified = $request->email_status == 'on' ? 1 : 0;
        $user->is_sms_verified = $request->sms_status == 'on' ? 1 : 0;
        $user->is_kyc_verified = $request->kyc_status == 'on' ? 1 : 0;

        $user->save();


        return ['type' => 'success', 'message' => 'Successfully Updated User Profile'];
    }

    public function updateBalance($request)
    {
        $user = User::findOrFail($request->user_id);

        $general = Configuration::first();

                if ($request->type == 'add') {
                    Transaction::create([
                        'trx' => Str::upper(Str::random(16)),
                        'amount' => $request->balance,
                        'details' => 'Payment Transfer  P2P Wallet',
                        'charge' => 0,
                        'type' => '+',
                        'type_two' => 7,
                        'rec_id' => 0,
                        'user_id' => $user->id,
                    ]);
                    $user->ptop = $user->ptop + $request->balance;
                    $user->update();
                    return ['type' => 'success', 'message' => 'Successfully ' . $request->type . ' balance'];
        } else {
            if ($user->ptop < $request->balance) {
                return ['type' => 'error', 'message' => 'Insufficient balance'];
            }
                    Transaction::create([
                        'trx' => Str::upper(Str::random(16)),
                        'amount' => $request->balance,
                        'details' => 'Payment Subtract  P2P Wallet',
                        'charge' => 0,
                        'type' => '/',
                        'type_two' => 7,
                        'rec_id' => 0,
                        'user_id' => $user->id,
                    ]);
                    $user->ptop = $user->ptop - $request->balance;
                    $user->update();
                    return ['type' => 'success', 'message' => 'Successfully ' . $request->type . ' balance'];
        }


//        if ($request->type == 'add') {
//                $user->balance = $user->balance + $request->balance;
//                $user->tx =  $user->tx + ($request->balance * 3);
//                $user->update();
//        } else {
//            if ($user->balance < $request->balance) {
//                return ['type' => 'error', 'message' => 'Insufficient balance'];
//            }
//                $user->balance = $user->balance + $request->balance;
//                $user->tx =  $user->tx + ($request->balance * 3);
//                $user->update();
//        }
//
//        $user->save();

//        $trx = strtoupper(Str::random());
//
//        $deposit = Deposit::create([
//            'trx' => $trx,
//            'amount' => $request->balance,
//            'total' => $request->balance,
//            'address' => '-',
//            'random_address' => '-',
//            'btrx_id' => '-',
//            'charge' => 0,
//            'gateway_id' => 16,
//            'status' => 1,
//            'type' => 1,
//            'user_id' => $user->id,
//        ]);
//        Transaction::create([
//            'trx' => $deposit->trx,
//            'amount' => $deposit->amount,
//            'details' => 'Balance Deposit  Successfully',
//            'charge' => 0,
//            'type' => '+',
//            'type_two' => 1,
//            'rec_id' => 0,
//            'user_id' => $user->id
//        ]);
//
//
//        if($user->ref_id!=0) {
//            $depositt = Deposit::where('user_id', $user->ref_id)->sum('amount');
//            $reffer_user = User::where('status',1)->where('id',$user->ref_id)->first();
//           if($depositt!=0) {
//               $userDeposit = $reffer_user->tx;
////               $profit = Transaction::where('user_id', '=', $user->ref_id)->where('type_two', [3, 5])->sum('amount');
//               $calculateamount = $deposit->amount * 0.05;
//               $check = $reffer_user->ttx + $calculateamount;
//               if($userDeposit >= $check){
////                   $reffer_user->balance = $reffer_user->balance + ($deposit->amount * 0.05);
//                   $reffer_user->ttx = $reffer_user->ttx + ($deposit->amount * 0.05);
//                   $reffer_user->update();
//                   Transaction::create([
//                       'trx' => Str::upper(Str::random(16)),
//                       'amount' => ($deposit->amount * 0.05),
//                       'details' => 'Deposit Profit added by ' . $user->username,
//                       'charge' => 0,
//                       'type' => '+',
//                       'type_two' => 3,
//                       'rec_id' => $user->id,
//                       'user_id' => $reffer_user->id,
//                   ]);
//               }
//               else{
//                   $subammount = $reffer_user->tx - $reffer_user->ttx;
//                   if($subammount > 0.0) {
////                       $reffer_user->balance = $reffer_user->balance + $subammount;
//                       $reffer_user->ttx = $reffer_user->ttx + $subammount;
//                       $reffer_user->update();
//                       Transaction::create([
//                           'trx' => Str::upper(Str::random(16)),
//                           'amount' => $subammount,
//                           'details' => 'Deposit Profit added by ' . $user->username,
//                           'charge' => 0,
//                           'type' => '+',
//                           'type_two' => 3,
//                           'rec_id' => $user->id,
//                           'user_id' => $reffer_user->id,
//                       ]);
//                   }
//               }
//           }
//        }

    }
}
