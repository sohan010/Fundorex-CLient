<?php
    $home_page_variant = $home_page ?? get_static_option('home_page_variant');
?>
<div class="header-style-01  home-page-variant-<?php echo e($home_page_variant); ?>">
    <div class="topbar-area style-02 home-page-six">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topbar-inner style-01 home-six-topbar">
                        <div class="left-contnet">
                            <ul class="info-items">
                                <?php
                                    $all_icon_fields =  filter_static_option_value('home_page_01_topbar_info_list_icon_icon',$global_static_field_data);
                                    $all_icon_fields =  !empty($all_icon_fields) ? unserialize($all_icon_fields,['class' => false]) : [];
                                    $all_title_fields = filter_static_option_value('home_page_01_topbar_info_list_text',$global_static_field_data);
                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields,['class' => false]) : [];
                                ?>
                                <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="<?php echo e($icon); ?> "></i> <?php echo e(isset($all_title_fields[$index]) ? $all_title_fields[$index] : ''); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="right-contnet">
                            <div class="social-link">
                                <ul>
                                    <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($data->url); ?>"><i class="<?php echo e($data->icon); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <nav class="navbar navbar-area navbar-expand-lg charity-nav-06 has-topbar has-topbar-04 nav-style-02">
        <div class="container-fluid nav-container">
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
            <div class="nav-right-content">
                <ul>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.front-donate-btn-last-three-home','data' => []]); ?>
<?php $component->withName('front-donate-btn-last-three-home'); ?>
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
    </nav>

</div>

<?php if(get_static_option('home_page_header_slider_area_06_section_status')): ?>
<div class="header-slider-new">
    <?php
        $all_title_fields = get_static_option('home_page_06_header_area_title');
        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];

        $all_sub_fields = get_static_option('home_page_06_header_area_subtitle');
        $all_sub_fields = !empty($all_sub_fields) ? unserialize($all_sub_fields) : [];

        $all_donate_button_title_fields = get_static_option('home_page_06_header_area_donate_button_title');
        $all_donate_button_title_fields = !empty($all_donate_button_title_fields) ? unserialize($all_donate_button_title_fields) : [];

        $all_donate_button_title_url_fields = get_static_option('home_page_06_header_area_donate_button_url');
        $all_donate_button_title_url_fields = !empty($all_donate_button_title_url_fields) ? unserialize($all_donate_button_title_url_fields) : [];

        $all_read_more_button_title_fields = get_static_option('home_page_06_header_area_read_more_button_title');
        $all_read_more_button_title_fields = !empty($all_read_more_button_title_fields) ? unserialize($all_read_more_button_title_fields) : [];

        $all_read_more_button_title_url_fields =  get_static_option('home_page_06_header_area_read_more_button_url');
        $all_read_more_button_title_url_fields = !empty($all_read_more_button_title_url_fields) ? unserialize($all_read_more_button_title_url_fields) : [];

        $all_image_fields =  get_static_option('home_page_06_header_area_image');
        $all_image_fields = !empty($all_image_fields) ? unserialize($all_image_fields,['class' => false]) : [];
        $home_page_06_header_area_donation =  get_static_option('home_page_06_header_area_donation');
        $home_page_06_header_area_donation = !empty($home_page_06_header_area_donation) ? unserialize($home_page_06_header_area_donation,['class' => false]) : [''];


    ?>

    <?php $__currentLoopData = $all_title_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="header-area inner-padding header-bg-05" <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_page_06_header_area_bg_image')); ?>>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-12 order-2 order-xl-1">
                    <div class="banner-contents-slider">
                        <div class="header-inner-02 header-inner-04 header-inner-06">
                            <p class="animate-style-02"><?php echo e($title); ?></p>
                            <?php
                                $donation_cause_id = $home_page_06_header_area_donation[$loop->index] ?? '';
                                $donation_cause = \App\Cause::find($donation_cause_id);
                                $content = $all_sub_fields[$key];
                                $subExplode = explode(' ',$content);
                                $lastWord = array_pop($subExplode);
                                $first_word = implode(' ',$subExplode);
                            ?>

                            <h1 class="title animate-style"><?php echo e($first_word ?? ''); ?><span><?php echo e($lastWord ?? ''); ?></span></h1>

                            <?php if(!empty($donation_cause_id)): ?>
                            <div class="progress-wrapper">
                                 <div class="progress-item">
                                    <div class="single-progressbar">
                                        <div class="donation-progress" data-percentage="<?php echo e(get_percentage($donation_cause->amount,$donation_cause->raised)); ?>"></div>
                                    </div>
                                </div>
                                <span class="targets"> <?php echo e(__('Targets:')); ?> <?php echo e(amount_with_currency_symbol($donation_cause->raised)); ?> </span>
                            </div>
                            <div class="btn-wrapper padding-top-30">
                                <?php
                                    $button_title_url = !empty($all_donate_button_title_url_fields[$loop->index]) ? $all_donate_button_title_url_fields[$loop->index] : route('frontend.donation.in.separate.page',$donation_cause->id);
                                    $button_read_more_url = !empty($all_read_more_button_title_url_fields[$loop->index]) ? $all_read_more_button_title_url_fields[$loop->index] : route('frontend.donations.single',$donation_cause->slug);
                                ?>
                                <a href="<?php echo e(route('frontend.donation.in.separate.page',$donation_cause->id)); ?>" class="boxed-btn btn-color-five btn-rounded">
                                    <?php echo e($all_donate_button_title_fields[$loop->index] ?? ''); ?>

                                </a>
                                <a href="<?php echo e(route('frontend.donations.single',$donation_cause->slug)); ?>" class="boxed-btn btn-rounded btn-outline-white ml-3">
                                    <?php echo e($all_read_more_button_title_fields[$loop->index] ?? ''); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
                <div class="col-xl-7 col-lg-12 order-1 order-xl-2">
                    <div class="banner-mask-slider">
                        <div class="banner-mask-contents">
                            <div class="banner-mask-image">
                                <?php echo render_image_markup_by_attachment_id($all_image_fields[$loop->index]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>


<?php if(get_static_option('home_page_rise_area_06_section_status')): ?>
<div class="overlay-gradient">
    <section class="rise-area style_02">
        <div class="container">
            <div class="row">
                <div class="rise-flex-contents">
                    <div class="single-donate margin-bottom-30">
                        <h2 class="title"> <?php echo filter_static_option_value('home_page_06_rise_area_heading_title',$static_field_data); ?> </h2>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <div class="nice-selects">
                            <select id="donation_select">
                                <?php $__currentLoopData = $all_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($donation->id); ?>" data-url="<?php echo e(route('frontend.donation.in.separate.page',$donation->id)); ?>"> <?php echo e(\Illuminate\Support\Str::words($donation->title,4)); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <input class="form-control user_input_number" type="number" value="200">
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <button type="submit" class="boxed-btn donate-btn donation_redirect_button"> <?php echo filter_static_option_value('home_page_06_rise_area_button_text',$static_field_data); ?>  </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

  <?php if(get_static_option('home_page_feature_area_06_section_status')): ?>
    <section class="featured-area padding-top-100 padding-bottom-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title section-title-five desktop-center padding-top-25 margin-bottom-80">
                        <?php
                            $title = filter_static_option_value('home_page_06_feature_area_title',$static_field_data);
                            $ex = explode(' ',$title);
                            $first_word = $ex[0];
                             array_shift($ex)
                        ?>
                        <h2 class="title"><?php echo e($first_word); ?> <span> <?php echo e(implode(' ',$ex)); ?> </span> </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-slider">
                        <?php $__currentLoopData = $feature_cause; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-featured-items">
                            <div class="single-featured style-02">
                                <div class="featured-image">
                                    <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                                </div>
                                <div class="featured-contents">
                                    <?php if($data->featured): ?>
                                    <div class="award-icon-two">
                                        <i class="las la-award"></i>
                                    </div>
                                    <?php endif; ?>
                                    <h3 class="title">
                                        <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>"><?php echo e($data->title ?? ''); ?></a>
                                    </h3>
                                    <div class="progress-item">
                                        <div class="single-progressbar">
                                            <div class="donation-progress" data-percentage="<?php echo e(get_percentage($data->amount,$data->raised)); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="goal">
                                        <h4 class="raised"><?php echo e(__('Raised')); ?>:  <span class="main-color-three"><?php echo e(amount_with_currency_symbol($data->raised ?? 0 )); ?> </span></h4>
                                        <h4 class="raised"><?php echo e(__('Goal')); ?>: <span class="danger-color"><?php echo e(amount_with_currency_symbol($data->amount)); ?></span></h4>
                                    </div>
                                    <?php
                                        $classes = ['reverse-color','btn-color-three','btn-dander','btn-color-three'];
                                    ?>
                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>" class="boxed-btn btn-rounded <?php echo e($classes[$key % count($classes)]); ?> "><?php echo filter_static_option_value('home_page_06_feature_area_donation_button_text',$static_field_data); ?>  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php if(get_static_option('home_page_category_area_06_section_status')): ?>
    <section class="category-area padding-top-25 padding-bottom-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title section-title-five desktop-center padding-top-25 margin-bottom-80">
                        <?php
                            $caTtitle = filter_static_option_value( 'home_page_06_category_area_title',$static_field_data);
                            $catEx = explode(' ',$caTtitle);
                            $first_word = $catEx[0];
                            array_shift($catEx);
                        ?>
                        <h2 class="title"> <?php echo e($first_word); ?> <span> <?php echo e(implode(' ',$catEx)); ?> </span> </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-slider">
                        <?php $__currentLoopData = $all_donation_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-category-items">
                            <div class="single-category">
                                <div class="category-image">
                                    <?php echo render_image_markup_by_attachment_id($data->image,'thumb'); ?>

                                    <div class="category-shape">
                                        <img src="<?php echo e(asset('assets/frontend/img/category/category-sh.png')); ?>" alt="">
                                    </div>
                                </div>
                                <div class="category-content color-five">
                                    <h4 class="category-para"> <a href="<?php echo e(route('frontend.donations.category',['id' => $data->id,'any' => Str::slug($data->title) ?? '' ])); ?>"> <?php echo e($data->title ?? ''); ?> </a> </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <?php endif; ?>
</div>

<?php if(get_static_option('home_page_recent_cause_area_06_section_status')): ?>
<section class="recent-area padding-top-25 padding-bottom-45">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title section-title-five desktop-center padding-top-25 margin-bottom-80">
                    <?php
                        $recentCausetitle = filter_static_option_value( 'home_page_06_recent_causes_area_title',$static_field_data);
                        $recentCausetitleEx = explode(' ',$recentCausetitle);
                        $first_wordcause = $recentCausetitleEx[0];
                        array_shift($recentCausetitleEx);
                    ?>
                    <h2 class="title"><?php echo e($first_wordcause); ?><span> <?php echo e(implode(' ',$recentCausetitleEx )); ?> </span> </h2>
                </div>
            </div>
        </div>
        <div class="row">
           <?php $__currentLoopData = $all_recent_donation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="recent-single style-02 margin-bottom-30">
                    <div class="recent-thumb">
                        <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                    </div>
                    <div class="recent-contents">
                        <h3 class="title">
                            <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>"> <?php echo e($data->title ?? ''); ?> </a>
                        </h3>
                        <div class="progress-item">
                            <div class="single-progressbar">
                                <div class="donation-progress" data-percentage="<?php echo e(get_percentage($data->amount,$data->raised)); ?>"></div>
                            </div>
                        </div>
                        <div class="goal">
                            <h4 class="raised"><?php echo e(__('Raised')); ?>:  <span class="main-color-three"><?php echo e(amount_with_currency_symbol($data->raised ?? 0 )); ?> </span></h4>
                            <h4 class="raised"><?php echo e(__('Goal')); ?>: <span class="danger-color"><?php echo e(amount_with_currency_symbol($data->amount)); ?></span></h4>
                        </div>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>" class="boxed-btn btn-rounded <?php echo e($classes[$key % count($classes)]); ?>"> <?php echo filter_static_option_value( 'home_page_06_recent_causes_area_button_text',$static_field_data); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(get_static_option('home_page_success_story_area_06_section_status')): ?>
<section class="success-area-two padding-top-25 padding-bottom-45">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="success-slider">
                    <?php $__currentLoopData = $all_success_stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-success-items">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="success-mask2 margin-bottom-30">
                                    <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-1">
                                <div class="success-contents margin-bottom-30">
                                    <div class="section-title section-title-five padding-top-25 margin-bottom-40">
                                        <?php
                                            $successtitle = $data->title;
                                            $sucTitleEx = explode(' ',$successtitle);
                                            $first_succTitleWord = $sucTitleEx[0];
                                            array_shift($sucTitleEx);
                                        ?>
                               
                                        <h2 class="title"> <a href="<?php echo e(route('frontend.success.story.single',$data->slug)); ?>"><?php echo e($first_succTitleWord); ?> <span> <?php echo e(implode(' ',$sucTitleEx )); ?> </span> </a> </h2>
                                    </div>
                                    <p><?php echo e(purify_html($data->excerpt)); ?></p>
                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('frontend.success.story.single',$data->slug)); ?>" class="boxed-btn <?php echo e($classes[$key % count($classes)]); ?> btn-rounded"> <?php echo filter_static_option_value('home_page_06_success_story_area_button_text',$static_field_data); ?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(get_static_option('home_page_aboutus_area_06_section_status')): ?>
<section class="about-area padding-bottom-25 padding-top-75">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 margin-bottom-30">
                <div class="about-text-contents">
                    <div class="section-title section-title-five padding-top-25 margin-bottom-40">
                        <?php
                            $AboutTitle = filter_static_option_value('home_page_06_about_us_area_title',$static_field_data);
                            $AboutTitleEx = explode(' ', $AboutTitle);
                            $firstAboutTitleWord = $AboutTitleEx[0];
                            array_shift($AboutTitleEx);
                        ?>
                        <h2 class="title"> <?php echo e($firstAboutTitleWord); ?> <span> <?php echo e(implode(' ',$AboutTitleEx)); ?> </span> </h2>
                    </div>
                    <p><?php echo purify_html(filter_static_option_value('home_page_06_about_us_area_description',$static_field_data)); ?></p>

                    <div class="btn-wrapper">
                        <a href="<?php echo purify_html(filter_static_option_value('home_page_06_about_us_area_button_url',$static_field_data)); ?>" class="boxed-btn btn-rounded btn-color-three"> <?php echo purify_html(filter_static_option_value('home_page_06_about_us_area_button_text',$static_field_data)); ?> </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

            <?php if(get_static_option('home_page_counterup_area_06_section_status')): ?>
            <div class="col-lg-6 margin-bottom-30">
                <div class="row">
                    <?php $__currentLoopData = $all_counterup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 col-sm-6 counter-child">
                        <div class="single-counterup-02 style_02">
                            <div class="counter-contents">
                                <div class="icon">
                                    <div class="icon-shapes">
                                        <img src="<?php echo e(asset('assets/frontend/img/about/about-counter-s.png')); ?>" alt="">
                                    </div>
                                    <i class="<?php echo e($data->icon); ?>"></i>
                                </div>
                                <div class="content">
                                    <div class="count-wrap"><span class="count-num"><?php echo e($data->number); ?></span><?php echo e($data->extra_text); ?></div>
                                    <p class="title"><?php echo e($data->title); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>



<?php if(get_static_option('home_page_events_area_06_section_status')): ?>
<section class="events-area-two padding-top-25 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title section-title-five desktop-center padding-top-25 margin-bottom-80">
                    <?php
                        $EventTitle = filter_static_option_value('home_page_06_events_area_title',$static_field_data);
                        $EventTitleEx = explode(' ', $EventTitle);
                        $firstEventTitleWord = $EventTitleEx[0];
                        array_shift($EventTitleEx);
                    ?>
                    <h2 class="title"> <?php echo e($firstEventTitleWord); ?> <span> <?php echo e(implode(' ',$EventTitleEx )); ?> </span> </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $all_recent_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 event-child">
                <div class="single-events style-03 margin-bottom-50">
                    <div class="events-flex-contents">
                        <div class="events-date">
                            <?php
                                $imgNumber = $key + 1;
                            ?>
                            <img src="<?php echo e(asset('assets/frontend/img/events/e'.$imgNumber.'.png')); ?>" alt="">
                            <div class="events-boxe">
                                <span class="events-title"> <?php echo e(date('d', strtotime($data->date))); ?> </span>
                                <p class="event-para"> <?php echo e(date('M', strtotime($data->date))); ?> </p>
                            </div>
                        </div>
                        <div class="events-content">
                            <h3 class="title"><a href="<?php echo e(route('frontend.events.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h3>
                            <p class="content-para"> <?php echo Str::words(purify_html( $data->content),18); ?> </p>
                            <span class="event-place"> <?php echo e($data->venue_location); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
</div>

<?php echo $__env->make('frontend.partials.client-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('click','.donation_redirect_button',function(e){
            e.preventDefault();
            var select = $('#donation_select');
            var donationId = select.val();
            var paymentPageUrl = $('#donation_select option[value="'+donationId+'"]').data('url');
            var amount = $('.user_input_number').val();
            window.location = paymentPageUrl+'?number='+amount;
        });

    </script>
<?php $__env->stopSection(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/home-pages/home-06.blade.php ENDPATH**/ ?>