<?php

namespace App\Services;

use App\Helpers\Helper\Helper;

class UserProfileService
{
    public function update($request)
    {
        $user = auth()->user();

        if ($request->hasFile('image')) {
            $filename = Helper::saveImage($request->image, Helper::filePath('user', true), $user->image);
            $user->image = $filename;
        }


//        $data = [
//            'country' => $request->country,
//            'city' => $request->city,
//            'zip' => $request->zip,
//            'state' => $request->state,
//        ];

//        $user->address = $data;
        if($request->phone || $request->code){
            $user->phone = '+'.$request->code.$request->phone;
            $user->code  = '+'.$request->code;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->telegram_id = $request->telegram_id;
        $user->save();

        return ['type'=>'success', 'message' => 'Profile Updated Successfully'];
    }
}
