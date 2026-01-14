
<!-- contact section start -->
<section class="sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_theme_top  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <div class="sp_theme_top_caption"><i class="fas fa-bolt"></i> <?php echo e(Config::trans($content->section_header)); ?></div>
                    <h2 class="sp_theme_top_title"><?= Config::colorText(optional($content)->title, optional($content)->color_text_for_title) ?></h2>
                </div>
            </div>
        </div>







































        <div class="section-header sp_pt_100 mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <h2 class="sp_theme_top_title">
                        <?= Config::colorText(optional($content)->form_header, optional($content)->color_text_for_form_header) ?></h2>
                </div>
            </div>
        </div>

        <form class="sp_contact_form" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row justify-content-center gy-4">
                <div class="col-lg-6">
                    <label><?php echo e(__('Your name')); ?> <code>*</code></label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label><?php echo e(__('Your email')); ?> <code>*</code></label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="col-lg-12">
                    <label><?php echo e(__('Your subject')); ?> <code>*</code></label>
                    <input type="text" name="subject" class="form-control">
                </div>
                <div class="col-lg-12">
                    <label><?php echo e(__('Your message')); ?> <code>*</code></label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn sp_theme_btn w-100"><?php echo e(__('Send Now')); ?></button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- contact section end -->
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/widgets/contact.blade.php ENDPATH**/ ?>