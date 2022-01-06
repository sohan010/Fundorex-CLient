<div class="single-blog-grid-01">
    <div class="thumb">
        <?php echo render_image_markup_by_attachment_id($image,'grid'); ?>

    </div>
    <div class="content-wrapper">
        <div class="news-date">
            <h5 class="title"><?php echo e(date_format($date,'d')); ?></h5>
            <span><?php echo e(date_format($date,'y')); ?></span>
        </div>
        <div class="content">
            <ul class="post-meta">
                <li><?php echo e(__('By')); ?> <?php echo e($author ?? __('Anonymous')); ?></li>
                <li>
                    <?php echo get_blog_category_by_id($catid,'link'); ?>

                </li>
            </ul>
            <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',$slug)); ?>"><?php echo e($title); ?></a></h4>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/components/frontend/blog/grid01.blade.php ENDPATH**/ ?>