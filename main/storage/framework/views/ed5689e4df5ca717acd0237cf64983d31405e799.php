<?php
    $invest = \App\Models\Referral::where('type', 'invest')->first();
?>
<section class="sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_theme_top  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <div class="sp_theme_top_caption"><i class="fas fa-bolt"></i> <?php echo e(Config::trans($content->section_header)); ?></div>
                    <h2 class="sp_theme_top_title"><?= Config::colorText(optional($content)->title, optional($content)->color_text_for_title) ?> </h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-5 justify-content-center">
            <?php for($i = 0; $i < count($invest->level ?? []); $i++): ?>
                
            <div class="col-lg-3 col-6 d-flex justify-content-center">
                <div class="sp_referral_item">
                    <div class="sp_referral_level">
                        <span class="sp_referral_level_inner"><?php echo e(__('L'.($i + 1))); ?></span>
                    </div>
                    <div class="sp_referral_content">
                        <h3 class="referral-percentage"><?php echo e($invest->commission[$i] . '%'); ?></h3>
                        <h4 class="referral-title"><?php echo e(__('Comission')); ?></h4>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
            
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/widgets/referral.blade.php ENDPATH**/ ?>