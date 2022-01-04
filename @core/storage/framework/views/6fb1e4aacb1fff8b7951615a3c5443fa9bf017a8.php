<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Campaign')); ?>

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

<?php $__env->startSection('section'); ?>

    <div class="header-area-wrap d-flex justify-content-between">
        <h4 class="header-title"><?php echo e(__('Edit Campaign')); ?></h4>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('user.campaign.all')); ?>" class="btn btn-info"><?php echo e(__('All Campaigns')); ?></a>
            <a href="<?php echo e(route('user.campaign.new')); ?>" class="btn btn-secondary ml-1"><?php echo e(__('Add New')); ?></a>
        </div>
    </div>
    <form action="<?php echo e(route('user.campaign.update')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="donation_id" value="<?php echo e($donation->id); ?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="title"><?php echo e(__('Title')); ?></label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($donation->title); ?>">
                </div>
                <div class="form-group">
                    <label for="slug"><?php echo e(__('Slug')); ?></label>
                    <input type="text" class="form-control" id="slug" name="slug" value="<?php echo e($donation->slug); ?>"
                           placeholder="<?php echo e(__('slug')); ?>">
                </div>
                <div class="form-group">
                    <label><?php echo e(__('Content')); ?></label>
                    <input type="hidden" name="cause_content" value="<?php echo e($donation->cause_content); ?>">
                    <div class="summernote" data-content='<?php echo e($donation->cause_content); ?>'></div>
                </div>
                <div class="form-group">
                    <label for="amount"><?php echo e(__('Amount')); ?></label>
                    <input type="number" class="form-control" id="amount" name="amount" value="<?php echo e($donation->amount); ?>">
                </div>
                <div class="form-group">
                    <label for="excerpt"><?php echo e(__('Excerpt')); ?></label>
                    <textarea class="form-control" name="excerpt" rows="5"
                              placeholder="<?php echo e(__('expert')); ?>"><?php echo e($donation->excerpt); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="categories_id"><strong><?php echo e(__('Category')); ?></strong></label>
                    <select name="categories_id" class="form-control">
                        <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"
                                    <?php if($cat->id == $donation->categories_id): ?> selected <?php endif; ?>><?php echo e($cat->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date"><?php echo e(__('Deadline')); ?></label>
                    <input type="date" class="form-control" value="<?php echo e($donation->deadline); ?>" name="deadline">
                </div>
                <?php if(!empty(get_static_option('user_campaign_metadata_status'))): ?>
                <div class="form-group">
                    <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                    <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                           value="<?php echo e($donation->meta_tags); ?>" id="meta_tags">
                </div>
                <div class="form-group">
                    <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                    <textarea name="meta_description" class="form-control" rows="5"
                              ><?php echo e($donation->meta_description); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title"><?php echo e(__('Og Meta Title')); ?></label>
                    <input type="text" name="meta_title" value="<?php echo e($donation->meta_title); ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_description"><?php echo e(__('Og Meta Description')); ?></label>
                    <textarea name="meta_description" class="form-control" rows="5"
                              ><?php echo e($donation->meta_description); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="image"><?php echo e(__('Og Meta Image')); ?></label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            <?php echo render_attachment_preview_for_admin($donation->og_meta_image); ?>

                        </div>
                        <input type="hidden" name="og_meta_image" value="<?php echo e($donation->og_meta_image); ?>">
                        <button type="button" class="btn btn-info media_upload_form_btn"
                                data-btntitle="<?php echo e(__('Select Donation Image')); ?>"
                                data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal"
                                data-target="#media_upload_modal">
                            <?php echo e('Change Image'); ?>

                        </button>
                    </div>

                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="image"><?php echo e(__('Image')); ?></label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            <?php echo render_attachment_preview_for_admin($donation->image); ?>

                        </div>
                        <input type="hidden" name="image" value="<?php echo e($donation->image); ?>">
                        <button type="button" class="btn btn-info media_upload_form_btn"
                                data-btntitle="<?php echo e(__('Select Donation Image')); ?>"
                                data-modaltitle="<?php echo e(__('Upload Donation Image')); ?>" data-toggle="modal"
                                data-target="#media_upload_modal">
                            <?php echo e('Change Image'); ?>

                        </button>
                    </div>
                    <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                </div>
                <div class="form-group">
                    <label for="image"><?php echo e(__('Image Gallery')); ?></label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            <?php echo render_gallery_image_attachment_preview($donation->image_gallery); ?>

                        </div>
                        <input type="hidden" name="image_gallery" value="<?php echo e($donation->image_gallery); ?>">
                        <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true"
                                data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                data-toggle="modal" data-target="#media_upload_modal">
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
                                <textarea name="faq[description][]"
                                          class="form-control"><?php echo e($faq_items['description'][$loop->index] ?? ''); ?></textarea>
                            </div>
                            <div class="action-wrap">
                                <span class="add"><i class="fas fa-plus"></i></span>
                                <span class="remove"><i class="fas fa-trash"></i></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="all-field-wrap">
                            <div class="form-group">
                                <label for="faq"><?php echo e(__('Faq Title')); ?></label>
                                <input type="text" name="faq[title][]" class="form-control"
                                       placeholder="<?php echo e(__('faq title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="faq_desc"><?php echo e(__('Faq Description')); ?></label>
                                <textarea name="faq[description][]" class="form-control"
                                          placeholder="<?php echo e(__('faq description')); ?>"></textarea>
                            </div>
                            <div class="action-wrap">
                                <span class="add "><i class="fas fa-plus"></i></span>
                                <span class="remove"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <button id="update" type="submit"
                        class="btn btn-primary mt-3"><?php echo e(__('Update Campaign')); ?></button>
            </div>
        </div>
    </form>
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
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
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
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if ($('.summernote').length > 0) {
                    $('.summernote').each(function (index, value) {
                        $(this).summernote('code', $(this).data('content'));
                    });
                }
            });
        })(jQuery)
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
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

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/edit-campaign.blade.php ENDPATH**/ ?>