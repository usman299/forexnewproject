<?php
    $banner = Config::builder('banner');
?>


<!-- banner section start -->
<section class="sp_banner">
    <div class="sp_banner_bottom_shape">


        <video  playsinline autoplay loop muted id="homeBounceVideo" >
            <source src="<?php echo e(Config::getFile('banner','bg.mp4')); ?>" type="video/mp4">
        </video>

    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="sp_banner_title wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <?= Config::trans($banner->content->title) ?>
                </h2>
                <ul class="sp_check_list mt-4 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s">
                    <?php $__currentLoopData = $banner->content->repeater; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li><?php echo e($item->repeater); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <a href="<?php echo e($banner->content->button_text_link ?? ''); ?>" class="btn sp_theme_btn mt-5 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.7s"><?php echo e(Config::trans($banner->content->button_text)); ?></a>
            </div>
            <div class="col-lg-5">
                <div class="sp_banner_thumb wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                    <img src="<?php echo e(Config::getFile('banner', $banner->content->image_one)); ?>" class="sp_banner_img"
                        alt="banner image">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- banner section end -->
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/widgets/banner.blade.php ENDPATH**/ ?>