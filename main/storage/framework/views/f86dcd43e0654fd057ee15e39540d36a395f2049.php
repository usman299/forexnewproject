
<?php $__env->startSection('content'); ?>

    <div class="row g-sm-4 g-3">
        <div class="d-xl-none d-block mt-4" >
            <div class="row g-sm-4 g-3">
                <?php if($check ==1): ?>
                    <div class="col-xl-12 col-lg-6">
                        <div class="d-card user-card not-hover">
                            <div class="text-center">
                                <h4 class="d-card-balance mt-xxl-3 mt-2">Dotcoinverse</h4>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-xl-12 col-lg-6">
                        <div class="d-card user-card not-hover">
                            <div class="text-center">



                                <div class="mt-4">
                                    <a href="#" class="btn btn-md sp_btn_danger me-xxl-3 me-2"><i class="las la-minus-circle fs-lg"></i> <?php echo e(__('Up-Line')); ?></a>
                                    <a href="#" class="btn btn-md sp_btn_success ms-xxl-3 ms-2"><i class="las la-plus-circle fs-lg"></i> <?php echo e($reffer->username); ?></a>
                                </div>
                            </div>


                            <hr class="my-4">
                            <a href="https://wa.me/<?php echo e($reffer->phone); ?>?text=Hello%20there!" target="_blank" class="btn sp_theme_btn mt-4 w-100"><i class="fas fa-whatsapp-square me-2"></i> <?php echo e($reffer->phone); ?></a>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
        </div>
        <div class="col-xxl-8 col-xl-12 ">
            <div class="d-left-wrapper">
                <div class="d-left-countdown">
                    <div id="countdownTwo"></div>
                </div>
                <div class="row g-sm-4 g-3">

                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e($directTeam); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Team Direct Members')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e($indirectTeam); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Team Indirect Members')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">
                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>
                            <div class="d-card-content">
                                <h4 class="d-card-amount"><?php echo e($myTeam); ?></h4>
                                <p class="d-card-caption"><?php echo e(__('Total Team Members')); ?></p>
                            </div>
                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">

                        </div>
                    </div>
                    <div class="custom-xxl-6 col-xxl-6 col-xl-6 col-lg-6 col-6">
                        <div class="d-card d-icon-card card-hover text-start team-card-hover">
                            <a href="<?php echo e(route('user.level')); ?>">
                            <div class="shadow">
                                <div class="d-card-icon gr-bg-3">
                                    <i class="las la-chart-bar"></i>
                                </div>
                            </div>

                            <div class="d-card-content">
                                <h4 class="d-card-amount">10</h4>
                                <p class="d-card-caption"><?php echo e(__('Team Levels')); ?></p>
                            </div>

                            <img class="card-wave" src="<?php echo e(Config::getFile('logo', 'wave.svg', true)); ?>" alt="image">

                        </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 d-custom-right team-card" >
            <div class="d-right-wrapper">
                <div class="d-xl-block d-none">
                    <div class="row g-sm-4 g-3">
                        <?php if($check==1): ?>
                            <div class="col-xl-12 col-lg-6">
                                <div class="d-card user-card not-hover">
                                    <div class="text-center">
                                            <h5 class="d-card-balance mt-xxl-3">Dotcoinverse</h5>
                                    </div>
                                     </div>
                            </div>
                        <?php else: ?>
                        <div class="col-xl-12 col-lg-6">
                            <div class="d-card user-card not-hover">
                                <div class="text-center">
                     <?php if($reffer->first_name): ?>
                                    <h5 class="d-card-balance mt-xxl-3 mt-2"><?php echo e($reffer->first_name .' '. $reffer->last_name); ?></h5>
                                    <?php else: ?>
                                        <h4 class="d-card-balance mt-xxl-3 mt-2"><?php echo e($reffer->username); ?></h4>
                                    <?php endif; ?>
                                    <h6 class="user-card-title"  style="text-transform: none"><?php echo e($reffer->email); ?></h6>
                                    <div class="mt-4  deposit-buttons">
                                        <a href="#" class="btn btn-md sp_btn_danger"><i class="las la-minus-circle fs-lg"></i> <?php echo e(__('Up-Line')); ?></a>
                                        <a href="#" class="btn btn-md sp_btn_success"><i class="las la-plus-circle fs-lg"></i> <?php echo e($reffer->username); ?></a>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <a href="https://wa.me/<?php echo e($reffer->phone); ?>?text=Hello%20there!" target="_blank" class="btn sp_theme_btn mt-4 w-100"><i class="fab fa-whatsapp"></i> &nbsp;&nbsp; <?php echo e($reffer->phone); ?></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/team/index.blade.php ENDPATH**/ ?>