@php
    $plan_expired_at = now();
@endphp

@if (auth()->user()->currentplan)
    @php
        $is_subscribe = auth()
            ->user()
            ->currentplan()
            ->where('is_current', 1)
            ->first();

        if ($is_subscribe) {
            $plan_expired_at = $is_subscribe->plan_expired_at;
        }
    @endphp
@endif



<aside class="user-sidebar">
    <a href="{{ route('user.dashboard') }}" class="site-logo">
        <img src="{{ Config::getFile('logo', Config::config()->logo, true) }}" alt="image">
    </a>

    <div class="user-sidebar-bottom">
        <div id="countdown"></div>

    </div>

    <ul class="sidebar-menu">
        <li class="{{ Config::singleMenu('user.dashboard') }}"><a href="{{ route('user.dashboard') }}" class="active"><i
                    class="fas fa-home"></i>
                {{ __('Dashboard') }}</a></li>
{{--        <li class="{{ Config::singleMenu('user.signal.all') }}"><a href="{{ route('user.signal.all') }}"><i--}}
{{--                    class="fas fa-chart-bar"></i> {{ __('All Signal') }}</a></li>--}}

{{--        <li><a href="{{ route('user.trade') }}" class="{{ Config::singleMenu('user.trade') }}"><i--}}
{{--                    class="fas fa-chart-line"></i></i>--}}
{{--                {{ __('Trade') }}</a></li>--}}

{{--        <li class="{{ Config::singleMenu('user.plans') }}"><a href="{{ route('user.plans') }}"><i--}}
{{--                    class="fas fa-clipboard-list"></i>{{ __('Plans') }}</a></li>--}}

                <li class="{{ Config::singleMenu('user.daily.earning') }}"><a href="{{ route('user.daily.earning') }}"><i
                            class="fas fa-clipboard-list"></i>{{ __('Daily Earning') }}</a></li>
        <li class="{{ Config::singleMenu('user.deposit.create') }}"><a href="{{ route('user.deposit.create') }}"><i
                    class="fas fa-credit-card"></i>{{ __('Deposit Now') }}</a></li>

        <li class="{{ Config::singleMenu('user.withdraw.create') }}"><a href="{{ route('user.withdraw.create') }}"><i
                    class="fas fa-hand-holding-usd"></i> {{ __('Withdraw') }}</a></li>

{{--        <li class="{{ Config::singleMenu('user.transfer_money') }}"><a href="{{ route('user.transfer_money') }}"><i--}}
{{--                    class="fas fa-exchange-alt"></i> {{ __('Transfer Money') }}</a></li>--}}

        <li class="has_submenu {{ in_array(url()->current(), [route('user.deposit.log'), route('user.withdraw.all'), route('user.p2p.log'), route('user.transaction.log'), route('user.transfer_money.log'), route('user.receive_money.log'), route('user.commision'), route('user.subscription')]) ? 'open' : '' }}">
            <a href="#"><i class="fas fa-chart-bar"></i> {{ __('Report') }}</a>
            <ul class="submenu">
                <li class="{{ Config::singleMenu('user.deposit.log') }}">
                    <a href="{{ route('user.deposit.log') }}">{{ __('Deposit History') }}</a>
                </li>

                <li class="{{ Config::singleMenu('user.withdraw.all') }}">
                    <a href="{{ route('user.withdraw.all') }}">{{ __('Withdraw History') }}</a>
                </li>
                <li class="{{ Config::singleMenu('user.p2p.log') }}">
                    <a href="{{ route('user.p2p.log') }}">{{ __('P2P History') }}</a>
                </li>

{{--                <li class="{{ Config::singleMenu('user.invest.log') }}">--}}
{{--                    <a href="{{ route('user.invest.log') }}">{{ __('Investment Log') }}</a>--}}
{{--                </li>--}}

                <li class="{{ Config::singleMenu('user.transaction.log') }}">
                    <a href="{{ route('user.transaction.log') }}">{{ __('Transaction History') }}</a>
                </li>

{{--                <li class="{{ Config::singleMenu('user.transfer_money.log') }}">--}}
{{--                    <a href="{{ route('user.transfer_money.log') }}">{{ __('Transfer Money Log') }}</a>--}}
{{--                </li>--}}

{{--                <li class="{{ Config::singleMenu('user.receive_money.log') }}">--}}
{{--                    <a href="{{ route('user.receive_money.log') }}">{{ __('Receive Money Log') }}</a>--}}
{{--                </li>--}}

{{--                <li class="{{ Config::singleMenu('user.commision') }}">--}}
{{--                    <a href="{{ route('user.commision') }}">{{ __('Commision History') }}</a>--}}
{{--                </li>--}}

{{--                <li class="{{ Config::singleMenu('user.subscription') }}">--}}
{{--                    <a href="{{ route('user.subscription') }}">{{ __('Subscription Log') }}</a>--}}
{{--                </li>--}}
            </ul>
        </li>

        <li class="{{ Config::singleMenu('user.team') }}"><a href="{{ route('user.team') }}"><i
                    class="fas fa-users"></i> {{ __('Team') }}</a></li>
        <li class="{{ Config::singleMenu('user.statistics') }}"><a href="{{ route('user.statistics') }}"><i
                    class="fas fa-map"></i> {{ __('Statistics') }}</a></li>
        <li class="{{ Config::singleMenu('user.direct.reward') }}"><a href="{{ route('user.direct.reward') }}"><i
                    class="fas fa-dollar-sign"></i> {{ __('Direct Reward Details') }}</a></li>
        <li class="{{ Config::singleMenu('user.person') }}"><a href="{{ route('user.person') }}"><i
                    class="fas fa-exchange-alt"></i> {{ __('P2P Wallet') }}</a></li>

{{--        <li class="#"><a href="{{ route('user.refferalLog') }}"><i--}}
{{--                    class="fas fa-donate"></i> {{ __('ROI Plan Details') }}</a></li>--}}
{{--        <li class="{{ Config::singleMenu('user.refferalLog') }}"><a href="{{ route('user.refferalLog') }}"><i--}}
{{--                    class="fas fa-map"></i> {{ __('Team Reffer Tree') }}</a></li>--}}
        <li class="#"><a href="{{ route('user.transection') }}"><i
                    class="fas fa-dollar-sign"></i> {{ __('Level Income Reward') }}</a></li>
{{--        <li class="{{ Config::singleMenu('user.roadmap') }}"><a href="{{ route('user.roadmap') }}"><i--}}
{{--                    class="fas fa-tree"></i> {{ __('Roadmap') }}</a></li>--}}
        <!-- <li class="#"><a href="{{ Config::getFile('gateways', 'Dotcoinverse.pdf', true) }}" class="pdf-link"><i
                    class="fas fa-file-pdf"></i> {{ __('Dotcoinverse Pdf') }}</a></li> -->
        <li class="{{ Config::singleMenu('user.profile') }}"><a href="{{ route('user.profile') }}"><i
                    class="fas fa-user-plus"></i> {{ __('Profile Settings') }}</a></li>
        <li class="{{ Config::singleMenu('user.change.password') }}"><a href="{{ route('user.change.password') }}"><i
                    class="fas fa-user-cog"></i> {{ __('Password Change') }}</a></li>

        <li class="{{ Config::singleMenu('user.ticket.index') }}"><a href="{{ route('user.ticket.index') }}"><i
                    class="fas fa-ticket-alt"></i> {{ __('Support Ticket') }}</a></li>
        <li class="{{ Config::singleMenu('user.logout') }}"><a href="{{ route('user.logout') }}"><i
                    class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
    </ul>
</aside>

<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu-wrapper">
    <ul class="mobile-bottom-menu">
        <li>
            <a id="backButton"  >
                <i class="fas fa-exchange-alt"></i>
                <span>{{ __('Back') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.dashboard') }}" class="{{ Config::activeMenu(route('user.dashboard')) }}">
                <i class="fas fa-home"></i>
                <span>{{ __('Home') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('user.deposit.create') }}" class="{{ Config::activeMenu(route('user.deposit.create')) }}">
                <i class="fas fa-wallet"></i>
                <span>{{ __('Deposit') }}</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a href="{{ route('user.transfer_money') }}"--}}
{{--                class="{{ Config::activeMenu(route('user.transfer_money')) }}">--}}
{{--                <i class="fas fa-exchange-alt"></i>--}}
{{--                <span>{{ __('Send Money') }}</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a href="{{ route('user.team') }}"
               class="{{ Config::activeMenu(route('user.team')) }}">
                <i class="fas fa-users"></i>
                <span>{{ __('Teams') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('user.withdraw.create') }}" class="{{ Config::activeMenu(route('user.withdraw.create')) }}">
                <i class="fas fa-hand-holding-usd"></i>
                <span>{{ __('Withdraw') }}</span>
            </a>
        </li>

        <li class="sidebar-open-btn">
            <a href="#0" class="">
                <i class="fas fa-bars"></i>
                <span>{{ __('Menu') }}</span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile bottom menu end -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@push('script')
    <!-- jQuery script to open PDF in a new tab -->
    <script>
        $(document).ready(function() {
            $('#backButton').on('click', function() {
                window.history.back();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add click event listener to the PDF link
            $('.pdf-link').on('click', function(event) {
                // Prevent the default behavior of the link (preventing it from navigating)
                event.preventDefault();

                // Get the href attribute of the link (PDF file path)
                var pdfPath = $(this).attr('href');

                // Open the PDF in a new tab
                window.open(pdfPath, '_blank');
            });
        });
    </script>
    <script>

        $(function() {
            'use strict'

            var expirationDate = new Date('{{ $plan_expired_at }}');

            {{--function updateCountdown() {--}}
            {{--    var now = new Date();--}}
            {{--    var timeLeft = expirationDate - now;--}}

            {{--    if (timeLeft < 0) {--}}
            {{--        // The plan has expired--}}
            {{--        $('#countdown').html(`--}}
            {{--          <p class="upgrade-text"><i class="fas fa-rocket"></i> Explore smart investment opportunities now.</p>--}}
            {{--        `);--}}
            {{--    } else {--}}
            {{--        // The plan is still active--}}
            {{--        var daysLeft = Math.floor(timeLeft / (1000 * 60 * 60 * 24));--}}
            {{--        var hoursLeft = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
            {{--        var minutesLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));--}}
            {{--        var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);--}}

            {{--        $('#countdown').html(`--}}
            {{--          <h5 class="user-sidebar-bottom-title">{{ __('plan expired at :') }}</h5>--}}
            {{--          <div class="countdown-wrapper">--}}
            {{--            <p class="countdown-single">--}}
            {{--              ${daysLeft}--}}
            {{--              <span>D</span>--}}
            {{--            </p>--}}
            {{--            <p class="countdown-single">--}}
            {{--              ${hoursLeft}--}}
            {{--              <span>H</span>--}}
            {{--            </p>--}}
            {{--            <p class="countdown-single">--}}
            {{--              ${minutesLeft}--}}
            {{--              <span>M</span>--}}
            {{--            </p>--}}
            {{--            <p class="countdown-single">--}}
            {{--              ${secondsLeft}--}}
            {{--              <span>S</span>--}}
            {{--            </p>--}}
            {{--          </div>--}}
            {{--        `);--}}
            {{--    }--}}
            {{--}--}}
            // Call updateCountdown every second
            // setInterval(updateCountdown, 1000);
        })
    </script>
@endpush
