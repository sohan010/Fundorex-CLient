<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('events_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('events_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('events_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('events_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php $__currentLoopData = $all_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="events-single-item bg-image margin-bottom-30"<?php echo render_background_image_markup_by_attachment_id(get_static_option('event_page_bg_image')); ?>">
                            <div class="thumb">
                                <div class="bg-image"
                                    <?php echo render_background_image_markup_by_attachment_id($data->image,'','grid'); ?> >
                                    <div class="post-time">
                                        <h5 class="title"><?php echo e(date('d',strtotime($data->date))); ?></h5>
                                        <span><?php echo e(date('M',strtotime($data->date))); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content">
                                    <a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>">
                                        <h4 class="title"><?php echo e($data->title ?? ''); ?></h4></a>
                                    <ul class="info-items-03">
                                        <li><a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>"><i class="far fa-clock"></i><?php echo e($data->time); ?></a></li>
                                        <li><a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>"><i class="fas fa-map-marker-alt"></i><?php echo e($data->venue_location ?? ''); ?></a></li>
                                    </ul>
                                    <div class="events-btn-wrapper">
                                        <a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>" class="book-btn"><?php echo e(get_static_option('event_page_button_text')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12 text-center">
                        <nav class="pagination-wrapper " aria-label="Page navigation ">
                            <?php echo e($all_events->links()); ?>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <?php echo render_frontend_sidebar('event',['column' => false]); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/events/event.blade.php ENDPATH**/ ?>