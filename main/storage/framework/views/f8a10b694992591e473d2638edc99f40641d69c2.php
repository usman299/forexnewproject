<?php $__env->startSection('content'); ?>
<div class="row g-sm-4 g-3">
    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $dataLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
        <div class="d-card d-icon-card team-card-hover level-main-cards">

            
            <div class="<?php echo e($dataLevel['status'] === 'Active' ? 'inactive-active' : 'active-inactive'); ?>">
                <?php echo e($dataLevel['status']); ?>

            </div>

            
            <h3>Level <?php echo e($level); ?></h3>

            <div class="d-card-content level-cards level-card-two">
                
                <a href="<?php echo e(route('user.level.single', $level)); ?>">
                    <h4 class="d-card-amount">
                        <i class="las la-users"></i>
                        <?php echo e($dataLevel['status'] === 'Active' ? 'Unlocked' : 'Locked'); ?>

                    </h4>
                </a>

                
                <h5 class="d-card-caption">
                    <i class="las la-hand-holding-usd"></i>
                    <?php echo e(number_format($dataLevel['threshold'], 2)); ?> USD
                </h5>
            </div>

            
            <a href="<?php echo e(route('user.level.single', $level)); ?>" class="right-arrow">
                <i class="la la-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/team/level.blade.php ENDPATH**/ ?>