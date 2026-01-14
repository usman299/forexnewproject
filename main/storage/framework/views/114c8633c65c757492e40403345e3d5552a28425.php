<?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr>
    <td><?php echo e($manual->trx); ?></td>
    <td><?php echo e($manual->gateway->name); ?></td>
    <td>
        <a href="<?php echo e(route('admin.user.details', $manual->user->id)); ?>">
            <img src="<?php echo e(Config::getFile('user', $manual->user->image, true)); ?>" alt=""
                class="image-table">
            <span>
                <?php echo e($manual->user->username); ?>

            </span>
        </a>
    </td>
    <td><?php echo e(Config::formatter($manual->amount, 2) . ' ' . Config::config()->currency); ?>

    </td>
    <td>
        <?php echo e(Config::formatter($manual->charge, 2) . ' ' . Config::config()->currency); ?>

    </td>
    <td>
        <?php if($manual->status == 2): ?>
            <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
        <?php elseif($manual->status == 1): ?>
            <span class="badge badge-success"><?php echo e(__('Approved')); ?></span>
        <?php elseif($manual->status == 3): ?>
            <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
        <?php endif; ?>
    </td>
    <td>
        <?php echo e($manual->created_at->format('d M ,Y')); ?>

    </td>
    <td>
        <a class="btn btn-sm btn-outline-primary details"
            href="<?php echo e(route('admin.deposit.details', $manual->trx)); ?>">
            <i class="far fa-eye"></i></a>

        <?php if($manual->status == 2): ?>
            <a class="btn  btn-sm btn-outline-primary accept"
                data-url="<?php echo e(route('admin.deposit.accept', $manual->trx)); ?>"><i
                    class="fas fa-check"></i></a>
            <a class="btn  btn-sm btn-outline-danger reject"
                data-url="<?php echo e(route('admin.deposit.reject', $manual->trx)); ?>"><i
                    class="fas fa-times"></i></a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr>
    <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?>

    </td>
</tr>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/logs/deposit_ajax.blade.php ENDPATH**/ ?>