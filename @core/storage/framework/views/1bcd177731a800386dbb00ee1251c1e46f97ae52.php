<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php if(get_static_option('site_admin_dark_mode') == 'off'): ?>
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                <?php else: ?>
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?php echo e(active_menu('admin-home')); ?>">
                        <a href="<?php echo e(route('admin.home')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo app('translator')->get('dashboard'); ?></span>
                        </a>
                    </li>
                    <?php if(auth()->guard('admin')->user()->hasRole('Super Admin')): ?>
                        <li class="main_dropdown <?php if(request()->is(['admin-home/admin/*'])): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span><?php echo e(__('Admin Manage')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/admin/all-user')); ?>"><a
                                            href="<?php echo e(route('admin.all.user')); ?>"><?php echo e(__('All Admin')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/admin/new-user')); ?>"><a
                                            href="<?php echo e(route('admin.new.user')); ?>"><?php echo e(__('Add New Admin')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/admin/role')); ?> "><a
                                            href="<?php echo e(route('admin.all.admin.role')); ?>"><?php echo e(__('All Admin Role')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-list','user-create'])): ?>
                    <li
                            class="main_dropdown
                        <?php if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])): ?> active <?php endif; ?>
                                    ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span><?php echo e(__('Users Manage')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/frontend/all-user')); ?>"><a
                                            href="<?php echo e(route('admin.all.frontend.user')); ?>"><?php echo e(__('All Users')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/frontend/new-user')); ?>"><a
                                            href="<?php echo e(route('admin.frontend.new.user')); ?>"><?php echo e(__('Add New User')); ?></a></li>
                            <?php endif; ?>
                        </ul>

                    </li>
                    <?php endif; ?>

               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletter-list','support-ticket-create','support-ticket-category-index','support-ticket-page-settings'])): ?>
                    <li class="main_dropdown <?php echo e(active_menu('admin-home/support-tickets')); ?> <?php if(request()->is('admin-home/support-tickets/*')): ?> active <?php endif; ?>"
                    >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-support mr-2"></i>
                            <?php echo e(__('Support Tickets')); ?></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-index')): ?>
                            <li class="<?php echo e(active_menu('admin-home/support-tickets')); ?>">
                                <a href="<?php echo e(route('admin.support.ticket.all')); ?>"><?php echo e(__('All Tickets')); ?></a></li>
                           <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-create')): ?>
                            <li class="<?php echo e(active_menu('admin-home/support-tickets/new')); ?>"><a
                                        href="<?php echo e(route('admin.support.ticket.new')); ?>"><?php echo e(__('Add New Ticket')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-category-index')): ?>
                            <li class="<?php echo e(active_menu('admin-home/support-tickets/department')); ?>"><a
                                        href="<?php echo e(route('admin.support.ticket.department')); ?>"><?php echo e(__('Departments')); ?></a></li>
                             <?php endif; ?>
                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-page-settings')): ?>
                            <li class="<?php echo e(active_menu('admin-home/support-tickets/page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.support.ticket.page.settings')); ?>"><?php echo e(__('Page Settings')); ?></a></li>
                             <?php endif; ?>
                        </ul>
                    </li>
                 <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletter-list','newsletter-create'])): ?>
                    <li class="main_dropdown <?php if(request()->is(['admin-home/newsletter/*','admin-home/newsletter'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i>
                            <span><?php echo e(__('Newsletter Manage')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/newsletter')); ?>"><a
                                            href="<?php echo e(route('admin.newsletter')); ?>"><?php echo e(__('All Subscriber')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-mail-send')): ?>
                                <li class="<?php echo e(active_menu('admin-home/newsletter/all')); ?>"><a
                                            href="<?php echo e(route('admin.newsletter.mail')); ?>"><?php echo e(__('Send Mail To All')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blog-list','blog-create','blog-category-list','blog-page-settings','blog-single-page-settings'])): ?>
                    <li class="main_dropdown <?php if(request()->is(['admin-home/blog/*','admin-home/blog'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span><?php echo e(__('Blogs')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/blog')); ?>"><a
                                            href="<?php echo e(route('admin.blog')); ?>"><?php echo e(__('All Blog')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/blog/category')); ?>"><a
                                            href="<?php echo e(route('admin.blog.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/blog/new')); ?>"><a
                                            href="<?php echo e(route('admin.blog.new')); ?>"><?php echo e(__('Add New Post')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-page-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/blog/page-settings')); ?>"><a
                                            href="<?php echo e(route('admin.blog.page.settings')); ?>"><?php echo e(__('Blog Page Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-single-page-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/blog/single-settings')); ?>"><a
                                            href="<?php echo e(route('admin.blog.single.settings')); ?>"><?php echo e(__('Blog Single Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['success-story-list','success-story-create','success-story-category-list'])): ?>
                    <li class="main_dropdown <?php if(request()->is(['admin-home/success-story/*','admin-home/success-story'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span><?php echo e(__('Success Story')); ?></span></a>
                        <ul class="collapse">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('success-story-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/success-story')); ?>"><a
                                            href="<?php echo e(route('admin.success.story')); ?>"><?php echo e(__('All Success Story')); ?></a></li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('success-story-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/success-story/category')); ?>"><a
                                            href="<?php echo e(route('admin.success.story.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                                <?php endif; ?>

                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('success-story-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/success-story/new')); ?>"><a
                                            href="<?php echo e(route('admin.success.story.new')); ?>"><?php echo e(__('Add New Story')); ?></a></li>
                                <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['image-gallery-list','image-gallery-category-list','image-gallery-page-settings'])): ?>
                    <li class="main_dropdown <?php if(request()->is(['admin-home/gallery-page/*','admin-home/gallery-page'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span><?php echo e(__('Image Gallery')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('image-gallery-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/gallery-page')); ?>">
                                    <a href="<?php echo e(route('admin.gallery.all')); ?>"><?php echo e(__('Image Gallery')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('image-gallery-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/gallery-page/category')); ?>">
                                    <a href="<?php echo e(route('admin.gallery.category')); ?>"><?php echo e(__('Category')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('image-gallery-page-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/gallery-page/page-settings')); ?>">
                                    <a href="<?php echo e(route('admin.gallery.page.settings')); ?>"><?php echo e(__('Page Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-list')): ?>
                        <li class="main_dropdown <?php echo e(active_menu('admin-home/faq')); ?>">
                            <a href="<?php echo e(route('admin.faq')); ?>" aria-expanded="true"><i class="ti-control-forward"></i>
                                <span><?php echo e(__('FAQ')); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client-area-list')): ?>
                    <li class="main_dropdown <?php echo e(active_menu('admin-home/client-area')); ?>">
                        <a href="<?php echo e(route('admin.client.area')); ?>" aria-expanded="true"><i class="ti-control-forward"></i>
                            <span><?php echo e(__('Client Area')); ?></span></a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team-member-list')): ?>
                        <li class="main_dropdown <?php echo e(active_menu('admin-home/team-member/all')); ?>">
                            <a href="<?php echo e(route('admin.team.member')); ?>" aria-expanded="true"><i
                                        class="ti-control-forward"></i>
                                <span><?php echo e(__('Team Members')); ?></span></a>
                        </li>
                    <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['page-list','page-create'])): ?>
                    <li class="main_dropdown <?php if(request()->is(['admin-home/page-edit/*','admin-home/page/all','admin-home/page/new'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span><?php echo e(__('Custom Pages')); ?></span></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/page/all')); ?>"><a
                                            href="<?php echo e(route('admin.page')); ?>"><?php echo e(__('All Pages')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/page/new')); ?>"><a
                                            href="<?php echo e(route('admin.page.new')); ?>"><?php echo e(__('Add New Page')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-list')): ?>
                        <li class="main_dropdown <?php echo e(active_menu('admin-home/testimonial/all')); ?>">
                            <a href="<?php echo e(route('admin.testimonial')); ?>" aria-expanded="true"><i
                                        class="ti-control-forward"></i>
                                <span><?php echo e(__('Testimonial')); ?></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner-list')): ?>
                    <li class="main_dropdown <?php echo e(active_menu('admin-home/banner/all')); ?>">
                        <a href="<?php echo e(route('admin.banner')); ?>" aria-expanded="true"><i
                                    class="ti-control-forward"></i>
                            <span><?php echo e(__('Banners')); ?></span></a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('counterup-list')): ?>
                        <li class="<?php echo e(active_menu('admin-home/counterup/all')); ?>">
                            <a href="<?php echo e(route('admin.counterup')); ?>"><i class="ti-control-forward"></i>
                                <span><?php echo e(__('Counterup')); ?></span></a>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['job-list','job-category-list','job-create','job-applicant-list','job-applicant-report','job-settings'])): ?>
                    <li
                            class="main_dropdown <?php if(request()->is(['admin-home/jobs','admin-home/jobs/*'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-package mr-2"></i> <?php echo e(__('Job Post Manage')); ?></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/all')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.all')); ?>"><?php echo e(__('All Jobs')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/category')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.category.all')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/new')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.new')); ?>"><?php echo e(__('Add New Job')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-applicant-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/applicant')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.applicant')); ?>"><?php echo e(__('All Applicant')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-applicant-report')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/applicant/report')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.applicant.report')); ?>"><?php echo e(__('Applicant Report')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('job-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/jobs/settings')); ?>"><a
                                            href="<?php echo e(route('admin.jobs.settings')); ?>"><?php echo e(__('Settings')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                'event-list',
                'event-category-list',
                'event-create',
                'event-attendance-list',
                'event-payment-log-list',
                'event-attendance-report',
                'event-payment-log-report',
                'event-single-settings',
                'event-settings'
                ])): ?>
                     <li class="main_dropdown <?php if(request()->is(['admin-home/events','admin-home/events/*'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-timer mr-2"></i> <?php echo e(__('Events Manage')); ?></a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events')); ?>"><a
                                            href="<?php echo e(route('admin.events.all')); ?>"><?php echo e(__('All Events')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/category')); ?>"><a
                                            href="<?php echo e(route('admin.events.category.all')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/new')); ?>"><a
                                            href="<?php echo e(route('admin.events.new')); ?>"><?php echo e(__('Add New Event')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-attendance-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/event-attendance-logs')); ?>"><a
                                            href="<?php echo e(route('admin.event.attendance.logs')); ?>"><?php echo e(__('Event Attendance Logs')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-payment-log-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/event-payment-logs')); ?>"><a
                                            href="<?php echo e(route('admin.event.payment.logs')); ?>"><?php echo e(__('Event Payment Logs')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-attendance-report')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/attendance/report')); ?>"><a
                                            href="<?php echo e(route('admin.event.attendance.report')); ?>"><?php echo e(__('Attendance Report')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-payment-log-report')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/payment/report')); ?>"><a
                                            href="<?php echo e(route('admin.event.payment.report')); ?>"><?php echo e(__('Payment Log Report')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-single-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/single-page-settings')); ?>"><a
                                            href="<?php echo e(route('admin.events.single.page.settings')); ?>"><?php echo e(__('Event Single Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/events/page-settings')); ?>"><a
                                            href="<?php echo e(route('admin.events.page.settings')); ?>"><?php echo e(__('Settings')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                        'donation-list',
                        'donation-create',
                        'donation-category-list',
                        'donation-pending-cause',
                        'donation-withdraw-list',
                        'onation-payment-list',
                        'donation-cause-report',
                        'donation-flag-report-list',
                        'donation-settings'
                        ])): ?>

                    <li class="main_dropdown <?php if(request()->is(['admin-home/donations/*','admin-home/donations'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-agenda mr-2"></i> <?php echo e(__('Donation')); ?>

                             <span class="badge"><?php echo e(__('PC')); ?><?php echo e($pending_cases_count); ?></span>
                            <span class="badge"><?php echo e(__('PW')); ?><?php echo e($pending_withdraw_count); ?></span>
                        </a>
                        <ul class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations')); ?>"><a
                                            href="<?php echo e(route('admin.donations.all')); ?>"><?php echo e(__('All Causes')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-create')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/new')); ?>"><a
                                            href="<?php echo e(route('admin.donations.new')); ?>"><?php echo e(__('Add New Cause')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-category-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/category')); ?>"><a
                                            href="<?php echo e(route('admin.donations.category.all')); ?>"><?php echo e(__('Causes Category')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-pending-cause')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/pending')); ?>"><a
                                            href="<?php echo e(route('admin.donations.pending.all')); ?>"><?php echo e(__('All Pending Causes')); ?> <span class="badge"><?php echo e($pending_cases_count); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-withdraw-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/withdraw/request/all')); ?>"><a
                                            href="<?php echo e(route('admin.all.donation.withdraw.request')); ?>"><?php echo e(__('All Withdraw Requests')); ?> <span class="badge"><?php echo e($pending_withdraw_count); ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-payment-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/payment-logs')); ?>"><a
                                            href="<?php echo e(route('admin.donations.payment.logs')); ?>"><?php echo e(__('Causes Payment Logs')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-cause-report')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/report')); ?>">
                                    <a href="<?php echo e(route('admin.donations.report')); ?>"><?php echo e(__('Causes Report')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donations-flag-report-list')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/flag-reports')); ?>">
                                    <a href="<?php echo e(route('admin.donations.flag.reports')); ?>"><?php echo e(__('Flags')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('donation-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/donations/settings')); ?>">
                                    <a href="<?php echo e(route('admin.donations.settings')); ?>"><?php echo e(__('Settings')); ?></a>
                                </li>

                                <li class="<?php echo e(active_menu('admin-home/donations/single-page-variant')); ?>">
                                    <a href="<?php echo e(route('admin.donations.single.page.variant')); ?>"><?php echo e(__('Single Page Variant')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                    'appearance-topbar-settings',
                    'appearance-navbar-settings',
                    'appearance-home-variant',
                    'appearance-menu-manage-list',
                    'appearance-widget-manage',
                    'appearance-widget-manage',
                    'appearance-form-builder',
                    'appearance-media-image'
                    ])): ?>

                    <li class="main_dropdown
                    <?php if(request()->is(['admin-home/appearance-settings/topbar/*','admin-home/appearance-settings/navbar/*','admin-home/appearance-settings/home-variant/*','admin-home/media-upload/page','admin-home/appearance-settings/general-menu','admin-home/menu-edit/*','admin-home/widgets','admin-home/widgets/*','admin-home/popup-builder/*','admin-home/form-builder/*'])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span><?php echo e(__('Appearance Settings')); ?></span></a>
                        <ul class="collapse ">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-topbar-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/appearance-settings/topbar/all')); ?>">
                                    <a href="<?php echo e(route('admin.topbar.settings')); ?>"
                                       aria-expanded="true">
                                        <?php echo e(__('Topbar Settings')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-navbar-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/appearance-settings/navbar/all')); ?>">
                                    <a href="<?php echo e(route('admin.navbar.settings')); ?>"><?php echo e(__('Navbar Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-home-variant')): ?>
                                <li class="main_dropdown <?php echo e(active_menu('admin-home/appearance-settings/home-variant/select')); ?>">
                                    <a href="<?php echo e(route('admin.home.variant')); ?>"
                                       aria-expanded="true">
                                        <?php echo e(__('Home Variant')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-menu-manage-list')): ?>
                            <li class="main_dropdown <?php echo e(active_menu('admin-home/appearance-settings/general-menu')); ?>">
                                <a href="<?php echo e(route('admin.general.menu')); ?>"
                                   aria-expanded="true">
                                    <?php echo e(__('Menu Manage')); ?>

                                </a>
                            </li>
                            <?php endif; ?>















                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-widget-manage')): ?>
                                <li
                                        class="main_dropdown
                                            <?php echo e(active_menu('admin-home/widgets')); ?>

                                        <?php if(request()->is('admin-home/widgets/*')): ?> active <?php endif; ?>
                                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <?php echo e(__('Widgets Manage')); ?></a>
                                    <ul class="collapse">
                                        <li class="<?php echo e(active_menu('admin-home/widgets')); ?>"><a
                                                    href="<?php echo e(route('admin.widgets')); ?>"><?php echo e(__('All Widgets')); ?></a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-form-builder')): ?>
                                <li class="main_dropdown <?php if(request()->is('admin-home/form-builder/*')): ?> active <?php endif; ?>">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        <?php echo e(__('Form Builder')); ?>

                                    </a>
                                    <ul class="collapse">
                                        <li class="<?php echo e(active_menu('admin-home/form-builder/get-in-touch')); ?>"><a
                                                    href="<?php echo e(route('admin.form.builder.get.in.touch')); ?>"><?php echo e(__('Get In Touch Form')); ?></a>
                                        </li>

                                        <li class="<?php echo e(active_menu('admin-home/form-builder/apply-job-form')); ?>"><a
                                                    href="<?php echo e(route('admin.form.builder.apply.job.form')); ?>"><?php echo e(__('Apply Job Form')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/form-builder/event-attendance')); ?>"><a
                                                    href="<?php echo e(route('admin.form.builder.event.attendance.form')); ?>"><?php echo e(__('Event Attendance Form')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance-media-image')): ?>
                                <li class="main_dropdown <?php echo e(active_menu('admin-home/media-upload/page')); ?>">
                                    <a href="<?php echo e(route('admin.upload.media.images.page')); ?>"
                                       aria-expanded="true">
                                        <?php echo e(__('Media Images Manage')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                'page-settings-home-page-manage',
                'page-settings-about-page-manage',
                'page-settings-event-page-manage',
                'page-settings-contact-page-manage',
                'page-settings-success-story-page-manage',
                'page-settings-error-page-manage',
                'page-settings-maintain-page-manage'
                ])): ?>
                    <li class="main_dropdown
                        <?php if(request()->is([
                            'admin-home/home-page-01/*',
                            'admin-home/home-page-04/*',
                            'admin-home/home-page-05/*',
                            'admin-home/home-page-06/*',
                            'admin-home/header',
                            'admin-home/keyfeatures',
                            'admin-home/about-page/*',
                            'admin-home/contact-page/*',
                            'admin-home/feedback-page/*',
                            'admin-home/404-page-manage',
                            'admin-home/maintains-page/settings',
                            'admin-home/events/page-manage',
                        ])  ): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span><?php echo e(__('All Page Settings')); ?></span></a>
                        <ul class="collapse ">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-home-page-manage')): ?>
                                <li class="main_dropdown
                                <?php if(request()->is(['admin-home/home-page-01/*','admin-home/header','admin-home/keyfeatures','admin-home/home-page-04/*','admin-home/home-page-05/*','admin-home/home-page-06/*'])  ): ?> active <?php endif; ?>
                                        ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        <?php echo e(__('Home Page Manage')); ?>

                                    </a>
                                    <ul class="collapse">
                                        <?php if(in_array(get_static_option('home_page_variant'),['01','02','03'])): ?>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/header')); ?>">
                                                <a href="<?php echo e(route('admin.header')); ?>">
                                                    <?php echo e(__('Header Area')); ?>

                                                </a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/about-us')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.about.us')); ?>"><?php echo e(__('About Us Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/feature-area')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.feature.area')); ?>"><?php echo e(__('Feature Area')); ?></a>
                                            </li>

                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/donation-category-area')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.donation.category.area')); ?>"><?php echo e(__('Cause Category Area')); ?></a>
                                            </li>

                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/feature-cause-area')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.featured.cause.area')); ?>"><?php echo e(__('Featured Cause Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/video-area')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.video.area')); ?>"><?php echo e(__('Video Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/latest-cause-area')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.latest.cause.area')); ?>"><?php echo e(__('Latest Cause Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/team-member')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.team.member')); ?>"><?php echo e(__('Team Member Area')); ?></a>
                                            </li>
                                            <?php if(in_array(get_static_option('home_page_variant'),['02','03'])): ?>
                                                <li class="<?php echo e(active_menu('admin-home/home-page-01/what-we-do-area')); ?>"><a
                                                            href="<?php echo e(route('admin.homeone.what.we.do.area')); ?>"><?php echo e(__('What We Do Area')); ?></a>
                                                </li>
                                                <li class="<?php echo e(active_menu('admin-home/home-page-01/coutnerup-area')); ?>"><a
                                                            href="<?php echo e(route('admin.homeone.counterup.area')); ?>"><?php echo e(__('Counterup Area')); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/testimonial')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.testimonial')); ?>"><?php echo e(__('Testimonial Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/latest-event')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.latest.event')); ?>"><?php echo e(__('Latest Event Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/latest-news')); ?>"><a
                                                        href="<?php echo e(route('admin.homeone.latest.news')); ?>"><?php echo e(__('Latest News Area')); ?></a>
                                            </li>
                                            <li class="<?php echo e(active_menu('admin-home/home-page-01/section-manage')); ?>">
                                                <a href="<?php echo e(route('admin.homeone.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                            </li>
                                        <?php endif; ?>

                                            <?php if(get_static_option('home_page_variant') == '04'): ?>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/header-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.header.area')); ?>">
                                                        <?php echo e(__('Header Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/feature-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.feature.area')); ?>">
                                                        <?php echo e(__('Feature Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/success-story-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.success.story.area')); ?>">
                                                        <?php echo e(__('Success Story Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/about-us-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.about.us.area')); ?>">
                                                        <?php echo e(__('About Us Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/events-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.events.area')); ?>">
                                                        <?php echo e(__('Events Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/recent-causes-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.recent.causes.area')); ?>">
                                                        <?php echo e(__('Recent Causes Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04/recent-blog-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.recent.blog.area')); ?>">
                                                        <?php echo e(__('Recent Blog Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-04-05-06/section-manage')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.five.six.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if(get_static_option('home_page_variant') == '05'): ?>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-01/header')); ?>">
                                                    <a href="<?php echo e(route('admin.header')); ?>">
                                                        <?php echo e(__('Header Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/rise-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.rise.area')); ?>">
                                                        <?php echo e(__('Rise Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/feature-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.feature.area')); ?>">
                                                        <?php echo e(__('Feature Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/category-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.category.area')); ?>">
                                                        <?php echo e(__('Category Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/success-story-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.success.story.area')); ?>">
                                                        <?php echo e(__('Success Story Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/recent-causes-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.recent.causes.area')); ?>">
                                                        <?php echo e(__('Recent Causes Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/events-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.events.area')); ?>">
                                                        <?php echo e(__('Events Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-05/recent-blog-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.five.recent.blog.area')); ?>">
                                                        <?php echo e(__('Recent Blog Area')); ?>

                                                    </a>
                                                </li>
                                                <li class="<?php echo e(active_menu('admin-home/home-page-04-05-06/section-manage')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.five.six.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                                </li>
                                            <?php endif; ?>


                                            <?php if(get_static_option('home_page_variant') == '06'): ?>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/header')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.header.area')); ?>">
                                                        <?php echo e(__('Header Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/rise-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.rise.area')); ?>">
                                                        <?php echo e(__('Rise Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/feature-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.feature.area')); ?>">
                                                        <?php echo e(__('Feature Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/category-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.category.area')); ?>">
                                                        <?php echo e(__('Category Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/recent-causes-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.recent.causes.area')); ?>">
                                                        <?php echo e(__('Recent Causes Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/success-story-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.success.story.area')); ?>">
                                                        <?php echo e(__('Success Story Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/about-us-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.about.us.area')); ?>">
                                                        <?php echo e(__('About Us Area')); ?>

                                                    </a>
                                                </li>

                                                <li class="<?php echo e(active_menu('admin-home/home-page-06/events-area')); ?>">
                                                    <a href="<?php echo e(route('admin.home.six.events.area')); ?>">
                                                        <?php echo e(__('Events Area')); ?>

                                                    </a>
                                                </li>
                                                <li class="<?php echo e(active_menu('admin-home/home-page-04-05-06/section-manage')); ?>">
                                                    <a href="<?php echo e(route('admin.home.four.five.six.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                                </li>
                                            <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-about-page-manage')): ?>
                                <li class="main_dropdown <?php if(request()->is('admin-home/about-page/*')  ): ?> active <?php endif; ?> ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        <?php echo e(__('About Page Manage')); ?>

                                    </a>
                                    <ul class="collapse">
                                        <li class="<?php echo e(active_menu('admin-home/about-page/about-us')); ?>"><a
                                                    href="<?php echo e(route('admin.about.page.about')); ?>"><?php echo e(__('About Us Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/our-mission')); ?>"><a
                                                    href="<?php echo e(route('admin.about.our.mission')); ?>"><?php echo e(__('Our Mission Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/counterup')); ?>"><a
                                                    href="<?php echo e(route('admin.about.counterup')); ?>"><?php echo e(__('Counterup Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/what-we-do')); ?>"><a
                                                    href="<?php echo e(route('admin.about.what.we.do')); ?>"><?php echo e(__('What We Do Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/testimonial')); ?>"><a
                                                    href="<?php echo e(route('admin.about.testimonial')); ?>"><?php echo e(__('Testimonial Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/team-member')); ?>"><a
                                                    href="<?php echo e(route('admin.about.team.member')); ?>"><?php echo e(__('Team Member Section')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/about-page/section-manage')); ?>"><a
                                                    href="<?php echo e(route('admin.about.page.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-event-page-manage')): ?>
                                <li class="main_dropdown <?php if(request()->is('admin-home/events/page-manage')  ): ?> active <?php endif; ?> ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        <?php echo e(__('Events Page Manage')); ?>

                                    </a>
                                    <ul class="collapse">
                                        <li class="<?php echo e(active_menu('admin-home/events/page-manage')); ?>"><a
                                                    href="<?php echo e(route('admin.event.page.manage')); ?>"><?php echo e(__('Page Manage')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-contact-page-manage')): ?>
                                <li class="main_dropdown <?php if(request()->is('admin-home/contact-page/*')  ): ?> active <?php endif; ?>">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        <?php echo e(__('Contact Page Manage')); ?>

                                    </a>
                                    <ul class="collapse">
                                        <li class="<?php echo e(active_menu('admin-home/contact-page/contact-info')); ?>">
                                            <a href="<?php echo e(route('admin.contact.info')); ?>"><?php echo e(__('Contact Info')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/contact-page/form-area')); ?>">
                                            <a href="<?php echo e(route('admin.contact.page.form.area')); ?>"><?php echo e(__('Form Area')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/contact-page/map')); ?>">
                                            <a href="<?php echo e(route('admin.contact.page.map')); ?>"><?php echo e(__('Google Map Area')); ?></a>
                                        </li>
                                        <li class="<?php echo e(active_menu('admin-home/contact-page/section-manage')); ?>">
                                            <a href="<?php echo e(route('admin.contact.page.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-success-story-page-manage')): ?>
                                <li class="main_dropdown <?php echo e(active_menu('admin-home/success-story-page-manage')); ?>">
                                    <a href="<?php echo e(route('admin.success.story.page.manage')); ?>" aria-expanded="true">
                                        <?php echo e(__('Success Story Page Manage')); ?></a>
                                </li>
                                <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-error-page-manage')): ?>
                                <li class="main_dropdown <?php echo e(active_menu('admin-home/404-page-manage')); ?>">
                                    <a href="<?php echo e(route('admin.404.page.settings')); ?>" aria-expanded="true">
                                        <?php echo e(__('404 Page Manage')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-settings-maintain-page-manage')): ?>
                                <li class="main_dropdown <?php echo e(active_menu('admin-home/maintains-page/settings')); ?>">
                                    <a href="<?php echo e(route('admin.maintains.page.settings')); ?>"
                                       aria-expanded="true">
                                        <?php echo e(__('Maintain Page Manage')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                    'general-settings-site-identity',
                    'general-settings-basic-settings',
                    'general-settings-color-settings',
                    'general-settings-typography',
                    'general-settings-seo-settings',
                    'general-settings-third-party-script',
                    'general-settings-email-template',
                    'general-settings-smtp-settings',
                    'general-settings-regenerate-media-image',
                    'general-settings-page-settings',
                    'general-settings-payment-gateway',
                    'general-settings-custom-css',
                    'general-settings-custom-js',
                    'general-settings-cache-settings',
                    'general-settings-gdpr-settings',
                    'general-settings-sitemap',
                    'general-settings-rss-feed',
                    'general-settings-database-upgrade',
                    'general-settings-license',
                    ])): ?>
                       <li class="main_dropdown <?php if(request()->is('admin-home/general-settings/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span><?php echo e(__('General Settings')); ?></span></a>
                        <ul class="collapse ">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-site-identity')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/site-identity')); ?>"><a
                                            href="<?php echo e(route('admin.general.site.identity')); ?>"><?php echo e(__('Site Identity')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-basic-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/basic-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.basic.settings')); ?>"><?php echo e(__('Basic Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-color-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/color-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.color.settings')); ?>"><?php echo e(__('Color Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-typography')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/typography-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.typography.settings')); ?>"><?php echo e(__('Typography Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-seo-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/seo-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.seo.settings')); ?>"><?php echo e(__('SEO Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-third-party-script')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/scripts')); ?>"><a
                                            href="<?php echo e(route('admin.general.scripts.settings')); ?>"><?php echo e(__('Third Party Scripts')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-email-template')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-template')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.template')); ?>"><?php echo e(__('Email Template')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.settings')); ?>"><?php echo e(__('Email Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-smtp-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/smtp-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-regenerate-media-image')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/regenerate-image')); ?>"><a
                                            href="<?php echo e(route('admin.general.regenerate.thumbnail')); ?>"><?php echo e(__('Regenerate Media Image')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-page-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/page-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.page.settings')); ?>"><?php echo e(__('Page Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-payment-gateway')): ?>
                                <?php if(!empty(get_static_option('site_payment_gateway'))): ?>
                                    <li class="<?php echo e(active_menu('admin-home/general-settings/payment-settings')); ?>"><a
                                                href="<?php echo e(route('admin.general.payment.settings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-custom-css')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/custom-css')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.css')); ?>"><?php echo e(__('Custom CSS')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-custom-js')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/custom-js')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.js')); ?>"><?php echo e(__('Custom JS')); ?></a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-cache-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/cache-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.cache.settings')); ?>"><?php echo e(__('Cache Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-gdpr-settings')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/gdpr-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.gdpr.settings')); ?>"><?php echo e(__('GDPR Compliant Cookies Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-sitemap')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/sitemap-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.sitemap.settings')); ?>"><?php echo e(__('Sitemap Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-rss-feed')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/rss-settings')); ?>"><a

                                            href="<?php echo e(route('admin.general.rss.feed.settings')); ?>"><?php echo e(__('RSS Feed Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-database-upgrade')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/database-upgrade')); ?>"><a
                                            href="<?php echo e(route('admin.general.database.upgrade')); ?>"><?php echo e(__('Database Upgrade')); ?></a>
                                </li>
                                <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-license')): ?>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/license-setting')); ?>"><a
                                            href="<?php echo e(route('admin.general.license.settings')); ?>"><?php echo e(__('Licence Settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-list')): ?>
                    <li class="<?php if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('admin.languages')); ?>" aria-expanded="true"><i class="ti-signal"></i>
                            <span><?php echo e(__('Languages')); ?></span></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>