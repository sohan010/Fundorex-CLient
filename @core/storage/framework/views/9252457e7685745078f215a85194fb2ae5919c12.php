<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('donation_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donation_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donation_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="donation-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $all_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.donation.grid','data' => ['featured' => $data->featured,'image' => $data->image,'amount' => $data->amount,'raised' => $data->raised,'slug' => $data->slug,'title' => $data->title,'excerpt' => $data->excerpt,'buttontext' => get_static_option('donation_button_text')]]); ?>
<?php $component->withName('frontend.donation.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['featured' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->featured),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'amount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->amount),'raised' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->raised),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title),'excerpt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->excerpt),'buttontext' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('donation_button_text'))]); ?>
                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-lg-12">
                        <div class="alert alert-warning d-block"><?php echo e(__('No Causes Associated with this Category')); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/donation-category.blade.php ENDPATH**/ ?>