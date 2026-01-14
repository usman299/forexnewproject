<?php $__env->startSection('element'); ?>
    <div class="row withdraw-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header site-card-header justify-content-between">










                    <div class="card-header-right">
                        <button class="btn btn-sm btn-primary add">
                            <i class="fa fa-plus mr-2"></i>
                            <?php echo e(__('Percentage Commission')); ?>

                        </button>
                        <button class="btn btn-sm btn-primary sub">
                            <i class="fa fa-minus mr-2"></i>
                            <?php echo e(__('Percentage Delete')); ?>

                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Sl')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Details')); ?></th>
                                <th><?php echo e(__('Charge Type')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($profit->user->username ?? ' '); ?></td>
                                    <td><?php echo e(number_format($profit->amount, 2) . ' ' . Config::config()->currency); ?></td>
                                    <td><?php echo e($profit->details); ?></td>
                                    <td><?php echo e(ucwords($profit->type)); ?></td>
                                    <td>
                                        <div class="badge badge-success"><?php echo e(__('Delivered')); ?></div>
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
                    <?php if($data->hasPages()): ?>
                        <div class="card-footer">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    
                                    <?php if($data->onFirstPage()): ?>
                                        <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($data->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a>
                                        </li>
                                    <?php endif; ?>

                                    
                                    <?php $__currentLoopData = $data->getUrlRange(1, $data->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($page == $data->currentPage()): ?>
                                            <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
                                        <?php elseif($page >= $data->currentPage() - 2 && $page <= $data->currentPage() + 2): ?>
                                            <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                        <?php elseif($page == $data->currentPage() - 3 || $page == $data->currentPage() + 3): ?>
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if($data->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($data->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>





                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo e(route('admin.percentage.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for=""><?php echo e(__('Date Select')); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="date"  name="date" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label for=""><?php echo e(__('Add Percentage Digit')); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text"  name="percentage" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('Save')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelIdsub" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo e(route('admin.percentage.delete')); ?>" id="myForm" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for=""><?php echo e(__('Date Select')); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="date"  name="date" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="button" id="delete" class="btn btn-sm btn-primary"><?php echo e(__('Save')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'
            $('.add').on('click', function() {
                const modal = $('#modelId');
                modal.find('.modal-title').text("<?php echo e(__('Percentage Profit')); ?>")
                modal.modal('show');
            })
            $('.sub').on('click', function() {
                const modal = $('#modelIdsub');
                modal.find('.modal-title').text("<?php echo e(__('Percentage Delete')); ?>")
                modal.modal('show');
            })
            $('#delete').on('click', function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#myForm').submit();
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your imaginary data is safe :)",
                            icon: "error"
                        });
                    }
                });
            })
        })

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/withdraw/trasection.blade.php ENDPATH**/ ?>