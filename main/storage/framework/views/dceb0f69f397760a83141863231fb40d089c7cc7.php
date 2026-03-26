<?php $__env->startComponent('mail::message'); ?>

    Dear <?php echo e(auth()->user()->username2); ?>,

    Thank you for reaching out to our support team. This is just a quick note to confirm that we have received your email regarding [<?php echo e($data['subject']); ?>].

    Our support team is dedicated to providing assistance around the clock, and we assure you that your request is important to us. We are committed to resolving your issue promptly and efficiently.

    Rest assured that a member of our support team will be in touch with you within the next 24 hours to address your concerns and provide assistance. If you have any additional information or questions in the meantime, please feel free to reply to this email.

    Thank you for your patience and understanding.

    Best regards,
    Dotcoinverse

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/ticket/email.blade.php ENDPATH**/ ?>