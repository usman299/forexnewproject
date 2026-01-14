@extends(Config::theme(). 'layout.auth')
<style>
    .own{
        display: none;
    }
</style>
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Withdraw Money') }}</h4>
                    <p class="mb-0">{{ __('Available Balance') }} :
                        <span class="text-white">{{ Config::formatter(auth()->user()->ttx - auth()->user()->tttx)}}</span></p>
                </div>
                <div class="card-body">
                    <form action="{{route('user.withdraw.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label>{{ __('Withdraw Charge') }}</label>
                            <div class="input-group">
                                <input type="number" name="amount1" min="10" id="amount" class="form-control charge" value="0" required >
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
                                    Withdraw
                                </label>
                            </div>
                            <div class="sp_site_radio">
                                <input type="radio" class="form-check-input currency" id="own" name="userType" value="2">
                                <label class="form-check-label" for="own">
                                    P2P Wallet
                                </label>
                            </div>

                        </div>
                        <div class="col-md-12 mb-3 withdraw">
                            <label for="">{{ __('Receivable Amount') }} <span class="sp_text_danger">*</span></label>
                            <input type="text" name="amount2"  id="result" class="form-control final_amo"  readonly>
                        </div>
                        <div class="col-md-12 mb-3 withdraw">
                            <label for="">{{ __('Wallet Address (Bep20)') }} <span class="sp_text_danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" required>
                            <p id="validation_address" style="color: red;font-size: 14px;"></p>
                        </div>
                        <div class="col-md-12 mb-3 withdraw">
                            <label for="">{{ __('Additional Note') }}</label>
                            <textarea class="form-control" name="note" row="5"></textarea>
                        </div>
                        <div class="col-md-12 mb-3 own" >
                            <label>{{ __('Unique ID') }}</label>
                            <div class="input-group">
                                <input type="number" name="userid" id="userid"   class="form-control charge"   >
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 own">
                            <label for="">{{ __('User Name') }} <span class="sp_text_danger">*</span></label>
                            <input type="text" name="name"  id="name" class="form-control final_amo"  readonly>

                        </div>

                        <div class="col-md-12 mt-2">
                            <button class="btn sp_theme_btn w-100"  id="submitBtn" type="submit" disabled>{{ __('Withdraw Now') }}</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php $user = auth()->user();?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Attach input event listener to the amount input field
            var $submitButton = $('#submitBtn');
            $('input[type=radio][name=userType]').change(function() {

                var userType = $('input[type=radio][name=userType]:checked').val();

                if (userType == 1) {
                    $('.own').hide();
                    $('.withdraw').show();
                    $('#address').val('');
                    $submitButton.prop('disabled', true);

                    // Assuming you're using jQuery for handling events



                } else if (userType == 2) {
                    $('.own').show();
                    $('.withdraw').hide();
                    var unique_id = @json($user->username);
                    var username = @json($user->username2);
                    $('#userid').val(unique_id).prop('disabled', true);
                    $('#name').val(username).prop('disabled', true);
                    $('#address').val(2);
                    $submitButton.prop('disabled', false);
                }
            });
            $('#address').on('input', function() {
                var address = $(this).val();

                var count = address.length;
                var msg;
                if (count < 42) {
                    msg = "Address count of "+count+" is less than 42";
                    $('#validation_address').show();
                    $submitButton.prop('disabled', true);
                } else if (count > 42) {
                    msg = "Address count of "+count+" is greater than 42";
                    $('#validation_address').show();
                    $submitButton.prop('disabled', true);
                } else {
                    $('#validation_address').hide();
                    $submitButton.prop('disabled', false);
                }
                $('#validation_address').text(msg);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Attach input event listener to the amount input field
            $('#amount').on('input', function () {
                // Get the entered amount
                var enteredAmount = parseFloat($(this).val());

                // Check if the enteredAmount is a valid number
                if (!isNaN(enteredAmount)) {
                    // Subtract 5% from the entered amount
                    var subtractedAmount = enteredAmount - (enteredAmount * 0.05);

                    // Update the result paragraph
                    $('#result').val(subtractedAmount.toFixed(2));
                }
            });
        });
    </script>
@endsection
