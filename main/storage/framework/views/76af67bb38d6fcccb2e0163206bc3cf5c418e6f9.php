<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="sp_site_card">
                <div class="card-header text-end">
                    <form action="" method="get" class="row justify-content-md-end g-3">
                        <div class="col-auto">
                            <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn sp_theme_btn"><?php echo e(__('Search')); ?></button>
                        </div>
                    </form>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                       <table class="table sp_site_table">
    <thead>
        <tr>
            <th><?php echo e(__('Trx')); ?></th>
            <th><?php echo e(__('USDT Trx')); ?></th>
            <th><?php echo e(__('User')); ?></th>
            <th><?php echo e(__('Gateway')); ?></th>
            <th><?php echo e(__('Network')); ?></th>
            <th><?php echo e(__('Address')); ?></th>
            <th><?php echo e(__('Amount')); ?></th>
            <th><?php echo e(__('Currency')); ?></th>
            <th><?php echo e(__('Charge')); ?></th>
            <th><?php echo e(__('Proof')); ?></th>
            <th><?php echo e(__('Date')); ?></th>
            <th><?php echo e(__('Status')); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td data-caption="Trx"><?php echo e($deposit->trx); ?></td>

                <td data-caption="USDT Trx"><?php echo e($deposit->btrx_id); ?></td>

                <td data-caption="User">
                    <?php echo e($deposit->user->username); ?>

                </td>

                <td data-caption="Gateway">
                    <?php echo e($deposit->gateway->name ?? 'Account Transfer'); ?>

                </td>

                
                <td data-caption="Network">
                    <?php echo e($deposit->network ?? '-'); ?>

                </td>

                
               <td data-caption="Address">
    <?php if($deposit->random_address): ?>
        <span
            style="cursor:pointer; color:blue; text-decoration:underline;"
            onclick="copyWithSwal('<?php echo e($deposit->random_address); ?>')"
            title="Click to copy"
        >
            <?php echo e(\Illuminate\Support\Str::limit($deposit->random_address, 12, '...')); ?>

        </span>
    <?php else: ?>
        -
    <?php endif; ?>
</td>


                <td data-caption="Amount">
                    <?php echo e(Config::formatter($deposit->amount)); ?>

                </td>

                <td data-caption="Currency">
                    <?php echo e(Config::config()->currency); ?>

                </td>

                <td data-caption="Charge">
                    <?php echo e(Config::formatter($deposit->charge)); ?>

                </td>

                
                <td data-caption="Proof">
                    <?php if($deposit->payment_proof): ?>
                        <a href="<?php echo e(Config::getFile('admin', $deposit->payment_proof)); ?>" target="_blank">
                            <img src="<?php echo e(Config::getFile('admin', $deposit->payment_proof)); ?>"
                                 alt="Proof"
                                 style="max-width:60px; border-radius:4px;">
                        </a>
                    <?php else: ?>
                        <span>-</span>
                    <?php endif; ?>
                </td>

                <td data-caption="Date">
                    <?php echo e($deposit->created_at->format('Y-m-d')); ?>

                </td>

                <td data-caption="Status">
                    <?php if($deposit->status == 1): ?>
                        <span class="sp_badge sp_badge_success"><?php echo e(__('Successful')); ?></span>
                    <?php elseif($deposit->status == 2): ?>
                        <span class="sp_badge sp_badge_warning"><?php echo e(__('Pending')); ?></span>
                    <?php else: ?>
                        <span class="sp_badge sp_badge_danger"><?php echo e(__('Rejected')); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="text-center" colspan="100%">
                    <?php echo e(__('No Deposits Found')); ?>

                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>



                    </div>
                </div>


                <?php if($deposits->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($deposits->links()); ?>

                    </div>
                <?php endif; ?>


            </div>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function copyWithSwal(text) {
    navigator.clipboard.writeText(text).then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Copied!',
            text: 'Address copied to clipboard',
            timer: 1500,
            showConfirmButton: false
        });
    }).catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Copy failed'
        });
    });
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/deposit_log.blade.php ENDPATH**/ ?>