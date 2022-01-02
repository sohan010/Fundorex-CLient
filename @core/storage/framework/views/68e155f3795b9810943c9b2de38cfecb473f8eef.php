<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Donation Post')); ?>

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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><?php echo e(__('Edit Donation Cause')); ?></h4>
                                <div class="headerbtn-wrap pull-right mb-3">
                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('admin.donations.all')); ?>" class="btn btn-info"><?php echo e(__('All Donation Cause')); ?></a>
                                        <a href="<?php echo e(route('admin.donations.new')); ?>" class="btn btn-secondary ml-1"><?php echo e(__('Add New Cause')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.donations.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="donation_id" value="<?php echo e($donation->id); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e($donation->title); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="slug"><?php echo e(__('Slug')); ?></label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="<?php echo e($donation->slug); ?>" placeholder="<?php echo e(__('slug')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Content')); ?></label>
                                        <input type="hidden" name="cause_content" value="<?php echo e($donation->cause_content); ?>">
                                        <div class="summernote" data-content='<?php echo e($donation->cause_content); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount"><?php echo e(__('Amount')); ?></label>
                                        <input type="number" class="form-control"  id="amount" name="amount" value="<?php echo e($donation->amount); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt"><?php echo e(__('Excerpt')); ?></label>
                                        <textarea class="form-control" name="excerpt" rows="5" placeholder="<?php echo e(__('expert')); ?>"><?php echo e($donation->excerpt); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories_id"><strong><?php echo e(__('Category')); ?></strong></label>
                                        <select name="categories_id" class="form-control">
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>" <?php if($cat->id == $donation->categories_id): ?> selected <?php endif; ?>><?php echo e($cat->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date"><?php echo e(__('Deadline')); ?></label>
                                        <input type="date" class="form-control" value="<?php echo e($donation->deadline); ?>" name="deadline" >
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                        <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="<?php echo e($donation->meta_tags); ?>" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($donation->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title"><?php echo e(__('Og Meta Title')); ?></label>
                                        <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Og Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($donation->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Og Meta Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_attachment_preview_for_admin($donation->og_meta_image); ?>

                                            </div>
                                            <input type="hidden" name="og_meta_image" value="<?php echo e($donation->og_meta_image); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Donation Image')); ?>" data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e('Change Image'); ?>

                                            </button>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Image')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                           <div class="img-wrap">
                                               <?php echo render_attachment_preview_for_admin($donation->image); ?>

                                           </div>
                                            <input type="hidden" name="image" value="<?php echo e($donation->image); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Donation Image')); ?>" data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e('Change Image'); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" id="status"  class="form-control">
                                            <option <?php if($donation->status === 'publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option <?php if($donation->status === 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__('Draft')); ?></option>
                                            <option <?php if($donation->status === 'archive'): ?> selected <?php endif; ?> value="archive"><?php echo e(__('Archive')); ?></option>
                                            <option <?php if($donation->status === 'banned'): ?> selected <?php endif; ?> value="banned"><?php echo e(__('Banned')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Image Gallery')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_gallery_image_attachment_preview($donation->image_gallery); ?>

                                            </div>
                                            <input type="hidden" name="image_gallery" value="<?php echo e($donation->image_gallery); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__('Upload Images')); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image"><?php echo e(__('Medical Documents')); ?></label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                <?php echo render_gallery_image_attachment_preview($donation->medical_document); ?>

                                            </div>
                                            <input type="hidden" name="medical_document" value="<?php echo e($donation->medical_document); ?>">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Document')); ?>" data-modaltitle="<?php echo e(__('Upload Document')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                <?php echo e(__('Upload Images')); ?>

                                            </button>
                                        </div>
                                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Featured')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="featured"  <?php if(!empty($donation->featured)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong><?php echo e(__('Emmergency')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="emmergency"  <?php if(!empty($donation->emmergency)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="iconbox-repeater-wrapper">
                                        <?php
                                        $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => ['']];
                                        ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $faq_items['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="all-field-wrap">
                                            <div class="form-group">
                                                <label for="faq"><?php echo e(__('Faq Title')); ?></label>
                                                <input type="text" name="faq[title][]" class="form-control" value="<?php echo e($faq); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="faq_desc"><?php echo e(__('Faq Description')); ?></label>
                                                <textarea name="faq[description][]" class="form-control"><?php echo e($faq_items['description'][$loop->index] ?? ''); ?></textarea>
                                            </div>
                                            <div class="action-wrap">
                                                <span class="add"><i class="ti-plus"></i></span>
                                                <span class="remove"><i class="ti-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="all-field-wrap">
                                                <div class="form-group">
                                                    <label for="faq"><?php echo e(__('Faq Title')); ?></label>
                                                    <input type="text" name="faq[title][]" class="form-control" placeholder="<?php echo e(__('faq title')); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="faq_desc"><?php echo e(__('Faq Description')); ?></label>
                                                    <textarea name="faq[description][]" class="form-control" placeholder="<?php echo e(__('faq description')); ?>"></textarea>
                                                </div>
                                                <div class="action-wrap">
                                                    <span class="add"><i class="ti-plus"></i></span>
                                                    <span class="remove"><i class="ti-trash"></i></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Cause')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
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
                $('.summernote').summernote({
                    height: 500,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if($('.summernote').length > 0){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $('select[name="categories_id"]').html('<option value=""><?php echo e(__('Select Category')); ?></option>');
                    $.ajax({
                        url: "<?php echo e(route('admin.donations.category.by.lang')); ?>",
                        type: "POST",
                        data: {
                            _token : "<?php echo e(csrf_token()); ?>",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $.each(data,function(index,value){
                                $('select[name="categories_id"]').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });


            });
        })(jQuery)
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.repeater','data' => []]); ?>
<?php $component->withName('repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/backend/donations/edit-donations.blade.php ENDPATH**/ ?>