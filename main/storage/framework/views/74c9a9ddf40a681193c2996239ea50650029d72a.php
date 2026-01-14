
<?php $__env->startSection('element'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <?php echo $__env->make('backend.users.tab_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header site-card-header justify-content-between align-items-center">
                    <div class="card-header-left">
                        <form action="" method="get">
                            <div class="input-group flex-wrap user-search-area">
                                <input type="text" class="form-control form-control-sm" placeholder="username or email or phone" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div  class="card-header-right">
                        <button class="btn btn-sm btn-primary sendMail"><i class="las la-mail-bulk mr-2"></i><?php echo e(__('Bulk Mail')); ?></button>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Sl')); ?></th>
                                    <th><?php echo e(__('Username')); ?></th>
                                    <th><?php echo e(__('Phone')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Country')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->phone); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->address->country ?? 'N/A'); ?></td>
                                        <td>
                                            <?php if($user->status): ?>
                                                <span class='badge badge-success'><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <span class='badge badge-danger'><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.user.details', $user)); ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
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
                <?php if($users->hasPages()): ?>
                    <div class="card-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                
                                <?php if($users->onFirstPage()): ?>
                                    <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a>
                                    </li>
                                <?php endif; ?>

                                
                                <?php $__currentLoopData = $users->getUrlRange(1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($page == $users->currentPage()): ?>
                                        <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
                                    <?php elseif($page >= $users->currentPage() - 2 && $page <= $users->currentPage() + 2): ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                    <?php elseif($page == $users->currentPage() - 3 || $page == $users->currentPage() + 3): ?>
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                                <?php if($users->hasMorePages()): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo e(route('admin.user.bulk')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Send Mail to user')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__('Subject')); ?></label>
                            <input type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Message')); ?></label>
                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="las la-envelope"></i>
                            <?php echo e(__('Send Mail')); ?></button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
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
            $('.sendMail').on('click', function(e) {
                e.preventDefault();
                const modal = $('#mail');
                modal.modal('show');
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/users/index.blade.php ENDPATH**/ ?>