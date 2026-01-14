@extends(Config::theme() . 'layout.auth')

@section('content')
    <div class="row">
        <div class="col-lg-12 withdraw-ins">
            <div class="sp_site_card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Road Map') }}</h4>
                </div>
                <div class="card-body">
                    <img src="{{ Config::fetchImage('logo','roadmap.jpg', true) }}">
                </div>
            </div>
        </div>
    </div>
@endsection
