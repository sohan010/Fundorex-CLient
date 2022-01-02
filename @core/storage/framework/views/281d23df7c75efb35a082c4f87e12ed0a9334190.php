<?php if(request()->routeIs('homepage')): ?>
    <meta property="og:title"  content="<?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?>" />
    <?php echo render_og_meta_image_by_attachment_id(filter_static_option_value('og_meta_image_for_site',$global_static_field_data)); ?>

<?php endif; ?>

<?php if(request()->is([
        filter_static_option_value('blog_page_slug',$global_static_field_data).'/*',
        'p/*',
        filter_static_option_value('about_page_slug',$global_static_field_data),
        filter_static_option_value('team_page_slug',$global_static_field_data),
        filter_static_option_value('faq_page_slug',$global_static_field_data),
        get_static_option('donor_page_name',$global_static_field_data),
        get_static_option('testimonial_page_name',$global_static_field_data),
        get_static_option('image_gallery_page_slug',$global_static_field_data),
        get_static_option('faq_page_name',$global_static_field_data),
        get_static_option('team_page_name',$global_static_field_data),
        get_static_option('donation_page_slug',$global_static_field_data),
        get_static_option('donation_page_slug',$global_static_field_data).'/*',
        get_static_option('events_page_slug',$global_static_field_data),
        get_static_option('events_page_slug',$global_static_field_data).'/*',
        get_static_option('contact_page_slug',$global_static_field_data),
        filter_static_option_value('blog_page_slug',$global_static_field_data),
        filter_static_option_value('blog_page_slug',$global_static_field_data).'/*',
        filter_static_option_value('career_with_us_page_slug',$global_static_field_data),
        filter_static_option_value('career_with_us_page_slug',$global_static_field_data).'/*',
        filter_static_option_value('events_page_slug',$global_static_field_data).'/*',
    ])): ?>
    <title><?php echo $__env->yieldContent('site-title'); ?> - <?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?> </title>
     <?php echo $__env->yieldContent('og-meta'); ?>
<?php else: ?>
    <title><?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?> - <?php echo e(filter_static_option_value('site_tag_line',$global_static_field_data)); ?></title>
<?php endif; ?>
<?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/partials/og-meta.blade.php ENDPATH**/ ?>