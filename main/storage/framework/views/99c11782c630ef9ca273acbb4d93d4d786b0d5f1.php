<?php
    $singleElement = Config::builder('contact');
    $socials = Config::builder('socials', true);
?>


<header class="sp_header">






































    <div class="sp_header_main">
        <div class="container">
           
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(Config::getFile('logo', Config::config()->logo, true)); ?>" alt="logo">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="mainNavbar">
                    <ul class="nav navbar-nav sp_site_menu ms-auto">

                        <?= Config::navbarMenus() ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('our.team')); ?>">Our Team</a>
                            </li>

                    </ul>









                    <div class="navbar-action">
                        <?php if(auth()->guard()->check()): ?>



                                <a href="<?php echo e(route('user.dashboard')); ?>" class="btn sp_theme_btn btn-sm"><?php echo e(__('Dashboard')); ?>

                                    <i class="las la-long-arrow-alt-right ms-2"></i></a>
                        <?php else: ?>
                            <a href="<?php echo e(route('user.login')); ?>" class="me-3 text-p"><?php echo e(__('Sign In')); ?></a>
                            <a href="<?php echo e(route('user.register')); ?>" class="btn sp_theme_btn btn-sm"><?php echo e(__('Sign up')); ?> <i
                                    class="las la-long-arrow-alt-right ms-2"></i></a>
                        <?php endif; ?>

                    </div>
                </div>
            </nav>
        </div>
    </div><!-- header-bottom end -->
</header>
<!-- header-section end  -->
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/layout/header.blade.php ENDPATH**/ ?>