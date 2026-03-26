 <!-- Nav header start -->
 <style>
     h3 {
         background: linear-gradient(45deg, #ff8a00, #e52e71);
         -webkit-background-clip: text;
         color: transparent;
         font-size: 24px; /* Adjust the font size as needed */
         margin: 0; /* Remove default margin */
     }
 </style>
 <div class="nav-header">

     <a href="<?php echo e(route('admin.home')); ?>" class="brand-logo">
     <img class="brand-title" src="<?php echo e(Config::fetchImage('logo', Config::config()->logo, true)); ?>" alt="">
         <!-- <h3>DOTCOINVERSE</h3> -->
     </a>
     <div class="nav-control">
         <div class="hamburger">
             <span class="line"></span><span class="line"></span><span class="line"></span>
         </div>
     </div>
 </div>
 <!-- Nav header end -->

 <!-- Header start -->
 <div class="header">
     <div class="header-content">
         <nav class="navbar navbar-expand">
             <div class="collapse navbar-collapse justify-content-between">
                 <div class="header-left">
                    <button type="button" class="sidebar-open">
                         <span class="line"></span>
                     </button>
                     <a href="<?php echo e(route('admin.home')); ?>" class="mobile-brand-logo">
                         <img class="brand-title" src="<?php echo e(Config::fetchImage('icon', Config::config()->favicon, true)); ?>" alt="">
                     </a>












                 </div>

                 <ul class="navbar-nav header-right">
                     <li class="nav-item d-md-flex d-none">
                         <a href="<?php echo e(route('home')); ?>"
                             class="btn btn-primary btn-sm" target="_blank"><?php echo e(__('Home')); ?></a>
                     </li>



















































                     <li class="nav-item dropdown header-profile">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                             <i data-feather="user"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">
                                 <i class="las la-user"></i>
                                 <span class="ml-2"><?php echo e(__('Profile')); ?> </span>
                             </a>

                             <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item">
                                 <i class="las la-sign-out-alt"></i>
                                 <span class="ml-2"><?php echo e(__('Logout')); ?> </span>
                             </a>
                         </div>
                     </li>














                 </ul>
             </div>
         </nav>
     </div>
 </div>
 <!-- Header end -->


<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu">




    <a href="<?php echo e(route('admin.home')); ?>">
        <i data-feather="home"></i>
        <p><?php echo e(__('Dashboard')); ?></p>
    </a>
    <a href="<?php echo e(route('admin.profile')); ?>" class="profile-img">

        <img src="<?php echo e(Config::getFile('admin', auth()->guard('admin')->user()->image, true)); ?>" alt="image">
    </a>
    <a href="<?php echo e(route('home')); ?>">
        <i data-feather="globe"></i>
        <p><?php echo e(__('Visit Frontend')); ?></p>
    </a>
</div>
<!-- mobile bottom menu end -->
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/layout/header.blade.php ENDPATH**/ ?>