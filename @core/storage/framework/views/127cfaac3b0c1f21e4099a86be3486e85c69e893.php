<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cancelled Of:'.' '.$donation_logs->cause->title)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="error-page-content padding-120 my-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                        <h1 class="title"><?php echo e(get_static_option('donation_cancel_page_title')); ?></h1>
                        <p>
                            <?php echo e(get_static_option('donation_cancel_page_description')); ?>

                        </p>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(url('/')); ?>" class="boxed-btn reverse-color"><?php echo e(__('Back To Home')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/donation-cancel.blade.php ENDPATH**/ ?>