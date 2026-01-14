<?php

namespace App\Services;

use App\Helpers\Helper\Helper;
use App\Models\Configuration;
use App\Models\PivortUser;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRegistration
{
    public function register($request)
    {
        $general = Configuration::first();

        $fullPhoneNumber = '+' . $request->code . ltrim($request->phone, '0');
        $referPhone = User::where('phone', $fullPhoneNumber)->first();
        if ($referPhone) {
            return ['type' => 'error', 'message' => 'This phone has already been taken'];
        }
        $signupBonus = $general->signup_bonus;

        $referid = 0;
        $referUser = '';
        if ($request->reffered_by) {
            $referUser = User::where('username', $request->reffered_by)->first();
            if (!$referUser) {
                return ['type' => 'error', 'message' => 'No User Found Assocciated with this reffer Name'];
            }
            $referid = $referUser->id;
        }
        event(new Registered($user = $this->create($request, $signupBonus, $referid)));
        Auth::login($user);

//        Transaction::create([
//            'trx' => Str::upper(Str::random(16)),
//            'amount' => $signupBonus,
//            'details' => 'Signup Bonus Added Successfully',
//            'charge' => 0,
//            'type' => '+',
//            'type_two' => 4,
//            'rec_id' => 0,
//            'user_id' => $user->id,
//        ]);

        if($referUser){
            Helper::referLevel($user->id, $referUser);
        }
//        else{
//            PivortUser::create([
//                'user_id' => $user->id,
//                'ref_id' => 0,
//                'level' => 0,
//            ]);
//        }

//        if ($request->reffered_by) {
//            Helper::referMoney($user->id, $referUser, 'interest', 0);
//        }


        return ['type' => 'success', 'message' => 'Successfully Registered'];
    }


    public function create($request, $signupBonus, $referid)
    {


        $fullPhoneNumber = '+' . $request->code . ltrim($request->phone, '0');

        return User::create([
            'balance' => 0,
            'tx' => 0,
            'username' => $request->username,
            'username2' => $request->username2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $fullPhoneNumber,
            'code' => '+'.$request->code,
            'status' => 1,
            'password' => bcrypt($request->password),
            'ref_id' => $referid ?? ''
        ]);

    }
}
