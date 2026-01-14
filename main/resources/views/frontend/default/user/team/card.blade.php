
public static function referLevel($from, $to)
{
$user_id = $from;
$newPivortUser = PivortUser::create([
'user_id' => $user_id,
'ref_id' => $to->id,
'level' => 1,
]);
$levelCount = Referral::where('status', 1)->where('type', 'interest')->first();
if ($newPivortUser) {
$oldPivortUser = PivortUser::where('user_id', $newPivortUser->ref_id)->get();

foreach ($oldPivortUser as $eachuser) {
for ($level = 1; $level < 10; $level++) {
$count = User::where('ref_id', $eachuser->ref_id)->count();
// Adjust the threshold as needed, in this case, it's set to 3
$threshold = $levelCount->commission[$level];
if ($count >= intval($threshold)) {
$maxLevel = PivortUser::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
// first not enter
$check = PivortUser::where('user_id', $user_id)->where('ref_id', $eachuser->ref_id)->get();
if($check->isEmpty()) {
PivortUser::create([
'user_id' => $user_id,
'ref_id' => $eachuser->ref_id,
'level' => $eachuser->level + 1,
]);
}

}
}
}
//            foreach ($oldPivortUser as $eachuser) {
//                $count = User::where('ref_id','=',$newPivortUser->ref_id)->count();
//                if($count>=1 && $count < 3 ){
//                    for ($level = 1; $level < 2; $level++) {
//                            PivortUser::create([
//                                'user_id' => $user_id,
//                                'ref_id' => $eachuser->ref_id,
//                                'level' => $eachuser->level + 1,
//                            ]);
//                    }
//                }
//                elseif($count>= 3 && $count < 5 ){
//                    for ($level = 1; $level < 3; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 5 && $count < 7 ){
//                    for ($level = 1; $level < 4; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 7 && $count < 9 ){
//                    for ($level = 1; $level < 5; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 9 && $count < 11 ){
//                    for ($level = 1; $level < 6; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 11 && $count < 13 ){
//                    for ($level = 1; $level < 7; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 13 && $count < 15 ){
//                    for ($level = 1; $level < 8; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 15 && $count < 17 ){
//                    for ($level = 1; $level < 9; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 17 && $count < 20 ){
//                    for ($level = 1; $level < 10; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//                elseif($count>= 20 ){
//                    for ($level = 1; $level < 11; $level++) {
//                        PivortUser::create([
//                            'user_id' => $user_id,
//                            'ref_id' => $eachuser->ref_id,
//                            'level' => $eachuser->level + 1,
//                        ]);
//                    }
//                }
//
//
//            }

}
}
@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row g-sm-4 g-3">
        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards">
                <div class="d-card-content level-cards">
                    <a href=""><h4 class="d-card-amount">12-08-2024</h4></a>
                    <h5 class="d-card-caption">13,450 BLV</h5>
                </div>
            </div>
        </div>
        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards">
                <h3>Level 1</h3>
                <div class="d-card-content level-cards level-card-two">
                    <a href=""><h4 class="d-card-amount"><i class="las la-users"></i>12-08-2024</h4></a>
                    <h5 class="d-card-caption"><i class="las la-hand-holding-usd"></i>13,450 BLV</h5>
                </div>
                <a href="" class="right-arrow">
                    <i class="la la-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards last-level-card">
                <div class="last-card">
                    <h3>2Arslan Ghalib</h3>
                    <div class="d-card-content level-cards level-card-two level-card-third">
                        <a href=""><h4 class="d-card-amount"><i class="las la-hand-holding-usd"></i>100.0 BLV Staked</h4></a>
                        <h5 class="d-card-caption"><i class="fab fa-whatsapp"></i>+92123456789</h5>
                    </div>
                </div>
                <a href="" class="right-arrow">
                    <div class="active-inactive">Inactive</div>
                    <p>User Id: 5CBQ96p</p>
                </a>
            </div>
        </div>
    </div>
@endsection


@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row gy-4 user-team-row">

        @forelse ($users as $user)
            <div class="col-lg-4">
                <div class="sp_pricing_item">
                    <div class="pricing-header">
                        <div class="left">
                            <div class="icon">
                                <i class="far fa-gem"></i>
                            </div>
                            <div class="content">

                                <h6 class="package-name">{{ $user->username}}</h6>
                                <p>
                                    @if($user->first_name)
                                        <span>{{ $user->first_name .' '.  $user->last_name}}</span>
                                    @else
                                        <span>{{ $user->username}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="right">
                            <h6 class="package-price">
                                <i class="fab fa-whatsapp"></i> {{ $user->phone}}
                            </h6>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="package-features">
                            @php
                                $earn =  \App\Models\Transaction::where('user_id', '=', $user->id)->where('type_two', 3)->sum('amount');
                                $levelUserIds = \App\Models\PivortUser::where('ref_id', '=', $user->id)->count();
                            @endphp
                            <li> {{ '$'.$earn }}</li>
                            <li> {{ 'Team: '.$levelUserIds }}</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="https://wa.me/{{$user->phone}}?text=Hello%20there!" data-id="{{ $user->id }}"
                           class="btn sp_theme_btn w-100 chooseBtn"><i class="fab fa-whatsapp"></i>  &nbsp;&nbsp; {{ __('Open Whats app') }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-lg-12 mt-3 no-team">
                <p>{{ __('No Teams Found') }}</p>
            </div>
        @endforelse

        @if ($users->hasPages())
            <div class="col-md-12">
                {{ $users->links() }}
            </div>
        @endif

    </div>
@endsection

