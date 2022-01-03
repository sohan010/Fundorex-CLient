<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Menu Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Menu Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.general.menu.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="menu_home"><?php echo e(__('Home')); ?></label>
                                <input type="text" name="menu_home" value="<?php echo e(get_static_option('menu_home')); ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="menu_recent_donation"><?php echo e(__('Recent donation')); ?></label>
                                <input type="text" name="menu_recent_donation" value="<?php echo e(get_static_option('menu_recent_donation')); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="menu_my_donation"><?php echo e(__('My Donation')); ?></label>
                                <input type="text" name="menu_my_donation" value="<?php echo e(get_static_option('menu_my_donation')); ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="menu_profile"><?php echo e(__('Profile')); ?></label>
                                <input type="text" name="menu_profile" value="<?php echo e(get_static_option('menu_profile')); ?>" class="form-control" >
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
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
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/backend/pages/menu/general-menu-settings.blade.php ENDPATH**/ ?>