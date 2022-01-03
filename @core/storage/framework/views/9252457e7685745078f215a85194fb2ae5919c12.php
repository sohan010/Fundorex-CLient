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


    <div class="row pl-25 pr-15">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto CampaignMendesak pt-4">
            <div class="scrolling-wrapper row mt-4 pb-4 pt-2 contentResponsive">


                <?php if(count($all_donations_categories) < 1): ?>
                    <div class="col-lg-12">
                        <div class="alert alert-warning d-block"><?php echo e(__('No Causes Associated with this Category')); ?></div>
                    </div>
                <?php else: ?>
                <?php $__currentLoopData = $all_donations_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6 float-start p-3px">
                        <div class="card">
                            <?php echo render_image_markup_by_attachment_id($data->image); ?>

                            <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>"><span class="judulCampaignMendesak"><?php echo e($data->title ?? __('No Title')); ?></span></a>
                            <p>Terkumpul</p>
                            <div class="progress-content">
                            <span class="padding-progressbar">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </span>

                                <div class="progress-item">
                                    <div class="single-progressbar">
                                        <div class="donation-progress" data-percentage="<?php echo e(get_percentage($data->amount,$data->raised)); ?>"></div>
                                    </div>
                                </div>

                                <div class="goal">
                                    <h4 class="raised"><?php echo e(__('Raised')); ?>: <?php echo e(amount_with_currency_symbol($data->raised ?? 0 )); ?></h4>
                                    <h4 class="raised"><?php echo e(__('Goal')); ?>: <?php echo e(amount_with_currency_symbol($data->amount)); ?></h4>
                                </div>
                            </div>

                            <div class="footer-CampaignMendesak"><span class="text-start">1000 donatur</span><span class="text-end">10 hari lagi</span></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/donation-category.blade.php ENDPATH**/ ?>