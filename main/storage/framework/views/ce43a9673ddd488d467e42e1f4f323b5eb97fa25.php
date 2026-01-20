
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="sp_site_card">
                <div class="card-header text-end">












                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table sp_site_table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Trx')); ?></th>
                                <th><?php echo e(__('Unique ID')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Details')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </thead>

                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $reward; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($deposit->trx); ?></td>
                                    <td data-caption="<?php echo e(__('User')); ?>">
                                        <?php
                                        $text = $deposit->details;
                                        $pattern = '/added by (\d+)/';
                                        if (preg_match($pattern, $text, $matches)) {
                                            $userId = $matches[1]; // Extracted user ID
                                        } else {
                                            $userId = $deposit->user->username;
                                        }
                                        ?>
                                        <?php echo e($userId); ?></td>
                                    <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e(Config::formatter($deposit->amount)); ?></td>
                                   <td data-caption="<?php echo e(__('Details')); ?>"><?php echo e($deposit->details); ?></td>
                                    <td data-caption="<?php echo e(__('Status')); ?>">
                                            <span class="sp_badge sp_badge_success"><?php echo e(__('Successfull')); ?></span>
                                    </td>
                                    <td data-caption="<?php echo e(__('Payment Date')); ?>">
                                        <?php echo e($deposit->created_at->format('Y-m-d')); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="100%">
                                        <?php echo e(__('No Direct Reward  Found')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>


                    </div>
                </div>


                <?php if($reward->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($reward->links()); ?>

                    </div>
                <?php endif; ?>


            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/direct_reward.blade.php ENDPATH**/ ?>