
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.30.0/dist/apexcharts.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.30.0/dist/apexcharts.min.js"></script>
<style>
    span.apexcharts-legend-text {
        color: #ffffff!important;
    }
</style>
<?php $__env->startSection('content'); ?>
    <div class="row gy-4 user-team-row">
            <div class="col-lg-3">
                <div class="sp_pricing_item">
                    <div class="pricing-header">
                        <div class="left">
                            <div class="icon">
                                <i class="far fa-gem"></i>
                            </div>
                            <div class="content">

                                <h6 class="package-name">Your Staking</h6>
                                <p>
                                    Amount
                                </p>
                            </div>
                        </div>
                        <div class="right">
                            <?php
                            $tra = \App\Models\Transaction::where('type_two',4)->where('user_id',auth()->user()->id)->first();
                            ?>
                            <?php if($tra): ?>
                            <h5 class="package-price">
                                <?php echo e('$ '. number_format($staking + 5,2)); ?>

                            </h5>
                            <?php else: ?>
                                <h5 class="package-price">
                                    <?php echo e('$ '. number_format($staking,2)); ?>

                                </h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pricing-body">
                        <ul class="package-features">
                            <li> Staking amount is the deposited sum used to participate in a blockchain network's consensus mechanism and earn rewards</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            <div class="sp_pricing_item">
                <div class="pricing-header">
                    <div class="left">
                        <div class="icon">
                            <i class="far fa-gem"></i>
                        </div>
                        <div class="content">

                            <h6 class="package-name">Received  reward </h6>
                            <p>
                                amount
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <h5 class="package-price">

                            <?php echo e('$ '. number_format($available_reward,2)); ?>

                        </h5>
                    </div>
                </div>
                <div class="pricing-body">
                    <ul class="package-features">
                        <li> Received  reward daily income rewards based on the deposited amount, providing a profitable avenue for investors</li>
                    </ul>
                </div>
            </div>
        </div>
             <div class="col-lg-3">
            <div class="sp_pricing_item">
                <div class="pricing-header">
                    <div class="left">
                        <div class="icon">
                            <i class="far fa-gem"></i>
                        </div>

                        <div class="content">

                            <h6 class="package-name">Maximum Reward</h6>
                            <p>Amount
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <h5 class="package-price">
                            <?php echo e('$ '.number_format($maximum_reward,2)); ?>

                        </h5>
                    </div>
                </div>
                <div class="pricing-body">
                    <ul class="package-features">
                        <li> The maximum reward is 3X including Direct Income, Daily ROI & Team Level Rewards</li>
                    </ul>
                </div>
            </div>
        </div>
             <div class="col-lg-3">
                 <div class="sp_pricing_item">
                     <div id="chart"></div>





                 </div>
             </div>
             <div class="col-lg-3">
            <div class="sp_pricing_item">
                <div class="pricing-header">
                    <div class="left">
                        <div class="icon">
                            <i class="far fa-gem"></i>
                        </div>
                        <div class="content">

                            <h6 class="package-name">Current Available  reward </h6>
                            <p>
                                Amount
                            </p>
                        </div>
                    </div>
                    <?php
                    $recived =auth()->user()->ttx - auth()->user()->tttx;
                    ?>
                    <div class="right">
                        <h5 class="package-price">
                            <?php echo e(Config::formatter($recived)); ?>

                        </h5>
                    </div>
                </div>
                <div class="pricing-body">
                    <ul class="package-features">
                        <li> Such reward which can be withdraw at any time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<script>
    var receive_reward = <?php echo json_encode($available_reward, 15, 512) ?>;
    var maximum_reward = <?php echo json_encode($maximum_reward, 15, 512) ?>;
    var remaning = maximum_reward - receive_reward;
    var options = {
        series: [{
            data: [receive_reward,remaning ]
        }],
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%', // Adjust the bar height as needed
                distributed: true, // Distribute bars equally across the chart
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                // Check if the value is for 'receive_reward' or 'remaning' and return custom text accordingly
                if (val === receive_reward) {

                    return '$ ' + val.toFixed(2);
                } else if (val === remaning) {
                    return '$ ' + val.toFixed(2);
                } else {
                    return '$ ' + val.toFixed(2); // Return the original value if it doesn't match 'receive_reward' or 'remaning'
                }
            }
        },
        xaxis: {
            categories: ['Received', 'Receivable'],
            labels: {
                show: false // Hide the y-axis labels
            }

        },
        yaxis: {
            labels: {
                show: false // Hide the y-axis labels
            }
        },
        grid: {
            show: false // Hide the gridlines
        },
        tooltip: {
            enabled: false // Disable tooltips
        },
        colors: ['#d300f6', '#7a47e6']
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/stat/index.blade.php ENDPATH**/ ?>