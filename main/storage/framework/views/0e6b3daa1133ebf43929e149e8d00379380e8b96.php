<tr>
<td class="header">
<a href="<?php echo e($url); ?>" style="display: inline-block;">
<?php if(trim($slot) === 'Dotcoinverse'): ?>
<img src="<?php echo e(Config::getFile('logo', 'email.png', true)); ?>" class="logo" alt="Dotcoinverse">
<?php else: ?>
<?php echo e($slot); ?>

<?php endif; ?>
</a>
</td>
</tr>
<?php /**PATH /home/dotcdafk/public_html/main/resources/views/vendor/mail/html/header.blade.php ENDPATH**/ ?>