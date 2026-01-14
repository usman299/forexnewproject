

<?php $__env->startSection('element'); ?>

    <div class="row">
        <div class="col-xxl-12 col-lg-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <?php
                        $counter = Builder::render('overview')['image_id'];

                    ?>

                    <?php if(Builder::render('overview')['has_element']): ?>
                        <div class="card">
                            <div class="card-header justify-content-between align-items-center">
                                <h5><?php echo e(__(Str::ucfirst(str_replace('_', ' ', 'overview') . ' Elements'))); ?></h5>
                                <a href="<?php echo e(route('admin.frontend.element', 'overview')); ?>"
                                   class="btn btn-sm btn-icon icon-left btn-primary add-page"> <i class="fa fa-plus"></i>
                                    <?php echo e(__('Add ' . str_replace('_', ' ', 'overview'))); ?></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                        <tr>
                                            <?php
                                                $valueFor = [];
                                            ?>
                                            <?php $__currentLoopData = $elementsHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e(Config::frontendFormatter($key)); ?></th>
                                                <?php
                                                    $valueFor[$key] = $header;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php $__currentLoopData = $valueFor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <?php if($item == 'Upload'): ?>

                                                            <img src="<?php echo e(Config::getFile('overview', optional($el->content)->$key, true)); ?>"
                                                                 alt="">
                                                        <?php else: ?>
                                                            <?php echo e(optional($el->content)->$key); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <td>
                                                    <a href="<?php echo e(route('admin.frontend.element.edit', ['name' => 'overview', 'element' => $el])); ?>"
                                                       class="btn btn-sm py-1 btn-outline-primary"><i
                                                            class="fa fa-pen"></i></a>
                                                    <button class="btn btn-sm py-1 btn-outline-danger delete"
                                                            data-url="<?php echo e(route('admin.frontend.element.delete', ['overview', $el])); ?>"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Delete Element')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <p><?php echo e(__('Are You Sure To Delete Element')); ?>?</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mr-3"
                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('Delete Page')); ?></button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('external-script'); ?>
    <script src="<?php echo e(Config::jsLib('backend', 'repeater.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        td img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #b4b7ee;
        }

        .form-textarea {
            min-height: 220px;
        }

        .appear [class*="col-"] {
            margin-bottom: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.repeater').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm(
                        'Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            })

            $('.summernote').summernote({
                height: 250,
            });

            $('.datepicker').datepicker();


            $('.iconpicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-success',
                unselectedClass: ''
            });



            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            })


            let ids = <?php echo json_encode($counter, 15, 512) ?>;

            for (let index = 0; index < ids.length; index++) {

                let id = ids[index];

                $.uploadPreview({
                    input_field: "#image-upload-" + id,
                    preview_box: "#image-preview-" + id,
                    label_field: "#image-label-" + id,
                    label_default: "<?php echo e(__('Choose File')); ?>",
                    label_selected: "<?php echo e(__('Upload File')); ?>",
                    no_label: false,
                    success_callback: null
                });

            }



            $("#myInput").on("keyup", function() {

                var value = $(this).val().toLowerCase();

                $("#example .filt").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $('.delete').on('click', function() {
                const modal = $('#deleteModal');

                modal.find('form').attr('action', $(this).data('url'))
                modal.modal('show')
            })



        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/backend/frontend/indexOverview.blade.php ENDPATH**/ ?>