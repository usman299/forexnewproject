<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <title>{{ Config::config()->appname }}</title>

    <link rel="stylesheet" href="{{ optional(Config::config()->fonts)->heading_font_url }}">
    <link rel="stylesheet" href="{{ optional(Config::config()->fonts)->paragraph_font_url }}">

    <link rel="shortcut icon" type="image/png" href="{{ Config::getFile('icon', Config::config()->favicon, true) }}">

    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'all.min.css') }}">
    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'lib/slick.css') }}">
    <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'lib/odometer.css') }}">


{{--   //Animation--}}
    <link href="{{ Config::cssLib('frontend', 'lib/css/style.css') }}" rel="stylesheet" type="text/css" />

    @if (Config::config()->alert === 'izi')
        <link rel="stylesheet" href="{{ Config::cssLib('frontend', 'izitoast.min.css') }}">
    @elseif(Config::config()->alert === 'toast')
        <link href="{{ Config::cssLib('frontend', 'toastr.min.css') }}" rel="stylesheet">
    @else
        <link href="{{ Config::cssLib('frontend', 'sweetalert.min.css') }}" rel="stylesheet">
    @endif

    <link href="{{ Config::cssLib('frontend', 'main.css') }}" rel="stylesheet">

    @php
        $heading = optional(Config::config()->fonts)->heading_font_family;
        $paragraph = optional(Config::config()->fonts)->paragraph_font_family;
    @endphp

    <style>
        :root {
            --clr-main: <?= Config::config()->color[Config::config()->theme] ?? '#9c0ac1' ?>;
            --h-font: <?=$heading ?>;
            --p-font: <?=$paragraph ?>;
        }
    </style>

    @stack('external-css')


</head>

<body>

    @if (Config::config()->preloader_status)
        <div class="preloader-holder">
            <div class="preloader">
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            </div>
        </div>
    @endif


    @if (Config::config()->analytics_status)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ Config::config()->analytics_key }}"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "{{ Config::config()->analytics_key }}");
        </script>
    @endif

{{--    @if (Config::config()->allow_modal)--}}
{{--        @include('cookieConsent::index')--}}
{{--    @endif--}}

    @php
        $content= App\Models\Content::where('name', 'auth')->where('theme', Config::config()->theme)->first();
    @endphp


    <div class="account-page">
        <div class="form-wrapper">
            <div class="logo text-center">
                <a href="{{ route('home') }}" class="site-logo"><img src="{{ Config::getFile('logo', Config::config()->logo, true) }}"
                        alt="image"></a>
            </div>
            <div class="inner-wrapper">
                @if(request()->is('login'))
                    <h3 class="title">Login </h3>
                @elseif(request()->is('forgot/password'))
                    <h3 class="title">Forget Password</h3>
                @elseif(request()->is('authentication-verify'))
                    <h3 class="title">Verification Code  </h3>
                @elseif(request()->is('reset/password'))
                    <h3 class="title">Forget Password  </h3>
                @else

                    <h3 class="title">Signup </h3>
                @endif

                @yield('content')
            </div>
            <div class="copy-right-text">
                <p>
                    Copyright 2026 TradX24 . All Rights Reserved
                    <!-- {{__(Config::config()->copyright)}} -->
                </p>
            </div>
        </div>
        <div class="img-wrapper" style="background-image: url({{ Config::getFile('logo', '641bf4c6b2e011679553734.png', true) }})">
            {{--            <video src="{{ Config::getFile('auth', 'submki.webm') }}" ></video>--}}
{{--            <video  playsinline autoplay loop muted >--}}
{{--            <source src="{{ Config::getFile('banner', 'login.mp4') }}" type="video/mp4">--}}
{{--        </video>--}}
            <div id="particles-js"></div>

{{--            <img style="width: 100%;max-width: 720px;" src="{{ Config::getFile('benefits', '641bfc49e3fde1679555657.png') }}" class="account-line-bg" alt="image">--}}
{{--            <img src="{{ Config::getFile('auth', $content->content->image_one) }}" class="account-line-bg" alt="image">--}}
        </div>
    </div>

    <script src="{{ Config::jsLib('frontend', 'lib/jquery.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/bootstrap.bundle.min.js') }}"></script>


    <script src="{{ Config::jsLib('frontend', 'lib/js/jquery.min.js') }}"></script>

    <script src="{{ Config::jsLib('frontend', 'lib/js/bootstrap.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/wow.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/easing.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/owl.carousel.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/validation.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/enquire.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/jquery.plugin.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/typed.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/typed-custom.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/particles.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/app.js') }}"></script>
    <script src="{{ Config::jsLib('frontend', 'lib/js/designesia.js') }}"></script>

    @if (Config::config()->alert === 'izi')
        <script src="{{ Config::jsLib('frontend', 'izitoast.min.js') }}"></script>
    @elseif(Config::config()->alert === 'toast')
        <script src="{{ Config::jsLib('frontend', 'toastr.min.js') }}"></script>
    @else
        <script src="{{ Config::jsLib('frontend', 'sweetalert.min.js') }}"></script>
    @endif

    <script src="{{ Config::jsLib('frontend', 'main.js') }}"></script>
    @stack('script')


    @include('alert')
</body>

</html>
