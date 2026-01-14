
<section class="about-section sp_pt_120 sp_pb_120">
    <div class="about-el"><img src="<?php echo e(Config::getFile('about', $content->image_two ?? '')); ?>" alt="about line image">
    </div>
    <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
            <div class="col-lg-5">
                <div class="about-thumb paroller" data-paroller-factor="0.15" data-paroller-factor-xs="0.0"
                    data-paroller-factor-sm="0.0" data-paroller-factor-md="0.0" data-paroller-type="foreground"
                    data-paroller-direction="horizontal">
                    <img src="<?php echo e(Config::getFile('benefits', '641bfc49e3fde1679555657.png')); ?>" alt="image">

                </div>
            </div>
            <div class="col-lg-7 ps-lg-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <h2 class="sp_theme_top_title">
                    <?= Config::trans($content->title) ?></h2>
                <p class="fs-lg mt-3"><?php echo e($content->description); ?></p>
                <ul class="sp_check_list mt-4">

                    <?php if($content): ?>

                        <?php $__currentLoopData = optional($content)->repeater; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repeater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li><?php echo e($repeater->repeater); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php endif; ?>


                </ul>
                <a href="<?php echo e(optional($content)->button_link ?? ''); ?>"
                    class="btn sp_theme_btn mt-4"><?php echo e(Config::trans($content->button_text)); ?></a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/widgets/about.blade.php ENDPATH**/ ?>