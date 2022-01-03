<?php
  $post_img = null;
  $blog_image = get_attachment_image_by_id($donation->image,"full",false);
  $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
 ?>
<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url" content="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo e($donation->title); ?>"/>
    <?php echo render_og_meta_image_by_attachment_id($donation->image); ?>

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($donation->title); ?>">
    <meta property="og:description" content="<?php echo e(strip_tags($donation->cause_content)); ?>">
    <meta property="og:image" content="<?php echo e($post_img); ?>"/>
    <meta property="og:image:type" content="<?php echo e($post_img); ?>" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="<?php echo e(route('frontend.donations.single',$donation->slug)); ?>">
    <meta name="twitter:card" content="summary_large_image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('site-title'); ?>
    <?php echo e($donation->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($donation->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($donation->meta_tags); ?>">
    <meta name="tags" content="<?php echo e($donation->meta_description); ?>">
    <meta itemprop="name" content="<?php echo e($donation->title); ?>">
    <meta itemprop="description" content="<?php echo e($donation->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e($post_img); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contatiner">
        <!-- detail -->
        <div class="row mb-100 pt-4 pl-25 pr-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="card w-100 cardDetail">
                   <?php echo render_image_markup_by_attachment_id($donation->image); ?>

                    <a href="<?php echo e(url('/')); ?>" class="detailBack">
                        <i class="bi bi-arrow-left-circle-fill arrow-left-circle-fill-icon"></i>
                    </a>
                    <div class="card-body pl-25 pr-25">
                        <h5 class="fw-bold card-title"><?php echo e($donation->title ?? ''); ?></h5>

                        <h6><i class="bi bi-people-fill people-fill-icon"></i> 1000 Donatur
                            <span class="p-5"><i class="bi bi-stopwatch-fill stopwatch-fill-icon"></i> 10 Hari lagi</span></h6>
                        <p class="card-text">Dompet Dhuafa <i class="bi bi-check-circle-fill check-circle-fill-icon"></i></p>

                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>







                        <div class="goal">
                            <h4 class="raised"><?php echo e(__('Raised')); ?>: <?php echo e(amount_with_currency_symbol($donation->raised ?? 0 )); ?></h4>
                            <h4 class="raised"><?php echo e(__('Goal')); ?>: <?php echo e(amount_with_currency_symbol($donation->amount)); ?></h4>
                        </div>

                        <!-- tab -->
                        <ul class="nav nav-tabs pt-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Campaign-tab" data-bs-toggle="tab" data-bs-target="#Campaign" type="button" role="tab" aria-controls="Campaign" aria-selected="true">Campaign</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Perkembangan-tab" data-bs-toggle="tab" data-bs-target="#Perkembangan" type="button" role="tab" aria-controls="Perkembangan" aria-selected="false">Perkembangan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Donatur-tab" data-bs-toggle="tab" data-bs-target="#Donatur" type="button" role="tab" aria-controls="Donatur" aria-selected="false">Donatur</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-4">
                            <div class="tab-pane active" id="Campaign" role="tabpanel" aria-labelledby="Campaign-tab">
                            <?php echo purify_html_raw($donation->cause_content); ?>

                            </div>
                            <div class="tab-pane" id="Perkembangan" role="tabpanel" aria-labelledby="Perkembangan-tab">
                                <div class="row">
                                    <div class="col-md-12 offset-md-12">
                                        <ul class="timeline">
                                            <?php $__currentLoopData = $withdraw_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $with): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <i class="bi bi-check-circle-fill check-circle-fill-icon"></i>
                                                <a href="#"><?php echo e(date_format('d M Y',$with->created_at)); ?></a>
                                                <p>Penarikan dana sebesar <?php echo e(amount_with_currency_symbol($with->withdraw_request_amount)); ?> ke Fundraiser </p>
                                            </li>

                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Donatur" role="tabpanel" aria-labelledby="Donatur-tab">


                                <?php $__currentLoopData = $all_donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset('assets/frontend/img/donatur1.png')); ?>" class="img-circle float-start" alt="Donasi - Donatur">
                                <span class="float-start"><?php echo e($donor->name); ?></span>
                                <span class="float-end"><?php echo e(amount_with_currency_symbol($donor->amount)); ?></span>
                                <p class="testimoniDonatur"><?php echo e(optional($donor->cause)->title); ?>

                                    <br><?php echo e($donor->created_at->diffForHUmans()); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a href="<?php echo e(route('frontend.donation.all.donor.page')); ?>" class="lihatSemuaDonatur d-block text-center">Lihat semua</a>
                            </div>
                        </div>

                        <div class="col-5 d-grid float-start pr-5 pt-3">
                            
                            <div class="share-list-icon">
                                <h5 class="share-title"> <?php echo e(__('Share:')); ?> </h5>
                                <ul>
                                    <?php
                                        $image_url = get_attachment_image_by_id($donation->image);
                                        $img_url = $image_url['img_url'] ?? '';
                                    ?>
                                    <?php echo single_post_share(route('frontend.donations.single',$donation->slug), $donation->title, $img_url); ?>

                                </ul>
                            </div>
                        </div>
                        <div class="col-7 d-grid float-start pl-5 pt-3">
                            <a href="" type="button" class="btn btn-outline-success">Donasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /detail -->


    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
 <script src="<?php echo e(asset('assets/common/js/countdown.jquery.js')); ?>"></script>
    <script>
        (function ($) {
            'use strict';

            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.submit','data' => []]); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

            <?php if(!empty(get_static_option('donation_single_page_countdown_status'))): ?>
            var ev_offerTime = "<?php echo e($donation->deadline); ?>";
            var ev_year = ev_offerTime.substr(0, 4);
            var ev_month = ev_offerTime.substr(5, 2);
            var ev_day = ev_offerTime.substr(8, 2);

            if (ev_offerTime) {
                $('#event_countdown').countdown({
                    year: ev_year,
                    month: ev_month,
                    day: ev_day,
                    labels: true,
                    labelText: {
                        'days': "<?php echo e(__('days')); ?>",
                        'hours': "<?php echo e(__('hours')); ?>",
                        'minutes': "<?php echo e(__('min')); ?>",
                        'seconds': "<?php echo e(__('sec')); ?>",
                    }
                });
            }
            <?php endif; ?>

                //Cause content
                $(document).on('click', '#ReadMoreButton', function (e) {
                    e.preventDefault();
                    var data = "";


                    $('#main-data').html('<?php echo $donation->cause_content; ?>');
                    $(this).text('');

                });

                //Cause Comment Insert
                $(document).on('click', '#submitComment', function (e) {
                    e.preventDefault();
                    var erContainer = $(".error-message");
                    var el = $(this);
                    var form = $('#cause-comment-form');
                    var user_id = $('#user_id').val();
                    var cause_id = $('#cause_id').val();
                    var commented_by = $('#commented_by').val();
                    var comment_content = $('#comment_content').val();
                    el.text('<?php echo e(__('Submitting')); ?>..');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            user_id: user_id,
                            cause_id: cause_id,
                            commented_by: commented_by,
                            comment_content: comment_content,
                        },
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function (index, value) {
                                erContainer.find('.alert.alert-danger').append('<p>' + value + '</p>');
                            });
                            el.text('<?php echo e(__('Comment')); ?>');
                        },

                    });

                });

                //Load More Cause Comment Data
                var _token = $('input[name="_token"]').val();
                load_comment_data("<?php echo e($donation->id); ?>", _token);

                function load_comment_data(id = "", _token) {
                    var page = $('#comment_data').attr('data-page');

                    $.ajax({
                        url: "<?php echo e(route('frontend.load.cause.comment.data')); ?>",
                        method: "POST",
                        data: {id: id, _token: _token, page: page},
                        success: function (data) {
                            var appendData = '';

                            $.each(data, function (index, value) {
                                appendData += ' <div class="donor-comment"> '+
                                    '<span class="commented_by"> <?php echo e(__('By')); ?> '+value.commented_by+' <?php echo e(__('at')); ?> ' + value.date + '</span>' +
                                    '<p class="description">' + value.comment_content + '</p>' +
                                    '</div>';
                            });

                            if (data.length > 4) {
                                appendData += '<div id="load_more_div"> <button type="button" class="load-more-btn" id="load_more_comment_button"><?php echo e(__('Load More')); ?></button> </div>';
                            }
                            $('#load_more_div').remove();
                            $('#comment_data').append(appendData);
                            $('#comment_data').attr('data-page', parseInt(page) + 5);

                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $('#load_more_comment_button').html('<b><?php echo e(__('Loading...')); ?></b>');
                    load_comment_data('<?php echo e($donation->id); ?>', _token);
                });


                //Load More Donors Data
                var _token = $('input[name="_token"]').val();


                $(document).on('click', '#load_more_case_update_button', function () {
                    $('#load_more_case_update_button').html('<b><?php echo e(__('Loading...')); ?></b>');
                    load_donation_update('<?php echo e($donation->id); ?>');
                });


                load_donation_update("<?php echo e($donation->id); ?>");

                function load_donation_update(id){
                    var parentContainer = $('#recent_update_about_cause');
                    var page = parentContainer.attr('data-page');
                    $.ajax({
                        url: "<?php echo e(route('frontend.load.cause.donation.update.data')); ?>", // defaine route for update load more
                        method: "POST",
                        data: {id: id, _token: "<?php echo e(csrf_token()); ?>", page: page},
                        success: function (data) {
                            var appendData = '';
                            $('#load_more_case_update_button').remove();
                            $.each(data,function (index,value){
                               appendData += '<div class="cause-update-section-body">';
                               if (value.img_url){
                                   appendData += '<div class="thumb">' +value.img_markup+'<div class="img-pop-wrap"><a href="'+value.img_url+'" class="image-popup"><i class="fas fa-search"></i></a></div></div>';
                               }
                             appendData += '<div class="content">'+
                            '<h3 class="title">'+value.title+'</h3>'+
                            '<div id="time-creator">'+value.date+' <?php echo e(__('by ')); ?>'+
                            '<span id="creator">'+value.created_by+'</span>'+
                            '</div> <p>'+value.description+'</p></div></div>';
                            });
                            if (data.length < 1) {
                                appendData += '<p class="not-found-button"><?php echo e(__('No more update found')); ?></p>';
                            } else {
                                appendData += '<div class="btn-wrapper load_more"> <button type="button" class="load-more-btn" id="load_more_case_update_button"><?php echo e(__('Load More')); ?></button> </div>';
                            }
                            parentContainer.append(appendData);
                            parentContainer.attr('data-page', parseInt(page) + 5);

                            $('.image-popup').magnificPopup({
                                type: 'image',
                                gallery: {
                                    // options for gallery
                                    enabled: true
                                },
                            });
                        }
                    })
                }
                load_data("<?php echo e($donation->id); ?>", _token);

                function load_data(id = "", _token) {
                    var page = $('#post_data').attr('data-page');
                    $.ajax({
                        url: "<?php echo e(route('frontend.load.cause.donor.data')); ?>",
                        method: "POST",
                        data: {id: id, _token: _token, page: page},
                        success: function (data) {
                            var appendData = '';
                            $('#load_more').remove();
                            $.each(data, function (index, value) {
                                appendData += ' <div class="donoer-info">' +
                                    '<div class="icon"><i class="fas fa-donate"></i></div>' +
                                    '<div class="content"><h3 class="title">' + value.name + '</h3>' +
                                    '<div class="dinfo"><span>' + value.amount + '</span><?php echo e(__('at')); ?> ' + value.date + '</div>' +
                                    '</div></div>';
                            });
                            if (data.length < 1) {
                                appendData += '<p class="not-found-button"><?php echo e(__('No donor found')); ?></p>';
                            } else {
                                appendData += '<div id="load_more" class="btn-wrapper"> <button type="button" class="load-more-btn" id="load_more_button"><?php echo e(__('Load More')); ?></button> </div>';
                            }
                            $('#post_data').append(appendData);
                            $('#post_data').attr('data-page', parseInt(page) + 5);
                        }
                    })
                }

                $(document).on('click', '#load_more_button', function () {
                    $('#load_more_button').html('<b><?php echo e(__('Loading...')); ?></b>');
                    load_data('<?php echo e($donation->id); ?>', _token);
                });

                //Donation Charge
                $(document).on('keyup', '#donation_amount_user_input', function () {
                    var donation_amount_user_input = $('#donation_amount_user_input').val();
                    var show_charge_amount = $('#show_charge_amount').val();

                    $.ajax({
                        url: "<?php echo e(route('frontend.get.donation.charges.by.ajax')); ?>",
                        type: 'get',
                        dataType: 'JSON',

                        success: function (data) {
                            if (data.amount === 'percentage' && data.donation_charge_button_on) {
                                $('.amount_show').text(parseInt(donation_amount_user_input) * data.percentage / 100 + '<?php echo e(site_currency_symbol()); ?>');

                            } else if (data.amount === 'fixed' && data.donation_charge_button_on) {

                                $('.amount_show').text(parseInt(data.fixed) + parseInt(donation_amount_user_input + '<?php echo e(site_currency_symbol()); ?>'));

                            } else if (!data.donation_charge_button_on) {
                                $('#show_charge_amount').val('');
                            } else {
                                $('#show_charge_amount').val('');
                            }

                        }
                    });
                })
                //Copy Url
                var url = $('#donation_copy_id').data(url);
                var copy_field = $('#copy_field').val(url.url);

                $(document).on('click','.copy_btn',function(){
                    navigator.clipboard.writeText(copy_field.val())
                    $(this).html('<i class="fas fa-check"> <?php echo e(__('Copied')); ?></i>');
                     setTimeout(function(){
                         $('.copy_btn').text('Copy');
                     },3000);
                 });
            });

        })(jQuery);
    </script>
    <?php echo $__env->make('frontend.partials.ajax-login-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/donations/donation-single.blade.php ENDPATH**/ ?>