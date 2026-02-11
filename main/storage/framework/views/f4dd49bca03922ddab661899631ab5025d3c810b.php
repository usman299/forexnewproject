
<style>
    .sp_blog_item .sp_blog_thumb {
        height: 481px!important;
    }
    .sp_blog_title{
        text-align: center;
    }
    .sp_blog_btn{
        justify-content: center!important;
        font-size: 20px;

    }
</style>
<?php $__env->startSection('content'); ?>
<section class="blog-section sp_pt_120 sp_pb_120">
    <div class="container">










        <div class="row gy-4 justify-content-center">

            <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="sp_blog_item">
                        <div class="sp_blog_thumb">
                            <img src="<?php echo e(Config::getFile('team', $item->content->image_one)); ?>"
                                 alt="blog thumb">
                        </div>
                        <div class="sp_blog_content">
                            <h4 class="sp_blog_title"><a href="#">
                                    <?php echo e((optional($item->content)->member_name)); ?>

                                </a>
                            </h4>
                            <p class="sp_blog_btn">
                                <?php echo e(optional($item->content)->designation); ?>

                            </p>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<!-- blog section end -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make(Config::theme() . 'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/widgets/myteam.blade.php ENDPATH**/ ?>