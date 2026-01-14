@extends('backend.layout.master')


@section('element')
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-body text-center">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">

                            <span>{{ __('Transaction Id') }}</span>
                            <span>{{ $deposit->trx }}</span>
                        </li>
{{--                        <li class="list-group-item d-flex justify-content-between">--}}

{{--                            <span>{{ __('USDT Transaction Id') }}</span>--}}
{{--                            <span>{{ $deposit->btrx_id }}</span>--}}
{{--                        </li>--}}

                        <li class="list-group-item d-flex justify-content-between">

                            <span>{{ __('Payment Date') }}</span>
                            <span>{{ $deposit->created_at->format('d F Y') }}</span>

                        </li>
                        @if ($deposit->payment_proof != null)
                           <img style="width: 100%; max-width:300px;" src="{{Config::getFile('admin', $deposit->payment_proof, true)}}">
                        @endif

                    </ul>


                </div>
            </div>
        </div>
    </div>
@endsection
