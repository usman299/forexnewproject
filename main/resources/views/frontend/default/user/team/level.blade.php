@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row g-sm-4 g-3">
        @for($i=1; $i<=10; $i++)
        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards">
{{--                @php--}}
{{--                    $user = auth()->user();--}}
{{--                    $levelCount = \App\Models\Referral::where('status', 1)->where('type', 'interest')->first();--}}
{{--                    $count = \App\Models\User::where('ref_id', $user->id)->count();--}}
{{--                    $threshold = $levelCount->commission[$i];--}}

{{--                @endphp--}}

                @if(${'count' . $i} === 'Active')
                    <div class="inactive-active">{{ ${'count' . $i} }}</div>
                @else
                    <div class="active-inactive">{{ ${'count' . $i} }}</div>
                @endif

                <h3>Level {{$i}}</h3>
                <div class="d-card-content level-cards level-card-two">
                    <a href="{{route('user.level.single',$i)}}"><h4 class="d-card-amount"><i class="las la-users"></i>{{ ${'user' . $i} }}</h4></a>
                    <h5 class="d-card-caption"><i class="las la-hand-holding-usd"></i>{{ number_format(${'level'.$i}, 2) }} USD</h5>
                </div>
                <a href="{{route('user.level.single',$i)}}" class="right-arrow">
                <i class="la la-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @endfor
    </div>
@endsection


