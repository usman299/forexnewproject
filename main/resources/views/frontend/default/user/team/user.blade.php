@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row g-sm-4 g-3">
        @forelse ($users as $user)

        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards last-level-card">
                <div class="last-card">
                    <h3>{{$user->username2 ?? ' '}}</h3>
                    <div class="d-card-content level-cards level-card-two level-card-third">
                        @php
                        $deposit = \App\Models\Deposit::where('status',1)->where('user_id', $user->id)->sum('amount');
                        @endphp
                        <a href="#"><h4 class="d-card-amount"><i class="las la-hand-holding-usd"></i>{{ number_format($deposit, 2) }}  USD Staked</h4></a>
                        @if($level==1)
                        <a href="https://wa.me/{{$user->phone}}?text=Hello%20from%20WhatsApp!"><h5 class="d-card-caption"><i class="fab fa-whatsapp"></i>{{$user->phone}}</h5></a>
                        @endif
                    </div>
                </div>
                <a href="" class="right-arrow">
{{--                    @if($user->status ==0)--}}
{{--                    <div class="active-inactive">Inactive</div>--}}
{{--                    @else--}}
{{--                        <div class="active-inactive">Active</div>--}}
{{--                    @endif--}}
                    <p>User Id: {{$user->username}}</p>
                </a>
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
