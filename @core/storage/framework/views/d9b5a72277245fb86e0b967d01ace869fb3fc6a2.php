<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment Success For:'.' '.$donation_logs->cause->title)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="donation-success-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-success-area">
                        <h1 class="title"><?php echo e(get_static_option('donation_success_page_title')); ?></h1>
                        <p><?php echo e(get_static_option('donation_success_page_description')); ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="billing-title"><?php echo e(__('Donation Details')); ?></h2>
                    <ul class="billing-details">
                        <li><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($donation_logs->name); ?></li>
                        <li><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($donation_logs->email); ?></li>
                        <li><strong><?php echo e(__('Amount')); ?>:</strong> <?php echo e(amount_with_currency_symbol($donation_logs->amount)); ?></li>
                        <li><strong><?php echo e(__('Payment Method')); ?>:</strong>  <?php echo e(str_replace('_',' ',$donation_logs->payment_gateway)); ?></li>
                        <li><strong><?php echo e(__('Payment Status')); ?>:</strong> <?php echo e($donation_logs->status); ?></li>
                        <li><strong><?php echo e(__('Transaction id')); ?>:</strong> <?php echo e($donation_logs->transaction_id); ?></li>
                    </ul>
                    <div class="donation-wrap donation-success-page">
                        <div class="contribute-single-item">
                            <div class="thumb">
                                <?php echo render_image_markup_by_attachment_id($donation->image,'','grid'); ?>

                                <div class="thumb-content">
                                </div>
                            </div>
                            <div class="content">
                                <a href="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>"><h4 class="title"><?php echo e($donation->title); ?></h4></a>
                                <p><?php echo e(strip_tags(Str::words(strip_tags($donation->donation_content),20))); ?></p>
                                <div class="btn-wrapper">
                                    <a href="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>" class="boxed-btn"><?php echo e(get_static_option('donation_button_text')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-wrapper margin-top-40">
                        <?php if(auth()->guard('web')->check()): ?>
                            <div class="btn-wrapper">
                              <a href="<?php echo e(route('user.home')); ?>" class="boxed-btn reverse-color"><?php echo e(__('Go To Dashboard')); ?></a>
                            </div>
                        <?php else: ?>
                            <div class="btn-wrapper">
                            <a href="<?php echo e(url('/')); ?>" class="boxed-btn reverse-color"><?php echo e(__('Back To Home')); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/donations/donation-success.blade.php ENDPATH**/ ?>