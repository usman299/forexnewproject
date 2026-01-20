

<?php $__env->startSection('element'); ?>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>
                            <?php echo e(Config::frontendFormatter($template->name)); ?>

                        </h4>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" <?php echo e($template->status ? 'checked' : ''); ?>

                                name="status" class="custom-control-input" id="useCheck1">
                            <label class="custom-control-label" for="useCheck1"><?php echo e(__('Disable/Active')); ?></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <code>

                        </code>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Subject')); ?></label>
                                <input type="text" name="subject" class="form-control" value="<?php echo e($template->subject); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Template')); ?></label>
                                <textarea name="template" class="form-control summernote"><?php echo e(clean($template->template)); ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sync-alt mr-2"></i>
                                    <?php echo e(__('Update Email Template')); ?>

                                </button>
                            </div>
                        </div>
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
            $('.summernote').summernote();
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/email/edit.blade.php ENDPATH**/ ?>