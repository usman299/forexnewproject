<?php
    $plan_expired_at = now();
?>

<?php if(auth()->user()->currentplan): ?>
    <?php
        $is_subscribe = auth()
            ->user()
            ->currentplan()
            ->where('is_current', 1)
            ->first();

        if ($is_subscribe) {
            $plan_expired_at = $is_subscribe->plan_expired_at;
        }
    ?>
<?php endif; ?>



<aside class="user-sidebar">
    <a href="<?php echo e(route('user.dashboard')); ?>" class="site-logo">
        <img src="<?php echo e(Config::getFile('logo', Config::config()->logo, true)); ?>" alt="image">
    </a>

    <div class="user-sidebar-bottom">
        <div id="countdown"></div>

    </div>

    <ul class="sidebar-menu">
        <li class="<?php echo e(Config::singleMenu('user.dashboard')); ?>"><a href="<?php echo e(route('user.dashboard')); ?>" class="active"><i
                    class="fas fa-home"></i>
                <?php echo e(__('Dashboard')); ?></a></li>










                <li class="<?php echo e(Config::singleMenu('user.daily.earning')); ?>"><a href="<?php echo e(route('user.daily.earning')); ?>"><i
                            class="fas fa-clipboard-list"></i><?php echo e(__('Daily Earning')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.deposit.create')); ?>"><a href="<?php echo e(route('user.deposit.create')); ?>"><i
                    class="fas fa-credit-card"></i><?php echo e(__('Deposit Now')); ?></a></li>

        <li class="<?php echo e(Config::singleMenu('user.withdraw.create')); ?>"><a href="<?php echo e(route('user.withdraw.create')); ?>"><i
                    class="fas fa-hand-holding-usd"></i> <?php echo e(__('Withdraw')); ?></a></li>




        <li class="has_submenu <?php echo e(in_array(url()->current(), [route('user.deposit.log'), route('user.withdraw.all'), route('user.p2p.log'), route('user.transaction.log'), route('user.transfer_money.log'), route('user.receive_money.log'), route('user.commision'), route('user.subscription')]) ? 'open' : ''); ?>">
            <a href="#"><i class="fas fa-chart-bar"></i> <?php echo e(__('Report')); ?></a>
            <ul class="submenu">
                <li class="<?php echo e(Config::singleMenu('user.deposit.log')); ?>">
                    <a href="<?php echo e(route('user.deposit.log')); ?>"><?php echo e(__('Deposit History')); ?></a>
                </li>

                <li class="<?php echo e(Config::singleMenu('user.withdraw.all')); ?>">
                    <a href="<?php echo e(route('user.withdraw.all')); ?>"><?php echo e(__('Withdraw History')); ?></a>
                </li>
                <li class="<?php echo e(Config::singleMenu('user.p2p.log')); ?>">
                    <a href="<?php echo e(route('user.p2p.log')); ?>"><?php echo e(__('P2P History')); ?></a>
                </li>





                <li class="<?php echo e(Config::singleMenu('user.transaction.log')); ?>">
                    <a href="<?php echo e(route('user.transaction.log')); ?>"><?php echo e(__('Transaction History')); ?></a>
                </li>
















            </ul>
        </li>

        <li class="<?php echo e(Config::singleMenu('user.team')); ?>"><a href="<?php echo e(route('user.team')); ?>"><i
                    class="fas fa-users"></i> <?php echo e(__('Team')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.statistics')); ?>"><a href="<?php echo e(route('user.statistics')); ?>"><i
                    class="fas fa-map"></i> <?php echo e(__('Statistics')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.direct.reward')); ?>"><a href="<?php echo e(route('user.direct.reward')); ?>"><i
                    class="fas fa-dollar-sign"></i> <?php echo e(__('Direct Reward Details')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.person')); ?>"><a href="<?php echo e(route('user.person')); ?>"><i
                    class="fas fa-exchange-alt"></i> <?php echo e(__('P2P Wallet')); ?></a></li>





        <li class="#"><a href="<?php echo e(route('user.transection')); ?>"><i
                    class="fas fa-dollar-sign"></i> <?php echo e(__('Level Income Reward')); ?></a></li>


        <li class="#"><a href="<?php echo e(Config::getFile('gateways', 'Dotcoinverse.pdf', true)); ?>" class="pdf-link"><i
                    class="fas fa-file-pdf"></i> <?php echo e(__('Dotcoinverse Pdf')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.profile')); ?>"><a href="<?php echo e(route('user.profile')); ?>"><i
                    class="fas fa-user-plus"></i> <?php echo e(__('Profile Settings')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.change.password')); ?>"><a href="<?php echo e(route('user.change.password')); ?>"><i
                    class="fas fa-user-cog"></i> <?php echo e(__('Password Change')); ?></a></li>

        <li class="<?php echo e(Config::singleMenu('user.ticket.index')); ?>"><a href="<?php echo e(route('user.ticket.index')); ?>"><i
                    class="fas fa-ticket-alt"></i> <?php echo e(__('Support Ticket')); ?></a></li>
        <li class="<?php echo e(Config::singleMenu('user.logout')); ?>"><a href="<?php echo e(route('user.logout')); ?>"><i
                    class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?></a></li>
    </ul>
</aside>

<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu-wrapper">
    <ul class="mobile-bottom-menu">
        <li>
            <a id="backButton"  >
                <i class="fas fa-exchange-alt"></i>
                <span><?php echo e(__('Back')); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="<?php echo e(Config::activeMenu(route('user.dashboard'))); ?>">
                <i class="fas fa-home"></i>
                <span><?php echo e(__('Home')); ?></span>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('user.deposit.create')); ?>" class="<?php echo e(Config::activeMenu(route('user.deposit.create'))); ?>">
                <i class="fas fa-wallet"></i>
                <span><?php echo e(__('Deposit')); ?></span>
            </a>
        </li>








        <li>
            <a href="<?php echo e(route('user.team')); ?>"
               class="<?php echo e(Config::activeMenu(route('user.team'))); ?>">
                <i class="fas fa-users"></i>
                <span><?php echo e(__('Teams')); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('user.withdraw.create')); ?>" class="<?php echo e(Config::activeMenu(route('user.withdraw.create'))); ?>">
                <i class="fas fa-hand-holding-usd"></i>
                <span><?php echo e(__('Withdraw')); ?></span>
            </a>
        </li>

        <li class="sidebar-open-btn">
            <a href="#0" class="">
                <i class="fas fa-bars"></i>
                <span><?php echo e(__('Menu')); ?></span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile bottom menu end -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<?php $__env->startPush('script'); ?>
    <!-- jQuery script to open PDF in a new tab -->
    <script>
        $(document).ready(function() {
            $('#backButton').on('click', function() {
                window.history.back();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add click event listener to the PDF link
            $('.pdf-link').on('click', function(event) {
                // Prevent the default behavior of the link (preventing it from navigating)
                event.preventDefault();

                // Get the href attribute of the link (PDF file path)
                var pdfPath = $(this).attr('href');

                // Open the PDF in a new tab
                window.open(pdfPath, '_blank');
            });
        });
    </script>
    <script>

        $(function() {
            'use strict'

            var expirationDate = new Date('<?php echo e($plan_expired_at); ?>');

            
            
            

            
            
            
            
            
            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            // Call updateCountdown every second
            // setInterval(updateCountdown, 1000);
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/dotcdafk/public_html/main/resources/views/frontend/default/layout/user_sidebar.blade.php ENDPATH**/ ?>