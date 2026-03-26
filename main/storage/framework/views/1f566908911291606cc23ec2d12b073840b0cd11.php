<?php $__env->startComponent('mail::message'); ?>


   Dear <?php echo e(auth()->user()->username2); ?>,

    A withdrawal request has been initiated from your account.
    
    Please verify this transaction using the OTP below:
    
    OTP: <?php echo e($data['randomNumber']); ?>

    
    If you did not request this withdrawal, contact support immediately.
    
    Thanks,  


<?php echo $__env->renderComponent(); ?>


<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/withdraw/email.blade.php ENDPATH**/ ?>