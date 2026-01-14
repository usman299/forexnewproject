@extends(Config::theme() . 'auth.master')
<style>
    .my-class{
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        margin-top: 10px;
    }
</style>

@section('content')

    @if (Config::config()->is_email_verification_on && !auth()->user()->is_email_verified)

        <form class="account-form mt-4" action="{{ route('user.authentication.verify.email') }}" method="POST">

            @csrf
            <div class="sp_input_icon_field mb-3">

                <input type="text" readonly name="code" value="{{auth()->user()->email}}" class="form-control" placeholder="{{ __('Enter Verification Code') }}">
                <i class="las la-envelope"></i>
            </div>
            <div class="sp_input_icon_field mb-3">

                <input type="text" name="code" class="form-control" placeholder="{{ __('Enter Verification Code') }}">
                <i class="las la-envelope"></i>
                <a href="{{ route('user.resend.password') }}" class="sp_site_color my-class">{{ __('Resend Code') }}</a>
            </div>

            @if (Config::config()->allow_recaptcha)
                <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <div class="g-recaptcha" data-sitekey="{{ Config::config()->recaptcha_key }}" data-callback="verifyCaptcha">
                    </div>
                    <div id="g-recaptcha-error"></div>
                </div>
            @endif


                <button class="btn sp_theme_btn w-100" type="submit"> {{ __('Verify Now') }} </button><br><br>

            <p class="text-center mt-1">
                <span class="sp_site_color" >{{__('or')}}</span><br>
                <a href="{{ route('user.logout') }}" class="btn sp_theme_btn w-100 mt-3">{{ __('Logout') }}</a></p>
        </form>
    @elseif(Config::config()->is_sms_verification_on && !auth()->user()->is_sms_verified)
        <form method="POST" action="{{ route('user.authentication.verify.sms') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('Sms Verify Code') }}</label>
                <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            @if (Config::config()->allow_recaptcha)
                <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <div class="g-recaptcha" data-sitekey="{{ Config::config()->recaptcha_key }}" data-callback="verifyCaptcha">
                    </div>
                    <div id="g-recaptcha-error"></div>
                </div>
            @endif

            <button type="submit" class="btn sp_theme_btn w-100">{{ __('Verify Now') }}</button>


        </form>
    @endif
@endsection

@push('script')
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'>{{ __('Captcha field is required.') }}</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush
