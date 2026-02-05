@extends(Config::theme() . 'layout.auth')
@section('content')
<div class="row g-sm-4 g-3">
    @foreach($levels as $level => $dataLevel)
    <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
        <div class="d-card d-icon-card team-card-hover level-main-cards">

            {{-- Status Badge --}}
            <div class="{{ $dataLevel['status'] === 'Active' ? 'inactive-active' : 'active-inactive' }}">
                {{ $dataLevel['status'] }}
            </div>

            {{-- Level Number --}}
            <h3>Level {{ $level }}</h3>

            <div class="d-card-content level-cards level-card-two">
                {{-- Link to level details --}}
                <a href="{{ route('user.level.single', $level) }}">
                    <h4 class="d-card-amount">
                        <i class="las la-users"></i>
                        {{ $dataLevel['status'] === 'Active' ? 'Unlocked' : 'Locked' }}
                    </h4>
                </a>

                {{-- Required Deposit --}}
                <h5 class="d-card-caption">
                    <i class="las la-hand-holding-usd"></i>
                    {{ number_format($dataLevel['threshold'], 2) }} USD
                </h5>
            </div>

            {{-- Right Arrow --}}
            <a href="{{ route('user.level.single', $level) }}" class="right-arrow">
                <i class="la la-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
