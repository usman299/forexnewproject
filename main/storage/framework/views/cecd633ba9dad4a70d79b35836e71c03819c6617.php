

<?php $__env->startSection('content'); ?>
    <form class="account-form mt-4" action="<?php echo e(route('user.forgot.password')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label><?php echo e(__('User email')); ?></label>
        <div class="sp_input_icon_field mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address">
            <i class="las la-envelope"></i>
        </div>


        <?php if(Config::config()->allow_recaptcha == 1): ?>
            <div class="col-md-12 my-3">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <div class="g-recaptcha" data-sitekey="<?php echo e(Config::config()->recaptcha_key); ?>" data-callback="verifyCaptcha">
                </div>
                <div id="g-recaptcha-error"></div>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-wrap align-items-center mt-4">
            <button type="submit" class="btn sp_theme_btn  w-100"><?php echo e(__('Send Verification Code')); ?></button>
        </div>
        <div class="or-text mb-3">
            <span><a href="<?php echo e(route('user.login')); ?>" class="sp_site_color"><?php echo e(__('Login')); ?></a></span>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'><?php echo e(__('Captcha field is required.')); ?></span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(Config::theme() . 'auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/auth/email.blade.php ENDPATH**/ ?>