<style>
    :root {
        --main-color-one: <?php echo e(filter_static_option_value('site_color',$global_static_field_data)); ?>;
        --main-color-two: <?php echo e(filter_static_option_value('site_main_color_two',$global_static_field_data)); ?>;
        --portfolio-color: <?php echo e(filter_static_option_value('portfolio_home_color',$global_static_field_data)); ?>;
        --logistic-color: <?php echo e(filter_static_option_value('logistics_home_color',$global_static_field_data)); ?>;
        --industry-color: <?php echo e(filter_static_option_value('industry_home_color',$global_static_field_data)); ?>;
        --secondary-color: <?php echo e(filter_static_option_value('site_secondary_color',$global_static_field_data)); ?>;
        --heading-color: <?php echo e(filter_static_option_value('site_heading_color',$global_static_field_data)); ?>;
        --paragraph-color: <?php echo e(filter_static_option_value('site_paragraph_color',$global_static_field_data)); ?>;
        --construction-color: <?php echo e(filter_static_option_value('construction_home_color',$global_static_field_data)); ?>;
        <?php $heading_font_family = !empty(filter_static_option_value('heading_font',$global_static_field_data)) ? filter_static_option_value('heading_font_family',$global_static_field_data) :  filter_static_option_value('body_font_family',$global_static_field_data) ?>
--heading-font: "<?php echo e($heading_font_family); ?>",sans-serif;
        --body-font:"<?php echo e(filter_static_option_value('body_font_family',$global_static_field_data)); ?>",sans-serif;
    }
</style><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/partials/css-variable.blade.php ENDPATH**/ ?>