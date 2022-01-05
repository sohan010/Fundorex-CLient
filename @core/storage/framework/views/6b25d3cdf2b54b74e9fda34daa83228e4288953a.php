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
<form method="POST" action="<?php echo e($paystack_data['route']); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
    <?php echo csrf_field(); ?>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <input type="hidden" name="name" value="<?php echo e($paystack_data['name']); ?>">
            <input type="hidden" name="email" value="<?php echo e($paystack_data['email']); ?>"> 
            <input type="hidden" name="order_id" value="<?php echo e($paystack_data['order_id']); ?>">
            <input type="hidden" name="orderID" value="<?php echo e($paystack_data['order_id']); ?>">
            <input type="hidden" name="amount" value="<?php echo e($paystack_data['price'] * 100); ?>"> 
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="<?php echo e($paystack_data['currency']); ?>">
            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['track' => $paystack_data['track'],'type' => $paystack_data['type']])); ?>" > 
            <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
            <p>
                <button id="submit_btn" type="submit" ><?php echo e(__('Redirecting..')); ?></button>
            </p>
        </div>
    </div>
</form>

<script>
    (function($){
    "use strict";
        var submitBtn = $('#submit_btn');
        $(document).ready(function (){
            submitBtn.trigger('click');
            submitBtn.text("<?php echo e(__('Do not close or reload the page...')); ?>");
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
<?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/payment/paystack.blade.php ENDPATH**/ ?>