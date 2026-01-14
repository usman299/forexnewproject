@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row g-sm-4 g-3">
        <div class="col-lg-12 withdraw-ins">
        <div class="sp_site_card">
            <div class="card-header">
                <h4 class="mb-0">{{ __('Transaction History') }}</h4>
            </div>
            <div class="card-body">
                <div class="row g-sm-4 g-3">
                @forelse ($totalAmountByDate as $row)

                        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">

                            <div class="d-card d-icon-card team-card-hover level-main-cards">
                                <div class="d-card-content level-cards">
                                    <a href="{{route('user.transaction.level',['date'=>$row->transaction_date])}}"><h4 class="d-card-amount"> {{$row->transaction_date}}</h4></a>
                                    <a href=""> <h5 class="d-card-caption">{{'$' . number_format($row->total_amount,2) }} USD</h5></a>
                                </div>
                            </div>

                        </div>

{{--                    <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-3 col-6">--}}
{{--                        <div class="d-card d-icon-card team-card-hover">--}}
{{--                            <div class="d-card-content transaction-content">--}}
{{--                                <a href="{{route('user.transaction.level',$row->transaction_date)}}"><h5 class="d-card-amount">{{'$' . number_format($row->total_amount,2) }}</h5>--}}
{{--                                <h6 class="d-card-caption"><i class="las la-calendar"></i>  {{$row->transaction_date}}</h6>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                @empty
                    <div class="col-lg-12 mt-3 no-team">
                        <p>{{ __('No Transaction Found') }}</p>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection


