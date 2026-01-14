
<?php $__env->startSection('element'); ?>
    <div class="row withdraw-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <form action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search Unique ID">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Sl')); ?></th>
                                <th><?php echo e(__('Receiver Unique ID')); ?></th>
                                <th><?php echo e(__('Sender Unique ID')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('trx')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($profit->user->username ?? ' '); ?></td>
                                    <?php $user = \App\Models\User::where('id',$profit->rec_id)->first() ?>
                                    <td><?php echo e($user->username ?? ' '); ?></td>
                                    <td><?php echo e(number_format($profit->amount, 2) . ' ' . Config::config()->currency); ?></td>
                                    <td><?php echo e($profit->trx); ?></td>
                                    <td><?php echo e($profit->created_at->format('d, M Y H:i:s')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($data->hasPages()): ?>
                        <div class="card-footer">
                            <?php echo e($data->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/withdraw/ptopusers.blade.php ENDPATH**/ ?>