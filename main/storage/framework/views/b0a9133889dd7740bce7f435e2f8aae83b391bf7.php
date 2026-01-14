

<?php $__env->startSection('element'); ?>

    <div class="row">
        <div class="col-xxl-12">
            <div class="row">






















                <div class="col-lg-6 col-sm-6">
                    <div class="card mb-4 gr-white gr-white2 rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.deposit', 'online')); ?>" class="link"></a>
                        <div class="sp-widget-2 card-body">
                            <a href="<?php echo e(route('admin.deposit', 'online')); ?>" class="widget-link-arrow"><i
                                    class="las la-arrow-right"></i></a>
                            <div class="top">
                                <div class="widget-icon">
                                    <i class="las la-hourglass-half"></i>
                                </div>
                                <div class="widget-content">
                                    <h5 class="mb-0"><?php echo e(__('Total Deposit')); ?></h5>
                                </div>
                            </div>
                            <div class="bottom mt-3">
                                <div class="widget-content">
                                    <h2 class="mb-0"><?php echo e(Config::formatter($totalDeposit)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card mb-4 gr-white gr-white3 rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.withdraw.filter', 'pending')); ?>" class="link"></a>
                        <div class="sp-widget-2 card-body">
                            <a href="<?php echo e(route('admin.withdraw.filter', 'pending')); ?>" class="widget-link-arrow"><i
                                    class="las la-arrow-right"></i></a>
                            <div class="top">
                                <div class="widget-icon">
                                    <i class="las la-hourglass-start"></i>
                                </div>
                                <div class="widget-content">
                                    <h5 class="mb-0"><?php echo e(__('Total Withdraw')); ?></h5>
                                </div>
                            </div>
                            <div class="bottom mt-3">
                                <div class="widget-content">
                                    <?php
                                    $dic = $totalWithdraw * 0.05;
                                    $withdraw = $totalWithdraw - $dic;
                                    ?>
                                    <h2 class="mb-0"><?php echo e(Config::formatter($withdraw)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="card mb-4 gr-white gr-white2 rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.metamask.ptop')); ?>" class="link"></a>
                        <div class="sp-widget-2 card-body">
                            <a href="<?php echo e(route('admin.metamask.ptop')); ?>" class="widget-link-arrow"><i
                                    class="las la-arrow-right"></i></a>
                            <div class="top">
                                <div class="widget-icon">
                                    <i class="las la-hourglass-half"></i>
                                </div>
                                <div class="widget-content">
                                    <h5 class="mb-0"><?php echo e(__('Total Metamask P2P')); ?></h5>
                                </div>
                            </div>
                            <div class="bottom mt-3">
                                <div class="widget-content">
                                    <h2 class="mb-0"><?php echo e(Config::formatter($metamask_ptop)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="card mb-4 gr-white gr-white2 rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.admin.ptop')); ?>" class="link"></a>
                        <div class="sp-widget-2 card-body">
                            <a href="<?php echo e(route('admin.admin.ptop')); ?>" class="widget-link-arrow"><i
                                    class="las la-arrow-right"></i></a>
                            <div class="top">
                                <div class="widget-icon">
                                    <i class="las la-hourglass-half"></i>
                                </div>
                                <div class="widget-content">
                                    <h5 class="mb-0"><?php echo e(__('Total Admin P2P')); ?></h5>
                                </div>
                            </div>
                            <div class="bottom mt-3">
                                <div class="widget-content">
                                    <h2 class="mb-0"><?php echo e(Config::formatter($admin_ptop)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="card mb-4 gr-white gr-white2 rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.ptop')); ?>" class="link"></a>
                        <div class="sp-widget-2 card-body">
                            <a href="<?php echo e(route('admin.ptop')); ?>" class="widget-link-arrow"><i
                                    class="las la-arrow-right"></i></a>
                            <div class="top">
                                <div class="widget-icon">
                                    <i class="las la-hourglass-half"></i>
                                </div>
                                <div class="widget-content">
                                    <h5 class="mb-0"><?php echo e(__('Total Internal P2P')); ?></h5>
                                </div>
                            </div>
                            <div class="bottom mt-3">
                                <div class="widget-content">
                                    <h2 class="mb-0"><?php echo e(Config::formatter($ptop)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 mb-4">
                    <div class="sp-widget-1 bg-white rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.user.index')); ?>" class="link"></a>
                        <div class="widget-icon light-icon-1">
                            <i class="las la-dollar-sign"></i>
                        </div>
                        <div class="widget-content">
                            <div class="widget-caption text-dark"><?php echo e(__('Total user')); ?></div>
                            <h3 class="mb-0 mt-1 widget-title text-dark"><?php echo e($totalUser); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 mb-4">
                    <div class="sp-widget-1 bg-white rounded-xl link-item widget-hr-effect">
                        <a href="<?php echo e(route('admin.user.filter', 'deactive')); ?>" class="link"></a>
                        <div class="widget-icon light-icon-2">
                            <i class="las la-user-friends"></i>
                        </div>
                        <div class="widget-content">
                            <div class="widget-caption text-dark"><?php echo e(__('Deactive user')); ?></div>
                            <h3 class="mb-0 mt-1 widget-title text-dark"><?php echo e($pendingUser); ?></h3>
                        </div>
                    </div>
                </div>

















































            </div>
        </div>


































































































    </div>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(__('Payment Chart')); ?></h4>
                </div>
                <div class="card-body">
                    <div id="profit-chart"></div>
                </div>
            </div>
        </div>








    </div>






























































































































































































































    <div class="modal fade" id="cron" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Cron Settings Instruction')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php echo e(__('Please set cron job to your server otherwise user can not get Bulk Mail')); ?>

                    </p>
                    <div class="input-group">
                        <input type="text" name="" class="form-control copy-text"
                            value="curl -s <?php echo e(route('fire')); ?>">
                        <div class="input-group-append">
                            <button class="input-group-text gr-bg-1 text-white copy" type="button"
                                id="button-addon2"><?php echo e(__('Copy')); ?></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict'


        <?php if(now()->diffInMinutes(\Carbon\Carbon::parse(Config::config()->cron_run_time)) > 25): ?>

            $(function() {
                const modal = $('#cron')

                modal.modal('show')
            })


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
        <?php endif; ?>

        // User Statistics

        var user = {

            series: [<?php echo e($activeUser); ?>, <?php echo e($pendingUser); ?>, <?php echo e($emailUser); ?>],
            labels: ['Active', 'Deactive', 'Email Verified'],
            chart: {
                type: 'donut',
                width: 345,
                height: 393
            },
            colors: ['#622bd7', '#e2a03f', '#e7515a', '#e2a03f'],
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
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
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%',
                        background: 'transparent',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '29px',
                                fontFamily: 'Nunito, sans-serif',
                                color: '#ffffff',
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: '26px',
                                fontFamily: 'Nunito, sans-serif',
                                color: '#bfc9d4',
                                offsetY: 16,
                                formatter: function(val) {
                                    return val
                                }
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                color: '#777777',
                                fontSize: '30px',
                                formatter: function(w) {
                                    return "<?php echo e($totalUser); ?>"
                                }
                            }
                        }
                    }
                }
            },
            stroke: {
                show: true,
                width: 15,
                colors: '#ffffff'
            },
            responsive: [{
                breakpoint: 1400,
                options: {
                    chart: {
                        width: 300,
                        height: 315
                    }
                }
            }]
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), user);
        chart2.render();

        var chart5 = new ApexCharts(document.querySelector("#chart5"), user);
        chart5.render();



        var payment = {
            series: [{
                    name: 'Payments',
                    data: <?php echo json_encode($totalAmount, 15, 512) ?>
                },
                {
                    name: 'Deposits',
                    data: <?php echo json_encode($depositsTotalAmount, 15, 512) ?>
                },
                {
                    name: 'Withdraw',
                    data: <?php echo json_encode($withdrawTotalAmount, 15, 512) ?>
                }
            ],
            labels: ['Payments', 'Deposits', 'Withdraw'],
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
                colors: ['#449ae7', '#449ae7', '#449ae7']
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
                categories: <?php echo json_encode($months, 15, 512) ?>,
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
                        show: false,
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>