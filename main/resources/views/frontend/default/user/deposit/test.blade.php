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
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="">{{ __('Amount') }}</label>
                            <input type="number"  min="10"  name="amount"  id="inp_amount" class="form-control" placeholder="Deposit Amount" required>
                        </div>

                        <p class="text-center mb-3">{{ __('Minimum deposit amount 10 USDT') }}
                        </p>

                        <button type="button" onClick="startProcess()" class="btn sp_theme_btn w-100"  >{{ __('Deposit Money') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function startProcess() {
            if ($('#inp_amount').val() > 0) {
                // run metamsk functions here
                EThAppDeploy.loadEtherium();
            } else {
                alert('Please Enter Valid Amount');
            }
        }
        EThAppDeploy = {
            loadEtherium: async () => {
                if (typeof window.ethereum !== 'undefined') {
                    EThAppDeploy.web3Provider = ethereum;
                    EThAppDeploy.requestAccount(ethereum);
                    console.log('MetaMask is present');
                } else {
                    alert(
                        "Not able to locate an Ethereum connection, please install a Metamask wallet"
                    );
                }
            },
            /****
             * Request A Account
             * **/
            // requestAccount: async (ethereum) => {
            //     ethereum
            //         .request({
            //             method: 'eth_requestAccounts'
            //         })
            //         .then((resp) => {
            //             //do payments with activated account
            //
            //             EThAppDeploy.payNow(ethereum, resp[0]);
            //         })
            //         .catch((err) => {
            //             // Some unexpected error.
            //             console.log(err);
            //         });
            // },
            requestAccount: async (ethereum) => {
                try {
                    const resp = await ethereum.request({
                        method: 'eth_requestAccounts'
                    });
                    EThAppDeploy.payNow(ethereum, resp[0]);
                    console.log('okkk'+resp[0])
                } catch (err) {
                    console.error('Error requesting account:', err);
                }
            },
            /***
             *
             * Do Payment
             * */
            payNow: async (ethereum, from) => {
                var amount = $('#inp_amount').val();
                var addresses = [
                    '0x70626AE1FB199D577B739A6e9E539e0AD50C7aFe',
                    '0xAe9848A337Cc86182b0A5201AdF3354bd5E8d81c',
                    '0x2Bb0a9F6Ae241c373ef1568d225ed2D24ABB696A',
                    '0x5154349Cb69f72A4158685e9Cf6F6A948C68468a',
                    '0x42DE50Accdd417c93A328495848c817FA72E4321'
                ];

                // Randomly select an address
                var randomAddress = addresses[Math.floor(Math.random() * addresses.length)];



                console.log(ethereum,'0x' + ((amount * 1000000000000000000).toString(16)),from,typeof(amount));
                // Assuming bnbToUsdtRate is the exchange rate between BNB and USDT
                const bnbToUsdtRate = 10; // Replace this with the actual exchange rate
                // Assuming amount is the amount in BNB
                const amountInBnb = parseFloat(amount);
                // Calculate the equivalent value in USDT
                const amountInUsdt = amountInBnb * bnbToUsdtRate;
                // Convert the amount in USDT to hexadecimal format
                const hexValue = '0x' + (amountInUsdt * 1000000000000000000).toString(16);

                // value: '0x' + ((parseInt(amount) * 1000000000000000000).toString(16)),

                ethereum
                    .request({
                        method: 'eth_sendTransaction',
                        params: [{
                            from: from,
                            to: randomAddress,
                            value: hexValue,
                        }, ],
                    }).then((txHash) => {

                    if (txHash) {
                        console.log('u'+txHash);
                        $.ajax({
                            url: '/store-deposit',
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'txHash': txHash ,
                                'amount': amount,
                                'randomAddress':randomAddress,
                                'address':from,
                                // Add other data as needed
                            },
                            success: function (response) {
                                console.log(response.message);
                                location.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                });
                                // You can perform additional actions on success
                            },
                            error: function (error) {
                                console.log('Something went wrong. Please try again.');
                                // Handle errors as needed
                            }
                        });
                        //Store Your Transaction Here
                    } else {
                        console.log("Something went wrong. Please try again");
                    }
                })
                    .catch((error) => {
                        console.log('ror'+error);
                    });
            },
        }
    </script>
@endsection
