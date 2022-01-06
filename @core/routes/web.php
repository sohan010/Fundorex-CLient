<?php

use App\Cause;
use App\CauseLogs;
use App\CauseUpdate;
use App\Comment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::feeds();
/*----------------------------------------------------------------------------------------------------------------------------
| FRONTEND
|----------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware' =>['setlang:frontend','globalVariable','maintains_mode']],function (){
    //donation payment ipn

/*----------------------------------------------------------------------------------------------------------------------------
 | JOBS FRONTEND
 |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['middleware' => 'globalVariable','namespace'=>'Frontend'],function () {

        $career_with_us_page_slug = get_static_option('career_with_us_page_slug') ?? 'jobs';
        Route::get('/' . $career_with_us_page_slug, 'FrontendJobController@jobs')->name('frontend.jobs');
        Route::get('/' . $career_with_us_page_slug . '/{slug}', 'FrontendJobController@jobs_single')->name('frontend.jobs.single');
        Route::get('/' . $career_with_us_page_slug . '-category/{id}/{any?}', 'FrontendJobController@jobs_category')->name('frontend.jobs.category');
        Route::get('/' . $career_with_us_page_slug . '-search', 'FrontendJobController@jobs_search')->name('frontend.jobs.search');
        Route::get('/'.$career_with_us_page_slug.'/apply/{id}','FrontendJobController@jobs_apply')->name('frontend.jobs.apply');
        Route::get('/job-success/{id}','FrontendJobController@job_payment_success')->name('frontend.job.payment.success');
        Route::get('/job-cancel/{id}','FrontendJobController@job_payment_cancel')->name('frontend.job.payment.cancel');

        //JOB PAYMENT GATEWAYS ROUTES
        Route::post('/apply', 'JobPaymentController@store_jobs_applicant_data')->name('frontend.jobs.apply.store');
        Route::get('/job-paypal-ipn', 'JobPaymentController@paypal_ipn')->name('frontend.job.paypal.ipn');
        Route::post('/job-paytm-ipn', 'JobPaymentController@paytm_ipn')->name('frontend.job.paytm.ipn');
        Route::get('/job-stripe/pay', 'JobPaymentController@stripe_ipn')->name('frontend.job.stripe.ipn');
        Route::post('/job-stripe','JobPaymentController@stripe_charge')->name('frontend.job.stripe.charge');
        Route::post('/job-razorpay', 'JobPaymentController@razorpay_ipn')->name('frontend.job.razorpay.ipn');
        Route::post('/job-paystack/pay', 'JobPaymentController@paystack_pay')->name('frontend.job.paystack.pay');
        Route::get('/job-flullterwave/pay', 'FrontendController@flutterwave_pay_get')->name('frontend.job.flutterwave.pay');
        Route::post('/job-flullterwave/pay', 'JobPaymentController@flutterwave_pay');
        Route::get('/job-flullterwave/callback', 'JobPaymentController@flutterwave_callback')->name('frontend.job.flutterwave.callback');
        Route::get('/job-mollie/webhook', 'JobPaymentController@mollie_webhook')->name('frontend.job.mollie.webhook');
        Route::get('/job-payfast', 'JobPaymentController@payfast_ipn')->name('frontend.job.payfast.ipn');
        Route::get('/job-midtrans','JobPaymentController@midtrans_ipn')->name('frontend.job.midtrans.ipn');

    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | EVENTS PAYMENTS
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['middleware' => 'globalVariable','namespace'=>'Frontend'],function (){

        $events_page_slug = get_static_option('events_page_slug') ?? 'events';
        //events
        Route::get('/'.$events_page_slug,'FrontendEventController@events')->name('frontend.events');
        Route::get('/'.$events_page_slug.'/{slug}','FrontendEventController@events_single')->name('frontend.events.single');
        Route::get('/'.$events_page_slug.'-category/{id}/{any?}','FrontendEventController@events_category')->name('frontend.events.category');
        Route::get('/'.$events_page_slug.'-search','FrontendEventController@events_search')->name('frontend.events.search');
        Route::get('/'.$events_page_slug.'-booking/{id}','FrontendEventController@event_booking')->name('frontend.event.booking');
        //event payment ip
        Route::get('/event-flullterwave/pay','FrontendEventController@flutterwave_pay_get')->name('frontend.event.flutterwave.pay');
        //event booking
        Route::get('/booking-confirm/{id}','FrontendEventController@booking_confirm')->name('frontend.event.booking.confirm');
        Route::get('/attendance-success/{id}','FrontendEventController@event_payment_success')->name('frontend.event.payment.success');
        Route::get('/attendance-cancel/{id}','FrontendEventController@event_payment_cancel')->name('frontend.event.payment.cancel');

        //event payment ipn
        Route::get('/event-paypal-ipn', 'EventPaymentLogsController@paypal_ipn')->name('frontend.event.paypal.ipn');
        Route::post('/event-paytm-ipn', 'EventPaymentLogsController@paytm_ipn')->name('frontend.event.paytm.ipn');
        Route::post('/event-stripe','EventPaymentLogsController@stripe_charge')->name('frontend.event.stripe.charge');
        Route::get('/event-stripe/pay','EventPaymentLogsController@stripe_ipn')->name('frontend.event.stripe.ipn');
        Route::post('/event-razorpay', 'EventPaymentLogsController@razorpay_ipn')->name('frontend.event.razorpay.ipn');
        Route::get('/event-flullterwave/callback','EventPaymentLogsController@flutterwave_callback')->name('frontend.event.flutterwave.callback');
        Route::get('/event-mollie/webhook', 'EventPaymentLogsController@mollie_webhook')->name('frontend.event.mollie.webhook');
        Route::post('/event-payfast', 'EventPaymentLogsController@payfast_ipn')->name('frontend.event.payfast.ipn');
        Route::get('/event-midtrans','EventPaymentLogsController@midtrans_ipn')->name('frontend.event.midtrans.ipn');

        //event booking
        Route::get('/booking-confirm/{id}', 'FrontendEventController@booking_confirm')->name('frontend.event.booking.confirm');

        Route::post('/booking-confirm', 'EventPaymentLogsController@booking_payment_form')->name('frontend.event.payment.confirm');
        Route::get('/attendance-success/{id}', 'FrontendEventController@event_payment_success')->name('frontend.event.payment.success');
        Route::get('/attendance-cancel/{id}', 'FrontendEventController@event_payment_cancel')->name('frontend.event.payment.cancel');
        Route::post('/event-user/generate-invoice','FrontendEventController@generate_event_invoice')->name('frontend.event.invoice.generate');

    });


    /*----------------------------------------------------------------------------------------------------------------------------
     | CAUSES FRONTEND ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::namespace('Frontend')->group(function (){
        $donation_page_slug = !empty(get_static_option('donation_page_slug')) ? get_static_option('donation_page_slug') : 'donations';

        //donation page
        Route::get('/'.$donation_page_slug,'FrontendCausesController@donations')->name('frontend.donations');
        Route::get('/'.$donation_page_slug.'/{slug}','FrontendCausesController@donations_single')->name('frontend.donations.single');
        Route::get('/'.$donation_page_slug.'/payment/donate/{id}','FrontendCausesController@donations_in_separate_page')->name('frontend.donation.in.separate.page');
        Route::post('/donation-user/generate-invoice','FrontendCausesController@generate_donation_invoice')->name('frontend.donation.invoice.generate');
        Route::post('/load/donor/data','FrontendCausesController@load_donor_data')->name('frontend.load.cause.donor.data');
        Route::post('/load/donation-update/data','FrontendCausesController@load_donation_update_data')->name('frontend.load.cause.donation.update.data');
        Route::get('/'.$donation_page_slug.'-cat/{id}','FrontendCausesController@donation_by_category')->name('frontend.donations.category');

        Route::post('/'.$donation_page_slug.'/comment/store','FrontendCausesController@cause_comment_store')->name('cause.comment.store');
        Route::post('/'.$donation_page_slug.'/all/comment','FrontendCausesController@cause_all_comment')->name('cause.all.comment');
        Route::post('/'.$donation_page_slug.'/load/cause/comment/data','FrontendCausesController@load_cause_comment_data')->name('frontend.load.cause.comment.data');
        //Getting Donation Charges via Ajax
        Route::post('/'.$donation_page_slug.'/get/donation/charges/by/ajax','FrontendCausesController@get_donation_charges_by_ajax')->name('frontend.get.donation.charges.by.ajax');

        //Donation Flag Report Store
        Route::post('/'.$donation_page_slug.'/flag/report/store','FrontendCausesController@flag_report_store')->name('frontend.donation.flag.report.store');


        //Client Routes
        Route::get('/all-donor-page','FrontendCausesController@all_donor_page')->name('frontend.donation.all.donor.page');
        Route::get('/donation-search','FrontendCausesController@donation_search')->name('frontend.donation.search');


        Route::post('/'.$donation_page_slug,'CausesLogController@store_donation_logs')->name('frontend.donations.log.store');
        Route::get('/donation-paypal-ipn','CausesLogController@paypal_ipn')->name('frontend.donation.paypal.ipn');
        Route::post('/donation-paytm-ipn','CausesLogController@paytm_ipn')->name('frontend.donation.paytm.ipn');
        Route::post('/donation-stripe','CausesLogController@stripe_charge')->name('frontend.donation.stripe.charge');
        Route::get('/donation-stripe/pay','CausesLogController@stripe_ipn')->name('frontend.donation.stripe.ipn');
        Route::post('/donation-razorpay','CausesLogController@razorpay_ipn')->name('frontend.donation.razorpay.ipn');
        Route::post('/donation-paystack/pay','CausesLogController@paystack_pay')->name('frontend.donation.paystack.pay');
        Route::get('/donation-mollie/webhook','CausesLogController@mollie_webhook')->name('frontend.donation.mollie.webhook');
        Route::post('/donation-flutterwave/pay','CausesLogController@flutterwave_pay');
        Route::get('/donation-flutterwave/callback','CausesLogController@flutterwave_callback')->name('frontend.donation.flutterwave.callback');
        Route::post('/donation-payfast','CausesLogController@payfast_ipn')->name('frontend.donation.payfast.ipn');
        Route::get('/donation-midtrans','CausesLogController@midtrans_ipn')->name('frontend.donation.midtrans.ipn');


        Route::get('/donation-success/{id}','FrontendCausesController@donation_payment_success')->name('frontend.donation.payment.success');
        Route::get('/donation-cancel/{id}','FrontendCausesController@donation_payment_cancel')->name('frontend.donation.payment.cancel');
        Route::get($donation_page_slug.'-by-{user}/{id}','FrontendCausesController@user_created_donations')->name('frontend.user.created.donations');

    });

/*----------------------------------
    FRONTEND: SUPPORT TICKET ROUTES
----------------------------------*/
    Route::group(['namespace' => 'Frontend'],function () {
        $support_ticket_page_slug =  get_static_option('support_ticket_page_slug') ?? 'support-ticket';
        Route::get($support_ticket_page_slug, 'SupportTicketController@page')->name('frontend.support.ticket');
        Route::post($support_ticket_page_slug.'/new', 'SupportTicketController@store')->name('frontend.support.ticket.store');
    });



    /*------------------------------
        SOCIAL LOGIN CALLBACK
    ------------------------------*/
    Route::group(['prefix' => 'facebook'],function (){
        Route::get('callback','SocialLoginController@facebook_callback')->name('facebook.callback');
        Route::get('redirect','SocialLoginController@facebook_redirect')->name('login.facebook.redirect');
    });
    Route::group(['prefix' => 'google'],function (){
        Route::get('callback','SocialLoginController@google_callback')->name('google.callback');
        Route::get('redirect','SocialLoginController@google_redirect')->name('login.google.redirect');
    });

    /*------------------------------
       STATIC PAGES ROUTES
    ------------------------------*/
    $about_page_slug = !empty(get_static_option('about_page_slug')) ? get_static_option('about_page_slug') : 'about';
    $faq_page_slug = !empty(get_static_option('faq_page_slug')) ? get_static_option('faq_page_slug') : 'faq';
    $team_page_slug = !empty(get_static_option('team_page_slug')) ? get_static_option('team_page_slug') : 'team';
    $contact_page_slug = !empty(get_static_option('contact_page_slug')) ? get_static_option('contact_page_slug') : 'contact';
    $blog_page_slug = !empty(get_static_option('blog_page_slug')) ? get_static_option('blog_page_slug') : 'blog';
    $testimonial_page_slug = !empty(get_static_option('testimonial_page_slug')) ? get_static_option('testimonial_page_slug') : 'testimonials';
    $image_gallery_page_slug = !empty(get_static_option('image_gallery_page_slug')) ? get_static_option('image_gallery_page_slug') : 'image-gallery';
    $donor_page_slug = !empty(get_static_option('donor_page_slug')) ? get_static_option('donor_page_slug') : 'donor-list';
    $success_story_page_slug = !empty(get_static_option('success_story_page_slug')) ? get_static_option('success_story_page_slug') : 'success-story';


/*----------------------------------------------------------------------------------------------------------------------------
| FRONTEND ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
Route::get('/','FrontendController@index')->name('homepage');
Route::get('/p/{slug?}/{id}','FrontendController@dynamic_single_page')->name('frontend.dynamic.page');
Route::get('/home/{id}','FrontendController@home_page_change')->name('homepage.demo');

Route::get('/'.$donor_page_slug,'FrontendController@donor_list')->name('frontend.donor.list');
Route::get('/'.$about_page_slug,'FrontendController@about_page')->name('frontend.about');

Route::get('/'.$image_gallery_page_slug.'','FrontendController@image_gallery_page')->name('frontend.image.gallery');
Route::get('/'.$faq_page_slug,'FrontendController@faq_page')->name('frontend.faq');

Route::get('/'.$team_page_slug,'FrontendController@team_page')->name('frontend.team');
Route::get('/'.$testimonial_page_slug,'FrontendController@testimonials')->name('frontend.testimonials');
Route::get('/'.$contact_page_slug,'FrontendController@contact_page')->name('frontend.contact');

//Success Story
Route::get('/'.$success_story_page_slug,'FrontendController@success_story_page')->name('frontend.success.story');
Route::get('/'.$success_story_page_slug.'/{slug}','FrontendController@success_story_single')->name('frontend.success.story.single');
Route::get('/'.$success_story_page_slug.'-category/{id}/{any?}','FrontendController@success_story_category')->name('frontend.success.story.category');


//Client New Required Routes
Route::get('/pre-payment-page','FrontendController@prepayment_page')->name('frontend.pre.payment.page');


//Newsletter

Route::get('/subscriber/email-verify/{token}','FrontendController@subscriber_verify')->name('subscriber.verify');
//Event Global
$events_page_slug = get_static_option('events_page_slug') ?? 'events';
 Route::post('/'.$events_page_slug.'-booking','FrontendFormController@store_event_booking_data')->name('frontend.event.booking.store');


//Contact Route
Route::post('/contact-message','FrontendFormController@send_contact_message')->name('frontend.contact.message');

    /*---------------------------------
      PAYMENT IPN  ROUTES//Global
    ---------------------------------*/
    Route::get('/paypal-ipn', 'PaymentLogController@paypal_ipn')->name('frontend.paypal.ipn');
    Route::post('/paytm-ipn', 'PaymentLogController@paytm_ipn')->name('frontend.paytm.ipn');
    Route::post('/stripe','PaymentLogController@stripe_charge')->name('frontend.stripe.charge');
    Route::get('/stripe/pay','PaymentLogController@stripe_ipn')->name('frontend.stripe.ipn');
    Route::post('/razorpay', 'PaymentLogController@razorpay_ipn')->name('frontend.razorpay.ipn');
    Route::post('/paystack/pay', 'PaymentLogController@paystack_pay')->name('frontend.paystack.pay');
    Route::get('/paystack/callback', 'PaymentLogController@paystack_callback')->name('frontend.paystack.callback');
    Route::get('/flutterwave/callback', 'PaymentLogController@flutterwave_callback')->name('frontend.flutterwave.callback');
    Route::get('/mollie/callback', 'PaymentLogController@mollie_webhook')->name('frontend.mollie.webhook');

/*----------------------------------------------------------------------------------------------------------------------------
| BLOG AREA FRONTEND ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    //blog
    Route::get('/'.$blog_page_slug,'FrontendController@blog_page')->name('frontend.blog');
    Route::get('/'.$blog_page_slug.'/{slug}','FrontendController@blog_single_page')->name('frontend.blog.single');
    Route::get('/'.$blog_page_slug.'-search','FrontendController@blog_search_page')->name('frontend.blog.search');
    Route::get('/'.$blog_page_slug.'-category/{id}/{any?}','FrontendController@category_wise_blog_page')->name('frontend.blog.category');
    Route::get('/'.$blog_page_slug.'-tags/{name}','FrontendController@tags_wise_blog_page')->name('frontend.blog.tags.page');


    /*----------------------------------------------------------------------------------------------------------------------------
    | USER DASHBOARD
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::get('campaign/user', 'FrontendController@user_campaign')->name('frontend.campaign.user');

    Route::prefix('user-home')->middleware(['userEmailVerify', 'setlang:frontend', 'globalVariable', 'maintains_mode'])->group(function () {
        Route::get('/', 'UserDashboardController@user_index')->name('user.home');
        Route::get('/download/file/{id}', 'UserDashboardController@download_file')->name('user.dashboard.download.file');
        Route::get('/events-booking', 'UserDashboardController@event_booking')->name('user.home.event.booking');
        Route::get('/donations', 'UserDashboardController@donations')->name('user.home.donations');

        Route::get('/change-password', 'UserDashboardController@change_password')->name('user.home.change.password');
        Route::get('/edit-profile', 'UserDashboardController@edit_profile')->name('user.home.edit.profile');
        Route::post('/profile-update', 'UserDashboardController@user_profile_update')->name('user.profile.update');
        Route::post('/password-change', 'UserDashboardController@user_password_change')->name('user.password.change');
        Route::post('/event-order/cancel', 'UserDashboardController@event_order_cancel')->name('user.dashboard.event.order.cancel');
        Route::post('/donation-order/cancel', 'UserDashboardController@donation_order_cancel')->name('user.dashboard.donation.order.cancel');
        //Support Ticket
        Route::get('/support-tickets', 'UserDashboardController@support_tickets')->name('user.home.support.tickets');
        Route::get('support-ticket/view/{id}', 'UserDashboardController@support_ticket_view')->name('user.dashboard.support.ticket.view');
        Route::post('support-ticket/priority-change', 'UserDashboardController@support_ticket_priority_change')->name('user.dashboard.support.ticket.priority.change');
        Route::post('support-ticket/status-change', 'UserDashboardController@support_ticket_status_change')->name('user.dashboard.support.ticket.status.change');
        Route::post('support-ticket/message', 'UserDashboardController@support_ticket_message')->name('user.dashboard.support.ticket.message');

        Route::get('verify-info', 'UserDashboardController@verify_info')->name('user.dashboard.verify.info.page');
        Route::post('verify-info/store', 'UserDashboardController@verify_info_store')->name('user.dashboard.verify.info.store');

        /* -----------------------------------------------------
        |   USER CAMPAIGN ROUTES
        |------------------------------------------------------*/
       Route::group(['namespace' => 'User'],function (){
           Route::get('/all/campaign', 'UserCampaignController@all_campaign')->name('user.campaign.all');
           Route::get('campaign/new', 'UserCampaignController@new_campaign')->name('user.campaign.new');
           Route::post('campaign/new', 'UserCampaignController@store_campaign');
           Route::get('campaign/edit/{id}', 'UserCampaignController@edit_campaign')->name('user.campaign.edit');
           Route::post('/campaign/update', 'UserCampaignController@update_campaign')->name('user.campaign.update');
           Route::post('/campaign/delete/{id}', 'UserCampaignController@delete_campaign')->name('user.campaign.delete');
       });

        /* -----------------------------------
            User Campaigns Cause Update
        ------------------------------------*/
        Route::get('/all/cause/update/{id}', 'UserDashboardController@user_all_update_causes')->name('user.all.update.cause.page');
        Route::get('/new/cause/update/{id}', 'UserDashboardController@new_user_update_cause')->name('user.add.new.update.cause.page');
        Route::post('/new/cause/update/{id}', 'UserDashboardController@store_update_causes');
        Route::post('/update/cause/update', 'UserDashboardController@update_update_causes')->name('user.donations.update.cause.update');
        Route::post('/delete/cause/update/{id}', 'UserDashboardController@delete_update_cause')->name('user.donations.update.cause.delete');

        /*-------------------------------------
            Campaign log withdraw
        -------------------------------------*/
        Route::get('/campaign/log/withdraw','UserDashboardController@campaign_log_withdraw')->name('user.campaign.log.withdraw');
        Route::post('/campaign/withdraw/submit','UserDashboardController@campaign_withdraw_submit')->name('user.campaign.withdraw.submit');
        Route::post('/campaign/withdraw/check','UserDashboardController@campaign_withdraw_check')->name('user.campaign.withdraw.check');
        Route::get('/campaign/withdraw/view/{id}','UserDashboardController@campaign_withdraw_view')->name('user.campaign.withdraw.view');


        /*----------------------------------------------------------------------------------------------------------------------------
        | MEDIA UPLOAD ROUTE
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix'=>'media-upload','namespace'=>'User'],function () {
            Route::post('/', 'MediaUploadController@upload_media_file')->name('user.upload.media.file');
            Route::post('/all', 'MediaUploadController@all_upload_media_file')->name('user.upload.media.file.all');
            Route::post('/alt', 'MediaUploadController@alt_change_upload_media_file')->name('user.upload.media.file.alt.change');
            Route::post('/delete', 'MediaUploadController@delete_upload_media_file')->name('user.upload.media.file.delete');
        });


    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | USER LOGIN - REGISTRATION
    |----------------------------------------------------------------------------------------------------------------------------*/
    //user login
    Route::get('/login','Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/ajax-login','FrontendController@ajax_login')->name('user.ajax.login');
    Route::post('/login','Auth\LoginController@login');
    Route::get('/login/forget-password','FrontendController@showUserForgetPasswordForm')->name('user.forget.password');
    Route::get('/login/reset-password/{user}/{token}','FrontendController@showUserResetPasswordForm')->name('user.reset.password');
    Route::post('/login/reset-password','FrontendController@UserResetPassword')->name('user.reset.password.change');
    Route::post('/login/forget-password','FrontendController@sendUserForgetPasswordMail');
    Route::post('/logout','Auth\LoginController@logout')->name('user.logout');
    Route::get('/user-logout','FrontendController@user_logout')->name('frontend.user.logout');
    //user register
    Route::post('/register','Auth\RegisterController@register');
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('user.register');
    //user email verify
    Route::get('/user/email-verify','UserDashboardController@user_email_verify_index')->name('user.email.verify');
    Route::get('/user/resend-verify-code','UserDashboardController@reset_user_email_verify_code')->name('user.resend.verify.mail');
    Route::post('/user/email-verify','UserDashboardController@user_email_verify');
    Route::post('/package-user/generate-invoice','FrontendController@generate_package_invoice')->name('frontend.package.invoice.generate');
});


/*----------------------------------------------------------------------------------------------------------------------------
| LANGUAGE CHANGE
|----------------------------------------------------------------------------------------------------------------------------*/
Route::get('/lang','FrontendController@lang_change')->name('frontend.langchange');
Route::post('/subscribe-newsletter','FrontendController@subscribe_newsletter')->name('frontend.subscribe.newsletter');
    /*----------------------------------------------------------------------------------------------------------------------------
    | ADMIN LOGIN
    |----------------------------------------------------------------------------------------------------------------------------*/
Route::middleware(['setlang:backend'])->group(function (){
    Route::get('/login/admin','Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::get('/login/admin/forget-password','FrontendController@showAdminForgetPasswordForm')->name('admin.forget.password');
    Route::get('/login/admin/reset-password/{user}/{token}','FrontendController@showAdminResetPasswordForm')->name('admin.reset.password');
    Route::post('/login/admin/reset-password','FrontendController@AdminResetPassword')->name('admin.reset.password.change');
    Route::post('/login/admin/forget-password','FrontendController@sendAdminForgetPasswordMail');
    Route::get('/logout/admin','Admin\AdminDashboardController@adminLogout')->name('admin.logout');
    Route::post('/login/admin','Auth\LoginController@adminLogin');
});



/*---------------------------------------------------------------------------------------------------------------------------------
|                                                          ADMIN PANEL ROUTES
|----------------------------------------------------------------------------------------------------------------------------------*/
Route::prefix('admin-home')->middleware(['setlang:backend','adminglobalVariable'])->group(function () {



    /*----------------------------------------------------------------------------------------------------------------------------
     | JOB POST ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'jobs', 'namespace' => 'Admin'], function () {

        Route::get('/all', 'JobsController@all_jobs')->name('admin.jobs.all');
        Route::get('/new', 'JobsController@new_job')->name('admin.jobs.new');
        Route::post('/new', 'JobsController@store_job');
        Route::get('/edit/{id}', 'JobsController@edit_job')->name('admin.jobs.edit');
        Route::post('/update', 'JobsController@update_job')->name('admin.jobs.update');
        Route::post('/delete/{id}', 'JobsController@delete_job')->name('admin.jobs.delete');
        Route::post('/clone', 'JobsController@clone_job')->name('admin.jobs.clone');
        Route::post('/bulk-action', 'JobsController@bulk_action')->name('admin.jobs.bulk.action');

        //job applicant
        Route::get('/applicant', 'JobsController@all_jobs_applicant')->name('admin.jobs.applicant');
        Route::post('/applicant/delete/{id}', 'JobsController@delete_job_applicant')->name('admin.jobs.applicant.delete');
        Route::post('/applicant/bulk-delete', 'JobsController@job_applicant_bulk_delete')->name('admin.jobs.applicant.bulk.delete');
        Route::get('/applicant/report', 'JobsController@job_applicant_report')->name('admin.jobs.applicant.report');
        Route::post('/applicant/mail', 'JobsController@job_applicant_mail')->name('admin.jobs.applicant.mail');
        Route::get('/applicant/view/{id}', 'JobsController@job_applicant_view')->name('admin.jobs.applicant.view');

        //all settings routes
        Route::get('/settings', 'JobsController@settings')->name('admin.jobs.settings');
        Route::post('/settings', 'JobsController@update_settings');


    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | JOB CATEGORY ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'jobs', 'namespace' => 'Admin'], function () {
        //job category
        Route::get('/category', 'JobsCategoryController@all_jobs_category')->name('admin.jobs.category.all');
        Route::post('/category/new', 'JobsCategoryController@store_jobs_category')->name('admin.jobs.category.new');
        Route::post('/category/update', 'JobsCategoryController@update_jobs_category')->name('admin.jobs.category.update');
        Route::post('/category/delete/{id}', 'JobsCategoryController@delete_jobs_category')->name('admin.jobs.category.delete');
        Route::post('/category/bulk-action', 'JobsCategoryController@bulk_action')->name('admin.jobs.category.bulk.action');
        Route::post('/category/lang', 'JobsCategoryController@Language_by_slug')->name('admin.jobs.category.by.lang');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | EVENTS ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'events', 'namespace' => 'Admin'], function () {

        Route::get('', 'EventsController@all_events')->name('admin.events.all');
        Route::get('/new', 'EventsController@new_event')->name('admin.events.new');
        Route::post('/new', 'EventsController@store_event');
        Route::get('/edit/{id}', 'EventsController@edit_event')->name('admin.events.edit');
        Route::post('/update', 'EventsController@update_event')->name('admin.events.update');
        Route::post('/delete/{id}', 'EventsController@delete_event')->name('admin.events.delete');
        Route::post('/clone', 'EventsController@clone_event')->name('admin.events.clone');
        Route::post('/bulk-action', 'EventsController@bulk_action')->name('admin.events.bulk.action');

        //event page settings
        Route::get('/page-settings', 'EventsController@page_settings')->name('admin.events.page.settings');
        Route::post('/page-settings', 'EventsController@update_page_settings');

        //event single page settings
        Route::get('/single-page-settings', 'EventsController@single_page_settings')->name('admin.events.single.page.settings');
        Route::post('/single-page-settings', 'EventsController@update_single_page_settings');

        //event attendance logs
        Route::get('/event-attendance-logs', 'EventsController@event_attendance_logs')->name('admin.event.attendance.logs');
        Route::post('/event-attendance-logs', 'EventsController@update_event_attendance_logs_status');
        Route::post('/event-attendance-logs/delete/{id}', 'EventsController@delete_event_attendance_logs')->name('admin.event.attendance.logs.delete');
        Route::post('/event-attendance-logs/send-mail', 'EventsController@send_mail_event_attendance_logs')->name('admin.event.attendance.send.mail');
        Route::post('/event-attendance-logs/bulk-action', 'EventsController@attendance_logs_bulk_action')->name('admin.event.attendance.bulk.action');
        Route::post('/event-attendance/reminder', 'EventsController@event_attedance_reminder')->name('admin.event.attendance.reminder');
        Route::get('/event-attendance/view/{id}', 'EventsController@event_attendance_view')->name('admin.event.attendance.view');
        //event payment logs
        Route::get('/event-payment-logs', 'EventsController@event_payment_logs')->name('admin.event.payment.logs');
        Route::post('/event-payment-logs/delete/{id}', 'EventsController@delete_event_payment_logs')->name('admin.event.payment.delete');
        Route::post('/event-payment-logs/approve/{id}', 'EventsController@approve_event_payment')->name('admin.event.payment.approve');
        Route::post('/event-payment-logs/bulk-action', 'EventsController@payment_logs_bulk_action')->name('admin.event.payment.bulk.action');
        Route::get('/event-payment-logs/view/{id}', 'EventsController@payment_logs_view')->name('admin.event.payment.view');

        Route::get('/payment/report', 'EventsController@payment_report')->name('admin.event.payment.report');
        Route::get('/attendance/report', 'EventsController@attendance_report')->name('admin.event.attendance.report');

    });


    /*----------------------------------------------------------------------------------------------------------------------------
     | EVENTS ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'events', 'namespace' => 'Admin'], function () {
        Route::get('/category', 'EventsCategoryController@all_events_category')->name('admin.events.category.all');
        Route::post('/category/new', 'EventsCategoryController@store_events_category')->name('admin.events.category.new');
        Route::post('/category/update', 'EventsCategoryController@update_events_category')->name('admin.events.category.update');
        Route::post('/category/delete/{id}', 'EventsCategoryController@delete_events_category')->name('admin.events.category.delete');
        Route::post('/category/lang', 'EventsCategoryController@Category_by_language_slug')->name('admin.events.category.by.lang');
        Route::post('/category/bulk-action', 'EventsCategoryController@bulk_action')->name('admin.events.category.bulk.action');

    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | EVENTS PAGE MANAGE ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'events', 'namespace' => 'Admin'], function () {
        Route::get('/page-manage','EventsPageManageController@events_page_manage')->name('admin.event.page.manage');
        Route::post('/page-manage','EventsPageManageController@update_events_page_manage');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | CAUSES ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'donations', 'namespace' => 'Admin' ], function () {

        Route::get('/', 'CausesController@all_donation')->name('admin.donations.all');
        Route::get('/pending', 'CausesController@all_pending_donation')->name('admin.donations.pending.all');
        Route::get('/new', 'CausesController@new_donation')->name('admin.donations.new');
        Route::post('/new', 'CausesController@store_donation');
        Route::get('/edit/{id}', 'CausesController@edit_donation')->name('admin.donations.edit');
        Route::get('/donors/{id}', 'CausesController@donated_donors')->name('admin.donations.donors');
        Route::post('/update', 'CausesController@update_donation')->name('admin.donations.update');
        Route::post('/delete/{id}', 'CausesController@delete_donation')->name('admin.donations.delete');
        Route::post('/clone', 'CausesController@clone_donation')->name('admin.donations.clone');
        Route::post('/bulk-action', 'CausesController@bulk_action')->name('admin.donations.bulk.action');
        Route::post('/reminder', 'CausesController@donation_reminder')->name('admin.donation.reminder');
        Route::post('/approve', 'CausesController@donation_approve')->name('admin.donation.approve');

        //donation page settings
        Route::get('/settings', 'CausesController@settings')->name('admin.donations.settings');
        Route::post('/settings', 'CausesController@update_settings');

        //donation single page variant
        Route::get('/single-page-variant', 'CausesController@single_variant')->name('admin.donations.single.page.variant');
        Route::post('/single-page-variant', 'CausesController@update_single_variant');

        //report generate
        Route::get('/report', 'CausesController@donation_report')->name('admin.donations.report');

        //donation payment logs
        Route::get('/payment-logs', 'CausesController@donation_payment_logs')->name('admin.donations.payment.logs');
        Route::post('/payment-logs/delete/{id}', 'CausesController@delete_donation_payment_logs')->name('admin.donations.payment.delete');
        Route::post('/payment-logs/approve/{id}', 'CausesController@approve_donation_payment')->name('admin.donations.payment.approve');
        Route::post('/payment-logs/bulk-action', 'CausesController@donation_payment_logs_bulk_action')->name('admin.donations.payment.bulk.action');

        /*----------------------------------------------------------------------------------------------------------------------------
         | CAUSES CATEGORY ROUTES
         |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'category'], function () {
            //donation category
            Route::get('/', 'CausesCategoryController@all_donation_category')->name('admin.donations.category.all');
            Route::post('/new', 'CausesCategoryController@store_donation_category')->name('admin.donations.category.new');
            Route::post('/update', 'CausesCategoryController@update_donation_category')->name('admin.donations.category.update');
            Route::post('/delete/{id}', 'CausesCategoryController@delete_donation_category')->name('admin.donations.category.delete');
            Route::post('/lang', 'CausesCategoryController@Category_by_language_slug')->name('admin.donations.category.by.lang');
            Route::post('/bulk-action', 'CausesCategoryController@bulk_action')->name('admin.donations.category.bulk.action');

        });

        /*----------------------------------------------------------------------------------------------------------------------------
        | CAUSES UPDATE ROUTES
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'cause-update'], function () {
            Route::get('/new/{id}', 'UpdateCauseController@all_update_causes')->name('add.new.update.cause.page');
            Route::post('/new/{id}', 'UpdateCauseController@store_update_causes');
            Route::post('/update', 'UpdateCauseController@update_update_causes')->name('admin.donations.update.cause.update');
            Route::post('/delete/{id}', 'UpdateCauseController@delete_update_cause')->name('admin.donations.update.cause.delete');
            Route::post('/bulk-action', 'UpdateCauseController@bulk_action')->name('admin.donations.update.cause.bulk.action');

        });

        /*----------------------------------------------------------------------------------------------------------------------------
        | CAUSES COMMENT ROUTES
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'cause-comment'], function () {
            Route::get('/all/{id}', 'CauseCommentController@all_cause_comment')->name('all.cause.comment.page');
            Route::post('/delete/{id}', 'CauseCommentController@delete_cause_comment')->name('admin.donations.cause.comment.delete');
            Route::post('/bulk-action', 'CauseCommentController@bulk_action')->name('admin.donations.cause.comment.bulk.action');
        });

        /*----------------------------------------------------------------------------------------------------------------------------
        | DONATION WITHDRAW ROUTES
        |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'withdraw'], function () {
            Route::get('/request/all', 'WithdrawController@all_donation_withdraw')->name('admin.all.donation.withdraw.request');
            Route::get('/edit/{id}', 'WithdrawController@edit_donation_withdraw')->name('admin.donations.withdraw.edit');
            Route::post('/update', 'WithdrawController@update_donation_withdraw')->name('admin.donations.withdraw.update');
            Route::post('/delete/{id}', 'WithdrawController@delete_donation_withdraw')->name('admin.donations.withdraw.delete');
            Route::get('/view/{id}', 'WithdrawController@view_donation_withdraw')->name('admin.donations.withdraw.view');
            Route::post('/bulk-action', 'WithdrawController@bulk_action')->name('admin.donations.withdraw.bulk.action');
            Route::get('/approval/{id}', 'WithdrawController@Withdraw_Approval')->name('admin.donations.withdraw.approval');
        });

    /*----------------------------------------------------------------------------------------------------------------------------
     | FLAG REPORTS ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
        Route::group(['prefix' => 'flag-reports'], function () {
            Route::get('/', 'FlagReportController@index')->name('admin.donations.flag.reports');
            Route::get('/view/{id}', 'FlagReportController@view')->name('admin.donations.flag.reports.view');
            Route::post('/delete-faq/{id}', 'FlagReportController@delete')->name('admin.donations.flag.reports.delete');
            Route::post('/bulk-action', 'FlagReportController@bulk_action')->name('admin.donations.flag.reports.bulk.action');
            //Mail Send
            Route::post('/mail-send', 'FlagReportController@mail_send')->name('admin.donations.flag.report.mail.send');
            Route::post('/cause-status-change', 'FlagReportController@update_cause_status')->name('admin.donations.flag.reports.cause.status.change');
        });

    });

    /*==============================================
       SUPPORT TICKET MODULE
    ==============================================*/
    Route::prefix('support-tickets')->middleware(['auth:admin'])->group(function () {
        Route::get('/', 'Admin\SupportTicketController@all_tickets')->name('admin.support.ticket.all');
        Route::get('/new', 'Admin\SupportTicketController@new_ticket')->name('admin.support.ticket.new');
        Route::post('/new', 'Admin\SupportTicketController@store_ticket');
        Route::post('/delete/{id}', 'Admin\SupportTicketController@delete')->name('admin.support.ticket.delete');
        Route::get('/view/{id}', 'Admin\SupportTicketController@view')->name('admin.support.ticket.view');
        Route::post('/bulk-action', 'Admin\SupportTicketController@bulk_action')->name('admin.support.ticket.bulk.action');
        Route::post('/priority-change', 'Admin\SupportTicketController@priority_change')->name('admin.support.ticket.priority.change');
        Route::post('/status-change', 'Admin\SupportTicketController@status_change')->name('admin.support.ticket.status.change');
        Route::post('/send message', 'Admin\SupportTicketController@send_message')->name('admin.support.ticket.send.message');
        /*-----------------------------------
            SUPPORT TICKET : PAGE SETTINGS ROUTES
        ------------------------------------*/
        Route::get('/page-settings', 'Admin\SupportTicketController@page_settings')->name('admin.support.ticket.page.settings');
        Route::post('/page-settings', 'Admin\SupportTicketController@update_page_settings');
        /*-----------------------------------
          SUPPORT TICKET : DEPARTMENT ROUTES
        ------------------------------------*/
        Route::group(['prefix' => 'department'],function (){
            Route::get('/', 'Admin\SupportTicketDepartmentController@category')->name('admin.support.ticket.department');
            Route::post('/', 'Admin\SupportTicketDepartmentController@new_category');
            Route::post('/delete/{id}', 'Admin\SupportTicketDepartmentController@delete')->name('admin.support.ticket.department.delete');
            Route::post('/update', 'Admin\SupportTicketDepartmentController@update')->name('admin.support.ticket.department.update');
            Route::post('/bulk-action', 'Admin\SupportTicketDepartmentController@bulk_action')->name('admin.support.ticket.department.bulk.action');
        });
    });




//===================================================================================================================================
    //HOME PAGE MANAGE (01,02,03)
//===================================================================================================================================
    Route::group(['prefix'=>'home-page-01','namespace'=>'Admin\HomePages'],function() {

        Route::get('/latest-news','HomePageController@home_01_latest_news')->name('admin.homeone.latest.news');
        Route::post('/latest-news','HomePageController@home_01_update_latest_news');
        Route::get('/latest-event','HomePageController@home_01_latest_event')->name('admin.homeone.latest.event');
        Route::post('/latest-event','HomePageController@home_01_update_latest_event');
        Route::get('/testimonial','HomePageController@home_01_testimonial')->name('admin.homeone.testimonial');
        Route::post('/testimonial','HomePageController@home_01_update_testimonial');
        Route::get('/feature-area','HomePageController@home_01_feature_area')->name('admin.homeone.feature.area');
        Route::post('/feature-area','HomePageController@home_01_update_feature_area');
        Route::get('/about-us','HomePageController@home_01_about_us')->name('admin.homeone.about.us');
        Route::post('/about-us','HomePageController@home_01_update_about_us');

        Route::get('/video-area','HomePageController@home_01_video_area')->name('admin.homeone.video.area');
        Route::post('/video-area','HomePageController@home_01_update_video_area');
        //Section Manage for Home 01,02,03
        Route::get('/section-manage-home-one-two-three','HomePageController@home_01_02_03_section_manage')->name('admin.homeone.section.manage');
        Route::post('/section-manage-home-one-two-three','HomePageController@update_home_01_02_03_section_manage');
        //Section Manage for Home 04,05,06
        Route::get('/section-manage-home-four-five-six','HomePageController@home_04_05_06_section_manage')->name('admin.home.four.five.six.section.manage');
        Route::post('/section-manage-home-four-five-six','HomePageController@update_home_04_05_06_section_manage');

        Route::get('/team-member','HomePageController@home_01_team_member')->name('admin.homeone.team.member');
        Route::post('/team-member','HomePageController@home_01_update_team_member');

        Route::get('/donation-category-area','HomePageController@home_01_donation_category_area')->name('admin.homeone.donation.category.area');
        Route::post('/donation-category-area','HomePageController@home_01_update_donation_category_area');

        Route::get('/feature-cause-area','HomePageController@home_01_featured_cause_area')->name('admin.homeone.featured.cause.area');
        Route::post('/feature-cause-area','HomePageController@home_01_update_featured_cause_area');

        Route::get('/latest-cause-area','HomePageController@home_01_latest_cause_area')->name('admin.homeone.latest.cause.area');
        Route::post('/latest-cause-area','HomePageController@home_01_update_latest_cause_area');
        Route::get('/coutnerup-area','HomePageController@home_02_counterup_area')->name('admin.homeone.counterup.area');
        Route::post('/coutnerup-area','HomePageController@home_02_update_counterup_area');

        Route::get('/what-we-do-area','HomePageController@home_2_what_we_do_area')->name('admin.homeone.what.we.do.area');
        Route::post('/what-we-do-area','HomePageController@home_2_what_we_do_area_update');


        //header slider
        Route::get('/header','HeaderSliderController@index')->name('admin.header');
        Route::post('/header','HeaderSliderController@store');
        Route::post('/update-header','HeaderSliderController@update')->name('admin.header.update');
        Route::post('/delete-header/{id}','HeaderSliderController@delete')->name('admin.header.delete');
        Route::post('/header/bulk-action/','HeaderSliderController@bulk_action')->name('admin.header.bulk.action');
    });

//===================================================================================================================================
//HOME PAGE FOUR MANAGE
//===================================================================================================================================
    Route::group(['prefix'=>'home-page-04','namespace'=>'Admin\HomePages'],function() {
        //Header Area
        Route::get('/header-area','HomePageFourController@header_area')->name('admin.home.four.header.area');
        Route::post('/header-area','HomePageFourController@update_header_area');
        //Feature Area
        Route::get('/feature-area','HomePageFourController@feature_area')->name('admin.home.four.feature.area');
        Route::post('/feature-area','HomePageFourController@update_feature_area');
        //Success Story Area
        Route::get('/success-story-area','HomePageFourController@success_story_area')->name('admin.home.four.success.story.area');
        Route::post('/success-story-area','HomePageFourController@update_success_story_area');
        //About Us Area
        Route::get('/about-us-area','HomePageFourController@about_us_area')->name('admin.home.four.about.us.area');
        Route::post('/about-us-area','HomePageFourController@update_about_us_area');
        //Events Us Area
        Route::get('/events-area','HomePageFourController@events_area')->name('admin.home.four.events.area');
        Route::post('/events-area','HomePageFourController@update_events_area');
        //Recent Causes Area
        Route::get('/recent-causes-area','HomePageFourController@recent_causes_area')->name('admin.home.four.recent.causes.area');
        Route::post('/recent-causes-area','HomePageFourController@update_recent_causes_area');
        //Recent Blog Area
        Route::get('/recent-blog-area','HomePageFourController@recent_blog_area')->name('admin.home.four.recent.blog.area');
        Route::post('/recent-blog-area','HomePageFourController@update_recent_blog_area');
    });

//===================================================================================================================================
//HOME PAGE FIVE MANAGE
//===================================================================================================================================
    Route::group(['prefix'=>'home-page-05','namespace'=>'Admin\HomePages'],function() {
        //Header Area
        Route::get('/rise-area','HomePageFiveController@rise_area')->name('admin.home.five.rise.area');
        Route::post('/rise-area','HomePageFiveController@update_rise_area');
        //Feature Area
        Route::get('/feature-area','HomePageFiveController@feature_area')->name('admin.home.five.feature.area');
        Route::post('/feature-area','HomePageFiveController@update_feature_area');
        //Category Area
        Route::get('/category-area','HomePageFiveController@category_area')->name('admin.home.five.category.area');
        Route::post('/category-area','HomePageFiveController@update_category_area');
        //Success Story Area
        Route::get('/success-story-area','HomePageFiveController@success_story_area')->name('admin.home.five.success.story.area');
        Route::post('/success-story-area','HomePageFiveController@update_success_story_area');
        //Recent Causes Area
        Route::get('/recent-causes-area','HomePageFiveController@recent_causes_area')->name('admin.home.five.recent.causes.area');
        Route::post('/recent-causes-area','HomePageFiveController@update_recent_causes_area');
        //Events Area
        Route::get('/events-area','HomePageFiveController@events_area')->name('admin.home.five.events.area');
        Route::post('/events-area','HomePageFiveController@update_events_area');
        //Recent Blog Area
        Route::get('/recent-blog-area','HomePageFiveController@recent_blog_area')->name('admin.home.five.recent.blog.area');
        Route::post('/recent-blog-area','HomePageFiveController@update_recent_blog_area');
    });

//===================================================================================================================================
//HOME PAGE SIX MANAGE
//===================================================================================================================================
    Route::group(['prefix'=>'home-page-06','namespace'=>'Admin\HomePages'],function() {
        //Header Area
        Route::get('/header-area','HomePageSixController@header_area')->name('admin.home.six.header.area');
        Route::post('/header-area','HomePageSixController@update_header_area');
        //Rise Area
        Route::get('/rise-area','HomePageSixController@rise_area')->name('admin.home.six.rise.area');
        Route::post('/rise-area','HomePageSixController@update_rise_area');
        //Feature Area
        Route::get('/feature-area','HomePageSixController@feature_area')->name('admin.home.six.feature.area');
        Route::post('/feature-area','HomePageSixController@update_feature_area');
        //Category Area
        Route::get('/category-area','HomePageSixController@category_area')->name('admin.home.six.category.area');
        Route::post('/category-area','HomePageSixController@update_category_area');
        //Recent Causes Area
        Route::get('/recent-causes-area','HomePageSixController@recent_causes_area')->name('admin.home.six.recent.causes.area');
        Route::post('/recent-causes-area','HomePageSixController@update_recent_causes_area');
        //Success Story Area
        Route::get('/success-story-area','HomePageSixController@success_story_area')->name('admin.home.six.success.story.area');
        Route::post('/success-story-area','HomePageSixController@update_success_story_area');
        //About Us Area
        Route::get('/about-us-area','HomePageSixController@about_us_area')->name('admin.home.six.about.us.area');
        Route::post('/about-us-area','HomePageSixController@update_about_us_area');
        //Events Area
        Route::get('/events-area','HomePageSixController@events_area')->name('admin.home.six.events.area');
        Route::post('/events-area','HomePageSixController@update_events_area');
    });


    //Widget Routes
    Route::group(['prefix'=>'widgets','namespace'=>'Admin'],function() {
     //widget manage
     Route::get('/all', 'WidgetsController@index')->name('admin.widgets');
     Route::post('/all', 'WidgetsController@new_widget')->name('admin.widgets.new');
     Route::post('/markup', 'WidgetsController@widget_markup')->name('admin.widgets.markup');
     Route::post('/update', 'WidgetsController@update_widget')->name('admin.widgets.update');
     Route::post('//update/order', 'WidgetsController@update_order_widget')->name('admin.widgets.update.order');
     Route::post('/delete', 'WidgetsController@delete_widget')->name('admin.widgets.delete');
 });

    //TOPBAR SETTINGS
    Route::group(['prefix'=>'topbar-settings','namespace'=>'Admin'],function(){
        Route::get('/all', "TopbarController@index")->name('admin.topbar.settings');
        Route::post('/all', 'TopbarController@store');
        Route::post('/update', 'TopbarController@update')->name('admin.topbar.update');
        Route::post('/delete/{id}', 'TopbarController@delete')->name('admin.topbar.delete');
        Route::post('/bulk-action', 'TopbarController@bulk_action')->name('admin.topbar.bulk.action');
    });

    //MENU MANAGE
    Route::group(['prefix'=>'menu','namespace'=>'Admin'],function() {
        Route::get('/', 'MenuController@index')->name('admin.menu');
        Route::post('/new-menu', 'MenuController@store_new_menu')->name('admin.menu.new');
        Route::get('/edit/{id}', 'MenuController@edit_menu')->name('admin.menu.edit');
        Route::post('/update/{id}', 'MenuController@update_menu')->name('admin.menu.update');
        Route::post('/delete/{id}', 'MenuController@delete_menu')->name('admin.menu.delete');
        Route::post('/default/{id}', 'MenuController@set_default_menu')->name('admin.menu.default');
        Route::post('/mega-menu', 'MenuController@mega_menu_item_select_markup')->name('admin.mega.menu.item.select.markup');
    });

    //GENERAL MENU MANAGE
    Route::group(['prefix'=>'general-menu','namespace'=>'Admin'],function() {
        Route::get('/', 'GeneralMenuController@general_menu_manage')->name('admin.general.menu');
        Route::post('/update', 'GeneralMenuController@update_general_menu_manage')->name('admin.general.menu.update');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | Banner  ROUTES
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'banner', 'namespace' => 'Admin'], function () {
        Route::get('/all','BannerController@index')->name('admin.banner');
        Route::post('/all','BannerController@store');
        Route::post('/update','BannerController@update')->name('admin.banner.update');
        Route::post('/delete/{id}','BannerController@delete')->name('admin.banner.delete');
        Route::post('/bulk-action','BannerController@bulk_action')->name('admin.banner.bulk.action');
    });



    //404 page manage
    Route::get('404-page-manage', 'Admin\Error404PageManage@error_404_page_settings')->name('admin.404.page.settings');
    Route::post('404-page-manage', 'Admin\Error404PageManage@update_error_404_page_settings');
    // maintains page
    Route::get('/maintains-page/settings', 'Admin\MaintainsPageController@maintains_page_settings')->name('admin.maintains.page.settings');
    Route::post('/maintains-page/settings', 'Admin\MaintainsPageController@update_maintains_page_settings');


//FORM BUILDER ROUTES
Route::group(['prefix'=>'form-builder','namespace'=>'Admin'],function() {
    Route::get('/get-in-touch', 'FormBuilderController@get_in_touch_form_index')->name('admin.form.builder.get.in.touch');
    Route::post('/get-in-touch', 'FormBuilderController@update_get_in_touch_form');

    //service query routes
    Route::get('/service-query', 'FormBuilderController@service_query_index')->name('admin.form.builder.service.query');
    Route::post('/service-query', 'FormBuilderController@update_service_query');
    //case study query routes
    Route::get('/case-study-query', 'FormBuilderController@case_study_query_index')->name('admin.form.builder.case.study.query');
    Route::post('/case-study-query', 'FormBuilderController@update_case_study_query');

    Route::get('/quote-form', 'FormBuilderController@quote_form_index')->name('admin.form.builder.quote');
    Route::post('/quote-form', 'FormBuilderController@update_quote_form');
    Route::get('/order-form', 'FormBuilderController@order_form_index')->name('admin.form.builder.order');
    Route::post('/order-form', 'FormBuilderController@update_order_form');
    Route::get('/contact-form', 'FormBuilderController@contact_form_index')->name('admin.form.builder.contact');
    Route::post('/contact-form', 'FormBuilderController@update_contact_form');

    Route::get('/apply-job-form', 'FormBuilderController@apply_job_form_index')->name('admin.form.builder.apply.job.form');
    Route::post('/apply-job-form', 'FormBuilderController@update_apply_job_form');
    //event attendance
    Route::get('/event-attendance', 'FormBuilderController@event_attendance_form_index')->name('admin.form.builder.event.attendance.form');
    Route::post('/event-attendance', 'FormBuilderController@update_event_attedance_form');
});



    /*----------------------------------------------------------------------------------------------------------------------------
    | HOMEPAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    //homepage manage
    Route::prefix('home-page')->group(function () {
        //header slider
        Route::get('/header', 'HeaderSliderController@index')->name('admin.home.header');
        Route::post('/header', 'HeaderSliderController@store');
        Route::post('/update-header', 'HeaderSliderController@update')->name('admin.home.header.update');
        Route::post('/delete-header/{id}', 'HeaderSliderController@delete')->name('admin.home.header.delete');
        Route::post('/header/bulk-action/', 'HeaderSliderController@bulk_action')->name('admin.home.header.bulk.action');
        //Key Features
        Route::get('/key-features-area', 'HomePageController@key_features_section')->name('admin.home.key.features');
        Route::post('/key-features-area', 'HomePageController@update_key_features_section');

        //Counter Up Area
        Route::get('/counterup-area', 'HomePageController@counterup_area')->name('admin.home.counter.up.area');
        Route::post('/counterup-area', 'HomePageController@update_counterup_area');
        //why-choose-us area
        Route::get('/why-choose-us-area-settings', 'HomePageController@why_choose_us_area')->name('admin.home.why.choose.us');
        Route::post('/why-choose-us-area-settings', 'HomePageController@update_why_choose_us_area');

        //call to action area
        Route::get('/call-to-action-settings', 'HomePageController@call_to_action_area')->name('admin.home.call.to.action');
        Route::post('/call-to-action-settings', 'HomePageController@update_call_to_action_area');

        //testimonial area
        Route::get('/testimonial-area-settings', 'HomePageController@testimonial_area')->name('admin.home.testimonial');
        Route::post('/testimonial-area-settings', 'HomePageController@update_testimonial_area');


        //keyfeatures area
        Route::get('/keyfeatures-area-settings', 'HomePageController@keyfeatures_area')->name('admin.home.keyfeatures');
        Route::post('/keyfeatures-area-settings', 'HomePageController@update_keyfeatures_area');
        //price plan area
        Route::get('/price-plan-area-settings', 'HomePageController@price_plan_area')->name('admin.home.price.plan');
        Route::post('/price-plan-area-settings', 'HomePageController@update_price_plan_area');

        //latest blog area
        Route::get('/latest-blog-settings', 'HomePageController@latest_blog_area')->name('admin.home.blog.latest');
        Route::post('/latest-blog-settings', 'HomePageController@update_latest_blog_area');
        //counterup
        Route::get('/counterup-settings', 'HomePageController@counterup_settings')->name('admin.home.counterup');
        Route::post('/counterup-settings', 'HomePageController@update_counterup_settings');

        //section manage
        Route::get('/section-manage', 'HomePageController@section_manage')->name('admin.home.section.manage');
        Route::post('/section-manage', 'HomePageController@update_section_manage');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | ABOUT US PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/

    Route::group(['prefix'=>'about-page','namespace'=>'Admin'],function () {
        //about page
        Route::get('/about-us','AboutUsPageController@about_page_about_section')->name('admin.about.page.about');
        Route::post('/about-us','AboutUsPageController@about_page_update_about_section');
        //our mission
        Route::get('/our-mission','AboutUsPageController@about_page_our_section')->name('admin.about.our.mission');
        Route::post('/our-mission','AboutUsPageController@about_page_update_our_section');
        //counterup
        Route::get('/counterup','AboutUsPageController@about_page_counterup_section')->name('admin.about.counterup');
        Route::post('/counterup','AboutUsPageController@about_page_update_counterup_section');

        //counterup
        Route::get('/what-we-do','AboutUsPageController@about_page_what_we_do_section')->name('admin.about.what.we.do');
        Route::post('/what-we-do','AboutUsPageController@about_page_update_what_we_do_section');

        //team member
        Route::get('/team-member','AboutUsPageController@about_page_team_member_section')->name('admin.about.team.member');
        Route::post('/team-member','AboutUsPageController@about_page_update_team_member_section');
        //testimonial
        Route::get('/testimonial','AboutUsPageController@about_page_testimonial_section')->name('admin.about.testimonial');
        Route::post('/testimonial','AboutUsPageController@about_page_update_testimonial_section');

        Route::get('/section-manage','AboutUsPageController@about_page_section_manage')->name('admin.about.page.section.manage');
        Route::post('/section-manage','AboutUsPageController@about_page_update_section_manage');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
    | CONTACT PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'contact-page','namespace'=>'Admin'],function (){
        //contact page
        Route::get('/form-area','ContactPageController@contact_page_form_area')->name('admin.contact.page.form.area');
        Route::post('/form-area','ContactPageController@contact_page_update_form_area');
        Route::get('/map','ContactPageController@contact_page_map_area')->name('admin.contact.page.map');
        Route::post('/map','ContactPageController@contact_page_update_map_area');

        Route::get('/section-manage','ContactPageController@contact_page_section_manage')->name('admin.contact.page.section.manage');
        Route::post('/section-manage','ContactPageController@contact_page_update_section_manage');

        //contact info
        Route::get('/contact-info','ContactInfoController@index')->name('admin.contact.info');
        Route::post('/contact-info','ContactInfoController@store');
        Route::post('/contact-info/title','ContactInfoController@contact_info_title')->name('admin.contact.info.title');
        Route::post('/contact-info/update','ContactInfoController@update')->name('admin.contact.info.update');
        Route::post('/contact-info/delete/{id}','ContactInfoController@delete')->name('admin.contact.info.delete');
        Route::post('/contact-info/bulk-action','ContactInfoController@bulk_action')->name('admin.contact.info.bulk.action');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
    | SUCCESS STORY PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'success-story-page','namespace'=>'Admin'],function (){
        //contact page
        Route::get('/success-story-area','SuccessStoryController@sucess_story')->name('admin.success.story.page.manage');
        Route::post('/success-story-area','SuccessStoryController@update_sucess_story');
    });


  /*----------------------------------------------------------------------------------------------------------------------------
  | MEDIA UPLOAD ROUTE
  |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'media-upload','namespace'=>'Admin'],function () {
        Route::post('/alt', 'MediaUploadController@alt_change_upload_media_file')->name('admin.upload.media.file.alt.change');
        Route::get('/page', 'MediaUploadController@all_upload_media_images_for_page')->name('admin.upload.media.images.page');
        Route::post('/delete', 'MediaUploadController@delete_upload_media_file')->name('admin.upload.media.file.delete');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
   | ADMIN DASHBOARD ROUTES
   |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['namespace'=>'Admin'],function () {
        //admin Profile
        Route::get('/settings', 'AdminDashboardController@admin_settings')->name('admin.profile.settings');
        Route::get('/profile-update', 'AdminDashboardController@admin_profile')->name('admin.profile.update');
        Route::post('/profile-update', 'AdminDashboardController@admin_profile_update');
        Route::get('/password-change', 'AdminDashboardController@admin_password')->name('admin.password.change');
        Route::post('/password-change', 'AdminDashboardController@admin_password_chagne');
        //admin index
        Route::get('/', 'AdminDashboardController@adminIndex')->name('admin.home');
        Route::get('/dark-mode-toggle', 'AdminDashboardController@dark_mode_toggle')->name('admin.dark.mode.toggle'); 

        //navbar settings
        Route::get('/navbar-settings', "AdminDashboardController@navbar_settings")->name('admin.navbar.settings');
        Route::post('/navbar-settings', "AdminDashboardController@update_navbar_settings");
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | ADMIN USER ROLE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/new-user','AdminRoleManageController@new_user')->name('admin.new.user');
        Route::post('/new-user','AdminRoleManageController@new_user_add');
        Route::get('/user-edit/{id}','AdminRoleManageController@user_edit')->name('admin.user.edit');
        Route::post('/user-update','AdminRoleManageController@user_update')->name('admin.user.update');
        Route::post('/user-password-change','AdminRoleManageController@user_password_change')->name('admin.user.password.change');
        Route::post('/delete-user/{id}','AdminRoleManageController@new_user_delete')->name('admin.delete.user');
        Route::get('/all','AdminRoleManageController@all_user')->name('admin.all.user');
        /*----------------------------
            ALL ADMIN ROLE ROUTES
        -----------------------------*/
        Route::get('/role','AdminRoleManageController@all_admin_role')->name('admin.all.admin.role');
        Route::get('/role/new','AdminRoleManageController@new_admin_role_index')->name('admin.role.new');
        Route::post('/role/new','AdminRoleManageController@store_new_admin_role');
        Route::get('/role/edit/{id}','AdminRoleManageController@edit_admin_role')->name('admin.user.role.edit');
        Route::post('/role/update','AdminRoleManageController@update_admin_role')->name('admin.user.role.update');
        Route::post('/role/delete/{id}','AdminRoleManageController@delete_admin_role')->name('admin.user.role.delete');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    |FRONTEND USER MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'frontend', 'namespace' => 'Admin'], function () {
        Route::get('/new-user', 'FrontendUserManageController@new_user')->name('admin.frontend.new.user');
        Route::post('/new-user', 'FrontendUserManageController@new_user_add');
        Route::post('/user-update', 'FrontendUserManageController@user_update')->name('admin.frontend.user.update');
        Route::post('/user-password-chnage', 'FrontendUserManageController@user_password_change')->name('admin.frontend.user.password.change');
        Route::post('/delete-user/{id}', 'FrontendUserManageController@new_user_delete')->name('admin.frontend.delete.user');
        Route::get('/all-user', 'FrontendUserManageController@all_user')->name('admin.all.frontend.user');
        Route::post('/all-user/bulk-action', 'FrontendUserManageController@bulk_action')->name('admin.all.frontend.user.bulk.action');
        Route::post('/all-user/email-status', 'FrontendUserManageController@email_status')->name('admin.all.frontend.user.email.status');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    |NEWSLETTER PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'newsletter', 'namespace' => 'Admin'], function () {
        //newsletter
        Route::get('/', 'NewsletterController@index')->name('admin.newsletter');
        Route::post('/delete/{id}', 'NewsletterController@delete')->name('admin.newsletter.delete');
        Route::post('/single', 'NewsletterController@send_mail')->name('admin.newsletter.single.mail');
        Route::get('/all', 'NewsletterController@send_mail_all_index')->name('admin.newsletter.mail');
        Route::post('/all', 'NewsletterController@send_mail_all');
        Route::post('/new', 'NewsletterController@add_new_sub')->name('admin.newsletter.new.add');
        Route::post('/bulk-action', 'NewsletterController@bulk_action')->name('admin.newsletter.bulk.action');
        Route::post('/newsletter/verify-mail-send','NewsletterController@verify_mail_send')->name('admin.newsletter.verify.mail.send');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    |BLOG PAGE MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'blog', 'namespace' => 'Admin'], function () {
        Route::get('/', 'BlogController@index')->name('admin.blog');
        Route::get('/new', 'BlogController@new_blog')->name('admin.blog.new');
        Route::post('/new', 'BlogController@store_new_blog');
        Route::post('/clone', 'BlogController@clone_blog')->name('admin.blog.clone');
        Route::get('/edit/{id}', 'BlogController@edit_blog')->name('admin.blog.edit');
        Route::post('/update/{id}', 'BlogController@update_blog')->name('admin.blog.update');
        Route::post('/delete/{id}', 'BlogController@delete_blog')->name('admin.blog.delete');
        Route::get('/category', 'BlogController@category')->name('admin.blog.category');
        Route::post('/category', 'BlogController@new_category');
        Route::post('/category/delete/{id}', 'BlogController@delete_category')->name('admin.blog.category.delete');
        Route::post('/category/update', 'BlogController@update_category')->name('admin.blog.category.update');
        Route::post('/category/bulk-action', 'BlogController@category_bulk_action')->name('admin.blog.category.bulk.action');
        Route::post('/blog-lang-by-cat', 'BlogController@Language_by_slug')->name('admin.blog.lang.cat');
        //blog page
        Route::get('/page-settings', 'BlogController@blog_page_settings')->name('admin.blog.page.settings');
        Route::post('/page-settings', 'BlogController@update_blog_page_settings');
        //blog single page
        Route::get('/single-settings', 'BlogController@blog_single_page_settings')->name('admin.blog.single.settings');
        Route::post('/single-settings', 'BlogController@update_blog_single_page_settings');
        //bulk action
        Route::post('/bulk-action', 'BlogController@bulk_action')->name('admin.blog.bulk.action');
    });

/*----------------------------------------------------------------------------------------------------------------------------
|SUCCESS STORY MANAGE
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'success-story', 'namespace' => 'Admin'], function () {
        Route::get('/', 'SuccessStoryController@index')->name('admin.success.story');
        Route::get('/new', 'SuccessStoryController@new_success_story')->name('admin.success.story.new');
        Route::post('/new', 'SuccessStoryController@store_new_success_story');
        Route::post('/clone', 'SuccessStoryController@clone_success_story')->name('admin.success.story.clone');
        Route::get('/edit/{id}', 'SuccessStoryController@edit_success_story')->name('admin.success.story.edit');
        Route::post('/update/{id}', 'SuccessStoryController@update_success_story')->name('admin.success.story.update');
        Route::post('/delete/{id}', 'SuccessStoryController@delete_success_story')->name('admin.success.story.delete');
        Route::post('/bulk-action', 'SuccessStoryController@bulk_action')->name('admin.success.story.bulk.action');

        //Success Story Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'SuccessStoryCategoryController@category')->name('admin.success.story.category');
            Route::post('/', 'SuccessStoryCategoryController@new_category');
            Route::post('/update', 'SuccessStoryCategoryController@update_category')->name('admin.success.story.category.update');
            Route::post('/delete/{id}', 'SuccessStoryCategoryController@delete_category')->name('admin.success.story.category.delete');
            Route::post('/bulk-action', 'SuccessStoryCategoryController@category_bulk_action')->name('admin.success.story.category.bulk.action');
        });

    });

/*----------------------------------------------------------------------------------------------------------------------------
 | CLIENT AREA ROUTES
 |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'client-area', 'namespace' => 'Admin'], function () {
        Route::get('/', 'ClientAreaController@index')->name('admin.client.area');
        Route::post('/', 'ClientAreaController@store');
        Route::post('/update', 'ClientAreaController@update')->name('admin.client.area.update');
        Route::post('/delete/{id}', 'ClientAreaController@delete')->name('admin.client.area.delete');
        Route::post('/bulk-action', 'ClientAreaController@bulk_action')->name('admin.client.area.bulk.action');
    });



    /*----------------------------------------------------------------------------------------------------------------------------
     | IMAGE GALLERY ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'gallery-page', 'namespace' => 'Admin'], function () {
        Route::get('/', 'ImageGalleryPageController@index')->name('admin.gallery.all');
        Route::post('/new', 'ImageGalleryPageController@store')->name('admin.gallery.new');
        Route::post('/update', 'ImageGalleryPageController@update')->name('admin.gallery.update');
        Route::post('/delete/{id}', 'ImageGalleryPageController@delete')->name('admin.gallery.delete');
        Route::post('/bulk-action', 'ImageGalleryPageController@bulk_action')->name('admin.gallery.bulk.action');
        Route::get('/page-settings', 'ImageGalleryPageController@page_settings')->name('admin.gallery.page.settings');
        Route::post('/page-settings', 'ImageGalleryPageController@update_page_settings');
        //category
        Route::get('/category', 'ImageGalleryPageController@category_index')->name('admin.gallery.category');
        Route::post('/category/new', 'ImageGalleryPageController@category_store')->name('admin.gallery.category.new');
        Route::post('/category/update', 'ImageGalleryPageController@category_update')->name('admin.gallery.category.update');
        Route::post('/category/delete/{id}', 'ImageGalleryPageController@category_delete')->name('admin.gallery.category.delete');
        Route::post('/category/bulk-action', 'ImageGalleryPageController@category_bulk_action')->name('admin.gallery.category.bulk.action');
        Route::post('/category-by-slug', 'ImageGalleryPageController@category_by_slug')->name('admin.gallery.category.by.lang');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | FAQ ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'faq', 'namespace' => 'Admin'], function () {
        Route::get('/', 'FaqController@index')->name('admin.faq');
        Route::post('/', 'FaqController@store');
        Route::post('/update-faq', 'FaqController@update')->name('admin.faq.update');
        Route::post('/delete-faq/{id}', 'FaqController@delete')->name('admin.faq.delete');
        Route::post('/clone-faq', 'FaqController@clone')->name('admin.faq.clone');
        Route::post('/faq/bulk-action', 'FaqController@bulk_action')->name('admin.faq.bulk.action');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | TEAM MEMBER ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'team-member', 'namespace' => 'Admin'], function () {
        //team member
        Route::get('/all', 'TeamMemberController@index')->name('admin.team.member');
        Route::post('/all', 'TeamMemberController@store');
        Route::post('/update', 'TeamMemberController@update')->name('admin.team.member.update');
        Route::post('/delete/{id}', 'TeamMemberController@delete')->name('admin.team.member.delete');
        Route::post('/clone', 'TeamMemberController@clone')->name('admin.team.member.clone');
        Route::post('/bulk-action', 'TeamMemberController@bulk_action')->name('admin.team.member.bulk.action');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     | PAGES ROUTES
     |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'page', 'namespace' => 'Admin'], function () {
        Route::get('/all', 'PagesController@index')->name('admin.page');
        Route::get('/new', 'PagesController@new_page')->name('admin.page.new');
        Route::post('/new', 'PagesController@store_new_page');
        Route::get('/edit/{id}', 'PagesController@edit_page')->name('admin.page.edit');
        Route::post('/update/{id}', 'PagesController@update_page')->name('admin.page.update');
        Route::post('/delete/{id}', 'PagesController@delete_page')->name('admin.page.delete');
        Route::post('/bulk-action', 'PagesController@bulk_action')->name('admin.page.bulk.action');
    });

  /*----------------------------------------------------------------------------------------------------------------------------
  | TESTIMONIAL  ROUTES
  |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix' => 'testimonial', 'namespace' => 'Admin'], function () {
        Route::get('/all','TestimonialController@index')->name('admin.testimonial');
        Route::post('/all','TestimonialController@store');
        Route::post('/clone','TestimonialController@clone')->name('admin.testimonial.clone');
        Route::post('/update','TestimonialController@update')->name('admin.testimonial.update');
        Route::post('/delete/{id}','TestimonialController@delete')->name('admin.testimonial.delete');
        Route::post('/bulk-action','TestimonialController@bulk_action')->name('admin.testimonial.bulk.action');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | COUNTERUP ROUTES
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'counterup','namespace'=>'Admin'],function (){
        Route::get('/all','CounterUpController@index')->name('admin.counterup');
        Route::post('/all','CounterUpController@store');
        Route::post('/update','CounterUpController@update')->name('admin.counterup.update');
        Route::post('/delete/{id}','CounterUpController@delete')->name('admin.counterup.delete');
        Route::post('/bulk-action','CounterUpController@bulk_action')->name('admin.counterup.bulk.action');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
    | NAVBAR ROUTES
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'appearance-settings/navbar','namespace'=>'Admin'],function () {
        Route::get('/all', 'NavbarController@navbar_settings')->name('admin.navbar.settings');
        Route::post('/all', 'NavbarController@update_navbar_settings');
    });

/*----------------------------------------------------------------------------------------------------------------------------
| HOME VARIANT ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'appearance-settings/home-variant','namespace'=>'Admin'],function () {
        //home page variant
        Route::get('/select', "AdminDashboardController@home_variant")->name('admin.home.variant');
        Route::post('/select', "AdminDashboardController@update_home_variant");
    });


/*----------------------------------------------------------------------------------------------------------------------------
| TOP BAR ROUTES
|----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'appearance-settings/topbar','namespace'=>'Admin'],function () {
        Route::get('/all',"TopbarController@topbar_settings")->name('admin.topbar.settings');
        Route::post('/all',"TopbarController@update_topbar_settings");
        Route::post('/new-social-item','TopbarController@new_social_item')->name('admin.new.social.item');
        Route::post('/update-social-item','TopbarController@update_social_item')->name('admin.update.social.item');
        Route::post('/delete-social-item/{id}','TopbarController@delete_social_item')->name('admin.delete.social.item');
        Route::post('/settings/info-items',"TopbarController@update_topbar_info_items")->name('admin.topbar.info.item.store');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
    | GENERAL SETTINGS MANAGE
    |----------------------------------------------------------------------------------------------------------------------------*/
    Route::group(['prefix'=>'general-settings','namespace'=>'Admin'],function () {
        //general settings
        Route::get('/site-identity', 'GeneralSettingsController@site_identity')->name('admin.general.site.identity');
        Route::post('/site-identity', 'GeneralSettingsController@update_site_identity');

        Route::get('/basic-settings', 'GeneralSettingsController@basic_settings')->name('admin.general.basic.settings');
        Route::post('/basic-settings', 'GeneralSettingsController@update_basic_settings');

        Route::get('/color-settings', 'GeneralSettingsController@color_settings')->name('admin.general.color.settings');
        Route::post('/color-settings', 'GeneralSettingsController@update_color_settings');

        Route::get('/seo-settings', 'GeneralSettingsController@seo_settings')->name('admin.general.seo.settings');
        Route::post('/seo-settings', 'GeneralSettingsController@update_seo_settings');

        Route::get('/scripts', 'GeneralSettingsController@scripts_settings')->name('admin.general.scripts.settings');
        Route::post('/scripts', 'GeneralSettingsController@update_scripts_settings');

        Route::get('/email-template', 'GeneralSettingsController@email_template_settings')->name('admin.general.email.template');
        Route::post('/email-template', 'GeneralSettingsController@update_email_template_settings');

        Route::get('/email-settings', 'GeneralSettingsController@email_settings')->name('admin.general.email.settings');
        Route::post('/email-settings', 'GeneralSettingsController@update_email_settings');

        Route::get('/typography-settings', 'GeneralSettingsController@typography_settings')->name('admin.general.typography.settings');
        Route::post('/typography-settings', 'GeneralSettingsController@update_typography_settings');

        Route::post('/typography-settings/single', 'GeneralSettingsController@get_single_font_variant')->name('admin.general.typography.single');
        Route::get('/cache-settings', 'GeneralSettingsController@cache_settings')->name('admin.general.cache.settings');
        Route::post('/cache-settings', 'GeneralSettingsController@update_cache_settings');

        Route::get('/page-settings', 'GeneralSettingsController@page_settings')->name('admin.general.page.settings');
        Route::post('/page-settings', 'GeneralSettingsController@update_page_settings');

        Route::get('/backup-settings', 'GeneralSettingsController@backup_settings')->name('admin.general.backup.settings');
        Route::post('/backup-settings', 'GeneralSettingsController@update_backup_settings');

        Route::post('/backup-settings/delete', 'GeneralSettingsController@delete_backup_settings')->name('admin.general.backup.settings.delete');
        Route::post('/backup-settings/restore', 'GeneralSettingsController@restore_backup_settings')->name('admin.general.backup.settings.restore');
        Route::get('/update-system', 'GeneralSettingsController@update_system')->name('admin.general.update.system');
        Route::post('/update-system', 'GeneralSettingsController@update_system_version');

        Route::get('/license-setting', 'GeneralSettingsController@license_settings')->name('admin.general.license.settings');
        Route::post('/license-setting', 'GeneralSettingsController@update_license_settings');

        Route::get('/custom-css', 'GeneralSettingsController@custom_css_settings')->name('admin.general.custom.css');
        Route::post('/custom-css', 'GeneralSettingsController@update_custom_css_settings');

        Route::get('/gdpr-settings', 'GeneralSettingsController@gdpr_settings')->name('admin.general.gdpr.settings');
        Route::post('/gdpr-settings', 'GeneralSettingsController@update_gdpr_cookie_settings');
        //update script
        Route::get('/update-script', 'ScriptUpdateController@index')->name('admin.general.script.update');
        Route::post('/update-script', 'ScriptUpdateController@update_script');
        //custom js
        Route::get('/custom-js', 'GeneralSettingsController@custom_js_settings')->name('admin.general.custom.js');
        Route::post('/custom-js', 'GeneralSettingsController@update_custom_js_settings');
        //regenerate media image
        Route::get('/regenerate-image', 'GeneralSettingsController@regenerate_image_settings')->name('admin.general.regenerate.thumbnail');
        Route::post('/regenerate-image', 'GeneralSettingsController@update_regenerate_image_settings');
        //smtp settings
        Route::get('/smtp-settings', 'GeneralSettingsController@smtp_settings')->name('admin.general.smtp.settings');
        Route::post('/smtp-settings', 'GeneralSettingsController@update_smtp_settings');
        Route::post('/smtp-settings/test', 'GeneralSettingsController@test_smtp_settings')->name('admin.general.smtp.settings.test');
        //payment gateway
        Route::get('/payment-settings', 'GeneralSettingsController@payment_settings')->name('admin.general.payment.settings');
        Route::post('/payment-settings', 'GeneralSettingsController@update_payment_settings');

        //popup
        Route::get('/popup-settings', 'GeneralSettingsController@popup_settings')->name('admin.general.popup.settings');
        Route::post('/popup-settings', 'GeneralSettingsController@update_popup_settings');
        //rss feed
        Route::get('/rss-settings', 'GeneralSettingsController@rss_feed_settings')->name('admin.general.rss.feed.settings');
        Route::post('/rss-settings', 'GeneralSettingsController@update_rss_feed_settings');
        //update script
        Route::get('/update-script', 'GeneralSettingsController@update_script_settings')->name('admin.general.update.script.settings');
        Route::post('/update-script', 'GeneralSettingsController@sote_update_script_settings');
        //Upgrade Database
        Route::get('/database-upgrade', 'GeneralSettingsController@database_upgrade')->name('admin.general.database.upgrade');
        Route::post('/database-upgrade', 'GeneralSettingsController@database_upgrade_post');
        //sitemap
        Route::get('/sitemap-settings', 'GeneralSettingsController@sitemap_settings')->name('admin.general.sitemap.settings');
        Route::post('/sitemap-settings', 'GeneralSettingsController@update_sitemap_settings');
        Route::post('/sitemap-settings/delete', 'GeneralSettingsController@delete_sitemap_settings')->name('admin.general.sitemap.settings.delete');

    });

    //language
    Route::group(['prefix'=>'languages','namespace'=>'Admin'],function () {
        Route::get('/', 'LanguageController@index')->name('admin.languages');
        Route::get('/words/frontend/{id}', 'LanguageController@frontend_edit_words')->name('admin.languages.words.frontend');
        Route::get('/words/backend/{id}', 'LanguageController@backend_edit_words')->name('admin.languages.words.backend');
        Route::post('/words/update/{id}', 'LanguageController@update_words')->name('admin.languages.words.update');
        Route::post('/new', 'LanguageController@store')->name('admin.languages.new');
        Route::post('/update', 'LanguageController@update')->name('admin.languages.update');
        Route::post('/delete/{id}', 'LanguageController@delete')->name('admin.languages.delete');
        Route::post('/default/{id}', 'LanguageController@make_default')->name('admin.languages.default');
        Route::post('/clone', 'LanguageController@clone_languages')->name('admin.languages.clone');
        Route::post('/add-new-string', 'LanguageController@add_new_string')->name('admin.languages.add.string');
    });

}); //End admin-home
/*-----------------------------------------------------------------------
    ADMIN MEDIA UPLOAD BUTTON, KEEP IT SEPARATED FOR DEMO PURPOSE
-----------------------------------------------------------------------*/
Route::group(['middleware' => ['setlang:backend','auth:admin'],'prefix' => 'admin-home','namespace'=>'Admin'],function (){
    Route::post('/all', 'MediaUploadController@all_upload_media_file')->name('admin.upload.media.file.all');
    Route::post('/', 'MediaUploadController@upload_media_file')->name('admin.upload.media.file');
    Route::post('/chart', 'AdminDashboardController@get_chart_data')->name('admin.home.chat.data');
    Route::post('/chart/day', 'AdminDashboardController@get_chart_by_date_data')->name('admin.home.chat.data.by.day');
});

