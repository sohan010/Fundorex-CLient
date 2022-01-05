<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Search For: ')); ?> <?php echo e($search_term); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row pl-25 pr-15">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto CampaignMendesak pt-4">

            <?php if(empty($search_term)): ?>

                <div class="alert alert-warning">
                    <?php echo e(__('Please enter what you want to search..!')); ?>

                </div>
           <?php else: ?>

            <div class="scrolling-wrapper row mt-4 pb-4 pt-2 contentResponsive">
                <?php $__empty_1 = true; $__currentLoopData = $all_donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="alert alert-danger">
                        <?php echo e(__('Nothing found related to').' '.$search_term); ?>

                    </div>
                <?php endif; ?>
                <div class="col-lg-12 text-center my-5">
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        <?php echo e($all_donations->links()); ?>

                    </nav>
                </div>
            </div>
           <?php endif; ?>
        </div>
    </div>



























<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/donation-search.blade.php ENDPATH**/ ?>