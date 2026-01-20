<!-- Sidebar start -->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo e(route('admin.home')); ?>" aria-expanded="false">
                    <i data-feather="home"></i>
                    <span class="nav-text"><?php echo e(__('Dashboard')); ?></span>
                </a>
            </li>































            <?php if(auth()->guard('admin')->user()->can('manage-referral')): ?>
                <li><a href="<?php echo e(route('admin.refferal.index')); ?>" aria-expanded="false"><i
                            data-feather="link"></i><span class="nav-text"><?php echo e(__('Manage Levels')); ?></span></a>
                </li>
            <?php endif; ?>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        data-feather="credit-card"></i><span class="nav-text"><?php echo e(__('Manage P2P')); ?></span></a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin.metamask.ptop')); ?>"><?php echo e(__('Metamask P2P')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.admin.ptop')); ?>"><?php echo e(__('Admin P2P')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.ptop')); ?>"><?php echo e(__('Manage Internal P2P')); ?></a></li>

                </ul>
            </li>
            <li><a href="<?php echo e(route('admin.percentage')); ?>" aria-expanded="false"><i data-feather="link"></i><span class="nav-text"><?php echo e(__('Add Percentage')); ?></span></a>
                                    </li>


            














            <?php if(auth()->guard('admin')->user()->can('manage-deposit')): ?>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            data-feather="credit-card"></i><span class="nav-text"><?php echo e(__('Manage Deposit')); ?></span></a>
                    <ul aria-expanded="false">

                        <li><a href="<?php echo e(route('admin.deposit', 'online')); ?>"><?php echo e(__('Deposit')); ?></a></li>


                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-withdraw')): ?>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            data-feather="package"></i><span class="nav-text"><?php echo e(__('Manage Withdraw')); ?></span></a>
                    <ul aria-expanded="false">

                        <li><a href="<?php echo e(route('admin.withdraw.filter')); ?>"><?php echo e(__('All Withdraw')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.withdraw.filter', 'pending')); ?>"><?php echo e(__('Pending Withdraw')); ?>

                                <span class="noti-count"><?php echo e(Config::sidebarData()['pendingWithdraw']); ?></span></a></li>
                        <li><a
                                href="<?php echo e(route('admin.withdraw.filter', 'accepted')); ?>"><?php echo e(__('Accepted Withdraw')); ?></a>
                        </li>
                        <li><a
                                href="<?php echo e(route('admin.withdraw.filter', 'rejected')); ?>"><?php echo e(__('Rejected Withdraw')); ?></a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-user')): ?>
                <li><a href="<?php echo e(route('admin.user.index')); ?>"><i data-feather="user"></i><span
                            class="nav-text"><?php echo e(__('Manage Users')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-setting') ||
                    auth()->guard('admin')->user()->can('manage-email') ||
                    auth()->guard('admin')->user()->can('manage-theme') ||
                    auth()->guard('admin')->user()->can('manage-gateway')): ?>
                <li class="nav-label"><?php echo e(__('Application Settings')); ?></li>
            <?php endif; ?>

















            <?php if(auth()->guard('admin')->user()->can('manage-setting')): ?>
                <li><a href="<?php echo e(route('admin.general.index')); ?>" aria-expanded="false"><i
                            data-feather="settings"></i><span class="nav-text"><?php echo e(__('Manage Settings')); ?></span></a>
                </li>
            <?php endif; ?>


                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i data-feather="mail"></i><span
                            class="nav-text"><?php echo e(__('Config')); ?></span></a>
                    <ul aria-expanded="false">

                        <?php if(auth()->guard('admin')->user()->id === 1): ?>
                        <li><a href="<?php echo e(route('admin.email.config')); ?>"><?php echo e(__('Email Configure')); ?></a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('admin.section.manage')); ?>"><?php echo e(__('OverView Section')); ?></a></li>



                    </ul>
                </li>


            <?php if(auth()->guard('admin')->user()->can('manage-theme')): ?>
                <li><a href="<?php echo e(route('admin.manage.theme')); ?>" aria-expanded="false"><i
                            data-feather="layers"></i><span class="nav-text"><?php echo e(__('Manage Theme')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-frontend') ||
                    auth()->guard('admin')->user()->can('manage-language')): ?>
                <li class="nav-label"><?php echo e(__('Theme Settings')); ?></li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-frontend')): ?>
                <li><a href="<?php echo e(route('admin.frontend.pages')); ?>" aria-expanded="false"><i
                            data-feather="book-open"></i><span class="nav-text"><?php echo e(__('Manage Pages')); ?></span></a>
                </li>




                <li><a href="<?php echo e(route('admin.frontend.section.manage', 'banner')); ?>" aria-expanded="false"><i
                            data-feather="layout"></i><span class="nav-text"><?php echo e(__('Manage Frontend')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-language')): ?>
                <li><a href="<?php echo e(route('admin.language.index')); ?>" aria-expanded="false"><i
                            data-feather="globe"></i><span class="nav-text"><?php echo e(__('Manage Language')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-role') ||
                    auth()->guard('admin')->user()->can('manage-admin')): ?>
                <li class="nav-label"><?php echo e(__('Administration')); ?></li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-role')): ?>
                <li>
                    <a href="<?php echo e(route('admin.roles.index')); ?>" aria-expanded="false">
                        <i data-feather="users"></i>
                        <span class="nav-text"><?php echo e(__('Manage Roles')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-admin')): ?>
                <li>
                    <a href="<?php echo e(route('admin.admins.index')); ?>" aria-expanded="false">
                        <i data-feather="user-check"></i>
                        <span class="nav-text"><?php echo e(__('Manage Admins')); ?></span>
                    </a>
                </li>
            <?php endif; ?>



            <li class="nav-label"><?php echo e(__('Others')); ?></li>









            <?php if(auth()->guard('admin')->user()->can('manage-ticket')): ?>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            data-feather="inbox"></i><span class="nav-text"><?php echo e(__('Support Ticket')); ?></span></a>
                    <ul aria-expanded="false">

                        <li><a href="<?php echo e(route('admin.ticket.index')); ?>"><?php echo e(__('All Tickets')); ?></a></li>

                        <li><a href="<?php echo e(route('admin.ticket.status', 'pending')); ?>"><?php echo e(__('Pending Ticket')); ?>

                                <?php if(Config::sidebarData()['pendingTicket'] > 0): ?>
                                    <span class="noti-count"><?php echo e(Config::sidebarData()['pendingTicket']); ?></span>
                                <?php endif; ?>
                            </a></li>

                        <li><a href="<?php echo e(route('admin.ticket.status', 'answered')); ?>"><?php echo e(__('Answered Ticket')); ?></a>
                        </li>





                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-subscriber')): ?>
                <li><a href="<?php echo e(route('admin.subscribers')); ?>" aria-expanded="false"><i
                            data-feather="at-sign"></i><span class="nav-text"><?php echo e(__('Subscribers')); ?></span></a>
                </li>
            <?php endif; ?>





            <li><a href="<?php echo e(route('admin.general.cacheclear')); ?>" aria-expanded="false"><i
                        data-feather="feather"></i><span class="nav-text"><?php echo e(__('Clear Cache')); ?></span></a>
            </li>

            <li class="nav-label"><?php echo e(__('Current Version') .' - '. Config::APP_VERSION); ?></li>
        </ul>
    </div>
</div>
<!-- Sidebar end -->
<?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>