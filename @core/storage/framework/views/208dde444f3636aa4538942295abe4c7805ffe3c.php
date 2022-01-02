<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment Success For:'.' '.$attendance_details->event_name)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="event-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-success-area margin-bottom-50">
                        <h1 class="title"><?php echo e(get_static_option('event_success_page_title')); ?></h1>
                        <p><?php echo e(get_static_option('event_success_page_description')); ?></p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h2 class="billing-title"><?php echo e(__('Billing Details')); ?></h2>
                    <ul class="billing-details">
                        <li><strong><?php echo e(__('Attendance ID')); ?>:</strong> #<?php echo e($payment_log->id); ?></li>
                        <li><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($payment_log->name); ?></li>
                        <li><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($payment_log->email); ?></li>
                        <li><strong><?php echo e(__('Payment Method')); ?>:</strong> <?php echo e(str_replace('_',' ',$payment_log->package_gateway)); ?></li>
                        <li><strong><?php echo e(__('Payment Status')); ?>:</strong> <?php echo e($payment_log->status); ?></li>
                        <li><strong><?php echo e(__('Transaction id')); ?>:</strong> <?php echo e($payment_log->transaction_id); ?></li>
                    </ul>


                    <div class="event-single-wrap  margin-top-40">
                        <div class="events-single-item bg-image margin-bottom-30"<?php echo render_background_image_markup_by_attachment_id(get_static_option('event_page_bg_image')); ?>">
                        <div class="thumb">
                            <div class="bg-image"
                                    <?php echo render_background_image_markup_by_attachment_id($event_details->image,'','grid'); ?> >
                                <div class="post-time">
                                    <h5 class="title"><?php echo e(date('d',strtotime($event_details->date))); ?></h5>
                                    <span><?php echo e(date('M',strtotime($event_details->date))); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrapper">
                            <div class="content">
                                <a href="<?php echo e(route('frontend.events.single',$event_details->slug)); ?>">
                                    <h4 class="title"><?php echo e($event_details->title ?? ''); ?></h4></a>
                                <ul class="info-items-03">
                                    <li><a href="<?php echo e(route('frontend.events.single',$event_details->slug)); ?>"><i class="far fa-clock"></i><?php echo e($event_details->time); ?></a></li>
                                    <li><a href="<?php echo e(route('frontend.events.single',$event_details->slug)); ?>"><i class="fas fa-map-marker-alt"></i><?php echo e($event_details->venue_location ?? ''); ?></a></li>
                                </ul>
                                <div class="events-btn-wrapper">
                                    <a href="<?php echo e(route('frontend.events.single',$event_details->slug)); ?>" class="book-btn"><?php echo e(get_static_option('event_page_button_text')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="btn-wrapper margin-top-40">
                    <?php if(auth()->guard('web')->check()): ?>
                        <a href="<?php echo e(route('user.home')); ?>" class="boxed-btn reverse-color"><?php echo e(__('Go To Dashboard')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/')); ?>" class="boxed-btn reverse-color"><?php echo e(__('Back To Home')); ?></a>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/events/attendance-success.blade.php ENDPATH**/ ?>