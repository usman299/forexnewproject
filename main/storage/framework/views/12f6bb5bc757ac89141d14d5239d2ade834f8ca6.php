<?php $__env->startSection('content'); ?>
    <div class="row g-sm-4 g-3">
        <div class="col-lg-12 withdraw-ins">
        <div class="sp_site_card">
            <div class="card-header">
                <h4 class="mb-0"><?php echo e(__('Transaction History')); ?></h4>
            </div>
            <div class="card-body">
                <div class="row g-sm-4 g-3">
                <?php $__empty_1 = true; $__currentLoopData = $totalAmountByDate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">

                            <div class="d-card d-icon-card team-card-hover level-main-cards">
                                <div class="d-card-content level-cards">
                                    <a href="<?php echo e(route('user.transaction.level',['date'=>$row->transaction_date])); ?>"><h4 class="d-card-amount"> <?php echo e($row->transaction_date); ?></h4></a>
                                    <a href=""> <h5 class="d-card-caption"><?php echo e('$' . number_format($row->total_amount,2)); ?> USD</h5></a>
                                </div>
                            </div>

                        </div>










                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-lg-12 mt-3 no-team">
                        <p><?php echo e(__('No Transaction Found')); ?></p>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/stat/transection.blade.php ENDPATH**/ ?>