<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Deposit;
use App\Models\Metamask;
use App\Models\PivortUser;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use App\Services\AdminProfileService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{

    protected $profile;

    public function __construct(AdminProfileService $profile)
    {
        $this->profile = $profile;
    }

    public function profile()
    {
        $data['title'] = 'Profile Settings';

        return view('backend.profile')->with($data);
    }

    public function profileUpdate(AdminProfileRequest $request)
    {
        $isSuccess = $this->profile->update($request);

        if ($isSuccess['type'] === 'success')
            return redirect()->back()->with('success', $isSuccess['message']);
    }


    public function changePassword(Request $request)
    {
        session()->put('type', 'password');

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $admin = auth()->guard('admin')->user();

        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->with('error', 'Password Does not match');
        }

        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->with('success', 'Password changed Successfully');
    }
    public function percentage()
    {
        $data['title'] = 'Percentage Commission';
        $data['data'] = Transaction::with('user')->where('type_two', '=',5)->where('type','+')->latest()->paginate(10);
        return view('backend.withdraw.trasection')->with($data);

    }
    public function metamaskPtop(Request $request)
    {
        $data['title'] = 'Metamask P2P Details';
        if(is_numeric($request->search)){
            $user = User::where('username',$request->search)->first();
            if($user) {
                $metmaskUser = Metamask::all()->pluck('trx_id');
                $data['data'] = Transaction::with('user')->whereIn('id',$metmaskUser)->where('user_id',$user->id)->latest()->paginate(Helper::pagination());
            }
            else{
                $metmaskUser = Metamask::all()->pluck('trx_id');
                $data['data'] = Transaction::with('user')->whereIn('id',$metmaskUser)->latest()->paginate(Helper::pagination());
            }
        }
        else{
            $metmaskUser = Metamask::all()->pluck('trx_id');
            $data['data'] = Transaction::with('user')->whereIn('id',$metmaskUser)->latest()->paginate(Helper::pagination());
        }
        return view('backend.withdraw.ptop')->with($data);

    }
    public function adminPtop(Request $request)
    {
        $data['title'] = 'Admin P2P Details';
        if(is_numeric($request->search)){
            $user = User::where('username',$request->search)->first();
            if($user) {
                $metmaskUser = Metamask::all()->pluck('trx_id');
                $data['data'] = Transaction::with('user')->whereNotIn('id',$metmaskUser)->where('user_id',$user->id)->where('type_two', '=',7)->where('type','+')->latest()->paginate(Helper::pagination());
            }
            else{
                $metmaskUser = Metamask::all()->pluck('trx_id');
                $data['data'] = Transaction::with('user')->whereNotIn('id',$metmaskUser)->where('type_two', '=',7)->where('type','+')->latest()->paginate(Helper::pagination());
            }
        }
        else{
            $metmaskUser = Metamask::all()->pluck('trx_id');
            $data['data'] = Transaction::with('user')->whereNotIn('id',$metmaskUser)->where('type_two', '=',7)->where('type','+')->latest()->paginate(Helper::pagination());
        }
        return view('backend.withdraw.ptop')->with($data);

    }
    public function Ptop(Request $request)
    {
        $data['title'] = 'Internal P2P Details';
        if(is_numeric($request->search)){
            $user = User::where('username',$request->search)->first();
            if($user) {
                $data['data'] = Transaction::with('user')->where('user_id',$user->id)->where('type_two', '=',6)->where('type','+')->latest()->paginate(Helper::pagination());
            }
            else {
                $data['data'] = Transaction::with('user')->where('type_two', '=', 6)->where('type', '+')->latest()->paginate(Helper::pagination());
            }
        }
        else{
            $data['data'] = Transaction::with('user')->where('type_two', '=', 6)->where('type', '+')->latest()->paginate(Helper::pagination());
        }
        return view('backend.withdraw.ptopusers')->with($data);

    }
    public function percentageStore(Request $request)
    {
        $dateString = $request->date;
        $carbonDate = Carbon::parse($dateString);
        $formattedDate = $carbonDate->format('Y-m-d H:i:s');
        $users = User::where('status', '=', 1)->where('balance', '>', 1)->get();
        if ($users->isNotEmpty()) {
            foreach ($users as $user) {

                $deposit = Deposit::where('user_id', '=', $user->id)->where('status', '=', 1)->sum('amount');
                if($deposit!=0){
                    $calculateamount = $user->balance * ($request->percentage / 100);
                    $userDeposit = $user->tx;
                    $check = $user->ttx + $calculateamount;
                    if ($userDeposit >= $check) {
//                        $profit = Transaction::where('user_id', '=', $user->id)->whereIn('type_two', [5, 3])->sum('amount');
                        $user->ttx = $user->ttx + $calculateamount;
                        $user->update();
                        Transaction::create([
                            'trx' => Str::upper(Str::random(16)),
                            'amount' => $calculateamount,
                            'details' => 'Your Daily Profit ' . ($request->percentage) . '% Added Successfully',
                            'charge' => 0,
                            'type' => '+',
                            'type_two' => 5,
                            'rec_id' => 0,
                            'user_id' => $user->id,
                            'created_at'=>$formattedDate
                        ]);
                    }
                    else{
                        $subammounttt = $user->tx - $user->ttx;

                        if($subammounttt > 0.0){
                            $user->ttx = $user->ttx + $subammounttt;
                            $user->update();
                            Transaction::create([
                                'trx' => Str::upper(Str::random(16)),
                                'amount' => $subammounttt,
                                'details' => 'Your Daily Profit ' . ($request->percentage) . '% Added Successfully',
                                'charge' => 0,
                                'type' => '+',
                                'type_two' => 5,
                                'rec_id' => 0,
                                'user_id' => $user->id,
                                'created_at'=>$formattedDate
                            ]);
                        }

                    }
                    //Start Level Commission
                    $levelProfits = PivortUser::where('user_id', $user->id)->get();
                    $levelPercantages = Referral::where('type', 'invest')->where('status', 1)->pluck('commission');
                    if ($levelPercantages->isNotEmpty()) {
                        foreach ($levelProfits as $item) {
                            $userReffer = User::where('status',1)->where('id',$item->ref_id)->first();
                            $deposit = Deposit::where('user_id', $item->ref_id)->sum('amount');
                            if($deposit!=0) {
                                //Start Level Deposit Check
                                $userids = User::where('ref_id', $item->ref_id)->pluck('id');
                                $hasDeposit = \App\Models\Deposit::whereIn('user_id', $userids)->pluck('user_id')->unique();
                                $levelPercantages_two = Referral::where('type', 'interest')->where('status', 1)->pluck('commission');
                                //End Level Deposit Check
                                if ($hasDeposit->count() >=$levelPercantages_two[0][$item->level - 1] && $userReffer) {
                                    $userDepositt = $userReffer->tx;
                                    $profit = $userReffer->ttx;
                                    $amount = $calculateamount * ($levelPercantages[0][$item->level - 1] / 100);
                                    $checkk = $profit + $amount;
                                    if ($userDepositt >= $checkk) {

                                        $userProfit = User::where('id', $item->ref_id)->where('status', 1)->first();
                                        if ($userProfit) {
                                            $profitAmount = $calculateamount * ($levelPercantages[0][$item->level - 1] / 100);

                                            // Update user balance
                                            if ($profitAmount > 0.00) {
                                                $userProfit->ttx = $userProfit->ttx + $profitAmount;
                                                $userProfit->update();

                                                // Create transaction
                                                Transaction::create([
                                                    'trx' => Str::upper(Str::random(16)),
                                                    'amount' => $profitAmount,
                                                    'details' => 'Profit added refer by ' . $user->username,
                                                    'charge' => 0,
                                                    'type' => '+',
                                                    'type_two' => 5,
                                                    'rec_id' => $user->id,
                                                    'user_id' => $userProfit->id,
                                                    'created_at'=>$formattedDate
                                                ]);
                                            }
                                        }

                                    } else {
                                        $userProfit = User::where('id', $item->ref_id)->where('status', 1)->first();
                                        $subammount = $userProfit->tx - $userProfit->ttx;
                                        if ($subammount > 0.0) {
                                            $userProfit->ttx = $userProfit->ttx + $subammount;
                                            $userProfit->update();
                                            // Create transaction
                                            Transaction::create([
                                                'trx' => Str::upper(Str::random(16)),
                                                'amount' => $subammount,
                                                'details' => 'Profit added refer by. ' . $user->username,
                                                'charge' => 0,
                                                'type' => '+',
                                                'type_two' => 5,
                                                'rec_id' => $user->id,
                                                'user_id' => $userProfit->id,
                                                'created_at'=>$formattedDate
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //End Level

                }
            }
        }
        return back()->with('success', 'Profit Send Successfully');

    }
    public function percentageDelete(Request $request)
    {
        $tra = Transaction::where('type','+')->where('type_two',5)->whereDate('created_at',$request->date)->get();

        if($tra) {
            foreach ($tra as $row) {
                $user = User::find($row->user_id);
                $user->ttx = $user->ttx - $row->amount;
                $user->update();
                $row->delete();
            }
        }
        return back()->with('success', 'Profit Deleted Successfully');

    }
}
