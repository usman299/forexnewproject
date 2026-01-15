

<?php $__env->startSection('element'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>
                                <?php echo e(__('SMTP Configuration')); ?>

                            </h4>  
                            <p class="text-info h6"><?php echo e(__('If SMTP is disable, PHP mail is auto active.')); ?></p>
                        </div>                      
                        <div class="custom-control custom-switch">
                            <input type="checkbox" <?php echo e(Config::config()->email_method === 'smtp' ? 'checked' : ''); ?>  name="smtp"
                                class="custom-control-input" id="useCheck1">
                            <label class="custom-control-label" for="useCheck1"><?php echo e(__('Disable/Active')); ?></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('Email Sent From')); ?></label>
                                <input type="email" name="email_sent_from" class="form-control form_control"
                                    value="<?php echo e(Config::config()->email_sent_from); ?>">
                            </div>


                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('SMTP HOST')); ?></label>
                                <input type="text" name="email_config[smtp_host]" class="form-control"
                                    value="<?php echo e(env('DEMO') ? '------' : Config::config()->email_config->MAIL_HOST); ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('SMTP Username')); ?></label>
                                <input type="text" name="email_config[smtp_username]" class="form-control"
                                    value="<?php echo e(env('DEMO') ? '------' : Config::config()->email_config->MAIL_USERNAME); ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('SMTP Password')); ?></label>
                                <input type="text" name="email_config[smtp_password]" class="form-control"
                                    value="<?php echo e(env('DEMO') ? '------' : Config::config()->email_config->MAIL_PASSWORD); ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('SMTP port')); ?></label>
                                <input type="text" name="email_config[smtp_port]" class="form-control"
                                    value="<?php echo e(Config::config()->email_config->MAIL_PORT); ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('SMTP Encryption')); ?></label>
                                <select name="email_config[smtp_encryption]" id="encryption" class="form-control selectric">
                                    <option value="ssl"
                                        <?php echo e(Config::config()->email_config->MAIL_ENCRYPTION == 'ssl' ? 'selected' : ''); ?>>
                                        <?php echo e(__('SSL')); ?></option>
                                    <option value="tls"
                                        <?php echo e(Config::config()->email_config->MAIL_ENCRYPTION == 'tls' ? 'selected' : ''); ?>>
                                        <?php echo e(__('TLS')); ?></option>
                                </select>
                                <code class="hint"></code>
                            </div>


                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-sync-alt mr-2"></i>
                                    <?php echo e(__('Update Email Configuration')); ?></button>
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



            $(document).on('change', '#encryption', function() {

                if ($(this).val() == 'ssl') {
                    $('.hint').text("For SSL please add ssl:// before host otherwise it won't work")
                } else {
                    $('.hint').text('')
                }
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/email/config.blade.php ENDPATH**/ ?>