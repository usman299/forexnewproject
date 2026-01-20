
<?php $__env->startSection('element'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(__('All Email Templates')); ?></h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Sl')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Subject')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $emailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($key + $emailTemplates->firstItem()); ?></td>
                                        <td><?php echo e(str_replace('_', ' ', $email->name)); ?></td>
                                        <td><?php echo e($email->subject); ?></td>
                                        <td>
                                            <?php if($email->status): ?>
                                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-danger"><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.email.templates.edit', $email)); ?>"
                                                class="btn btn-sm btn-outline-primary"><i class="fa fa-pen"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="100%"><?php echo e(__('No Email Template Found')); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($emailTemplates->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($emailTemplates->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/email/templates.blade.php ENDPATH**/ ?>