

<style>
    button.btn.btn-sm.btn-outline-secondary.copy-btn {
    color: white;
}
.
</style>
<?php $__env->startSection('element'); ?>
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-header">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="transaction id">
                            <input type="text" name="date" class="form-control form-control-sm datepicker" placeholder="dates" autocomplete="off">
                            <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                
                

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
    <thead>
        <tr>
            <th><?php echo e(__('TRX')); ?></th>
            <th><?php echo e(__('User')); ?></th>
            <th><?php echo e(__('USDT Trx')); ?></th>
            <th><?php echo e(__('Network')); ?></th>
            <th><?php echo e(__('Gateway')); ?></th>
            <th><?php echo e(__('Address')); ?></th>
            <th><?php echo e(__('Amount')); ?></th>
            <th><?php echo e(__('Charge')); ?></th>
            <th><?php echo e(__('Date')); ?></th>
            <th><?php echo e(__('Status')); ?></th>
            <th><?php echo e(__('Action')); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($manual->trx); ?></td>

                <td>
                    <a href="<?php echo e(route('admin.user.details', $manual->user->id)); ?>">
                        <span><?php echo e($manual->user->username); ?></span>
                    </a>
                </td>

                
                <td>
    <span id="trx-<?php echo e($key); ?>"
          data-full="<?php echo e($manual->btrx_id); ?>"
          style="
            display:inline-block;
            max-width:140px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            vertical-align:middle;
          ">
        <?php echo e(\Illuminate\Support\Str::limit($manual->btrx_id, 18, '...')); ?>

    </span>

    <?php if(!empty($manual->btrx_id)): ?>
        <button type="button"
                class="btn btn-sm btn-outline-secondary copy-btn"
                data-copy="trx-<?php echo e($key); ?>">
            <?php echo e(__('Copy')); ?>

        </button>

        <small id="copied-trx-<?php echo e($key); ?>" style="display:none; color:green; margin-left:5px;">
            Copied
        </small>
    <?php endif; ?>
</td>


                
                <td>
                    <?php echo e($manual->network ?? '-'); ?>

                </td>

                
                <td>
                    <?php echo e($manual->gateway->name ?? 'Account Transfer'); ?>

                </td>

                
               <td style="max-width:200px;">

    
    <span id="addr-<?php echo e($key); ?>"
          data-full="<?php echo e($manual->random_address); ?>"
          style="
            display:inline-block;
            max-width:140px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            vertical-align:middle;
          ">
        <?php echo e(\Illuminate\Support\Str::limit($manual->random_address, 18, '...')); ?>

    </span>

    <?php if($manual->random_address): ?>
        <button type="button"
                class="btn btn-sm btn-outline-secondary copy-btn"
                data-copy="addr-<?php echo e($key); ?>">
            <?php echo e(__('Copy')); ?>

        </button>

        
        <small id="copied-<?php echo e($key); ?>" style="display:none; color:green; margin-left:5px;">
            Copied
        </small>
    <?php endif; ?>

</td>


                <td><?php echo e(Config::formatter($manual->amount)); ?></td>

                <td><?php echo e(Config::formatter($manual->charge)); ?></td>

                <td>
                    <?php echo e($manual->created_at->format('Y-m-d')); ?>

                </td>

                <td>
                    <?php if($manual->status == 2): ?>
                        <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                    <?php elseif($manual->status == 1): ?>
                        <span class="badge badge-success"><?php echo e(__('Approved')); ?></span>
                    <?php elseif($manual->status == 3): ?>
                        <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                    <?php endif; ?>
                </td>

                <td>
                    <a class="btn btn-sm btn-outline-primary details"
                       href="<?php echo e(route('admin.deposit.details', $manual->trx)); ?>">
                        <i class="far fa-eye"></i>
                    </a>

                    <?php if($manual->status == 2): ?>
                        <a class="btn btn-sm btn-outline-primary accept"
                           data-url="<?php echo e(route('admin.deposit.accept', $manual->trx)); ?>">
                            <i class="fas fa-check"></i>
                        </a>
                        
                        <a class="btn btn-sm btn-outline-danger reject"
                           data-url="<?php echo e(route('admin.deposit.reject', $manual->trx)); ?>">
                            <i class="fas fa-times"></i>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

                    </div>
                </div>
                <?php if($deposits->hasPages()): ?>
                    <?php echo e($deposits->links()); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- Modal -->
   <!-- Accept Modal -->
<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="acceptForm">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Payment Accept')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p><?php echo e(__('Are you sure to accept this payment request?')); ?></p>

                    <div class="form-group">
                        <label><?php echo e(__('Enter Accepted Amount')); ?></label>
                        <input type="number"
                               name="amount"
                               class="form-control"
                               placeholder="Enter amount"
                               required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <?php echo e(__('Close')); ?>

                    </button>
                   
                    <button type="submit" class="btn btn-primary" id="acceptBtn">
                  <?php echo e(__('Accept')); ?>

                   </button>

                </div>
            </div>
        </form>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Payment Reject')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to reject this payment')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Reject')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('external-style'); ?>
    <link rel="stylesheet" href="<?php echo e(Config::cssLib('backend', 'daterangepicker.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('external-script'); ?>
    <script src="<?php echo e(Config::jsLib('backend', 'moment.js')); ?>"></script>
    <script src="<?php echo e(Config::jsLib('backend', 'daterangepicker.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'


            $('input[name="date"]').daterangepicker({

                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });



            $('.accept').on('click', function() {
                const modal = $('#accept');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

            $('.reject').on('click', function() {
                const modal = $('#reject');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

        })
        
    </script>
   <script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.copy-btn').forEach(function (btn) {

        btn.addEventListener('click', function () {

            let targetId = this.getAttribute('data-copy');
            let span = document.getElementById(targetId);

            if (!span) return;

            let fullText = span.getAttribute('data-full') ?? span.innerText;

            navigator.clipboard.writeText(fullText).then(() => {

                // Detect which copied message to show
                let key = targetId.replace('addr-', '').replace('trx-', '');

                let msg =
                    document.getElementById('copied-' + key) ||
                    document.getElementById('copied-trx-' + key);

                if (msg) {
                    msg.style.display = 'inline';

                    setTimeout(function () {
                        msg.style.display = 'none';
                    }, 1500);
                }

            }).catch(() => {
                alert('Copy failed');
            });

        });

    });

});
</script>

<script>
    $(document).on('click', '.accept', function () {
        let url = $(this).data('url');

        $('#acceptForm').attr('action', url);
        $('#accept').modal('show');
    });
</script>
<script>
$('#acceptForm').on('submit', function () {
    $('#acceptBtn')
        .prop('disabled', true)
        .text('Processing...');
});
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/deposit/index.blade.php ENDPATH**/ ?>