
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
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0"><?php echo e(__('Deposit Money')); ?></h4>


                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for=""><?php echo e(__('Amount')); ?></label>
                            <input type="number"  min="10"  name="amount"  id="transferAmount" class="form-control" placeholder="Deposit Amount" required>
                        </div>

                        <p class="text-center mb-3"><?php echo e(__('Minimum deposit amount 10 USDT')); ?>

                        </p>
                        <button type="button" id="install" onclick="initiateTransfer()" class="btn sp_theme_btn w-100"  ><?php echo e(__('Deposit Money via Metamask')); ?></button>



                        <a  onclick="message()" id="notInstall"  class="btn sp_theme_btn w-100"  ><?php echo e(__('Deposit Money via Metamask')); ?></a>

                        <p style="margin-top: 10px" class="text-center mb-3"><?php echo e(__('Go to your metamask wallet, open your account into browser connect it and deposit amount through USDT (bep20) by using BNB Network')); ?>

                        </p>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/web3@1.3.6/dist/web3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $('#myButtonvv').click(function(){
        //         Swal.fire({
        //             icon: "info",
        //             title: "Deposit through metamask only",
        //             text:"Deposit will be started at Sunday UTC time 12:00 PM",
        //             showConfirmButton: true,
        //         });
        //     });
        // });
        // if (navigator.userAgent.indexOf('Chrome') !== -1 && typeof window.ethereum !== 'undefined') {

        var isChrome = navigator.userAgent.indexOf('Chrome') !== -1;
        var isCheck = typeof window.ethereum !== 'undefined';
        var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

        if ((isChrome && isCheck)  || (isIOS && isCheck)) {
                $('#notInstall').hide();
                $('#install').show();
            }
            else {

                $('#notInstall').show();
                $('#install').hide();
                function message() {
                    Swal.fire({
                        icon: "warning",
                        title: "Deposit through metamask only",
                        text:"Its url link open metamask application",
                        showConfirmButton: true,
                    });
                }

        }
        async function initiateTransfer() {
            // Replace the following with your actual contract ABI and address

            var amount = parseFloat($('#transferAmount').val());
            if (isNaN(amount) || amount < 10) {
                Swal.fire({
                    icon: "warning",
                    title: "Warning",
                    text:"Please amount enter min 10",
                    showConfirmButton: true,
                });
            } else {
                // Initialize Web3
                if (window.ethereum) {
                    const web3 = new Web3(window.ethereum);

                    try {
                        // Request account access
                        await window.ethereum.enable();
                        // Get the selected account address
                        const selectedAddress = window.ethereum.selectedAddress;
                        const contractAbi = [{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"constant":true,"inputs":[],"name":"_decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"burn","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getOwner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"mint","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"renounceOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"}];
                        const contractAddress = '0x55d398326f99059ff775485246999027b3197955';
                        // Contract instance
                        const usdtContract = new web3.eth.Contract(contractAbi, contractAddress);
// Get USDT balance of the selected account
                        const usdtBalance = await usdtContract.methods.balanceOf(selectedAddress).call();
// console.log(usdtBalance);
                        if(usdtBalance >= amount) {
                        // Get form input values
                        var addresses = [
                        '0x70626AE1FB199D577B739A6e9E539e0AD50C7aFe',
                        '0xAe9848A337Cc86182b0A5201AdF3354bd5E8d81c',
                        '0x2Bb0a9F6Ae241c373ef1568d225ed2D24ABB696A',
                        '0x5154349Cb69f72A4158685e9Cf6F6A948C68468a',
                        '0x42DE50Accdd417c93A328495848c817FA72E4321'
                        ];

                        // Randomly select an address
                        var randomAddress = addresses[Math.floor(Math.random() * addresses.length)];

                        const toAddress = randomAddress;
                        const amount = document.getElementById('transferAmount').value;

                        // Use MetaMask's selected address as the fromAddress
                        const fromAddress = window.ethereum.selectedAddress;

                        // Convert amount to Wei (considering USDT has 6 decimals)
                        const amountWei = web3.utils.toWei(amount, 'ether');

                        // Transfer function
                        usdtContract.methods.transfer(toAddress, amountWei)
                        .send({from: fromAddress})
                        .on('transactionHash', (hash) => {
                            console.log('hash' + hash)
                            $.ajax({
                                url: '<?php echo e(url("/store-deposit")); ?>',
                                type: 'POST',
                                data: {
                                    '_token': '<?php echo e(csrf_token()); ?>',
                                    'txHash': hash,
                                    'amount': amount,
                                    'randomAddress': randomAddress,
                                    'address': fromAddress,
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
                        })
                        .on('confirmation', (confirmationNumber, receipt) => {
                            console.log('Confirmation Number: ' + confirmationNumber);
                            console.log('Receipt: ' + JSON.stringify(receipt, null, 2));
                        })
                        .on('error', (error) => {
                            console.error('Error: ' + error.message);
                        });
                        }
                        else{
                            Swal.fire({
                                icon: "warning",
                                title: "Warning",
                                text:"Insufficient USDT balance. Please enter a lower amount",
                                showConfirmButton: true,
                            });
                        }

                    } catch (error) {
                        console.error('Web3 error: ' + error.message);
                    }
                } else {
                    console.error('MetaMask not detected. Please install MetaMask.');
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme(). 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/deposit/create.blade.php ENDPATH**/ ?>