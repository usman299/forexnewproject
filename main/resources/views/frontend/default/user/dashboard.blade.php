@extends(Config::theme() . 'layout.auth')
@section('content')

@php
    $plan_expired_at = now();
@endphp

@if (auth()->user()->currentplan)
    @php
        $is_subscribe = auth()->user()->currentplan()->where('is_current', 1)->first();

        if($is_subscribe){
            $plan_expired_at =  $is_subscribe->plan_expired_at;
        }
    @endphp
@endif
{{--d-custom-left--}}
    <div class="row g-sm-4 g-3">
        <div class="col-xxl-12 col-xl-12 ">
            <div class="d-left-wrapper">
                <div class="d-left-countdown">
{{--                    <div id="countdownTwo"></div>--}}
                </div>
                <div class="row g-sm-4 g-3">
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                        <div class="shadow">
                            <div class="d-card-icon gr-bg-1">
                                <i class="las la-credit-card"></i>
                            </div>
                        </div>
                            <div class="d-card-content">
                                <?php
                                $tra = \App\Models\Transaction::where('type_two',4)->where('user_id',auth()->user()->id)->first();
                                ?>
                                @if($tra)
                                <h4 class="d-card-amount">{{ Config::formatter($staking_amount+5) }}</h4>
                                    @else
                                        <h4 class="d-card-amount">{{ Config::formatter($staking_amount) }}</h4>
                                    @endif
                                <p class="d-card-caption">{{ __('Staking Amount') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">

                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                            <div class="d-card-icon gr-bg-4">
                                <i class="las la-ticket-alt"></i>
                            </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{ Config::formatter($staking_reward) }}</h4>
                                <p class="d-card-caption">{{ __('Staking Reward') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                        <div class="shadow">
                            <div class="d-card-icon gr-bg-2">
                                <i class="las la-hand-holding-usd"></i>
                            </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{$myTeam}}</h4>
                                <p class="d-card-caption">{{ __('My Team') }}</p>
                            </div>
                               <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{ Config::formatter($directReward) }}</h4>
                                <p class="d-card-caption">{{ __('Direct Reward') }}</p>
                            </div>
                               <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-1">
                                    <i class="las la-credit-card"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{ Config::formatter($teamReward) }}</h4>
                                <p class="d-card-caption">{{ __('Team Reward') }}</p>
                            </div>
                            <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-4">
                                    <i class="las la-ticket-alt"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount">{{ Config::formatter($totalReward) }}</h4>
                                <p class="d-card-caption">{{ __('Total Reward') }}</p>
                            </div>
                               <img class="card-wave" src="{{ Config::getFile('logo', 'wave.svg', true) }}" alt="image">
                        </div>
                    </div>

                </div>

                <div class="d-xl-none d-block mt-4" style="display: none!important;">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                                    <h5 class="user-card-title">{{ __('Total Balance') }}</h5>
                                    <h4 class="d-card-balance mt-xxl-3 mt-2">{{ Config::formatter($totalbalance) }}</h4>
                                    <div class="mt-4">
                                        <a href="{{ route('user.withdraw') }}" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> {{ __('Withdraw') }}</a>
                                        <a href="{{ route('user.deposit') }}" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> {{ __('Deposit') }}</a>
                                    </div>
                                </div>

                                <hr class="my-4">



                                <ul class="recent-transaction-list mt-4">
                                    @foreach ($transactions as $trans)



                                    <li class="single-recent-transaction">

                                        <div class="content">
                                            <h6 class="title">{{$trans->details}}</h6>
                                            <span>{{$trans->created_at->format('d F, Y')}}</span>
                                        </div>
                                        <p class="recent-transaction-amount {{$trans->type == '+' ?  "sp_text_success" : 'sp_text_danger' }}">{{Config::formatter($trans->amount)}}</p>
                                    </li>
                                    @endforeach

                                </ul>
                                <a href="{{ route('user.transaction.log') }}" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-rocket me-2"></i> {{ __('View All Transaction') }}</a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card not-hover">
                                <div id="chart3" class="d-flex justify-content-center"></div>
                            </div>

                            <h6 class="mb-2 mt-4">{{ __('Your Referral Link') }}</h6>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control copy-text" id="textInput"  placeholder="Referral link"
                                        value="{{ route('user.register', $user->username) }}" readonly>
                                        <button type="button"   class="input-group-text sp_bg_base px-4 copy
                                        ">{{ __('Copyy') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="sp_site_card mt-4">
                    <div class="card-header">
                        <h5>{{ __('Crypto Screener') }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/crypto-screener/"
                                                                             rel="noopener" target="_blank"><span class="blue-text">Crypto Screener</span></a> by TradingView
                                </div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "523",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "general",
                                        "market": "crypto",
                                        "showToolbar": true,
                                        "colorTheme": "dark",
                                        "locale": "en"
                                    }
                                </script>
                            </div>
{{--                            <table class="table sp_site_table">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>{{ __('Signal Date') }}</th>--}}
{{--                                        <th>{{ __('Title') }}</th>--}}
{{--                                        <th>{{ __('Action') }}</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                    @forelse ($signals as $signal)--}}
{{--                                        <tr>--}}
{{--                                            <td data-caption="{{ __('Signal Date') }}">--}}
{{--                                                {{ $signal->created_at->format('dS M, Y -') }}--}}

{{--                                                <span class="table-date">{{ $signal->created_at->format('h:i:s A') }}</span>--}}
{{--                                            </td>--}}
{{--                                            <td data-caption="{{ __('Title') }}">{{ $signal->signal->title }}</td>--}}
{{--                                            <td data-caption="{{ __('Action') }}">--}}
{{--                                                <a href="{{ route('user.signal.details', ['id' => $signal->signal->id, 'slug' => Str::slug($signal->signal->title)]) }}"--}}
{{--                                                    class="view-btn"><i class="far fa-eye"></i></a>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @empty--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-center" colspan="100%">{{ __('No Signals Found') }}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforelse--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
                        </div>
                    </div>

                    @if ($signals->hasPages())
                        <div class="card-footer">
                            {{ $signals->links() }}
                        </div>
                    @endif

                </div>
                <div class="sp_site_card mt-4">
                    <div class="card-header">
                        <h5>{{ __('Stock Screener') }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/screener/" rel="noopener"
                                                                             target="_blank"><span class="blue-text">Stock Screener</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "523",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "most_capitalized",
                                        "showToolbar": true,
                                        "locale": "en",
                                        "market": "us",
                                        "colorTheme": "dark"
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    @if ($signals->hasPages())
                        <div class="card-footer">
                            {{ $signals->links() }}
                        </div>
                    @endif

                </div>
                <div class="d-card mt-4">
                    <h5 class="">{{ __('Transaction Graph') }}</h5>
                    <div class="card-body">
                        <div id="profit-chart"></div>
                    </div>
{{--                    <div style="width: 90%; margin: auto;">--}}
{{--                        <canvas id="transactionChart" width="400" height="200px"></canvas>--}}
{{--                    </div>--}}

                </div>
                <div class="d-card mt-4">
                    <h6 class="mb-2 mt-4">{{ __('Your Referral Link') }}</h6>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control copy-text" id="textInput" placeholder="Referral link"
                                   value="{{ route('user.register', $user->username) }}" readonly>
                            <button type="button" id="copyButtonTwo"  class="input-group-text sp_bg_base px-4 copy">{{ __('Copy') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 d-custom-right" style="display: none">
            <div class="d-right-wrapper">
                <div class="d-xl-block d-none">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                                    <h5 class="user-card-title">{{ __('Total Balance') }}</h5>
                                    <h4 class="d-card-balance mt-xxl-3 mt-2">{{ Config::formatter($totalbalance) }}</h4>
                                    <div class="mt-4">
                                        <a href="{{ route('user.withdraw') }}" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> {{ __('Withdraw') }}</a>
                                        <a href="{{ route('user.deposit') }}" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> {{ __('Deposit') }}</a>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <ul class="recent-transaction-list mt-4">
                                    @foreach ($transactions as $trans)

                                    <li class="single-recent-transaction">

                                        <div class="content">
                                            <h6 class="title">{{$trans->details}}</h6>
                                            <span>{{$trans->created_at->format('d F, Y')}}</span>
                                        </div>
                                        <p class="recent-transaction-amount {{$trans->type == '+' ?  "sp_text_success" : 'sp_text_danger' }}">{{number_format($trans->amount)}}</p>
                                    </li>
                                    @endforeach

                                </ul>
                                <a href="{{ route('user.transaction.log') }}" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-rocket me-2"></i> {{ __('View All Transaction') }}</a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">

                            <div class="d-card not-hover">

{{--                                <div id="chart2" class="d-flex justify-content-center"></div>--}}
                            </div>

                            <h6 class="mb-2 mt-4">{{ __('Your Referral Link') }}</h6>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control copy-text2" placeholder="Referral link"
                                        value="{{ route('user.register', $user->username) }}" id="textInput"  readonly>
                                    <button type="button" id="copyButton"  class="input-group-text sp_bg_base px-4 copy2">{{ __('Copy') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <section class="content">--}}

{{--            <div class="col-12">--}}
{{--                 <!-- TradingView Widget BEGIN -->--}}
{{--                    <div class="tradingview-widget-container m-5">--}}
{{--                        <div class="tradingview-widget-container__widget"></div>--}}
{{--                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/stocks-usa/" rel="noopener" target="_blank"></a></div>--}}
{{--                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>--}}
{{--                            {--}}
{{--                            "colorTheme": "light",--}}
{{--                            "dateRange": "12M",--}}
{{--                            "exchange": "NASDAQ",--}}
{{--                            "showChart": true,--}}
{{--                            "locale": "en",--}}
{{--                            "largeChartUrl": "",--}}
{{--                            "isTransparent": false,--}}
{{--                            "showSymbolLogo": true,--}}
{{--                            "showFloatingTooltip": false,--}}
{{--                            "width": "400",--}}
{{--                            "height": "600",--}}
{{--                            "plotLineColorGrowing": "rgba(255, 255, 0, 1)",--}}
{{--                            "plotLineColorFalling": "rgba(255, 255, 0, 1)",--}}
{{--                            "gridLineColor": "rgba(0, 0, 0, 0)",--}}
{{--                            "scaleFontColor": "rgba(120, 123, 134, 1)",--}}
{{--                            "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",--}}
{{--                            "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",--}}
{{--                            "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",--}}
{{--                            "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",--}}
{{--                            "symbolActiveColor": "rgba(41, 98, 255, 0.12)"--}}
{{--                            }--}}
{{--                        </script>--}}
{{--                    </div>--}}
{{--                    <!-- TradingView Widget END -->--}}
{{--                <!-- TradingView Widget BEGIN -->--}}
{{--                <div class="tradingview-widget-container">--}}
{{--                    <div class="tradingview-widget-container__widget"></div>--}}
{{--                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/crypto-screener/"--}}
{{--                                                                 rel="noopener" target="_blank"><span class="blue-text">Crypto Screener</span></a> by TradingView--}}
{{--                    </div>--}}
{{--                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>--}}
{{--                        {--}}
{{--                            "width": "100%",--}}
{{--                            "height": "523",--}}
{{--                            "defaultColumn": "overview",--}}
{{--                            "defaultScreen": "general",--}}
{{--                            "market": "crypto",--}}
{{--                            "showToolbar": true,--}}
{{--                            "colorTheme": "light",--}}
{{--                            "locale": "en"--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                </div>--}}
{{--                <!-- TradingView Widget END -->--}}
{{--            </div>--}}
{{--             <div class="col-6">--}}
{{--                        <!-- TradingView Widget BEGIN -->--}}
{{--                        <div class="tradingview-widget-container m-5">--}}
{{--                            <div class="tradingview-widget-container__widget"></div>--}}
{{--                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"></div>--}}
{{--                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>--}}
{{--                                {--}}
{{--                                "colorTheme": "light",--}}
{{--                                "dateRange": "12M",--}}
{{--                                "showChart": true,--}}
{{--                                "locale": "en",--}}
{{--                                "largeChartUrl": "",--}}
{{--                                "isTransparent": false,--}}
{{--                                "showSymbolLogo": true,--}}
{{--                                "showFloatingTooltip": false,--}}
{{--                                "width": "400",--}}
{{--                                "height": "660",--}}
{{--                                "plotLineColorGrowing": "rgba(255, 255, 0, 1)",--}}
{{--                                "plotLineColorFalling": "rgba(255, 255, 0, 1)",--}}
{{--                                "gridLineColor": "rgba(0, 0, 0, 0)",--}}
{{--                                "scaleFontColor": "rgba(255, 255, 255, 1)",--}}
{{--                                "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",--}}
{{--                                "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",--}}
{{--                                "belowLineFillColorGrowingBottom": "rgba(0, 0, 0, 0)",--}}
{{--                                "belowLineFillColorFallingBottom": "rgba(0, 0, 0, 0)",--}}
{{--                                "symbolActiveColor": "rgba(41, 98, 255, 0.12)",--}}
{{--                                "tabs": [--}}
{{--                                  {--}}
{{--                                    "title": "Indices",--}}
{{--                                    "symbols": [--}}
{{--                                      {--}}
{{--                                        "s": "FOREXCOM:SPXUSD",--}}
{{--                                        "d": "S&P 500"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FOREXCOM:NSXUSD",--}}
{{--                                        "d": "US 100"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FOREXCOM:DJI",--}}
{{--                                        "d": "Dow 30"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "INDEX:NKY",--}}
{{--                                        "d": "Nikkei 225"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "INDEX:DEU40",--}}
{{--                                        "d": "DAX Index"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FOREXCOM:UKXGBP",--}}
{{--                                        "d": "UK 100"--}}
{{--                                      }--}}
{{--                                    ],--}}
{{--                                    "originalTitle": "Indices"--}}
{{--                                  },--}}
{{--                                  {--}}
{{--                                    "title": "Futures",--}}
{{--                                    "symbols": [--}}
{{--                                      {--}}
{{--                                        "s": "CME_MINI:ES1!",--}}
{{--                                        "d": "S&P 500"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "CME:6E1!",--}}
{{--                                        "d": "Euro"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "COMEX:GC1!",--}}
{{--                                        "d": "Gold"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "NYMEX:CL1!",--}}
{{--                                        "d": "Crude Oil"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "NYMEX:NG1!",--}}
{{--                                        "d": "Natural Gas"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "CBOT:ZC1!",--}}
{{--                                        "d": "Corn"--}}
{{--                                      }--}}
{{--                                    ],--}}
{{--                                    "originalTitle": "Futures"--}}
{{--                                  },--}}
{{--                                  {--}}
{{--                                    "title": "Bonds",--}}
{{--                                    "symbols": [--}}
{{--                                      {--}}
{{--                                        "s": "CME:GE1!",--}}
{{--                                        "d": "Eurodollar"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "CBOT:ZB1!",--}}
{{--                                        "d": "T-Bond"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "CBOT:UB1!",--}}
{{--                                        "d": "Ultra T-Bond"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "EUREX:FGBL1!",--}}
{{--                                        "d": "Euro Bund"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "EUREX:FBTP1!",--}}
{{--                                        "d": "Euro BTP"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "EUREX:FGBM1!",--}}
{{--                                        "d": "Euro BOBL"--}}
{{--                                      }--}}
{{--                                    ],--}}
{{--                                    "originalTitle": "Bonds"--}}
{{--                                  },--}}
{{--                                  {--}}
{{--                                    "title": "Forex",--}}
{{--                                    "symbols": [--}}
{{--                                      {--}}
{{--                                        "s": "FX:EURUSD"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FX:GBPUSD"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FX:USDJPY"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FX:USDCHF"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FX:AUDUSD"--}}
{{--                                      },--}}
{{--                                      {--}}
{{--                                        "s": "FX:USDCAD"--}}
{{--                                      }--}}
{{--                                    ],--}}
{{--                                    "originalTitle": "Forex"--}}
{{--                                  }--}}
{{--                                ]--}}
{{--                                }--}}
{{--                            </script>--}}
{{--                        </div>--}}
{{--                        <!-- TradingView Widget END -->--}}

{{--                </div>--}}
{{--            <div class="col-12">--}}
{{--                <!-- TradingView Widget BEGIN -->--}}
{{--                <div class="tradingview-widget-container">--}}
{{--                    <div class="tradingview-widget-container__widget"></div>--}}
{{--                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/screener/" rel="noopener"--}}
{{--                                                                 target="_blank"><span class="blue-text">Stock Screener</span></a> by TradingView</div>--}}
{{--                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>--}}
{{--                        {--}}
{{--                            "width": "1100",--}}
{{--                            "height": "523",--}}
{{--                            "defaultColumn": "overview",--}}
{{--                            "defaultScreen": "most_capitalized",--}}
{{--                            "showToolbar": true,--}}
{{--                            "locale": "en",--}}
{{--                            "market": "us",--}}
{{--                            "colorTheme": "light"--}}
{{--                        }--}}
{{--                    </script>--}}
{{--                </div>--}}
{{--                <!-- TradingView Widget END -->--}}
{{--            </div>--}}
{{--        </section>--}}
    </div>

<script>
    $(document).ready(function() {
        $('#copyButtonTwo').click(function() {
            var textToCopy = $('#textInput').val();
            var $tempInput = $("<input>");
            $('body').append($tempInput);
            $tempInput.val(textToCopy).select();
            document.execCommand("copy");
            $tempInput.remove();
             if(textToCopy){
                 $(this).text('Copied'); // Change the text of the button to 'Copied'
                 // You can also change it back after a delay if needed
                 setTimeout(() => {
                     $(this).text('Copy'); // Change back to 'Copy' after some time
                 }, 3500);
             }

        });
    });

</script>
@endsection

@push('external-css')
    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'lib/apex.min.css') }}">
@endpush


@push('external-script')
    <script src="{{ Config::jsLib('frontend', 'lib/apex.min.js') }}"></script>

@endpush

@push('script')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var weeklyTransactions = @json($weeklyTransactions);

        // Convert weeklyTransactions into the format required by the chart script
        var seriesData = [];
        var depositData = [];
        // var paymentData = [];
        // var withdrawData = [];
        var labels = [];

        weeklyTransactions.forEach(function(item) {
            depositData.push(item.total_deposits);
            labels.push(item.week);
        });
        var payment = {
            series: [
                {
                    name: 'Direct Deposit',
                    data: depositData
                },
            ],
            labels: ['Direct Deposits'],
            chart: {
                height: 300,
                type: 'area',
                dropShadow: {
                    enabled: true,
                    opacity: 0.2,
                    blur: 10,
                    left: -7,
                    top: 22
                },
                toolbar: {
                    show: false
                },
            },

            plotpayment: {
                bar: {
                    horizontal: false,
                    columnWidth: '40%',
                    endingShape: 'rounded'
                },
            },

            markers: {
                colors: ['#449ae7']
            },

            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: 'smooth',
                width: 2,
                lineCap: 'square'
            },
            xaxis: {
                categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: true
                },
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: '12px',
                        cssClass: 'apexcharts-xaxis-title',
                    },
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value, index) {
                        return (value / 1000) + 'K'
                    },
                    offsetX: -15,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        cssClass: 'apexcharts-yaxis-title',
                    },
                }
            },
            grid: {
                borderColor: '#d1d1d1',
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 5
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                fontSize: '14px',
                labels: {
                    colors: '#777'
                },
                markers: {
                    width: 10,
                    height: 10,
                    offsetX: -5,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 30
                }
            },

            fill: {
                type: "gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: .19,
                    opacityTo: .05,
                    stops: [100, 100]
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    legend: {
                        offsetY: -50,
                    },
                },
            }],

            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#profit-chart"), payment);
        chart.render();


    </script>
{{--    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>--}}
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            @if(session('success'))--}}
{{--            Swal.fire({--}}
{{--                icon: 'success',--}}
{{--                title: 'Success',--}}
{{--                text: '{{ session('success') }}',--}}
{{--            });--}}
{{--            @endif--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        // Parse the passed JSON data
        var chartData = {!! $chartData !!};
        // Extract days and amounts from the data
        var days = chartData.map(entry => entry.day);
        var amounts = chartData.map(entry => entry.total_amount);

        // Render chart using Chart.js
        var ctx = document.getElementById('transactionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Change chart type to bar
            data: {
                labels: days,
                datasets: [{
                    label: 'Total Amount',
                    data: amounts,
                    backgroundColor: '#d300f6',
                    borderColor: '#d300f6',
                    color: '#fffff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Make the chart responsive
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        ticks: {
                            stepSize: 1,
                            callback: function(value, index, values) {
                                // Map numeric day values to corresponding day names
                                var daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                                return daysOfWeek[value - 1];
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
    $(function() {
        'use strict'

        var copyButton = document.querySelector('.copy');
        var copyInput = document.querySelector('.copy-text');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });
        copyInput.addEventListener('click', function() {
            this.select();
        });



        var copyButton2 = document.querySelector('.copy2');
        var copyInput2 = document.querySelector('.copy-text2');
        copyButton2.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput2.select();
            document.execCommand('copy');
        });
        copyInput2.addEventListener('click', function() {
            this.select();
        });


        var expirationDate = new Date('{{ $plan_expired_at }}');

        function updateCountdown() {
            var now = new Date();
            var timeLeft = expirationDate - now;

            if (timeLeft < 0) {
                // The plan has expired
                // $('#countdownTwo').html(`
                //     <p class="upgrade-text"><i class="fas fa-rocket"></i> Please Upgrade Your Plan To Get Signals</p>
                // `);
            } else {
                // The plan is still active
                var daysLeft = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                var hoursLeft = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutesLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);

                $('#countdownTwo').html(`
                    <h5 class="d-left-countdown-title">{{ __('plan expired at :') }}</h5>
                    <div class="countdown-wrapper">
                    <p class="countdown-single">
                        ${daysLeft}
                        <span>D</span>
                    </p>
                    <p class="countdown-single">
                        ${hoursLeft}
                        <span>H</span>
                    </p>
                    <p class="countdown-single">
                        ${minutesLeft}
                        <span>M</span>
                    </p>
                    <p class="countdown-single">
                        ${secondsLeft}
                        <span>S</span>
                    </p>
                    </div>
                `);
            }
        }
        // Call updateCountdown every second
        setInterval(updateCountdown, 1000);


        var colors = ['#9C0AC1'];

        {{--var options = {--}}
        {{--    series: [{--}}
        {{--        name: 'Daily Transaction',--}}
        {{--        data: [44, 55, 57, 56, 61, 58, 63]--}}
        {{--    }],--}}
        {{--    legend: {--}}
        {{--        labels: {--}}
        {{--            colors: '#ffffff'--}}
        {{--        }--}}
        {{--    },--}}
        {{--    colors: colors,--}}
        {{--    chart: {--}}
        {{--        height: 280,--}}
        {{--        type: 'bar',--}}
        {{--        toolbar: {--}}
        {{--            show: false--}}
        {{--        }--}}
        {{--    },--}}
        {{--    plotOptions: {--}}
        {{--        bar: {--}}
        {{--            horizontal: false,--}}
        {{--            columnWidth: '40%',--}}
        {{--            endingShape: 'rounded'--}}
        {{--        },--}}
        {{--    },--}}
        {{--    dataLabels: {--}}
        {{--        enabled: false--}}
        {{--    },--}}
        {{--    stroke: {--}}
        {{--        show: true,--}}
        {{--        width: 2,--}}
        {{--        colors: ['transparent'],--}}
        {{--        curve: 'smooth'--}}
        {{--    },--}}
        {{--    xaxis: {--}}
        {{--        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],--}}
        {{--        labels: {--}}
        {{--            style: {--}}
        {{--                colors: '#bebebe',--}}
        {{--                fontSize: '12px',--}}
        {{--            }--}}
        {{--        }--}}
        {{--    },--}}
        {{--    yaxis: {--}}
        {{--        labels: {--}}
        {{--            style: {--}}
        {{--                colors: '#bebebe'--}}
        {{--            }--}}
        {{--        }--}}
        {{--    },--}}
        {{--    grid: {--}}
        {{--        xaxis: {--}}
        {{--            lines: {--}}
        {{--                show: false--}}
        {{--            }--}}
        {{--        },--}}
        {{--        yaxis: {--}}
        {{--            lines: {--}}
        {{--                show: false--}}
        {{--            }--}}
        {{--        },--}}
        {{--    },--}}
        {{--    fill: {--}}
        {{--        opacity: 1,--}}
        {{--        colors: colors--}}
        {{--    },--}}
        {{--    tooltip: {--}}
        {{--        x: {--}}
        {{--            format: 'dd/MM/yy HH:mm'--}}
        {{--        },--}}
        {{--    },--}}
        {{--};--}}

        {{--var chart = new ApexCharts(document.querySelector("#chart"), options);--}}
        {{--console.log(options)--}}
        {{--chart.render();--}}

        {{--var options = {--}}

        {{--series: [{{$totalAmount->sum()}}, {{$withdrawTotalAmount->sum()}}, {{$depositTotalAmount->sum()}}],--}}
        {{--labels: ['Payment', 'Withdraw', 'Deposit'],--}}
        {{--chart: {--}}
        {{--    type: 'donut',--}}
        {{--    width: 370,--}}
        {{--    height: 430--}}
        {{--},--}}

        {{--colors: ['#622bd7', '#e7515a', '#10a373', '#10a373'],--}}
        {{--dataLabels: {--}}
        {{--    enabled: false--}}
        {{--},--}}
        {{--legend: {--}}
        {{--    position: 'bottom',--}}
        {{--    horizontalAlign: 'center',--}}
        {{--    fontSize: '14px',--}}
        {{--    labels: {--}}
        {{--        colors: '#ffffff'--}}
        {{--    },--}}
        {{--    markers: {--}}
        {{--        width: 10,--}}
        {{--        height: 10,--}}
        {{--        offsetX: -5,--}}
        {{--        offsetY: 0--}}
        {{--    },--}}
        {{--    itemMargin: {--}}
        {{--        horizontal: 10,--}}
        {{--        vertical: 30--}}
        {{--    }--}}
        {{--},--}}
        {{--plotOptions: {--}}
        {{--    pie: {--}}
        {{--        donut: {--}}
        {{--        size: '75%',--}}
        {{--        background: 'transparent',--}}
        {{--        labels: {--}}
        {{--            show: true,--}}
        {{--            name: {--}}
        {{--            show: true,--}}
        {{--            fontSize: '29px',--}}
        {{--            fontFamily: 'Nunito, sans-serif',--}}
        {{--            color: '#ffffff',--}}
        {{--            offsetY: -10--}}
        {{--            },--}}
        {{--            value: {--}}
        {{--                show: true,--}}
        {{--                fontSize: '26px',--}}
        {{--                fontFamily: 'Nunito, sans-serif',--}}
        {{--                color: '#bfc9d4',--}}
        {{--                offsetY: 16,--}}
        {{--                number_format: function (val) {--}}
        {{--                    return val--}}
        {{--                }--}}
        {{--            },--}}
        {{--            total: {--}}
        {{--                show: true,--}}
        {{--                showAlways: true,--}}
        {{--                label: 'Total',--}}
        {{--                color: '#ffffff',--}}
        {{--                fontSize: '30px',--}}
        {{--                number_format: function (w) {--}}
        {{--                    return w.globals.seriesTotals.reduce( function(a, b) {--}}
        {{--                    return a + b--}}
        {{--                    }, 0)--}}
        {{--                }--}}
        {{--            }--}}
        {{--        }--}}
        {{--        }--}}
        {{--    }--}}
        {{--},--}}
        {{--stroke: {--}}
        {{--    show: true,--}}
        {{--    width: 15,--}}
        {{--    colors: '#1E1F25'--}}
        {{--  },--}}
        {{--  responsive: [--}}
        {{--    {--}}
        {{--      breakpoint: 1440, options: {--}}
        {{--        chart: {--}}
        {{--          width: 325--}}
        {{--        },--}}
        {{--      }--}}
        {{--    },--}}
        {{--    {--}}
        {{--      breakpoint: 1199, options: {--}}
        {{--        chart: {--}}
        {{--          width: 380--}}
        {{--        },--}}
        {{--      }--}}
        {{--    },--}}
        {{--    {--}}
        {{--      breakpoint: 575, options: {--}}
        {{--        chart: {--}}
        {{--          width: 320--}}
        {{--        },--}}
        {{--      }--}}
        {{--    },--}}
        {{--  ],--}}
        {{--};--}}

        {{--var chart = new ApexCharts(document.querySelector("#chart2"), options);--}}
        {{--chart.render();--}}

        {{--var chart2 = new ApexCharts(document.querySelector("#chart3"), options);--}}
        {{--chart2.render();--}}
    })
    </script>

@endpush
