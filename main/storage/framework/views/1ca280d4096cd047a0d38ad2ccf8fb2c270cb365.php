
<style>
    .my-class{
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        margin-top: 10px;
    }
</style>

<?php $__env->startSection('content'); ?>

    <?php if(Config::config()->is_email_verification_on && !auth()->user()->is_email_verified): ?>

        <form class="account-form mt-4" action="<?php echo e(route('user.authentication.verify.email')); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <div class="sp_input_icon_field mb-3">

                <input type="text" readonly name="code" value="<?php echo e(auth()->user()->email); ?>" class="form-control" placeholder="<?php echo e(__('Enter Verification Code')); ?>">
                <i class="las la-envelope"></i>
            </div>
            <div class="sp_input_icon_field mb-3">

                <input type="text" name="code" class="form-control" placeholder="<?php echo e(__('Enter Verification Code')); ?>">
                <i class="las la-envelope"></i>
                <a href="<?php echo e(route('user.resend.password')); ?>" class="sp_site_color my-class"><?php echo e(__('Resend Code')); ?></a>
            </div>

            <?php if(Config::config()->allow_recaptcha): ?>
                <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <div class="g-recaptcha" data-sitekey="<?php echo e(Config::config()->recaptcha_key); ?>" data-callback="verifyCaptcha">
                    </div>
                    <div id="g-recaptcha-error"></div>
                </div>
            <?php endif; ?>


                <button class="btn sp_theme_btn w-100" type="submit"> <?php echo e(__('Verify Now')); ?> </button><br><br>

            <p class="text-center mt-1">
                <span class="sp_site_color" ><?php echo e(__('or')); ?></span><br>
                <a href="<?php echo e(route('user.logout')); ?>" class="btn sp_theme_btn w-100 mt-3"><?php echo e(__('Logout')); ?></a></p>
        </form>
    <?php elseif(Config::config()->is_sms_verification_on && !auth()->user()->is_sms_verified): ?>
        <form method="POST" action="<?php echo e(route('user.authentication.verify.sms')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><?php echo e(__('Sms Verify Code')); ?></label>
                <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <?php if(Config::config()->allow_recaptcha): ?>
                <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                    <div class="g-recaptcha" data-sitekey="<?php echo e(Config::config()->recaptcha_key); ?>" data-callback="verifyCaptcha">
                    </div>
                    <div id="g-recaptcha-error"></div>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn sp_theme_btn w-100"><?php echo e(__('Verify Now')); ?></button>


        </form>
    <?php endif; ?>
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

<?php echo $__env->make(Config::theme() . 'auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/auth/email_sms_verify.blade.php ENDPATH**/ ?>