<ul class="page-link-list">
    <li>
        <a href="<?php echo e(route('admin.transaction')); ?>" class="<?php echo e(Config::activeMenu(route('admin.transaction'))); ?>">
            <i class="las la-user"></i>
            <?php echo e(__('Transction Log')); ?>

        </a>
    </li>














    <li>
        <a href="<?php echo e(route('admin.deposit.log')); ?>"
            class="<?php echo e(Config::activeMenu(route('admin.deposit.log'))); ?>">
            <i class="las la-user-slash"></i>
            <?php echo e(__('Deposit report')); ?>


        </a>
    </li>








    <li>
        <a href="<?php echo e(route('admin.withdraw.report')); ?>"
            class="<?php echo e(Config::activeMenu(route('admin.withdraw.report'))); ?>">
            <i class="las la-comments"></i>
            <?php echo e(__('Withdraw Report')); ?>


        </a>
    </li>








</ul>
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/logs/tab_list.blade.php ENDPATH**/ ?>