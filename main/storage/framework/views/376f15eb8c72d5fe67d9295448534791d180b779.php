<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="sp_site_card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="tab-btn-group">
                        <a class="tab-btn <?php echo e(Request::routeIs('user.withdraw.all') ? 'active' : ''); ?>"
                            href="<?php echo e(route('user.withdraw.all')); ?>"><?php echo e(__('All Withdraw')); ?></a>

                        <a class="tab-btn <?php echo e(Request::routeIs('user.withdraw.pending') ? 'active' : ''); ?>"
                            href="<?php echo e(route('user.withdraw.pending')); ?>"><?php echo e(__('Pending Withdraw')); ?></a>

                        <a class="tab-btn <?php echo e(Request::routeIs('user.withdraw.complete') ? 'active' : ''); ?>"
                            href="<?php echo e(route('user.withdraw.complete')); ?>"><?php echo e(__('Complete Withdraw')); ?></a>
                    </div>
                    <form action="" method="get" class="row justify-content-md-end g-3">
                        <div class="col-auto">
                            <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn sp_theme_btn"><?php echo e(__('Search')); ?></button>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table sp_site_table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Trx')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>

                                    <th><?php echo e(__('Withdraw Amount')); ?></th>
                                    <th><?php echo e(__('Charge')); ?></th>
                                    <th><?php echo e(__('Receivable Amount')); ?></th>

                                    <th><?php echo e(__('status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $withdrawlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-caption="<?php echo e(__('Sl')); ?>"><?php echo e($withdrawlog->trx); ?></td>
                                        <td data-caption="<?php echo e(__('Date')); ?>">
                                            <?php echo e(__($withdrawlog->created_at->format('d F Y'))); ?>

                                        </td>


                                        <td data-caption="<?php echo e(__('Withdraw Amount')); ?>">
                                            <?php echo e(number_format($withdrawlog->withdraw_amount, 2)); ?>USD
                                        </td>
                                        <td data-caption="<?php echo e(__('Charge')); ?>">
                                            <?php echo e(number_format($withdrawlog->withdraw_charge, 2)); ?>USD
                                        </td>
                                        <td>


                                            <?php echo e(number_format($withdrawlog->total, 2)); ?> USD

                                        </td>




                                        <td data-caption="<?php echo e(__('Status')); ?>">
                                            <?php if($withdrawlog->status == 1): ?>
                                                <span class="sp_badge sp_badge_success"><?php echo e(__('Success')); ?></span>
                                            <?php elseif($withdrawlog->status == 2): ?>
                                                <span class="sp_badge sp_badge_danger"><?php echo e(__('Rejected')); ?></span>
                                            <?php else: ?>
                                                <span class="sp_badge sp_badge_warning"><?php echo e(__('Pending')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-caption="<?php echo e(__('Action')); ?>">
                                            <button class="view-btn details"
                                                data-user_data="<?php echo e(json_encode($withdrawlog->proof)); ?>"
                                                data-withdraw="<?php echo e($withdrawlog); ?>"><i class="far fa-eye"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td data-caption="<?php echo e(__('Status')); ?>" class="text-center" colspan="100%">
                                            <?php echo e(__('No Data Found')); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($withdrawlogs->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($withdrawlogs->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Withdraw Details')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="withdraw-details">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm sp_btn_danger"
                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.details').on('click', function() {
                const modal = $('#details');

                let html = `

                    <ul class="list-group">
                            
                           <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo e(__('Withdraw address')); ?>

                            <span id="walletAddress"
                                  style="cursor:pointer"
                                  title="Click to copy"></span>
                            </li>


                            <li class="list-group-item  d-flex justify-content-between align-items-center">
                                <?php echo e(__('Withdraw Amount')); ?>

                                <span>${$(this).data('withdraw').total} USD</span>
                            </li>


                            <li class="list-group-item  d-flex justify-content-between align-items-center">
                                <?php echo e(__('Note For Withdraw')); ?>

                                <span>${$(this).data('withdraw').reject_reason}</span>
                            </li>

                            <li class="list-group-item  d-flex justify-content-between align-items-center">
                                <?php echo e(__('Withdraw Transaction')); ?>

                                <span>${$(this).data('withdraw').trx}</span>
                            </li>


                        </ul>


                `;

                modal.find('.withdraw-details').html(html);

                modal.modal('show');
            })

        })
    </script>
    <script>
$(document).on('click', '[data-withdraw]', function () {

    let address = $(this).data('withdraw').proof;

    // limit text to 25 chars
    let shortAddress = address.length > 25
        ? address.substring(0, 22) + '...'
        : address;

    // show in UI
    $('#walletAddress')
        .text(shortAddress)
        .attr('data-full', address);
});

// copy on click
$('#walletAddress').on('click', function () {
    let fullAddress = $(this).attr('data-full');

    navigator.clipboard.writeText(fullAddress).then(() => {
        alert('Wallet address copied!');
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).on('click', '[data-withdraw]', function () {

    let address = $(this).data('withdraw').proof;

    let shortAddress = address.length > 25
        ? address.substring(0, 25) + '...'
        : address;

    $('#walletAddress')
        .text(shortAddress)
        .attr('data-full', address);
});

$('#walletAddress').on('click', function () {

    let fullAddress = $(this).attr('data-full');

    // Fallback-safe copy method
    let tempInput = document.createElement('input');
    tempInput.value = fullAddress;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    Swal.fire({
        icon: 'success',
        title: 'Copied!',
        text: 'Wallet address copied to clipboard',
        timer: 1500,
        showConfirmButton: false
    });
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tradwiwy/public_html/main/resources/views/frontend/default/user/withdraw/withdraw_log.blade.php ENDPATH**/ ?>