

<?php $__env->startSection('content'); ?>






    <?php $__currentLoopData = $page->widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?= Section::render($section->sections) ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>












































































<section class="adventure_section">
	<div class="adventure_content">
    <div class="circle-container">
  <img src="<?php echo e(Config::getFile('partner', 'circle.png')); ?>" alt="image">
     </div>
	<!-- <h3>Why trade with Doto</h3>
	<p>We analyzed the collective experience of millions of traders to bring you a powerful, user-friendly platform.</p> -->
      <a href="<?php echo e(url('our/license')); ?>">License</a>
    </div>
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make(Config::theme() . 'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/home.blade.php ENDPATH**/ ?>