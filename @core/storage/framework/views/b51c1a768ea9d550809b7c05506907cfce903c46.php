<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Site Identity')); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("Site Identity Settings")); ?></h4>
                        <form action="<?php echo e(route('admin.general.site.identity')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="site_logo"><strong><?php echo e(__('Site Logo')); ?></strong></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $blog_img = get_attachment_image_by_id(get_static_option('site_logo'),null,true);
                                            $blog_image_btn_label = 'Upload Image';
                                        ?>
                                        <?php if(!empty($blog_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($blog_img['img_url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $blog_image_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="site_logo" name="site_logo" value="<?php echo e(get_static_option('site_logo')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Site Logo Image')); ?>" data-modaltitle="<?php echo e(__('Upload Site Logo Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($blog_image_btn_label)); ?>

                                    </button>
                                </div>
                                <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="site_white_logo"><strong><?php echo e(__('White Site Logo')); ?></strong></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $site_white_logo = get_attachment_image_by_id(get_static_option('site_white_logo'),null,true);
                                            $site_white_logo_btn_label = 'Upload Image';
                                        ?>
                                        <?php if(!empty($site_white_logo)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($site_white_logo['img_url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $site_white_logo_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="site_white_logo" name="site_white_logo" value="<?php echo e(get_static_option('site_white_logo')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Site Logo Image')); ?>" data-modaltitle="<?php echo e(__('Upload Site Logo Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($site_white_logo_btn_label)); ?>

                                    </button>
                                </div>
                                <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="site_favicon"><?php echo e(__('Favicon')); ?></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),null,true);
                                            $site_favicon_btn_label = 'Upload Image';
                                        ?>
                                        <?php if(!empty($site_favicon)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($site_favicon['img_url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $site_favicon_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="site_favicon" name="site_favicon" value="<?php echo e(get_static_option('site_favicon')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Site Favicon Image')); ?>" data-modaltitle="<?php echo e(__('Upload Site Favicon Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($site_favicon_btn_label)); ?>

                                    </button>
                                </div>
                                <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 40x40')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="site_favicon"><?php echo e(__('Breadcrumb Image')); ?></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $site_breadcrumb_bg = get_attachment_image_by_id(get_static_option('site_breadcrumb_bg'),null,true);
                                            $site_breadcrumb_bg_btn_label = 'Upload Breadcrumb Image';
                                        ?>
                                        <?php if(!empty($site_breadcrumb_bg)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($site_breadcrumb_bg['img_url']); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php  $site_breadcrumb_bg_btn_label = 'Change Breadcrumb Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" id="site_breadcrumb_bg" name="site_breadcrumb_bg" value="<?php echo e(get_static_option('site_breadcrumb_bg')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Site Breadcrumb Image')); ?>" data-modaltitle="<?php echo e(__('Upload Site Breadcrumb Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($site_breadcrumb_bg_btn_label)); ?>

                                    </button>
                                </div>
                                <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png, Recommended image size 1920x600')); ?></small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
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
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/backend/general-settings/site-identity.blade.php ENDPATH**/ ?>