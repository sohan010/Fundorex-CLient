<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Payment Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__("Payment Gateway Settings")); ?></h4>
                        <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="<?php echo e(route('admin.general.payment.settings')); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="site_global_currency"><?php echo e(__('Site Global Currency')); ?></label>
                                        <select name="site_global_currency" class="form-control"
                                                id="site_global_currency">
                                            <?php $__currentLoopData = script_currency_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur => $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cur); ?>"
                                                        <?php if(get_static_option('site_global_currency') == $cur): ?> selected <?php endif; ?>><?php echo e($cur.' ( '.$symbol.' )'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_currency_symbol_position"><?php echo e(__('Currency Symbol Position')); ?></label>
                                        <?php $all_currency_position = ['left','right']; ?>
                                        <select name="site_currency_symbol_position" class="form-control"
                                                id="site_currency_symbol_position">
                                            <?php $__currentLoopData = $all_currency_position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cur); ?>"
                                                        <?php if(get_static_option('site_currency_symbol_position') == $cur): ?> selected <?php endif; ?>><?php echo e(ucwords($cur)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="site_default_payment_gateway"><?php echo e(__('Default Payment Gateway')); ?></label>
                                        <select name="site_default_payment_gateway" class="form-control" >
                                            <?php
                                                $all_gateways = ['paypal','manual_payment','mollie','paytm','stripe','razorpay','flutterwave','paystack','payfast','midtrans'];
                                            ?>
                                            <?php $__currentLoopData = $all_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty(get_static_option($gateway.'_gateway'))): ?>
                                                    <option value="<?php echo e($gateway); ?>" <?php if(get_static_option('site_default_payment_gateway') == $gateway): ?> selected <?php endif; ?>><?php echo e(ucwords(str_replace('_',' ',$gateway))); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php $global_currency = get_static_option('site_global_currency');?>
                                    <?php if($global_currency != 'USD'): ?>
                                        <div class="form-group">
                                            <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_usd_exchange_rate"><?php echo e(__($global_currency.' to USD Exchange Rate')); ?></label>
                                            <input type="number" class="form-control"
                                                   name="site_<?php echo e(strtolower($global_currency)); ?>_to_usd_exchange_rate"
                                                   value="<?php echo e(get_static_option('site_'.$global_currency.'_to_usd_exchange_rate')); ?>">
                                            <span class="info-text"><?php echo e(sprintf(__('enter %1$s to USD exchange rate. eg: 1 %2$s = ? USD'),$global_currency,$global_currency)); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($global_currency != 'INR' && !empty(get_static_option('paytm_gateway') || !empty(get_static_option('razorpay_gateway')))): ?>
                                        <div class="form-group">
                                            <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_inr_exchange_rate"><?php echo e(__($global_currency.' to INR Exchange Rate')); ?></label>
                                            <input type="text" class="form-control"
                                                   name="site_<?php echo e(strtolower($global_currency)); ?>_to_inr_exchange_rate"
                                                   value="<?php echo e(get_static_option('site_'.$global_currency.'_to_inr_exchange_rate')); ?>">
                                            <span class="info-text"><?php echo e(__('enter '.$global_currency.' to INR exchange rate. eg: 1'.$global_currency.' = ? INR')); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($global_currency != 'NGN' && !empty(get_static_option('paystack_gateway') )): ?>
                                        <div class="form-group">
                                            <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_ngn_exchange_rate"><?php echo e(__($global_currency.' to NGN Exchange Rate')); ?></label>
                                            <input type="text" class="form-control"
                                                   name="site_<?php echo e(strtolower($global_currency)); ?>_to_ngn_exchange_rate"
                                                   value="<?php echo e(get_static_option('site_'.$global_currency.'_to_ngn_exchange_rate')); ?>">
                                            <span class="info-text"><?php echo e(__('enter '.$global_currency.' to NGN exchange rate. eg: 1'.$global_currency.' = ? NGN')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($global_currency != 'ZAR' && !empty(get_static_option('payfast_gateway') )): ?>
                                        <div class="form-group">
                                            <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_zar_exchange_rate"><?php echo e(__($global_currency.' to ZAR Exchange Rate')); ?></label>
                                            <input type="text" class="form-control"
                                                   name="site_<?php echo e(strtolower($global_currency)); ?>_to_zar_exchange_rate"
                                                   value="<?php echo e(get_static_option('site_'.$global_currency.'_to_zar_exchange_rate')); ?>">
                                            <span class="info-text"><?php echo e(__('enter '.$global_currency.' to ZAR exchange rate. eg: 1'.$global_currency.' = ? ZAR')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($global_currency != 'IDR' && !empty(get_static_option('midtrans_gateway') || !empty(get_static_option('midtrans_gateway')))): ?>
                                        <div class="form-group">
                                            <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_idr_exchange_rate"><?php echo e(__($global_currency.' to IDR Exchange Rate')); ?></label>
                                            <input type="text" class="form-control"
                                                   name="site_<?php echo e(strtolower($global_currency)); ?>_to_idr_exchange_rate"
                                                   value="<?php echo e(get_static_option('site_'.$global_currency.'_to_idr_exchange_rate')); ?>">
                                            <span class="info-text"><?php echo e(__('enter '.$global_currency.' to IDR exchange rate. eg: 1'.$global_currency.' = ? IDR')); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="accordion-wrapper">
                                        <div id="accordion-payment">
                                            <div class="card">
                                                <div class="card-header" id="cash_on_delivery_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#pcash_on_delivery_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Cash On Delivery Settings (only for product order)')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="pcash_on_delivery_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="cash_on_delivery_gateway"><strong><?php echo e(__('Enable Cash On Delivery')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="cash_on_delivery_gateway"  <?php if(!empty(get_static_option('cash_on_delivery_gateway'))): ?> checked <?php endif; ?> id="cash_on_delivery_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_logo"><strong><?php echo e(__('Cash On Delivery Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $paypal_img = get_attachment_image_by_id(get_static_option('cash_on_delivery_preview_logo'),null,true);
                                                                        $paypal_image_btn_label = 'Upload Image';
                                                                    ?>
                                                                    <?php if(!empty($paypal_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($paypal_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $paypal_image_btn_label = 'Change Image'; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="cash_on_delivery_preview_logo" name="cash_on_delivery_preview_logo" value="<?php echo e(get_static_option('cash_on_delivery_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Image" data-modaltitle="Upload Image" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($paypal_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="paypal_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#paypal_settings_content"
                                                                aria-expanded="true">
                                                            <span class="page-title"> <?php echo e(__('Paypal Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="paypal_settings_content" class="collapse show"
                                                     data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Paypal is")); ?> <?php echo e(implode(',',paypal_gateway()->supported_currency_list())); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in paypal, it will convert you currency value to USD value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paypal_gateway"><strong><?php echo e(__('Enable Paypal')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_gateway"
                                                                       <?php if(!empty(get_static_option('paypal_gateway'))): ?> checked
                                                                       <?php endif; ?> id="paypal_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paypal_test_mode"><strong><?php echo e(__('Enable Test Mode For Paypal')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="paypal_test_mode"
                                                                       <?php if(!empty(get_static_option('paypal_test_mode'))): ?> checked
                                                                        <?php endif; ?> >
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_logo"><strong><?php echo e(__('Paypal Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $paypal_img = get_attachment_image_by_id(get_static_option('paypal_preview_logo'),null,true);
                                                                        $paypal_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($paypal_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb"
                                                                                         src="<?php echo e($paypal_img['img_url']); ?>"
                                                                                         alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $paypal_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="paypal_preview_logo"
                                                                       name="paypal_preview_logo"
                                                                       value="<?php echo e(get_static_option('paypal_preview_logo')); ?>">
                                                                <button type="button"
                                                                        class="btn btn-info media_upload_form_btn"
                                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                        data-toggle="modal"
                                                                        data-target="#media_upload_modal">
                                                                    <?php echo e(__($paypal_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paypal_app_client_id"><?php echo e(__('Paypal Client ID')); ?></label>
                                                            <input type="text" name="paypal_app_client_id"
                                                                   class="form-control"
                                                                   value="<?php echo e(get_static_option('paypal_app_client_id')); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paypal_app_secret"><?php echo e(__('Paypal Secret')); ?></label>
                                                            <input type="text" name="paypal_app_secret"
                                                                   class="form-control"
                                                                   value="<?php echo e(get_static_option('paypal_app_secret')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="paytm_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#paytm_settings_content"
                                                                aria-expanded="false">
                                                            <span class="page-title"> <?php echo e(__('Paytm Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="paytm_settings_content" class="collapse"
                                                     data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <div class="payment-notice alert alert-warning">
                                                                <p><?php echo e(__("Available Currency For Paytm is")); ?> <?php echo e(implode(',',paytm_gateway()->supported_currency_list())); ?></p>
                                                                <p><?php echo e(__('if your currency is not available in paytm, it will convert you currency value to INR value based on your currency exchange rate.')); ?></p>
                                                                <p><?php echo e(__('You have to set conversion value of INR to use PAYTM payment gateway')); ?></p>
                                                            </div>
                                                            <label for="paytm_gateway"><strong><?php echo e(__('Enable/Disable Paytm')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="paytm_gateway"
                                                                       <?php if(!empty(get_static_option('paytm_gateway'))): ?> checked
                                                                       <?php endif; ?> id="paytm_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_test_mode"><strong><?php echo e(__('Enable Test Mode For Paytm')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="paytm_test_mode"
                                                                       <?php if(!empty(get_static_option('paytm_test_mode'))): ?> checked
                                                                        <?php endif; ?> >
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_logo"><strong><?php echo e(__('Paytm Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $paytm_img = get_attachment_image_by_id(get_static_option('paytm_preview_logo'),null,true);
                                                                        $paytm_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($paytm_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb"
                                                                                         src="<?php echo e($paytm_img['img_url']); ?>"
                                                                                         alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $paytm_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="paytm_preview_logo"
                                                                       name="paytm_preview_logo"
                                                                       value="<?php echo e(get_static_option('paytm_preview_logo')); ?>">
                                                                <button type="button"
                                                                        class="btn btn-info media_upload_form_btn"
                                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                        data-toggle="modal"
                                                                        data-target="#media_upload_modal">
                                                                    <?php echo e(__($paytm_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_merchant_key"><?php echo e(__('Paytm Merchant Key')); ?></label>
                                                            <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" value="<?php echo e(get_static_option('paytm_merchant_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_merchant_mid"><?php echo e(__('Paytm Merchant ID')); ?></label>
                                                            <input type="text" name="paytm_merchant_mid" id="paytm_merchant_mid"  value="<?php echo e(get_static_option('paytm_merchant_mid')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_merchant_website"><?php echo e(__('Paytm Merchant Website')); ?></label>
                                                            <input type="text" name="paytm_merchant_website" id="paytm_merchant_website"  value="<?php echo e(get_static_option('paytm_merchant_website')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_channel"><?php echo e(__('Paytm channel')); ?></label>
                                                            <input type="text" name="paytm_channel" value="<?php echo e(get_static_option('paytm_channel')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paytm_industry_type"><?php echo e(__('Paytm Industry Type')); ?></label>
                                                            <input type="text" name="paytm_industry_type" value="<?php echo e(get_static_option('paytm_industry_type')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="stripe_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#stripe_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Stripe Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="stripe_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Stripe supported currency ")); ?> <?php echo e(implode(',',stripe_gateway()->supported_currency_list())); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_gateway"><strong><?php echo e(__('Enable/Disable Stripe')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="stripe_gateway"  <?php if(!empty(get_static_option('stripe_gateway'))): ?> checked <?php endif; ?> id="stripe_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_logo"><strong><?php echo e(__('Stripe Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $stripe_img = get_attachment_image_by_id(get_static_option('stripe_preview_logo'),null,true);
                                                                        $stripe_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($stripe_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($stripe_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $stripe_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="stripe_preview_logo" name="stripe_preview_logo" value="<?php echo e(get_static_option('stripe_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($stripe_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_publishable_key"><?php echo e(__('Stripe Publishable Key')); ?></label>
                                                            <input type="text" name="stripe_publishable_key" id="stripe_publishable_key" value="<?php echo e(get_static_option('stripe_publishable_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stripe_secret_key"><?php echo e(__('Stripe Secret')); ?></label>
                                                            <input type="text" name="stripe_secret_key" id="stripe_secret_key"  value="<?php echo e(get_static_option('stripe_secret_key')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="razorpay_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#razorpay_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Razorpay Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="razorpay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Razorpay is, ['INR']")); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in Razorpay, it will convert you currency value to INR value based on your currency exchange rate.')); ?></p>
                                                            <p><?php echo e(__('You have to set conversion value of INR to use Razorpay payment gateway')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="razorpay_gateway"><strong><?php echo e(__('Enable/Disable Razorpay')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="razorpay_gateway"  <?php if(!empty(get_static_option('razorpay_gateway'))): ?> checked <?php endif; ?> id="razorpay_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="razorpay_logo"><strong><?php echo e(__('Razorpay Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $razorpay_img = get_attachment_image_by_id(get_static_option('razorpay_preview_logo'),null,true);
                                                                        $razorpay_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($razorpay_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($razorpay_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $razorpay_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="razorpay_preview_logo" name="razorpay_preview_logo" value="<?php echo e(get_static_option('razorpay_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($razorpay_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="razorpay_key"><?php echo e(__('Razorpay Key')); ?></label>
                                                            <input type="text" name="razorpay_key" id="razorpay_key" value="<?php echo e(get_static_option('razorpay_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="razorpay_secret"><?php echo e(__('Razorpay Secret')); ?></label>
                                                            <input type="text" name="razorpay_secret" id="razorpay_secret"  value="<?php echo e(get_static_option('razorpay_secret')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="paystack_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#paystack_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('PayStack Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="paystack_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Paystack is")); ?> <?php echo e(implode(',',paystack_gateway()->supported_currency_list())); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in Paystack, it will convert you currency value to NGN value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <p class="margin-bottom-30 margin-top-20 info-paragraph">
                                                            <?php echo e(__('Don\'t forget to put below url to "Settings > API Key & Webhook > Callback URL" in your paystack admin panel')); ?>

                                                            <input type="text" class="info-url" value="<?php echo e(route('frontend.paystack.callback')); ?>">
                                                        </p>
                                                        <div class="form-group">
                                                            <label for="paystack_gateway"><strong><?php echo e(__('Enable/Disable PayStack')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="paystack_gateway"  <?php if(!empty(get_static_option('paystack_gateway'))): ?> checked <?php endif; ?> id="paystack_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paystack_preview_logo"><strong><?php echo e(__('PayStack Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $paystack_img = get_attachment_image_by_id(get_static_option('paystack_preview_logo'),null,true);
                                                                        $paystack_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($paystack_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($paystack_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $paystack_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="paystack_preview_logo" name="paystack_preview_logo" value="<?php echo e(get_static_option('paystack_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($paystack_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paystack_public_key"><?php echo e(__('PayStack Public Key')); ?></label>
                                                            <input type="text" name="paystack_public_key" id="paystack_public_key" value="<?php echo e(get_static_option('paystack_public_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paystack_secret_key"><?php echo e(__('PayStack Secret Key')); ?></label>
                                                            <input type="text" name="paystack_secret_key" id="paystack_secret_key"  value="<?php echo e(get_static_option('paystack_secret_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paystack_merchant_email"><?php echo e(__('PayStack Merchant Email')); ?></label>
                                                            <input type="text" name="paystack_merchant_email" id="paystack_merchant_email"  value="<?php echo e(get_static_option('paystack_merchant_email')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="mollie_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#mollie_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Mollie Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="mollie_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Mollie is, ['AED','AUD','BGN','BRL','CAD','CHF','CZK','DKK','EUR','GBP','HKD','HRK','HUF','ILS','ISK','JPY','MXN','MYR','NOK','NZD','PHP','PLN','RON','RUB','SEK','SGD','THB','TWD','USD','ZAR']")); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in mollie, it will convert you currency value to USD value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mollie_gateway"><strong><?php echo e(__('Enable/Disable Mollie')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="mollie_gateway"  <?php if(!empty(get_static_option('mollie_gateway'))): ?> checked <?php endif; ?> id="mollie_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mollie_preview_logo"><strong><?php echo e(__('Mollie Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $mollie_img = get_attachment_image_by_id(get_static_option('mollie_preview_logo'),null,true);
                                                                        $mollie_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($mollie_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($mollie_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $mollie_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="mollie_preview_logo" name="mollie_preview_logo" value="<?php echo e(get_static_option('mollie_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($mollie_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mollie_public_key"><?php echo e(__('Mollie Public Key')); ?></label>
                                                            <input type="text" name="mollie_public_key" id="mollie_public_key" value="<?php echo e(get_static_option('mollie_public_key')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="flluterwave_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#flutterwave_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Flutterwave Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="flutterwave_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Flutterwave is, ['BIF','CAD','CDF','CVE','EUR','GBP','GHS','GMD','GNF','KES','LRD','MWK','MZN','NGN','RWF','SLL','STD','TZS','UGX','USD','XAF','XOF','ZMK','ZMW','ZWD']")); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in flutterwave, it will convert you currency value to USD value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="flutterwave_gateway"><strong><?php echo e(__('Enable/Disable Flutterwave')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="flutterwave_gateway"  <?php if(!empty(get_static_option('flutterwave_gateway'))): ?> checked <?php endif; ?> id="flutterwave_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="flutterwave_test_mode"><strong><?php echo e(__('Enable Test Mode Flutterwave')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="flutterwave_test_mode" <?php if(!empty(get_static_option('flutterwave_test_mode'))): ?> checked <?php endif; ?>>
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="flutterwave_preview_logo"><strong><?php echo e(__('Flutterwave Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $mollie_img = get_attachment_image_by_id(get_static_option('flutterwave_preview_logo'),null,true);
                                                                        $mollie_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($mollie_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($mollie_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $mollie_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="flutterwave_preview_logo" name="flutterwave_preview_logo" value="<?php echo e(get_static_option('flutterwave_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($mollie_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="flutterwave_public_key"><?php echo e(__('Flutterwave Public Key')); ?></label>
                                                            <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" value="<?php echo e(get_static_option('flutterwave_public_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="flutterwave_secret_key"><?php echo e(__('Flutterwave Secret Key')); ?></label>
                                                            <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" value="<?php echo e(get_static_option('flutterwave_secret_key')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="card">
                                                <div class="card-header" id="payfast_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#payfast_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('PayFast Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="payfast_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For PayFast is, ['ZAR']")); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in PayFast, it will convert you currency value to ZAR value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_gateway"><strong><?php echo e(__('Enable/Disable PayFast')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="payfast_gateway"  <?php if(!empty(get_static_option('payfast_gateway'))): ?> checked <?php endif; ?> id="payfast_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_test_mode"><strong><?php echo e(__('Enable Test Mode PayFast')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="payfast_test_mode" <?php if(!empty(get_static_option('payfast_test_mode'))): ?> checked <?php endif; ?>>
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_preview_logo"><strong><?php echo e(__('PayFast Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $mollie_img = get_attachment_image_by_id(get_static_option('payfast_preview_logo'),null,true);
                                                                        $mollie_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($mollie_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($mollie_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $mollie_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" name="payfast_preview_logo" value="<?php echo e(get_static_option('payfast_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($mollie_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_merchant_id"><?php echo e(__('PayFast Merchant ID')); ?></label>
                                                            <input type="text" name="payfast_merchant_id" value="<?php echo e(get_static_option('payfast_merchant_id')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_merchant_key"><?php echo e(__('PayFast Merchant Key')); ?></label>
                                                            <input type="text" name="payfast_merchant_key" value="<?php echo e(get_static_option('payfast_merchant_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="payfast_passphrase"><?php echo e(__('PayFast Passphrase')); ?></label>
                                                            <input type="text" name="payfast_passphrase" value="<?php echo e(get_static_option('payfast_passphrase')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card">
                                                <div class="card-header" id="midtrans_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#midtrans_settings_content" aria-expanded="false" >
                                                            <span class="page-title"> <?php echo e(__('Midtrans Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="midtrans_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="payment-notice alert alert-warning">
                                                            <p><?php echo e(__("Available Currency For Midtrans is, ['IDR']")); ?></p>
                                                            <p><?php echo e(__('if your currency is not available in Midtrans, it will convert you currency value to IDR value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_gateway"><strong><?php echo e(__('Enable/Disable Midtrans')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="midtrans_gateway"  <?php if(!empty(get_static_option('midtrans_gateway'))): ?> checked <?php endif; ?> id="midtrans_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_test_mode"><strong><?php echo e(__('Enable Test Mode Midtrans')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="midtrans_test_mode" <?php if(!empty(get_static_option('midtrans_test_mode'))): ?> checked <?php endif; ?>>
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_preview_logo"><strong><?php echo e(__('Midtrans Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $mollie_img = get_attachment_image_by_id(get_static_option('midtrans_preview_logo'),null,true);
                                                                        $mollie_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($mollie_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb" src="<?php echo e($mollie_img['img_url']); ?>" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $mollie_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" name="midtrans_preview_logo" value="<?php echo e(get_static_option('midtrans_preview_logo')); ?>">
                                                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                                    <?php echo e(__($mollie_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_merchant_id"><?php echo e(__('Midtrans Merchant ID')); ?></label>
                                                            <input type="text" name="midtrans_merchant_id" value="<?php echo e(get_static_option('midtrans_merchant_id')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_client_key"><?php echo e(__('Midtrans Client Key')); ?></label>
                                                            <input type="text" name="midtrans_client_key" value="<?php echo e(get_static_option('midtrans_client_key')); ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="midtrans_server_key"><?php echo e(__('Midtrans Server Key')); ?></label>
                                                            <input type="text" name="midtrans_server_key" value="<?php echo e(get_static_option('midtrans_server_key')); ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="card">
                                                <div class="card-header" id="manual_payment_settings">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#manual_payment_settings_content"
                                                                aria-expanded="false">
                                                            <span class="page-title"> <?php echo e(__('Manual Payment Settings')); ?></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="manual_payment_settings_content" class="collapse"
                                                     data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="manual_payment_gateway"><strong><?php echo e(__('Enable/Disable Manual Payment')); ?></strong></label>
                                                            <label class="switch">
                                                                <input type="checkbox" name="manual_payment_gateway"
                                                                       <?php if(!empty(get_static_option('manual_payment_gateway'))): ?> checked
                                                                       <?php endif; ?> id="manual_payment_gateway">
                                                                <span class="slider onff"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_logo"><strong><?php echo e(__('Manual Payment Logo')); ?></strong></label>
                                                            <div class="media-upload-btn-wrapper">
                                                                <div class="img-wrap">
                                                                    <?php
                                                                        $paytm_img = get_attachment_image_by_id(get_static_option('manual_payment_preview_logo'),null,false);
                                                                        $paytm_image_btn_label = __('Upload Image');
                                                                    ?>
                                                                    <?php if(!empty($paytm_img)): ?>
                                                                        <div class="attachment-preview">
                                                                            <div class="thumbnail">
                                                                                <div class="centered">
                                                                                    <img class="avatar user-thumb"
                                                                                         src="<?php echo e($paytm_img['img_url']); ?>"
                                                                                         alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php  $paytm_image_btn_label = __('Change Image'); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <input type="hidden" id="manual_payment_preview_logo"
                                                                       name="manual_payment_preview_logo"
                                                                       value="<?php echo e(get_static_option('manual_payment_preview_logo')); ?>">
                                                                <button type="button"
                                                                        class="btn btn-info media_upload_form_btn"
                                                                        data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                                        data-modaltitle="<?php echo e(__('Upload Image')); ?>"
                                                                        data-toggle="modal"
                                                                        data-target="#media_upload_modal">
                                                                    <?php echo e(__($paytm_image_btn_label)); ?>

                                                                </button>
                                                            </div>
                                                            <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')); ?></small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_manual_payment_name"><?php echo e(__('Manual Payment Name')); ?></label>
                                                            <input type="text" name="site_manual_payment_name"
                                                                   id="site_manual_payment_name"
                                                                   value="<?php echo e(get_static_option('site_manual_payment_name')); ?>"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="site_manual_payment_description"><?php echo e(__('Manual Payment Description')); ?></label>
                                                            <input type="hidden" name="site_manual_payment_description" value="<?php echo e(get_static_option('site_manual_payment_description')); ?>">
                                                            <div class="summernote" data-content='<?php echo e(get_static_option('site_manual_payment_description')); ?>'></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        (function($){
            "use strict";
            $(document).ready(function ($) {
                $('.summernote').summernote({
                    height: 200,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
                if($('.summernote').length > 0){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }
            });
        })(jQuery);


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/backend/general-settings/payment-gateway.blade.php ENDPATH**/ ?>