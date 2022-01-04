<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Update Causes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php echo $__env->make('backend.partials.datatable.style-enqueue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
<div class="row">
    <div class="col-lg-12">
        <h5 class="modal-title margin-bottom-25"><?php echo e(__('All Cause Update')); ?>

            <input type="hidden" name="cause_id" value="<?php echo e($cause_id); ?>">
            <a class="btn btn-success pull-right btn-sm mx-2" href="<?php echo e(route('user.add.new.update.cause.page',$cause_id)); ?>"><?php echo e(__('Add New Cause Update')); ?></a>
            <a class="btn btn-primary pull-right btn-sm" href="<?php echo e(route('user.campaign.all')); ?>"><?php echo e(__('All Campaign')); ?></a>
        </h5>
        <div class="table-wrap table-responsive">
            <table class="table table-default">
                <thead>
                <th><?php echo e(__('Title')); ?></th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__('Action')); ?></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $all_update_causes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($data->title); ?></td>
                        <td><?php echo render_attachment_preview_for_admin($data->image,'','grid'); ?></td>
                        <td>
                            <a tabindex="0" class="btn btn-danger btn-sm swal_delete_button text-light">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form method='post' action='<?php echo e(route('user.donations.update.cause.delete',$data->id)); ?>' class="d-none">
                                <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                <br>
                                <button type="submit" class="swal_form_submit_btn d-none"></button>
                            </form>

                            <a href="#"
                               data-toggle="modal"
                               data-target="#category_edit_modal"
                               class="btn btn-primary btn-sm category_edit_btn"
                               data-id="<?php echo e($data->id); ?>"
                               data-title="<?php echo e($data->title); ?>"
                               data-description="<?php echo e($data->description); ?>"
                               <?php echo render_img_url_data_attr($data->image,'imageurl'); ?>

                               data-image="<?php echo e($data->image); ?>"
                            >
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="category_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Update Cause Update')); ?></h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="<?php echo e(route('user.donations.update.cause.update')); ?>" method="post">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="case_update_id" value="" id="case_update_id">
                    <input type="hidden" name="cause_id" value="<?php echo e($cause_id); ?>">
                    <div class="form-group">
                        <label for="edit_name"><?php echo e(__('Title')); ?></label>
                        <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('title')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="description"><?php echo e(__('Description')); ?></label>
                        <textarea name="description" class="form-control" cols="30" rows="5"
                                  placeholder="<?php echo e(__('Description')); ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image"><?php echo e(__('Image')); ?></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image">
                            <button type="button" class="btn btn-info media_upload_form_btn"
                                    data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                    data-toggle="modal" data-target="#media_upload_modal">
                                <?php echo e(__('Upload Image')); ?>

                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Change')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => ['userUpload' => true,'imageUploadRoute' => route('user.upload.media.file')]]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['userUpload' => true,'imageUploadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file'))]); ?>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.submit','data' => []]); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
              $(document).on('click', '.category_edit_btn', function () {
                  var el = $(this);
                  var id = el.data('id');
                  var title = el.data('title');
                  var modal = $('#category_edit_modal');
                  var image = el.data('image');
                  var imageUrl = el.data('imageurl');

                  modal.find('input[name="title"]').val(title);
                  $('#case_update_id').val(id);

                  modal.find('textarea[name="description"]').val(el.data('description'));
                  if (image !== '') {
                      modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + imageUrl + '" > </div></div></div>');
                      modal.find('.media-upload-btn-wrapper input').val(image);
                      modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                  }
              });

                $(document).on('click','.swal_delete_button',function(e){
                  e.preventDefault();
                    Swal.fire({
                      title: '<?php echo e(__("Are you sure?")); ?>',
                      text: '<?php echo e(__("You would not be able to revert this item!")); ?>',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $(this).next().find('.swal_form_submit_btn').trigger('click');
                      }
                    });
                });
            });
        })(jQuery)
    </script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => ['deleteRoute' => route('user.upload.media.file.delete'),'imgAltChangeRoute' => route('user.upload.media.file.alt.change'),'allImageLoadRoute' => route('user.upload.media.file.all')]]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['deleteRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.delete')),'imgAltChangeRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.alt.change')),'allImageLoadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.all'))]); ?>
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/cause-update/all-update-cause.blade.php ENDPATH**/ ?>