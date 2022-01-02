<?php
    $home_page_variant = isset($home_page) ? $home_page : get_static_option('home_page_variant');
?>

<div class="header-style-01  header-variant-<?php echo e($home_page_variant); ?> <?php if(request()->path() !== '/'): ?> inner-page <?php endif; ?>">
    <div class="header-style-01">
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-inner">
                            <div class="left-contnet">
                                <ul class="info-items">
                                    <?php
                                        $all_icon_fields =  filter_static_option_value('home_page_01_topbar_info_list_icon_icon',$global_static_field_data);
                                        $all_icon_fields =  !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                                        $all_title_fields = filter_static_option_value('home_page_01_topbar_info_list_text',$global_static_field_data);
                                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                                    ?>
                                    <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="<?php echo e($icon); ?>"></i> <?php echo e(isset($all_title_fields[$index]) ? $all_title_fields[$index] : ''); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="right-contnet">
                                <div class="social-link">
                                    <ul>
                                        <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="volunteer-right">
                                    <ul class="info-items-02">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.front-user-login-li','data' => []]); ?>
<?php $component->withName('front-user-login-li'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-02">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="<?php echo e(url('/')); ?>" class="logo">
                            <?php if(!empty(filter_static_option_value('site_logo',$global_static_field_data))): ?>
                                <?php echo render_image_markup_by_attachment_id(filter_static_option_value('site_logo',$global_static_field_data)); ?>

                            <?php else: ?>
                                <h2 class="site-title"><?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?></h2>
                            <?php endif; ?>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                         <?php echo render_frontend_menu($primary_menu); ?>

                    </ul>
                </div>
                <?php if(!empty(filter_static_option_value('home_page_navbar_button_status',$global_static_field_data))): ?>
                <div class="nav-right-content">
                    <ul>
                        <li>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.front-donate-btn','data' => []]); ?>
<?php $component->withName('front-donate-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/partials/navbar.blade.php ENDPATH**/ ?>