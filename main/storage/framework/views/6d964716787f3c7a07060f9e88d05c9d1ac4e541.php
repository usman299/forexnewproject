


<?php $__env->startSection('element'); ?>
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-body text-center">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">

                            <span><?php echo e(__('Transaction Id')); ?></span>
                            <span><?php echo e($deposit->trx); ?></span>
                        </li>






                        <li class="list-group-item d-flex justify-content-between">

                            <span><?php echo e(__('Payment Date')); ?></span>
                            <span><?php echo e($deposit->created_at->format('d F Y')); ?></span>

                        </li>
                        <?php if($deposit->payment_proof != null): ?>
                           <img style="width: 100%; max-width:300px;" src="<?php echo e(Config::getFile('admin', $deposit->payment_proof, true)); ?>">
                        <?php endif; ?>

                    </ul>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/backend/deposit/details.blade.php ENDPATH**/ ?>