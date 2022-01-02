<?php if(get_static_option('home_page_navbar_button_status')): ?>
    <?php
        $button_url =  !empty(filter_static_option_value('home_page_navbar_button_url',$global_static_field_data)) ? filter_static_option_value('home_page_navbar_button_url',$global_static_field_data) : route('frontend.campaign.user');
    ?>
    <li id="donate"><a href="<?php echo e($button_url); ?>"><?php echo e(filter_static_option_value('home_page_navbar_button_title',$global_static_field_data)); ?></a></li>
<?php endif; ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/components/front-donate-btn-last-three-home.blade.php ENDPATH**/ ?>