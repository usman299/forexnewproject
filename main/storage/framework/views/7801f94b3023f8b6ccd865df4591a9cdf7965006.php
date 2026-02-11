<?php $__env->startSection('content'); ?>
<h3>Level <?php echo e($level); ?></h3>

<?php if(!empty($locked) && $locked): ?>
    <div class="alert alert-warning">
        This level is locked. Deposit more to unlock it.
    </div>
<?php else: ?>
    <div class="row g-sm-4 g-3">
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="custom-xxl-6 col-xxl-3 col-xl-6 col-lg-4 col-12">
            <div class="d-card d-icon-card team-card-hover level-main-cards last-level-card">
                <div class="last-card">
                    <h3><?php echo e($user->username2 ?? ' '); ?></h3>
                    <div class="d-card-content level-cards level-card-two level-card-third">
                        <?php
                        $deposit = \App\Models\Deposit::where('status',1)->where('user_id', $user->id)->sum('amount');
                        ?>
                        <a href="#"><h4 class="d-card-amount"><i class="las la-hand-holding-usd"></i><?php echo e(number_format($deposit, 2)); ?>  USD Staked</h4></a>
                        <?php if($level==1): ?>
                        <a href="https://wa.me/<?php echo e($user->phone); ?>?text=Hello%20from%20WhatsApp!"><h5 class="d-card-caption"><i class="fab fa-whatsapp"></i><?php echo e($user->phone); ?></h5></a>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="" class="right-arrow">





                    <p>User Id: <?php echo e($user->username); ?></p>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-lg-12 mt-3 no-team">
                <p><?php echo e(__('No Teams Found')); ?></p>
            </div>
        <?php endif; ?>
            <?php if($users->hasPages()): ?>
                <div class="col-md-12">
                    <?php echo e($users->links()); ?>

                </div>
            <?php endif; ?>
    </div>
    
    <?php echo e($users->links()); ?> <!-- pagination -->
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/team/user.blade.php ENDPATH**/ ?>