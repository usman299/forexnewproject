

<?php $__env->startSection('element'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header site-card-header justify-content-between">
                    <div class="card-header-left">
                        <h4><?php echo e(__('All Language')); ?></h4>
                    </div>
                    <div class="card-header-right">
                        <button class="btn btn-primary btn-sm add"> <i class="fa fa-plus"></i>
                            <?php echo e(__('Create Language')); ?></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Language Name')); ?></th>
                                    <th><?php echo e(__('Default')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($lang->name); ?></td>
                                        <td>
                                            <?php if(!$lang->status): ?>
                                                <span class="badge badge-primary"><?php echo e(__('Default')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-warning"><?php echo e(__('No')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>


                                            <button class="btn btn-sm btn-outline-primary edit mr-1"
                                                data-href="<?php echo e(route('admin.language.edit', $lang)); ?>"
                                                data-lang="<?php echo e($lang); ?>"><i class="fa fa-pen"></i></button>

                                            <?php if($lang->status == 1): ?>
                                                <button class="btn btn-sm btn-outline-danger delete mr-1"
                                                    data-href="<?php echo e(route('admin.language.delete', $lang)); ?>"><i
                                                        class="fa fa-trash"></i></button>
                                            <?php endif; ?>


                                            <a href="<?php echo e(route('admin.language.translator', $lang->code)); ?>"
                                                class="btn btn-sm btn-outline-primary"><?php echo e('Transalator'); ?></a>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="100%"><?php echo e(__('No Language Found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php if($languages->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($languages->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>






    <div class="modal fade" tabindex="-1" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Add Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language Name')); ?></label>
                                <input type="text" name="language" class="form-control"
                                    placeholder="<?php echo e(__('Enter Language')); ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language short Code')); ?></label>
                                <input type="text" name="code" class="form-control"
                                    placeholder="<?php echo e(__('Enter Language Short Code')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('Create')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Edit Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language Name')); ?></label>
                                <input type="text" name="language" class="form-control"
                                    placeholder="<?php echo e(__('Enter Language')); ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language short Code')); ?></label>
                                <input type="text" name="code" class="form-control"
                                    placeholder="<?php echo e(__('Enter Language Short Code')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('Update')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="delete" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Delete Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p><?php echo e(__('Are You Sure to Delete')); ?>?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>

                        <button type="submit" class="btn btn-sm btn-danger"><?php echo e(__('Delete')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.add').on('click', function() {
                const modal = $('#add');

                modal.modal('show')
            })

            $('.edit').on('click', function() {
                const modal = $('#edit');
                modal.find('form').attr('action', $(this).data('href'))
                modal.find('input[name=language]').val($(this).data('lang').name)
                modal.find('input[name=code]').val($(this).data('lang').code)

                modal.modal('show')
            })

            $('.delete').on('click', function() {
                const modal = $('#delete');

                modal.find('form').attr('action', $(this).data('href'));

                modal.modal('show');
            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/language/index.blade.php ENDPATH**/ ?>