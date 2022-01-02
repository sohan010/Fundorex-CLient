<?php if(get_static_option('home_page_navbar_button_status')): ?>
<?php
    $button_url =  !empty(filter_static_option_value('home_page_navbar_button_url',$global_static_field_data)) ? filter_static_option_value('home_page_navbar_button_url',$global_static_field_data) : route('frontend.campaign.user');
?>
<a href="<?php echo e($button_url); ?>">
    <div class="info-bar-item
        <?php if(isset($home) && $home == '02'): ?> style-01 <?php endif; ?>
        <?php if(isset($home) && $home == '03'): ?> style-02 <?php endif; ?>
            ">
        <div class="icon">
            <i class="<?php echo e(filter_static_option_value('home_page_navbar_button_icon',$global_static_field_data)); ?>"></i>
        </div>
        <div class="content">
            <span class="title"><?php echo e(filter_static_option_value('home_page_navbar_button_subtitle',$global_static_field_data)); ?></span>
            <p class="details"> <?php echo e(filter_static_option_value('home_page_navbar_button_title',$global_static_field_data)); ?></p>
        </div>
    </div>
</a>
<?php endif; ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/components/front-donate-btn.blade.php ENDPATH**/ ?>