<html>
<head>
    <?php echo load_google_fonts(); ?>

    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>

    <title> <?php echo e(get_static_option('site_title')); ?>

        - <?php echo e(get_static_option('site_tag_line')); ?></title>
    <script src="<?php echo e(asset('assets/common/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/jquery-migrate-3.3.2.min.js')); ?>"></script>
</head>
<body>
<div class="stripe-payment-wrapper">
    <div class="srtipe-payment-inner-wrapper">
        <form action="<?php echo e($razorpay_data['route']); ?>" method="POST" >
            <!-- Note that the amount is in paise = 50 INR -->
            <input type="hidden" name="order_id" value="<?php echo e($razorpay_data['order_id']); ?>" />
        <?php
            $site_logo = get_attachment_image_by_id(get_static_option('site_logo'), "full", false);
            $image_url = isset($site_logo['img_url']) ? $site_logo['img_url'] : '';
        ?>
        <!--amount need to be in paisa-->
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="<?php echo e(get_static_option('razorpay_key')); ?>"
                    data-currency="<?php echo e($razorpay_data['currency']); ?>"
                    data-amount="<?php echo e($razorpay_data['price'] * 100); ?>"
                    data-buttontext="<?php echo e('Pay '.$razorpay_data['price'].' INR'); ?>"
                    data-name="<?php echo e($razorpay_data['title']); ?>"
                    data-description="<?php echo e($razorpay_data['description']); ?>"
                    data-image="<?php echo e($image_url); ?>"
                    data-prefill.name=""
                    data-prefill.email=""
                    data-theme.color="<?php echo e(get_static_option('site_color')); ?>">
            </script>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        </form>
    </div>
</div>

<script>
    (function($){
    "use strict";

    // Create a Stripe client
        var submitBtn = $('input[type="submit"]');
        $(document).ready(function (){
            submitBtn.trigger('click');
            submitBtn.val("<?php echo e(__('Do not close or reload the page...')); ?>");
            submitBtn.css({
                'background-color' : 'red',
                'color' : '#fff',
                'border' : 'none',
                'padding' : '5px',
            })
        });

    })(jQuery);
</script>
</body>
</html>
<?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/payment/razorpay.blade.php ENDPATH**/ ?>