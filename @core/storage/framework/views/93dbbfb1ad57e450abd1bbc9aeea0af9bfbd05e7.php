<div class="contribute-single-item">
    <div class="thumb">
        <?php if($featured === 'on'): ?>
            <span class="badge"><i class="fas fa-bookmark"></i></span>
        <?php endif; ?>
        <?php echo render_image_markup_by_attachment_id($image,'','grid'); ?>

    </div>
    <div class="content">
        <div class="progress-content">
            <div class="progress-item">
                <div class="single-progressbar">
                    <div class="donation-progress" data-percentage="<?php echo e(get_percentage($amount,$raised)); ?>"></div>
                </div>
            </div>
            <div class="goal">
                <h4 class="raised"><?php echo e(__('Raised')); ?>: <?php echo e(amount_with_currency_symbol($raised ?? 0 )); ?></h4>
                <h4 class="raised"><?php echo e(__('Goal')); ?>: <?php echo e(amount_with_currency_symbol($amount)); ?></h4>
            </div>
        </div>
        <h3 class="title">
            <a href="<?php echo e(route('frontend.donations.single',$slug)); ?>"><?php echo e($title); ?></a>
        </h3>
        <div class="excpert">
            <?php echo e($excerpt); ?>

        </div>
        <div class="btn-wrapper margin-top-30">
            <a href="<?php echo e(route('frontend.donations.single',$slug)); ?>" class="boxed-btn"><?php echo e($buttontext); ?></a>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/components/frontend/donation/grid.blade.php ENDPATH**/ ?>