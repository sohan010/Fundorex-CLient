<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('New Donation')); ?>

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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
       <div class="headerbtn-wrap d-flex justify-content-between margin-bottom-50">
           <h3 class="header-title"><?php echo e(__('Create New Campaign')); ?></h3>
           <a href="<?php echo e(route('user.campaign.all')); ?>" class="btn btn-info"><?php echo e(__('All Campaign List')); ?></a>
       </div>
        <form action="<?php echo e(route('user.campaign.new')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="title"><?php echo e(__('Title')); ?></label>
                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="<?php echo e(__('Title')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="slug"><?php echo e(__('Slug')); ?></label>
                        <input type="text" class="form-control"  id="slug" name="slug" value="<?php echo e(old('slug')); ?>" placeholder="<?php echo e(__('slug')); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('Content')); ?></label>
                        <input type="hidden" name="cause_content" >
                        <div class="summernote"></div>
                    </div>
                    <div class="form-group">
                        <label for="amount"><?php echo e(__('Amount')); ?></label>
                        <input type="number" class="form-control"  name="amount" placeholder="<?php echo e(__('amount')); ?>"  value="<?php echo e(old('amount')); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="excerpt"><?php echo e(__('Excerpt')); ?></label>
                        <textarea class="form-control" name="excerpt" rows="5" placeholder="<?php echo e(__('expert')); ?>"></textarea>
                        <small class="info-text"><?php echo e(__('a short brief about campaign')); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="categories_id"><strong><?php echo e(__('Category')); ?></strong></label>
                        <select name="categories_id" class="form-control">
                            <option value=""><?php echo e(__('Select Category')); ?></option>
                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date"><?php echo e(__('Deadline')); ?></label>
                        <input type="date" class="form-control" placeholder="<?php echo e(__('Deadline')); ?>" name="deadline" value="<?php echo e(old('deadline')); ?>">
                    </div>
                    <?php if(!empty(get_static_option('user_campaign_metadata_status'))): ?>
                    <div class="form-group">
                        <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                        <input type="text" name="meta_title"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput"  id="meta_tags">
                    </div>
                    <div class="form-group">
                        <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                        <textarea name="meta_description"  class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title"><?php echo e(__('Og Meta Title')); ?></label>
                        <input type="text" name="og_meta_title"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_description"><?php echo e(__('Og Meta Description')); ?></label>
                        <textarea name="og_meta_description"  class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image"><?php echo e(__('OG Meta Image')); ?></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="og_meta_image">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                <?php echo e(__('Upload Image')); ?>

                            </button>
                        </div>
                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="image"><?php echo e(__('Image')); ?></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                <?php echo e(__('Upload Image')); ?>

                            </button>
                        </div>
                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="image"><?php echo e(__('Image Gallery')); ?></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image_gallery">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                <?php echo e(__('Upload Images')); ?>

                            </button>
                        </div>
                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="image"><?php echo e(__('Medical Documents')); ?></label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="medical_document">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                <?php echo e(__('Upload Document')); ?>

                            </button>
                        </div>
                        <small><?php echo e(__('Recommended image size 1920x1280')); ?></small>
                    </div>
                    <div class="iconbox-repeater-wrapper">
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
                                <span class="add btn btn-success btn-sm"><i class="fas fa-plus"></i></span>
                                <span class="remove btn btn-danger btn-sm"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    </div>

                    <button id="submit" type="submit" class="btn btn-primary mt-3"><?php echo e(__('Publish Campaign')); ?></button>
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
    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.4.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
           
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

                $('.summernote').summernote({
                    height: 400,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
            });
        })(jQuery);
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

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/new-campaign.blade.php ENDPATH**/ ?>