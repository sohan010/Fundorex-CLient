<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('career_with_us_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('career_with_us_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('career_with_us_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('career_with_us_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $all_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-12">
                                <div class="single-job-list-item">
                                    <span class="job_type"><i class="far fa-clock"></i> <?php echo e(__(str_replace('_',' ',$data->employment_status))); ?></span>
                                    <a href="<?php echo e(route('frontend.jobs.single',$data->slug)); ?>"><h3 class="title"><?php echo e($data->title); ?></h3></a>
                                    <span class="company_name"><strong><?php echo e(__('Company:')); ?></strong> <?php echo e($data->company_name); ?></span>
                                    <span class="deadline"><strong><?php echo e(__('Deadline:')); ?></strong> <?php echo e(date("d M Y", strtotime($data->deadline))); ?></span>
                                    <ul class="jobs-meta">
                                        <li><i class="fas fa-briefcase"></i> <?php echo e($data->position); ?></li>
                                        <li><i class="fas fa-wallet"></i> <?php echo e($data->salary); ?></li>
                                        <li><i class="fas fa-map-marker-alt"></i> <?php echo e($data->job_location); ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-lg-12">
                                <div class="alert alert-warning d-block"><?php echo e(__('No Job Posts Found')); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12 text-center">
                        <nav class="pagination-wrapper " aria-label="Page navigation ">
                            <?php echo e($all_jobs->links()); ?>

                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <?php echo render_frontend_sidebar('job',['column' => false]); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/jobs/jobs.blade.php ENDPATH**/ ?>