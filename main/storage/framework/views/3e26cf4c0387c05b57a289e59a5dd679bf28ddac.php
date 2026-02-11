
<?php $__env->startSection('content'); ?>
    <section class="sp_pt_120 sp_pb_120">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <h3 class="title mb-4"><?php echo e($blog->content->blog_title); ?></h3>
                    <div class="blog-details-img">
                        <img src="<?php echo e(Config::getFile('blog', $blog->content->image_one)); ?>" alt="image">
                    </div>
                    <div class="blog-details-content">





                        <p style="text-align: justify;">
                            <?php echo optional($blog->content)->description; ?>
                        </p>
                    </div>




                </div>
            </div>

            <div class="my-4">
                <h4><?php echo e(__('Previous  Project')); ?></h4>
            </div>

            <div class="recent-post-slider">
                <?php $__empty_1 = true; $__currentLoopData = $recentblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="slide-item">
                        <div class="sp_blog_list_post blog-list-post-two">
                            <div class="sp_blog_list_post_thumb">
                                <img src="<?php echo e(Config::getFile('blog', $item->content->image_one)); ?>" alt="image">
                            </div>
                            <div class="sp_blog_list_post_content">




                                <h4 class="sp_blog_title"><a href="<?php echo e(route('blog.details', [$item->id, Str::slug($item->content->blog_title)])); ?>"><?php echo e(Config::trans($item->content->blog_title)); ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/pages/blog_details.blade.php ENDPATH**/ ?>