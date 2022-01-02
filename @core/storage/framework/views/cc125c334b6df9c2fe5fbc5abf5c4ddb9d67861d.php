<div class="client-area-two padding-bottom-115">
    <div class="container">
        <div class="client-slider d-flex align-items-center">
            <?php $__currentLoopData = $all_client_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-slider">
                    <div class="slider-thumb">
                        <a href="<?php echo e($data->url); ?>" data-toggle="tooltip" data-title="<?php echo e($data->title); ?>">  <?php echo render_image_markup_by_attachment_id($data->image); ?> </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/partials/client-area.blade.php ENDPATH**/ ?>