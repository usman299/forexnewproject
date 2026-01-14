
<style>
    .sp_input_icon_field {
        position: relative;
    }
    .mb-3 {
        margin-bottom: 1rem!important;
    }
    .sp_input_icon_field i[class*=fa-] {
        font-size: 20px;
        color: #9c0ac159;
    }
    .sp_input_icon_field i {
        position: absolute;
        top: 40px;
        right: 0px;
        width: 45px;
        justify-content: center;
    }
</style>

<?php $__env->startSection('element'); ?>

    <form action="" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label><strong><?php echo e(__('Email Or Username')); ?></strong></label>
            <input type="text" name="email" class="form-control" >
        </div>
        <div class="form-group sp_input_icon_field">
            <label><strong><?php echo e(__('Password')); ?></strong></label>
            <input type="password" name="password" class="form-control" id="password">
            <i class="fa fa-eye" id="togglePassword"></i>
        </div>

        <?php if(Config::config()->allow_recaptcha): ?>
            <div class="form-group">
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <div class="g-recaptcha" data-sitekey="<?php echo e(Config::config()->recaptcha_key); ?>" data-callback="verifyCaptcha">
                </div>
                <div id="g-recaptcha-error"></div>
            </div>
        <?php endif; ?>


        <div class="form-row d-flex justify-content-between mt-4 mb-2">
            <div class="form-group">
                <div class="form-check ml-2">
                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1" name="remember">
                    <label class="form-check-label" for="basic_checkbox_1"><?php echo e(__('Remember me')); ?></label>
                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo e(route('admin.password.reset')); ?>"><?php echo e(__('Forgot Password')); ?>?</a>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block   "><?php echo e(__('Sign in')); ?></button>
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
                    "<span class='text-danger'><?php echo e(__('Captcha field is required.')); ?></span>";
                return false;
            }
            return true;
        }
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('la-eye-slash');
        });


        const togglePasswordConfirm = document.querySelector('#confirmTogglePassword');
        const passwordConfirm = document.querySelector('#password_confirmation');

        togglePasswordConfirm.addEventListener('click', function(e) {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            this.classList.toggle('la-eye-slash');
        });

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.auth.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>