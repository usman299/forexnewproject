<?php $__env->startSection('content'); ?>

<?php
    $plan_expired_at = now();
?>

<?php if(auth()->user()->currentplan): ?>
    <?php
        $is_subscribe = auth()->user()->currentplan()->where('is_current', 1)->first();

        if($is_subscribe){
            $plan_expired_at =  $is_subscribe->plan_expired_at;
        }
    ?>
<?php endif; ?>

    <div class="row g-sm-4 g-3">
        <div class="col-xxl-12 col-xl-12 ">
            <div class="d-left-wrapper">
                <div class="d-left-countdown">

                </div>
                <div class="row g-sm-4 g-3">
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                        <div class="shadow">
                            <div class="d-card-icon gr-bg-1">
                                <i class="las la-credit-card"></i>
                            </div>
                        </div>
                            <div class="d-card-content">
                                <?php
                                $tra = \App\Models\Transaction::where('type_two',4)->where('user_id',auth()->user()->id)->first();
                                ?>
                                <?php if($tra): ?>
                                <h4 class="d-card-amount"><?php echo e(Config::formatter($staking_amount+5)); ?></h4>
                                    <?php else: ?>
                                        <h4 class="d-card-amount"><?php echo e(Config::formatter($staking_amount)); ?></h4>
                                    <?php endif; ?>
                                <p class="d-card-caption"><?php echo e(__('Staking Amount')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">

                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                            <div class="d-card-icon gr-bg-4">
                                <i class="las la-ticket-alt"></i>
                            </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e(Config::formatter($staking_reward)); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Staking Reward')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                        <div class="shadow">
                            <div class="d-card-icon gr-bg-2">
                                <i class="las la-hand-holding-usd"></i>
                            </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e($myTeam); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('My Team')); ?></p>
                            </div>
                               <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e(Config::formatter($directReward)); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Direct Reward')); ?></p>
                            </div>
                               <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-1">
                                    <i class="las la-credit-card"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e(Config::formatter($teamReward)); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Team Reward')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-4 col-xl-6 col-lg-4 col-6">
                        <div class="d-card d-icon-card card-hover text-start">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-4">
                                    <i class="las la-ticket-alt"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e(Config::formatter($totalReward)); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Total Reward')); ?></p>
                            </div>
                               <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>

                </div>

                <div class="d-xl-none d-block mt-4" style="display: none!important;">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                                    <h5 class="user-card-title"><?php echo e(__('Total Balance')); ?></h5>
                                    <h4 class="d-card-balance mt-xxl-3 mt-2"><?php echo e(Config::formatter($totalbalance)); ?></h4>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('user.withdraw')); ?>" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> <?php echo e(__('Withdraw')); ?></a>
                                        <a href="<?php echo e(route('user.deposit')); ?>" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> <?php echo e(__('Deposit')); ?></a>
                                    </div>
                                </div>

                                <hr class="my-4">



                                <ul class="recent-transaction-list mt-4">
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                    <li class="single-recent-transaction">

                                        <div class="content">
                                            <h6 class="title"><?php echo e($trans->details); ?></h6>
                                            <span><?php echo e($trans->created_at->format('d F, Y')); ?></span>
                                        </div>
                                        <p class="recent-transaction-amount <?php echo e($trans->type == '+' ?  "sp_text_success" : 'sp_text_danger'); ?>"><?php echo e(Config::formatter($trans->amount)); ?></p>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                                <a href="<?php echo e(route('user.transaction.log')); ?>" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-rocket me-2"></i> <?php echo e(__('View All Transaction')); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card not-hover">
                                <div id="chart3" class="d-flex justify-content-center"></div>
                            </div>

                            <h6 class="mb-2 mt-4"><?php echo e(__('Your Referral Link')); ?></h6>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control copy-text" id="textInput"  placeholder="Referral link"
                                        value="<?php echo e(route('user.register', $user->username)); ?>" readonly>
                                        <button type="button"   class="input-group-text sp_bg_base px-4 copy
                                        "><?php echo e(__('Copyy')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="sp_site_card mt-4">
                    <div class="card-header">
                        <h5><?php echo e(__('Crypto Screener')); ?></h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/crypto-screener/"
                                                                             rel="noopener" target="_blank"><span class="blue-text">Crypto Screener</span></a> by TradingView
                                </div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "523",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "general",
                                        "market": "crypto",
                                        "showToolbar": true,
                                        "colorTheme": "dark",
                                        "locale": "en"
                                    }
                                </script>
                            </div>































                        </div>
                    </div>

                    <?php if($signals->hasPages()): ?>
                        <div class="card-footer">
                            <?php echo e($signals->links()); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="sp_site_card mt-4">
                    <div class="card-header">
                        <h5><?php echo e(__('Stock Screener')); ?></h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/screener/" rel="noopener"
                                                                             target="_blank"><span class="blue-text">Stock Screener</span></a> by TradingView</div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                                    {
                                        "width": "100%",
                                        "height": "523",
                                        "defaultColumn": "overview",
                                        "defaultScreen": "most_capitalized",
                                        "showToolbar": true,
                                        "locale": "en",
                                        "market": "us",
                                        "colorTheme": "dark"
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <?php if($signals->hasPages()): ?>
                        <div class="card-footer">
                            <?php echo e($signals->links()); ?>

                        </div>
                    <?php endif; ?>

                </div>
                <div class="d-card mt-4">
                    <h5 class=""><?php echo e(__('Transaction Graph')); ?></h5>
                    <div class="card-body">
                        <div id="profit-chart"></div>
                    </div>




                </div>
                <div class="d-card mt-4">
                    <h6 class="mb-2 mt-4"><?php echo e(__('Your Referral Link')); ?></h6>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control copy-text" id="textInput" placeholder="Referral link"
                                   value="<?php echo e(route('user.register', $user->username)); ?>" readonly>
                            <button type="button" id="copyButtonTwo"  class="input-group-text sp_bg_base px-4 copy"><?php echo e(__('Copy')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-4 d-custom-right" style="display: none">
            <div class="d-right-wrapper">
                <div class="d-xl-block d-none">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                                    <h5 class="user-card-title"><?php echo e(__('Total Balance')); ?></h5>
                                    <h4 class="d-card-balance mt-xxl-3 mt-2"><?php echo e(Config::formatter($totalbalance)); ?></h4>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('user.withdraw')); ?>" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> <?php echo e(__('Withdraw')); ?></a>
                                        <a href="<?php echo e(route('user.deposit')); ?>" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> <?php echo e(__('Deposit')); ?></a>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <ul class="recent-transaction-list mt-4">
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="single-recent-transaction">

                                        <div class="content">
                                            <h6 class="title"><?php echo e($trans->details); ?></h6>
                                            <span><?php echo e($trans->created_at->format('d F, Y')); ?></span>
                                        </div>
                                        <p class="recent-transaction-amount <?php echo e($trans->type == '+' ?  "sp_text_success" : 'sp_text_danger'); ?>"><?php echo e(number_format($trans->amount)); ?></p>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                                <a href="<?php echo e(route('user.transaction.log')); ?>" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-rocket me-2"></i> <?php echo e(__('View All Transaction')); ?></a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-6">

                            <div class="d-card not-hover">


                            </div>

                            <h6 class="mb-2 mt-4"><?php echo e(__('Your Referral Link')); ?></h6>
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control copy-text2" placeholder="Referral link"
                                        value="<?php echo e(route('user.register', $user->username)); ?>" id="textInput"  readonly>
                                    <button type="button" id="copyButton"  class="input-group-text sp_bg_base px-4 copy2"><?php echo e(__('Copy')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
































































































































































































































    </div>

<script>
    $(document).ready(function() {
        $('#copyButtonTwo').click(function() {
            var textToCopy = $('#textInput').val();
            var $tempInput = $("<input>");
            $('body').append($tempInput);
            $tempInput.val(textToCopy).select();
            document.execCommand("copy");
            $tempInput.remove();
             if(textToCopy){
                 $(this).text('Copied'); // Change the text of the button to 'Copied'
                 // You can also change it back after a delay if needed
                 setTimeout(() => {
                     $(this).text('Copy'); // Change back to 'Copy' after some time
                 }, 3500);
             }

        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('external-css'); ?>
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'lib/apex.min.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('external-script'); ?>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/apex.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var weeklyTransactions = <?php echo json_encode($weeklyTransactions, 15, 512) ?>;

        // Convert weeklyTransactions into the format required by the chart script
        var seriesData = [];
        var depositData = [];
        // var paymentData = [];
        // var withdrawData = [];
        var labels = [];

        weeklyTransactions.forEach(function(item) {
            depositData.push(item.total_deposits);
            labels.push(item.week);
        });
        var payment = {
            series: [
                {
                    name: 'Direct Deposit',
                    data: depositData
                },
            ],
            labels: ['Direct Deposits'],
            chart: {
                height: 300,
                type: 'area',
                dropShadow: {
                    enabled: true,
                    opacity: 0.2,
                    blur: 10,
                    left: -7,
                    top: 22
                },
                toolbar: {
                    show: false
                },
            },

            plotpayment: {
                bar: {
                    horizontal: false,
                    columnWidth: '40%',
                    endingShape: 'rounded'
                },
            },

            markers: {
                colors: ['#449ae7']
            },

            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: 'smooth',
                width: 2,
                lineCap: 'square'
            },
            xaxis: {
                categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: true
                },
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: '12px',
                        cssClass: 'apexcharts-xaxis-title',
                    },
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value, index) {
                        return (value / 1000) + 'K'
                    },
                    offsetX: -15,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        cssClass: 'apexcharts-yaxis-title',
                    },
                }
            },
            grid: {
                borderColor: '#d1d1d1',
                strokeDashArray: 5,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 5
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                fontSize: '14px',
                labels: {
                    colors: '#777'
                },
                markers: {
                    width: 10,
                    height: 10,
                    offsetX: -5,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 30
                }
            },

            fill: {
                type: "gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: .19,
                    opacityTo: .05,
                    stops: [100, 100]
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    legend: {
                        offsetY: -50,
                    },
                },
            }],

            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#profit-chart"), payment);
        chart.render();


    </script>












    <script>
        // Parse the passed JSON data
        var chartData = <?php echo $chartData; ?>;
        // Extract days and amounts from the data
        var days = chartData.map(entry => entry.day);
        var amounts = chartData.map(entry => entry.total_amount);

        // Render chart using Chart.js
        var ctx = document.getElementById('transactionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Change chart type to bar
            data: {
                labels: days,
                datasets: [{
                    label: 'Total Amount',
                    data: amounts,
                    backgroundColor: '#d300f6',
                    borderColor: '#d300f6',
                    color: '#fffff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Make the chart responsive
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        ticks: {
                            stepSize: 1,
                            callback: function(value, index, values) {
                                // Map numeric day values to corresponding day names
                                var daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                                return daysOfWeek[value - 1];
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
    $(function() {
        'use strict'

        var copyButton = document.querySelector('.copy');
        var copyInput = document.querySelector('.copy-text');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });
        copyInput.addEventListener('click', function() {
            this.select();
        });



        var copyButton2 = document.querySelector('.copy2');
        var copyInput2 = document.querySelector('.copy-text2');
        copyButton2.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput2.select();
            document.execCommand('copy');
        });
        copyInput2.addEventListener('click', function() {
            this.select();
        });


        var expirationDate = new Date('<?php echo e($plan_expired_at); ?>');

        function updateCountdown() {
            var now = new Date();
            var timeLeft = expirationDate - now;

            if (timeLeft < 0) {
                // The plan has expired
                // $('#countdownTwo').html(`
                //     <p class="upgrade-text"><i class="fas fa-rocket"></i> Please Upgrade Your Plan To Get Signals</p>
                // `);
            } else {
                // The plan is still active
                var daysLeft = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                var hoursLeft = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutesLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);

                $('#countdownTwo').html(`
                    <h5 class="d-left-countdown-title"><?php echo e(__('plan expired at :')); ?></h5>
                    <div class="countdown-wrapper">
                    <p class="countdown-single">
                        ${daysLeft}
                        <span>D</span>
                    </p>
                    <p class="countdown-single">
                        ${hoursLeft}
                        <span>H</span>
                    </p>
                    <p class="countdown-single">
                        ${minutesLeft}
                        <span>M</span>
                    </p>
                    <p class="countdown-single">
                        ${secondsLeft}
                        <span>S</span>
                    </p>
                    </div>
                `);
            }
        }
        // Call updateCountdown every second
        setInterval(updateCountdown, 1000);


        var colors = ['#9C0AC1'];

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        

        

        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        

        
        
    })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotcdafk/public_html/main/resources/views/frontend/default/user/dashboard.blade.php ENDPATH**/ ?>