@extends(Config::theme() . 'layout.auth')
<style>
    :root {
    --dark-1: #121214;
    --dark-2: #1C1C21;
    --gold:  #FFC300;
    --text-light: #EDEDED;
}
.d-card {
    background: linear-gradient(
        90deg,
        var(--dark-1) 0%,
        var(--dark-2) 40%,
        var(--gold) 100%
    );
    border-radius: 18px;
    color: var(--text-light);
    position: relative;
    overflow: hidden;
    transition: all 0.35s ease;
    box-shadow: 0 12px 30px rgba(0,0,0,0.35);
}

.d-card p,
.d-card h4,
.d-card h5,
.d-card h6 {
    color: var(--text-light);
}

.d-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 45px rgba(255,195,0,0.25);
}
.team-card-hover {
    animation: floatCard 4s ease-in-out infinite;
    border: 1px solid rgba(255,195,0,0.35);
}

.team-card-hover::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        120deg,
        transparent 30%,
        rgba(255,195,0,0.25),
        transparent 70%
    );
    transform: translateX(-100%);
    animation: shine 3.5s infinite;
}
@keyframes floatCard {
    0%   { transform: translateY(0); }
    50%  { transform: translateY(-10px); }
    100% { transform: translateY(0); }
}

@keyframes shine {
    0%   { transform: translateX(-100%); }
    60%  { transform: translateX(100%); }
    100% { transform: translateX(100%); }
}
.d-card-icon {
    background: radial-gradient(
        circle,
        #FFC300 0%,
        #b89200 60%,
        #7a6200 100%
    );
    color: #121214;
    box-shadow: 0 8px 25px rgba(255,195,0,0.45);
}

.d-card-icon i {
    font-size: 28px;
}
.d-card-amount {
    font-size: 30px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.d-card-caption {
    font-size: 14px;
    opacity: 0.9;
}
.user-card {
    background: linear-gradient(
        145deg,
        #121214,
        #1C1C21
    );
    border: 1px solid rgba(255,195,0,0.2);
}

.user-card hr {
    border-color: rgba(255,195,0,0.25);
}

    </style>
@section('content')

    <div class="row g-sm-4 g-3">
        <div class="d-xl-none d-block mt-4" >
            <div class="row g-sm-4 g-3">
                @if($check ==1)
                    <div class="col-xl-12 col-lg-6">
                        <div class="d-card user-card not-hover">
                            <div class="text-center">
                                <h4 class="d-card-balance mt-xxl-3 mt-2">TradX24</h4>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-12 col-lg-6">
                        <div class="d-card user-card not-hover">
                            <div class="text-center">
{{--                                <h4 class="d-card-balance mt-xxl-3 mt-2">{{$reffer->first_name .' '. $reffer->last_name}}</h4>--}}
{{--                                <h5 class="user-card-title"  style="text-transform: none">{{$reffer->email}}</h5>--}}

                                <div class="mt-4">
                                    <a href="#" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> {{ __('Up-Line') }}</a>
                                    <a href="#" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> {{$reffer->username}}</a>
                                </div>
                            </div>


                            <hr class="my-4">
                            <a href="https://wa.me/{{$reffer->phone}}?text=Hello%20there!" target="_blank" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-whatsapp-square me-2"></i> {{$reffer->phone}}</a>
                        </div>
                    </div>
                @endif


            </div>
        </div>
        <div class="col-xxl-8 col-xl-12 ">
            <div class="d-left-wrapper">
                <div class="d-left-countdown">
                    <div id="countdownTwo"></div>
                </div>
                <div class="row g-sm-4 g-3">

                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{$directTeam}}</h4>
                                <p class="d-card-caption">{{ __('Team Direct Members') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{$indirectTeam}}</h4>
                                <p class="d-card-caption">{{ __('Team Indirect Members') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{$myTeam}}</h4>
                                <p class="d-card-caption">{{ __('Total Team Members') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">

                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <a href="{{route('user.level')}}">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>

                            <div class="d-card-content">
                                <h4 class="d-card-amount">10</h4>
                                <p class="d-card-caption">{{ __('Team Levels') }}</p>
                            </div>

                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">

                        </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 d-custom-right team-card" >
            <div class="d-right-wrapper">
                <div class="d-xl-block d-none">
                    <div class="row g-sm-4 g-3">
                        @if($check==1)
                            <div class="col-xl-12 col-lg-6">
                                <div class="d-card user-card not-hover">
                                    <div class="text-center">
                                            <h5 class="d-card-balance mt-xxl-3">TradX24</h5>
                                    </div>
                                     </div>
                            </div>
                        @else
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                     @if($reffer->first_name)
                                    <h5 class="d-card-balance mt-xxl-3 mt-2">{{$reffer->first_name .' '. $reffer->last_name}}</h5>
                                    @else
                                        <h4 class="d-card-balance mt-xxl-3 mt-2">{{$reffer->username}}</h4>
                                    @endif
                                    <h6 class="user-card-title"  style="text-transform: none">{{$reffer->email}}</h6>
                                    <div class="mt-4  deposit-buttons">
                                        <a href="#" class="btn btn-md sp_btn_danger"><i class="las la-minus-circle fs-lg"></i> {{ __('Up-Line') }}</a>
                                        <a href="#" class="btn btn-md sp_btn_success"><i class="las la-plus-circle fs-lg"></i> {{$reffer->username}}</a>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <a href="https://wa.me/{{$reffer->phone}}?text=Hello%20there!" target="_blank" class="btn sp_theme_btn mt-4 w-100"><i class="fab fa-whatsapp"></i> &nbsp;&nbsp; {{$reffer->phone}}</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


