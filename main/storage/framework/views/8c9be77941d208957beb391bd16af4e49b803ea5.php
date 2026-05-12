<?php $__empty_1 = true; $__currentLoopData = $data['withdraws']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td>
            <img src="<?php echo e(Config::getFile('user', $withdrawlog->user->image, true)); ?>" alt="" class="image-table">
            <span>
                <a href="<?php echo e(route('admin.user.details', $withdrawlog->user->id)); ?>">
                    <?php echo e($withdrawlog->user->username); ?>

                </a>
            </span>
        </td>
        <td><?php echo e($withdrawlog->trx); ?></td>
        <td>
            <?php echo e(Config::formatter($withdrawlog->withdraw_amount)); ?>

        </td>
        <td>
            <?php echo e(Config::formatter($withdrawlog->withdraw_charge)); ?>

        </td>
        <td>
            <?php echo e(Config::formatter($withdrawlog->total)); ?>


        </td>
        <td>
            <?php echo e(ucwords($withdrawlog->withdrawMethod->type)); ?>

        </td>

        <td>
            <?php echo e($withdrawlog->created_at->format('d , M Y')); ?>

        </td>

        <td>
            <?php if($withdrawlog->status == 1): ?>
                <span class="badge badge-success"><?php echo e(__('Success')); ?></span>
            <?php elseif($withdrawlog->status == 2): ?>
                <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
            <?php else: ?>
                <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
            <?php endif; ?>
        </td>
        <td>
            <button class="btn btn-sm btn-outline-primary details"
                data-user_data="<?php echo e(json_encode($withdrawlog->proof)); ?>"
                data-transaction="<?php echo e($withdrawlog->trx); ?>"
                data-provider="<?php echo e($withdrawlog->user->username); ?>" data-email="<?php echo e($withdrawlog->user->email); ?>"
                data-method_name="<?php echo e($withdrawlog->withdrawMethod->name); ?>"
                data-date="<?php echo e(__($withdrawlog->created_at->format('d F Y'))); ?>"><i class="fas fa-eye"></i></button>
            <?php if($withdrawlog->status == 0): ?>
                <button class="btn btn-sm btn-outline-success accept"
                    data-url="<?php echo e(route('admin.withdraw.accept', $withdrawlog)); ?>"><i class="fas fa-check"></i></button>
                <button class="btn btn-sm btn-outline-danger reject"
                    data-url="<?php echo e(route('admin.withdraw.reject', $withdrawlog)); ?>"><i class="fas fa-times"></i></button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
    </tr>
<?php endif; ?>
<?php /**PATH /home/tradwiwy/public_html/main/resources/views/backend/withdraw/withdraw_ajax.blade.php ENDPATH**/ ?>