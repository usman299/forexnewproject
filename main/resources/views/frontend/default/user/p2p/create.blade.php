@extends(Config::theme(). 'layout.auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('P2P Wallet') }}</h4>
                    <p class="mb-0">{{ __('Current Balance') }} :
                        <span class="text-white">{{ Config::formatter(auth()->user()->ptop)}}</span></p>
                </div>
                <div class="card-body">
                    <form action="{{route('user.get.user.next')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-3">
                            <label>{{ __('Transfer Amount') }}</label>
                            <div class="input-group">
                                <input type="number" name="amount" min="10" id="amount" class="form-control charge" value="0" required >
                                <div class="input-group-text sp_bg_main text-white border-0">
                                    <p class="text-small color-change mb-0 mt-1"><span>{{ __('Min Amount ') }} 10 USD </span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>{{ __('Send To') }}</label>
                            <div class="sp_site_radio">
                                <input type="radio" class="form-check-input currency" id="internal" name="userType" value="1" checked>
                                <label class="form-check-label" for="internal">
                                    P2P Internal
                                </label>

                            </div>
                            <div class="sp_site_radio">
                                <input type="radio" class="form-check-input currency" id="own" name="userType" value="2">
                                <label class="form-check-label" for="own">
                                    Own Account
                                </label>
                            </div>
                            <div class="sp_site_radio" id="note" style="display: none">
                                <p class="text-center mb-2">USDT directly deposit into your own staking account</p>
                            </div>

                        </div>
                        <div class="col-md-12 mb-3">
                            <label>{{ __('Unique ID') }}</label>
                            <div class="input-group">
                                <input type="number" name="userid" id="userid"   class="form-control charge"  required >
                            </div>
                            <p class="username" style="display: none;color: red;"></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{ __('User Name') }} <span class="sp_text_danger">*</span></label>
                            <input type="text" name="name"  id="name" class="form-control final_amo" required readonly>

                        </div>

{{--                        <div class="col-md-12 mb-3">--}}
{{--                            <label for="">{{ __('OTP') }} <span class="sp_text_danger">*</span></label>--}}
{{--                            <input type="text" name="address" class="form-control" required>--}}
{{--                        </div>--}}

                        <div class="col-md-12 mt-2">
                            <button class="btn sp_theme_btn w-100" id="submitBtn" type="submit" disabled>{{ __('Next') }}</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    $user = auth()->user();


    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        $(document).ready(function () {
            // Attach input event listener to the amount input field
            var $submitButton = $('#submitBtn');
            $('input[type=radio][name=userType]').change(function() {

                var userType = $('input[type=radio][name=userType]:checked').val();
                $('#note').hide();
                var $submitButton = $('#submitBtn');
                if (userType == 1) {
                    $submitButton.prop('disabled', true);
                    $('#name, #userid').prop('disabled', false).val('');

                } else if (userType == 2) {
                    var unique_id = @json($user->username);
                    var username = @json($user->username2);
                    $('#note').show();
                    console.log(username);
                    $('#userid').val(unique_id).prop('disabled', true);
                    $('#name').val(username).prop('disabled', true);
                    $submitButton.prop('disabled', false);
                }
            });
            $('#userid').on('input', function () {
                var userId = $(this).val();
                // Check if the entered value is 6 digits
                var check = @json($user->username);

                if (/^\d{6}$/.test(userId)) {
                    if(check === userId) {
                        console.log(check);
                        $('.username').show();
                        $('.username').text('You can not send self p2p');
                    }
                    else{
                        $.ajax({
                            url: "{{ route('user.getUserName') }}",
                            type: "GET",
                            data: {userId: userId},
                            success: function (response) {
                                if (response.success) {
                                    $('.username').hide();
                                    $('#name').val(response.userName);
                                    $submitButton.prop('disabled', false);
                                } else {
                                    // Handle case where user does not exist or error occurs
                                    $('.username').show();
                                    $('.username').text('Unique ID Invalid');
                                    $submitButton.prop('disabled', true);
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error(error);
                            }
                        });

                    }
                } else {
                    // Clear the result if the entered value is not 6 digits
                    $('.username').show();
                    $('.username').text('Please Enter 6 digit Unique ID');
                }
            });


        });
    </script>
@endsection
