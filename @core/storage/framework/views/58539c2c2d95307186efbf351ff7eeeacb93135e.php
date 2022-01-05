<?php $__env->startSection('site-title'); ?>
   <?php echo e(__('All Donor Information')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
   <?php echo e(__('All Donor Information')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donation_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donation_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="contatiner">
       <div class="d-block">
           <a href="<?php echo e(url('/')); ?>" class="btn btn-primary ml-2 mt-3">
               Go Back
           </a>
       </div>
        <!-- detail -->
        <div class="row mb-100 pt-4 pl-25 pr-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">

                <div class="col text-center textDonatur mb-50">
                    Donatur
                </div>

                <div id="Donatur">
                    <?php if(count($all_donors) < 1): ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning d-block"><?php echo e(__('No Donor Found')); ?></div>
                        </div>
                    <?php else: ?>
                        <?php $__currentLoopData = $all_donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12">
                                <img src="<?php echo e(asset('assets/frontend/img/donatur1.png')); ?>" class="img-circle float-start" alt="Donasi - Donatur">
                                <span class="float-start"><?php echo e($donor->name); ?></span>
                                <span class="float-end"><?php echo e(amount_with_currency_symbol($donor->amount)); ?></span>
                                <p class="testimoniDonatur"><?php echo e(optional($donor->cause)->title); ?>

                                    <br><?php echo e($donor->created_at->diffForHUmans()); ?></p>
                                  <hr>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                            <div class="col md-12 my-5">
                                <?php echo e($all_donors->links()); ?>

                            </div>
                </div>

            </div>
        </div>
        <!-- /detail -->


    </div>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/all-donor.blade.php ENDPATH**/ ?>