@extends(Config::theme(). 'layout.auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Verify Transaction') }}</h4>
                    <a href="javascript:window.history.back();"  class="justify-content-end" >
                        <i class="fas fa-exchange-alt"></i>
                        <span>{{ __('Back') }}</span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('user.deposit.verify')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="amount"   id="amount" class="form-control charge" value="{{$data['amount']}}"  >
                        <input type="hidden" name="userid" id="userid" value="{{$data['userid']}}"   class="form-control charge"   >
                        <input type="hidden" name="otp1"  id="otp1" value="{{$data['randomNumber']}}" class="form-control final_amo"  >
                        <div class="col-md-12 mb-3">
                            <label>{{ __('OTP Verify') }}</label>
                            <div class="input-group">
                                <input type="number" name="otp" id="otp" class="form-control charge"   >
                            </div>
                            @if($data['message']!=1)
                            <div class="input-group mt-2">
                                <p style="color: red">{{$data['message']}}</p>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 mt-2">
                            <button class="btn sp_theme_btn w-100" name="submitBtn" id="submitBtn" type="submit" disabled>{{ __('Transfer') }}</button>
                            <p class="text-center mt-1">
                                <span class="sp_site_color" id="timer"></span><br>
                                <button name="resetBtn" id="resetBtn"  type="submit" class="btn sp_theme_btn w-100 mt-3" disabled>{{ __('Resend') }}</button></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>


        $(document).ready(function(){
            var btn = $('#resetBtn');
            var seconds = 60;
            var timer = setInterval(function(){
                seconds--;
                $('#timer').text(seconds + " seconds left");
                if (seconds <= 0) {
                    clearInterval(timer);
                    btn.prop('disabled', false); // Enable the button after 1 minute
                    $('#timer').text(""); // Clear the timer text
                }
            }, 1000); // Update every second
        });
        $('#otp').on('input', function() {
            var $submitButton = $('#submitBtn');
            var address = $(this).val();
            var count = address.length;
            if (count > 4) {
                $submitButton.prop('disabled', false);
            } else  {
                $submitButton.prop('disabled', true);
            }
        });
    </script>
@endsection
