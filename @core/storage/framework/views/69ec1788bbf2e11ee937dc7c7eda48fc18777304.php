<?php $__env->startSection('site-title'); ?>
   <?php echo e(__('Pre PaymentPage')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Pre PaymentPage')); ?>

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

                <div class="rise-flex-contents">
                    <div class="single-donate margin-bottom-30">
                        <h2 class="title"> <?php echo get_static_option('home_page_05_rise_area_heading_title'); ?> </h2>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <div class="nice-selects">
                            <select id="donation_select">
                                <?php $__currentLoopData = $all_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($donation->id); ?>" data-url="<?php echo e(route('frontend.donation.in.separate.page',$donation->id)); ?>"> <?php echo e(\Illuminate\Support\Str::words($donation->title,4)); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <input class="form-control user_input_number" type="number" value="200">
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <button type="submit" class="boxed-btn donate-btn donation_redirect_button"> <?php echo e(__('Donate')); ?> </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /detail -->


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('click','.donation_redirect_button',function(e){
            e.preventDefault();
            var select = $('#donation_select');
            var donationId = select.val();
            var paymentPageUrl = $('#donation_select option[value="'+donationId+'"]').data('url');
            var amount = $('.user_input_number').val();
            window.location = paymentPageUrl+'?number='+amount;
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/pre-payment-page.blade.php ENDPATH**/ ?>