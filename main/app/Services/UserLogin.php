<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Sinergi\BrowserDetector\Browser;
use Sinergi\BrowserDetector\Os;

class UserLogin
{
    public function login($request)
    {
        // Check if the input is a valid email address
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            // If it's a valid email address, attempt login using email
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Log user activity
            $ip = request()->ip();
            $currentUserInfo = Location::get($ip);

            $browser = new Browser();
            $os = new Os();

            UserLog::create([
                'user_id' => auth()->id(),
                'browser' => $browser->getName(),
                'system' => $os->getName(),
                'country' => $currentUserInfo->countryName ?? '',
                'ip' => $currentUserInfo->ip ?? '',
            ]);
                return ['type'=> 'success', 'message'=>'Successfully logged in'];
            }
        } else {
            // Attempt login using username
            if (Auth::attempt(['username2' => $request->email, 'password' => $request->password])) {
                // Log user activity
                $ip = request()->ip();
                $currentUserInfo = Location::get($ip);

                $browser = new Browser();
                $os = new Os();

                UserLog::create([
                    'user_id' => auth()->id(),
                    'browser' => $browser->getName(),
                    'system' => $os->getName(),
                    'country' => $currentUserInfo->countryName ?? '',
                    'ip' => $currentUserInfo->ip ?? '',
                ]);
                return ['type'=> 'success', 'message'=>'Successfully logged in'];
            }
        }
        return ['type' => 'error', 'message' => 'Invalid credentials'];
//        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
//            $user = User::where('email', $request->email)->first();
//        } else {
//            $user = User::where('username2', $request->email)->first();
//        }
//        if (!$user) {
//            return ['type' => 'error', 'message' => 'No user found associated with this email'];
//        }
//        dd($user);
//        if (Auth::attempt($request->except('g-recaptcha-response', '_token'))) {
//
//            $ip = request()->ip();
//            $currentUserInfo = Location::get($ip);
//
//            $browser = new Browser();
//            $os = new Os();
//
//            UserLog::create([
//                'user_id' => auth()->id(),
//                'browser' => $browser->getName(),
//                'system' => $os->getName(),
//                'country' => $currentUserInfo->countryName ?? '',
//                'ip' => $currentUserInfo->ip ?? '',
//            ]);
//
//            return ['type'=> 'success', 'message'=>'Successfully logged in'];
//        }
//
//        return ['type' => 'error', 'message' => 'Invalid credentials'];

    }
}
