<div class="blog-classic-item-01 margin-bottom-60">
    <div class="thumbnail">
        <?php echo render_image_markup_by_attachment_id($image); ?>

    </div>
    <div class="content-wrapper">
        <div class="news-date">
            <h5 class="title"><?php echo e(date('d',strtotime($date))); ?></h5>
            <span><?php echo e(date('M',strtotime($date))); ?></span>
        </div>
        <div class="content">
            <ul class="post-meta">
                <li><a href="<?php echo e(route('frontend.blog.single',$slug)); ?>">By <span><?php echo e(($author) ?? __("Anonymous")); ?></span></a></li>
                <li class="cats"><i class="fas fa-microchip"></i>
                    <?php echo get_blog_category_by_id($catid,'link'); ?>

                </li>
            </ul>
            <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',$slug)); ?>"><?php echo e($title ?? ''); ?></a></h4>

        </div>
    </div>
    <div class="blog-bottom">
        <p><?php echo Str::words(purify_html_raw($content),80); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.blog.single',$slug)); ?>" class="boxed-btn reverse-color"><?php echo e(get_static_option('blog_page_read_more_btn_text')); ?></a>
        </div>
    </div>
</div><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/components/frontend/blog/list01.blade.php ENDPATH**/ ?>