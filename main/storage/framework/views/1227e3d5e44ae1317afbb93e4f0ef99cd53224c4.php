
<style>
    b {
        color: #ffff;
        font-size: 2.125rem;
    }
</style>
<?php $__env->startSection('content'); ?>
    <section class="about-section sp_pt_120 sp_pb_120">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <?= clean($details->content->description,'youtube') ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/link_details.blade.php ENDPATH**/ ?>