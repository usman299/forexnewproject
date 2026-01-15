<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <title><?php echo e(Config::config()->appname); ?></title>

    <link rel="stylesheet" href="<?php echo e(optional(Config::config()->fonts)->heading_font_url); ?>">
    <link rel="stylesheet" href="<?php echo e(optional(Config::config()->fonts)->paragraph_font_url); ?>">

    <link rel="shortcut icon" type="image/png" href="<?php echo e(Config::getFile('icon', Config::config()->favicon, true)); ?>">

    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'lib/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'lib/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'lib/odometer.css')); ?>">



    <link href="<?php echo e(Config::cssLib('frontend', 'lib/css/style.css')); ?>" rel="stylesheet" type="text/css" />

    <?php if(Config::config()->alert === 'izi'): ?>
        <link rel="stylesheet" href="<?php echo e(Config::cssLib('frontend', 'izitoast.min.css')); ?>">
    <?php elseif(Config::config()->alert === 'toast'): ?>
        <link href="<?php echo e(Config::cssLib('frontend', 'toastr.min.css')); ?>" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(Config::cssLib('frontend', 'sweetalert.min.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <link href="<?php echo e(Config::cssLib('frontend', 'main.css')); ?>" rel="stylesheet">

    <?php
        $heading = optional(Config::config()->fonts)->heading_font_family;
        $paragraph = optional(Config::config()->fonts)->paragraph_font_family;
    ?>

    <style>
        :root {
            --clr-main: <?= Config::config()->color[Config::config()->theme] ?? '#9c0ac1' ?>;
            --h-font: <?=$heading ?>;
            --p-font: <?=$paragraph ?>;
        }
    </style>

    <?php echo $__env->yieldPushContent('external-css'); ?>


</head>

<body>

    <?php if(Config::config()->preloader_status): ?>
        <div class="preloader-holder">
            <div class="preloader">
                <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(Config::config()->analytics_status): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(Config::config()->analytics_key); ?>"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "<?php echo e(Config::config()->analytics_key); ?>");
        </script>
    <?php endif; ?>





    <?php
        $content= App\Models\Content::where('name', 'auth')->where('theme', Config::config()->theme)->first();
    ?>


    <div class="account-page">
        <div class="form-wrapper">
            <div class="logo text-center">
                <a href="<?php echo e(route('home')); ?>" class="site-logo"><img src="<?php echo e(Config::getFile('logo', Config::config()->logo, true)); ?>"
                        alt="image"></a>
            </div>
            <div class="inner-wrapper">
                <?php if(request()->is('login')): ?>
                    <h3 class="title">Login </h3>
                <?php elseif(request()->is('forgot/password')): ?>
                    <h3 class="title">Forget Password</h3>
                <?php elseif(request()->is('authentication-verify')): ?>
                    <h3 class="title">Verification Code  </h3>
                <?php elseif(request()->is('reset/password')): ?>
                    <h3 class="title">Forget Password  </h3>
                <?php else: ?>

                    <h3 class="title">Signup </h3>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="copy-right-text">
                <p>
                    Copyright 2026 TradX24 . All Rights Reserved
                    <!-- <?php echo e(__(Config::config()->copyright)); ?> -->
                </p>
            </div>
        </div>
        <div class="img-wrapper" style="background-image: url(<?php echo e(Config::getFile('logo', '641bf4c6b2e011679553734.png', true)); ?>)">
            



            <div id="particles-js"></div>



        </div>
    </div>

    <script src="<?php echo e(Config::jsLib('frontend', 'lib/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/bootstrap.bundle.min.js')); ?>"></script>


    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/jquery.min.js')); ?>"></script>

    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/jquery.isotope.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/easing.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/validation.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/enquire.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/jquery.plugin.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/typed.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/typed-custom.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/particles.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/app.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('frontend', 'lib/js/designesia.js')); ?>"></script>

    <?php if(Config::config()->alert === 'izi'): ?>
        <script src="<?php echo e(Config::jsLib('frontend', 'izitoast.min.js')); ?>"></script>
    <?php elseif(Config::config()->alert === 'toast'): ?>
        <script src="<?php echo e(Config::jsLib('frontend', 'toastr.min.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(Config::jsLib('frontend', 'sweetalert.min.js')); ?>"></script>
    <?php endif; ?>

    <script src="<?php echo e(Config::jsLib('frontend', 'main.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>


    <?php echo $__env->make('alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/auth/master.blade.php ENDPATH**/ ?>