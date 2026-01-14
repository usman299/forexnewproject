<?php

namespace App\Services;

use App\Helpers\Helper\Helper;
use App\Models\DashboardSignal;
use App\Models\Deposit;
use App\Models\Payment;
use App\Models\PivortUser;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserSignal;
use App\Models\Withdraw;
use Carbon\Carbon;
use DB;

class UserDashboardService
{
    public function dashboard()
    {
        $user = auth()->user();

        $data['currentPlan'] = $user->currentplan()->first();

        if ($data['currentPlan'] != null) {
            $data['signalGraph'] =  UserSignal::where('user_id', auth()->id())->select(DB::raw('COUNT(*) as total'), DB::raw('MONTHNAME(created_at) month'))
            ->groupby('month')
            ->get();
        }


        $data['totalbalance'] = $user->balance;
        $data['staking_amount'] = $user->deposits()->where('status', 1)->sum('amount');
        $data['staking_reward'] = Transaction::where('user_id','=',$user->id)->where('rec_id','=',0)->where('type_two',5)->sum('amount');
//        $data['myTeamm'] = PivortUser::where('ref_id',$user->id)->pluck('user_id');
//        $data['myTeamTwo'] = PivortUser::where(function ($query) use ($data, $user) {
//            $query->where('ref_id', $user->id)
//                ->orWhereIn('ref_id', $data['myTeamm']);
//        });
//        $data['myTeam'] = $data['myTeamTwo']->pluck('user_id')->unique()->count();
        $data['myTeam'] = PivortUser::where('ref_id',$user->id)->count();
        $direct_user = PivortUser::where('ref_id','=',$user->id)->where('level',1)->pluck('user_id');
        $data['directReward'] = Transaction::where('user_id','=',$user->id)->WhereIn('rec_id',$direct_user)->where('type_two',3)->sum('amount');
        $data['teamReward'] = Transaction::where('user_id','=',$user->id)->where('rec_id','!=',0)->where('type_two',5)->sum('amount');

        $data['totalReward'] = $data['directReward'] + $data['staking_reward'] + $data['teamReward'];

        $data['totalWithdraw'] = $user->withdraws()->where('status', 1)->sum('withdraw_amount');
        $data['totalPayments'] = $user->payments()->where('status', 1)->sum('amount');
        $data['totalSupportTickets'] = $user->tickets()->count();
        $data['user'] = $user;
        $data['transactions'] = $user->transactions()->latest()->with('user')->limit(3)->get();
        $transactionss = Transaction::where('user_id',$user->id)->selectRaw('DAYOFWEEK(created_at) as day, SUM(amount) as total_amount')->groupBy('day')->get();
        $data['chartData'] = $transactionss->map(function ($transaction) {
            return [
                'day' => $transaction->day,
                'total_amount' => $transaction->total_amount,
            ];
        })->toJson();
        $data['signals'] = DashboardSignal::where('user_id', $user->id)->latest()->with('signal.market', 'signal.pair', 'signal.time', 'user')->paginate(Helper::pagination());


        $months = array();

        $totalAmount = collect([]);

        $withdrawTotalAmount = collect([]);
        $depositTotalAmount = collect([]);
        $signalGrapTotal = collect([]);

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            array_push($months, $month->monthName);

            $totalAmount->push(0);
            $withdrawTotalAmount->push(0);
            $depositTotalAmount->push(0);
            $signalGrapTotal->push(0);
        }

        $payment = Payment::where('status', 1)
            ->where('user_id', auth()->id())
            ->whereYear('created_at', '=', now())
            ->select(DB::raw('SUM(amount) as total'), DB::raw('MONTHNAME(created_at) month'))
            ->groupby('month')->get();

        $withdraw = Withdraw::where('status', 1)
            ->where('user_id', auth()->id())
            ->select(DB::raw('SUM(withdraw_amount) as total'), DB::raw('MONTHNAME(created_at) month'))
            ->groupby('month')
            ->get();


        $deposit = Deposit::where('status', 1)
            ->where('user_id', auth()->id())
            ->select(DB::raw('SUM(amount) as total'), DB::raw('MONTHNAME(created_at) month'))
            ->groupby('month')
            ->get();

        foreach ($payment as $pay) {
            $result = array_search($pay->month, $months);

            $totalAmount[$result] = $pay->total;
        }

        foreach ($withdraw as $with) {
            $result = array_search($with->month, $months);

            $withdrawTotalAmount[$result] = $with->total;
        }

        foreach ($deposit as $depo) {

            $result = array_search($depo->month, $months);
            $depositTotalAmount[$result] = $depo->total;
        }


        $graphs = $data['signalGraph'] ?? [];


        foreach ($graphs as $sig) {
            $result = array_search($sig->month, $months);

            $signalGrapTotal[$result] = $sig->total;
        }

        $data['totalAmount'] = $totalAmount;
        $data['withdrawTotalAmount'] = $withdrawTotalAmount;
        $data['depositTotalAmount'] = $depositTotalAmount;
        $data['signalGrapTotal'] = $signalGrapTotal;
        $data['months'] = $months;

        $userids = User::where('ref_id',$user->id)->where('status',1)->pluck('id');
        $data['weeklyTransactions'] = Transaction::whereIn('user_id', $userids)
            ->selectRaw('YEARWEEK(created_at) as week,
                 SUM(CASE WHEN type_two = "1" THEN amount ELSE 0 END) as total_deposits')
            ->groupBy('week')
            ->get();


        return $data;
    }
}
