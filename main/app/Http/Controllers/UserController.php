<?php

namespace App\Http\Controllers;

use App\Helpers\Helper\Helper;
use App\Http\Requests\UserProfile;
use App\Models\Configuration;
use App\Models\Deposit;
use App\Models\PivortUser;
use App\Models\Referral;
use App\Models\Template;
use App\Models\Transaction;
use App\Models\User;
use App\Services\ConfigurationService;
use App\Services\UserDashboardService;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $profile, $dashboard, $config;


    public function __construct(UserProfileService $profile, UserDashboardService $dashboard, ConfigurationService $config)
    {
        $this->profile = $profile;
        $this->dashboard = $dashboard;
        $this->config = $config;
    }

    public function dashboard()
    {
        $data = $this->dashboard->dashboard();

        $data['title'] = "Dashboard";

        return view(Helper::theme() . 'user.dashboard')->with($data);
    }

    public function profile()
    {
        $data['title'] = 'Profile Edit';

        $data['user'] = auth()->user();

        return view(Helper::theme() . 'user.profile')->with($data);
    }

    public function profileUpdate(UserProfile $request)
    {
        $isSuccess = $this->profile->update($request);
        if ($isSuccess['type'] === 'success')
            return back()->with('success', $isSuccess['message']);
    }

    public function changePassword()
    {
        $title = 'Change Password';
        return view(Helper::theme() . 'user.changepassword', compact('title'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required|min:6',
            'password' => 'min:6|confirmed',
        ]);

        $user = User::find(auth()->id());

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password do not match');
        } else {
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->back()->with('success', 'Password Updated');
        }
    }

    public function downloadPdf()
    {
        $pdfPath = Helper::filePath('gateways/Dotcoinverse.pdf');
        return response()->download($pdfPath, 'sample.pdf');
    }

    public function team()
    {

        $user = auth()->user();
        $data['myTeam'] = PivortUser::where('ref_id', $user->id)->count();
        $data['directTeam'] = PivortUser::where('ref_id', '=', $user->id)->where('level', 1)->count();
        $data['indirectTeam'] = PivortUser::where('ref_id', '=', $user->id)->where('level', '!=', 1)->count();
        if ($user->ref_id != 0) {
            $data['reffer'] = User::find($user->ref_id);
            $data['check']  = 0;
        } else {
            $data['check']  = 1;
        }
        return view(Helper::theme() . 'user.team.index')->with($data);
    }

    public function level()
    {
        $user = auth()->user();
        $data = [];
        $data['myTeamm'] = PivortUser::where('ref_id',$user->id)->pluck('user_id');
        $data['myTeamTwo'] = PivortUser::where(function ($query) use ($data, $user) {
            $query->where('ref_id', $user->id)
                ->orWhereIn('ref_id', $data['myTeamm']);
        });

        $levelCount = Referral::where('status', 1)->where('type', 'interest')->first();

        for ($level = 1; $level <= 10; $level++) {
            $levelUserIds = PivortUser::where('ref_id', '=', $user->id)->where('level', $level)->pluck('user_id');
//            $data["level{$level}"] = Transaction::where('user_id', '=', $user->id)
//                ->whereIn('rec_id', $levelUserIds)
//                ->where('type_two', [3, 5])
//                ->sum('amount');
            $data["level{$level}"] = Deposit::WhereIn('user_id',$levelUserIds)->sum('amount');

            $userids = User::where('ref_id', $user->id)->pluck('id');
            $hasDeposit = \App\Models\Deposit::whereIn('user_id', $userids)->pluck('user_id')->unique();

            if ($levelCount && isset($levelCount->commission[$level-1])) {
                $count = User::where('ref_id', $user->id)->count();
                $threshold = $levelCount->commission[$level-1];
                $status = ($hasDeposit->count()  >= intval($threshold)) ? 'Active' : 'Inactive';
            }
            else{
                $status = 'Inactive';
            }
            $data["count{$level}"] = $status;
        }
        for ($level = 1; $level <= 10; $level++) {
            $data["user{$level}"] = PivortUser::where('ref_id', $user->id)->where('level', $level)->count();
        }

        return view(Helper::theme() . 'user.team.level')->with($data);
    }

    public function singlelevelUser($level)
    {
        $user = auth()->user();
        $user_ids = PivortUser::where('ref_id', $user->id)->where('level', $level)->pluck('user_id');
        $data['users'] = User::WhereIn('id', $user_ids)->latest()->paginate(12);
        $data['level'] = $level;
        return view(Helper::theme() . 'user.team.user')->with($data);
    }

    public function statistics()
    {
        $user = auth()->user();

        $data['staking'] = Deposit::where('user_id', '=', $user->id)->where('status', 1)->sum('amount');
        $data['receivable_reward'] = Transaction::whereIn('type_two',[5,3])->where('user_id', '=', $user->id)->sum('amount');

        $direct_user = PivortUser::where('ref_id', '=', $user->id)->where('level', 1)->pluck('user_id');
        $data['directReward'] = Transaction::where('user_id', '=', $user->id)->WhereIn('rec_id', $direct_user)->where('type_two', 3)->sum('amount');
        $data['indirectReward'] = Transaction::where('user_id', '=', $user->id)->whereNotIn('rec_id', $direct_user)->where('type_two', 3)->sum('amount');

        $data['maximum_reward'] = $user->tx ?? '0';
        $data['available_reward']  =  $user->ttx  ?? '0';
        $data['receive_reward'] = $data['maximum_reward'] + $data['available_reward'];


        return view(Helper::theme() . 'user.stat.index')->with($data);
    }

    public function transection()
    {
        $user = auth()->user();

        $data["totalAmountByDate"] = Transaction::where('user_id', '=', $user->id)->where('rec_id','!=',0)->whereIn('type_two',  [5])->selectRaw('DATE(created_at) as transaction_date, SUM(amount) as total_amount')
            ->groupBy('transaction_date')
            ->orderBy('transaction_date', 'desc')
            ->get();
        return view(Helper::theme() . 'user.stat.transection')->with($data);
    }

    public function levelTransection($date)
    {
        $user = auth()->user();
        $data = [];
        for ($level = 1; $level <= 10; $level++) {
            $levelUserIds = PivortUser::where('ref_id', '=', $user->id)->where('level', $level)->pluck('user_id');
            $data["level{$level}"] = Transaction::where('user_id', '=', $user->id)
                ->where('rec_id','!=',0)
                ->whereIn('rec_id', $levelUserIds)
                ->whereDate('created_at', $date)
                ->whereIn('type_two', [5])
                ->sum('amount');
        }
        return view(Helper::theme() . 'user.stat.level')->with($data);
    }


    public function resend()
    {
        $general = Configuration::first();

        $user = auth()->user();
        if ($general->is_email_verification_on && !$user->is_email_verified) {

            $randomNumber = rand(0, 999999);

            $user->email_verification_code = $randomNumber;
            $user->save();

            $template = Template::where('name', 'verify_email')->where('status', 1)->first();
            $email = $user->email;
            if ($template) {
                $check  = Helper::fireMail([
                    'username' => $user->username,
                    'email' => $email,
                    'app_name' => Helper::config()->appname,
                    'code' => $randomNumber
                ], $template);
            }
            return redirect()->route('user.authentication.verify');
        }
    }
    public function myteam()
    {

    }
}
