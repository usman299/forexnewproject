
<?php $__env->startSection('content'); ?>
    <div class="row g-sm-4 g-3">
        <div class="col-lg-12 withdraw-ins">
            <div class="sp_site_card">
                <div class="card-header">
                    <h4 class="mb-0"><?php echo e(__('Transaction History')); ?></h4>
                </div>
                <div class="card-body">
                    <div class="row g-sm-4 g-3">
                        <?php for($i=1; $i<=10; $i++): ?>
                            <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-3 col-6">
                                <div class="d-card d-icon-card team-card-hover">
                                    <div class="d-card-content transaction-content">
                                        <a href=""><h5 class="d-card-amount">Level <?php echo e($i); ?></h5></a>
                                        <h6 class="d-card-caption"><i class="las la-hand-holding-usd"></i>  <?php echo e('$'.number_format(${'level'.$i}, 2)); ?> </h6>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/stat/level.blade.php ENDPATH**/ ?>