@extends(Config::theme(). 'layout.auth')
<style>
    .file-input-container {
        position: relative;
    }

    .custom-file-input {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    label.file-label.form-control{
        text-align: center;
    }

</style>
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Deposit Money') }}</h4>
                    <p class="mb-0">{{ __('Current Balance') }} :
                        <span class="text-white">{{ Config::formatter(auth()->user()->balance)}}</span></p>
                </div>
                <div class="card-body">
                    <form action="{{route('user.deposit.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="mb-3 mt-2">Deposit Crypto</label>
                            <select name="usdt" id="" class="form-select" >
                                <option value="usdt" selected=""> USDT (Tether)</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="mb-3 mt-2">Deposit Network</label>
                            <select name="network" id="" class="form-select" >
                                <option value="BEP20(BSC)" selected="">BEP20(BSC)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">{{ __('Amount') }}</label>
                            <input type="number"  min="10"  name="amount" id="amount" class="form-control" placeholder="Deposit Amount" required>
                        </div>

                        <p class="text-center mb-3">{{ __('Minimum deposit amount 10 USDT') }}
                        </p>
                        <div class="form-group text-center mb-3">
                            @php $color = [156, 10, 193]; @endphp
                            {{--                            ->color($color[0], $color[1], $color[2])--}}
                            {!! QrCode::size(200)->generate($data['randomAddress']) !!}
                            {{--                            <img src="data:image/png;base64,{{ base64_encode($data['qrCode']) }}" alt="Random QR Code">--}}
                        </div>

                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" name="address" id="copyText" class="form-control copy-text" placeholder="Addess"
                                       value="{{$data['randomAddress']}}" readonly>
                                <button type="button" id="copyButton" data-clipboard-target="#copyText"  class="input-group-text sp_bg_base px-4 cop">{{ __('Copy') }}</button>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <label for="">{{ __('Transaction Id') }}</label>
                            <input type="text"    name="btrx_id"  class="form-control" placeholder="Past Transaction id" required>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <div class="file-input-container">
                                <input  type="file" id="fileInput" name="payment_proof" accept=".jpg, .jpeg, .png" class="custom-file-input form-control" />
                                <label for="fileInput" class="file-label form-control"><i class="fas fa-image"></i>   Save Picture Add</label>
                            </div>
                        </div>


                        <button type="submit" class="btn sp_theme_btn w-100"  >{{ __('Deposit Money') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Include clipboard.js from a CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        // Initialize Clipboard.js
        var clipboard = new ClipboardJS('#copyButton');

        // Show a message when the text is copied
        clipboard.on('success', function (e) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Address Copied Successfully",
                showConfirmButton: false,
                timer: 1500
            });
            e.clearSelection(); // Clear the selection after copying
        });

        // Handle errors
        clipboard.on('error', function (e) {
            console.error('Unable to copy text.');
        });
    </script>
@endsection
