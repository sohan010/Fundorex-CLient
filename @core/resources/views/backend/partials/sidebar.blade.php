<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.home')}}">
                @if(get_static_option('site_admin_dark_mode') == 'off')
                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                @else
                    {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                @endif
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('dashboard')</span>
                        </a>
                    </li>
                    @if(auth()->guard('admin')->user()->hasRole('Super Admin'))
                        <li class="main_dropdown @if(request()->is(['admin-home/admin/*'])) active @endif">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span>{{__('Admin Manage')}}</span></a>
                            <ul class="collapse">
                                <li class="{{active_menu('admin-home/admin/all-user')}}"><a
                                            href="{{route('admin.all.user')}}">{{__('All Admin')}}</a></li>
                                <li class="{{active_menu('admin-home/admin/new-user')}}"><a
                                            href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>
                                <li class="{{active_menu('admin-home/admin/role')}} "><a
                                            href="{{route('admin.all.admin.role')}}">{{__('All Admin Role')}}</a></li>
                            </ul>
                        </li>
                    @endif

                    @canany(['user-list','user-create'])
                    <li
                            class="main_dropdown
                        @if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])) active @endif
                                    ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{__('Users Manage')}}</span></a>
                        <ul class="collapse">
                            @can('user-list')
                                <li class="{{active_menu('admin-home/frontend/all-user')}}"><a
                                            href="{{route('admin.all.frontend.user')}}">{{__('All Users')}}</a></li>
                            @endcan
                            @can('user-create')
                                <li class="{{active_menu('admin-home/frontend/new-user')}}"><a
                                            href="{{route('admin.frontend.new.user')}}">{{__('Add New User')}}</a></li>
                            @endcan
                        </ul>

                    </li>
                    @endcanany

               @canany(['newsletter-list','support-ticket-create','support-ticket-category-index','support-ticket-page-settings'])
                    <li class="main_dropdown {{active_menu('admin-home/support-tickets')}} @if(request()->is('admin-home/support-tickets/*')) active @endif"
                    >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-support mr-2"></i>
                            {{__('Support Tickets')}}</a>
                        <ul class="collapse">
                            @can('support-ticket-index')
                            <li class="{{active_menu('admin-home/support-tickets')}}">
                                <a href="{{route('admin.support.ticket.all')}}">{{__('All Tickets')}}</a></li>
                           @endcan
                            @can('support-ticket-create')
                            <li class="{{active_menu('admin-home/support-tickets/new')}}"><a
                                        href="{{route('admin.support.ticket.new')}}">{{__('Add New Ticket')}}</a></li>
                            @endcan

                            @can('support-ticket-category-index')
                            <li class="{{active_menu('admin-home/support-tickets/department')}}"><a
                                        href="{{route('admin.support.ticket.department')}}">{{__('Departments')}}</a></li>
                             @endcan
                             @can('support-ticket-page-settings')
                            <li class="{{active_menu('admin-home/support-tickets/page-settings')}}"><a
                                        href="{{route('admin.support.ticket.page.settings')}}">{{__('Page Settings')}}</a></li>
                             @endcan
                        </ul>
                    </li>
                 @endcanany


                    @canany(['newsletter-list','newsletter-create'])
                    <li class="main_dropdown @if(request()->is(['admin-home/newsletter/*','admin-home/newsletter'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i>
                            <span>{{__('Newsletter Manage')}}</span></a>
                        <ul class="collapse">
                            @can('newsletter-list')
                                <li class="{{active_menu('admin-home/newsletter')}}"><a
                                            href="{{route('admin.newsletter')}}">{{__('All Subscriber')}}</a></li>
                            @endcan
                            @can('newsletter-mail-send')
                                <li class="{{active_menu('admin-home/newsletter/all')}}"><a
                                            href="{{route('admin.newsletter.mail')}}">{{__('Send Mail To All')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


                    @canany(['blog-list','blog-create','blog-category-list','blog-page-settings','blog-single-page-settings'])
                    <li class="main_dropdown @if(request()->is(['admin-home/blog/*','admin-home/blog'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{__('Blogs')}}</span></a>
                        <ul class="collapse">
                            @can('blog-list')
                                <li class="{{active_menu('admin-home/blog')}}"><a
                                            href="{{route('admin.blog')}}">{{__('All Blog')}}</a></li>
                            @endcan
                            @can('blog-category-list')
                                <li class="{{active_menu('admin-home/blog/category')}}"><a
                                            href="{{route('admin.blog.category')}}">{{__('Category')}}</a></li>
                            @endcan
                            @can('blog-create')
                                <li class="{{active_menu('admin-home/blog/new')}}"><a
                                            href="{{route('admin.blog.new')}}">{{__('Add New Post')}}</a></li>
                            @endcan
                            @can('blog-page-settings')
                                <li class="{{active_menu('admin-home/blog/page-settings')}}"><a
                                            href="{{route('admin.blog.page.settings')}}">{{__('Blog Page Settings')}}</a>
                                </li>
                            @endcan
                            @can('blog-single-page-settings')
                                <li class="{{active_menu('admin-home/blog/single-settings')}}"><a
                                            href="{{route('admin.blog.single.settings')}}">{{__('Blog Single Settings')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['success-story-list','success-story-create','success-story-category-list'])
                    <li class="main_dropdown @if(request()->is(['admin-home/success-story/*','admin-home/success-story'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{__('Success Story')}}</span></a>
                        <ul class="collapse">
                                @can('success-story-list')
                                <li class="{{active_menu('admin-home/success-story')}}"><a
                                            href="{{route('admin.success.story')}}">{{__('All Success Story')}}</a></li>
                                @endcan

                                @can('success-story-category-list')
                                <li class="{{active_menu('admin-home/success-story/category')}}"><a
                                            href="{{route('admin.success.story.category')}}">{{__('Category')}}</a></li>
                                @endcan

                               @can('success-story-create')
                                <li class="{{active_menu('admin-home/success-story/new')}}"><a
                                            href="{{route('admin.success.story.new')}}">{{__('Add New Story')}}</a></li>
                                @endcan
                        </ul>
                    </li>
                    @endcanany


                    @canany(['image-gallery-list','image-gallery-category-list','image-gallery-page-settings'])
                    <li class="main_dropdown @if(request()->is(['admin-home/gallery-page/*','admin-home/gallery-page'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{__('Image Gallery')}}</span></a>
                        <ul class="collapse">
                            @can('image-gallery-list')
                                <li class="{{active_menu('admin-home/gallery-page')}}">
                                    <a href="{{route('admin.gallery.all')}}">{{__('Image Gallery')}}</a>
                                </li>
                            @endcan
                            @can('image-gallery-category-list')
                                <li class="{{active_menu('admin-home/gallery-page/category')}}">
                                    <a href="{{route('admin.gallery.category')}}">{{__('Category')}}</a>
                                </li>
                            @endcan
                            @can('image-gallery-page-settings')
                                <li class="{{active_menu('admin-home/gallery-page/page-settings')}}">
                                    <a href="{{route('admin.gallery.page.settings')}}">{{__('Page Settings')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @can('faq-list')
                        <li class="main_dropdown {{active_menu('admin-home/faq')}}">
                            <a href="{{route('admin.faq')}}" aria-expanded="true"><i class="ti-control-forward"></i>
                                <span>{{__('FAQ')}}</span></a>
                        </li>
                    @endcan

                    @can('client-area-list')
                    <li class="main_dropdown {{active_menu('admin-home/client-area')}}">
                        <a href="{{route('admin.client.area')}}" aria-expanded="true"><i class="ti-control-forward"></i>
                            <span>{{__('Client Area')}}</span></a>
                    </li>
                    @endcan

                    @can('team-member-list')
                        <li class="main_dropdown {{active_menu('admin-home/team-member/all')}}">
                            <a href="{{route('admin.team.member')}}" aria-expanded="true"><i
                                        class="ti-control-forward"></i>
                                <span>{{__('Team Members')}}</span></a>
                        </li>
                    @endcan

                @canany(['page-list','page-create'])
                    <li class="main_dropdown @if(request()->is(['admin-home/page-edit/*','admin-home/page/all','admin-home/page/new'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{__('Custom Pages')}}</span></a>
                        <ul class="collapse">
                            @can('page-list')
                                <li class="{{active_menu('admin-home/page/all')}}"><a
                                            href="{{route('admin.page')}}">{{__('All Pages')}}</a></li>
                            @endcan
                            @can('page-create')
                                <li class="{{active_menu('admin-home/page/new')}}"><a
                                            href="{{route('admin.page.new')}}">{{__('Add New Page')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @can('testimonial-list')
                        <li class="main_dropdown {{active_menu('admin-home/testimonial/all')}}">
                            <a href="{{route('admin.testimonial')}}" aria-expanded="true"><i
                                        class="ti-control-forward"></i>
                                <span>{{__('Testimonial')}}</span></a>
                        </li>
                    @endcan

                    @can('counterup-list')
                        <li class="{{active_menu('admin-home/counterup/all')}}">
                            <a href="{{route('admin.counterup')}}"><i class="ti-control-forward"></i>
                                <span>{{__('Counterup')}}</span></a>
                        </li>
                    @endcan


                    @canany(['job-list','job-category-list','job-create','job-applicant-list','job-applicant-report','job-settings'])
                    <li
                            class="main_dropdown @if(request()->is(['admin-home/jobs','admin-home/jobs/*'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-package mr-2"></i> {{__('Job Post Manage')}}</a>
                        <ul class="collapse">
                            @can('job-list')
                                <li class="{{active_menu('admin-home/jobs/all')}}"><a
                                            href="{{route('admin.jobs.all')}}">{{__('All Jobs')}}</a></li>
                            @endcan
                            @can('job-category-list')
                                <li class="{{active_menu('admin-home/jobs/category')}}"><a
                                            href="{{route('admin.jobs.category.all')}}">{{__('Category')}}</a></li>
                            @endcan
                            @can('job-create')
                                <li class="{{active_menu('admin-home/jobs/new')}}"><a
                                            href="{{route('admin.jobs.new')}}">{{__('Add New Job')}}</a></li>
                            @endcan
                            @can('job-applicant-list')
                                <li class="{{active_menu('admin-home/jobs/applicant')}}"><a
                                            href="{{route('admin.jobs.applicant')}}">{{__('All Applicant')}}</a></li>
                            @endcan
                            @can('job-applicant-report')
                                <li class="{{active_menu('admin-home/jobs/applicant/report')}}"><a
                                            href="{{route('admin.jobs.applicant.report')}}">{{__('Applicant Report')}}</a>
                                </li>
                            @endcan
                            @can('job-settings')
                                <li class="{{active_menu('admin-home/jobs/settings')}}"><a
                                            href="{{route('admin.jobs.settings')}}">{{__('Settings')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


               @canany([
                'event-list',
                'event-category-list',
                'event-create',
                'event-attendance-list',
                'event-payment-log-list',
                'event-attendance-report',
                'event-payment-log-report',
                'event-single-settings',
                'event-settings'
                ])
                     <li class="main_dropdown @if(request()->is(['admin-home/events','admin-home/events/*'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-timer mr-2"></i> {{__('Events Manage')}}</a>
                        <ul class="collapse">
                            @can('event-list')
                                <li class="{{active_menu('admin-home/events')}}"><a
                                            href="{{route('admin.events.all')}}">{{__('All Events')}}</a></li>
                            @endcan
                            @can('event-category-list')
                                <li class="{{active_menu('admin-home/events/category')}}"><a
                                            href="{{route('admin.events.category.all')}}">{{__('Category')}}</a></li>
                            @endcan
                            @can('event-create')
                                <li class="{{active_menu('admin-home/events/new')}}"><a
                                            href="{{route('admin.events.new')}}">{{__('Add New Event')}}</a></li>
                            @endcan
                            @can('event-attendance-list')
                                <li class="{{active_menu('admin-home/events/event-attendance-logs')}}"><a
                                            href="{{route('admin.event.attendance.logs')}}">{{__('Event Attendance Logs')}}</a>
                                </li>
                            @endcan
                            @can('event-payment-log-list')
                                <li class="{{active_menu('admin-home/events/event-payment-logs')}}"><a
                                            href="{{route('admin.event.payment.logs')}}">{{__('Event Payment Logs')}}</a>
                                </li>
                            @endcan
                            @can('event-attendance-report')
                                <li class="{{active_menu('admin-home/events/attendance/report')}}"><a
                                            href="{{route('admin.event.attendance.report')}}">{{__('Attendance Report')}}</a>
                                </li>
                            @endcan
                            @can('event-payment-log-report')
                                <li class="{{active_menu('admin-home/events/payment/report')}}"><a
                                            href="{{route('admin.event.payment.report')}}">{{__('Payment Log Report')}}</a>
                                </li>
                            @endcan
                            @can('event-single-settings')
                                <li class="{{active_menu('admin-home/events/single-page-settings')}}"><a
                                            href="{{route('admin.events.single.page.settings')}}">{{__('Event Single Settings')}}</a>
                                </li>
                            @endcan
                            @can('event-settings')
                                <li class="{{active_menu('admin-home/events/page-settings')}}"><a
                                            href="{{route('admin.events.page.settings')}}">{{__('Settings')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany([
                        'donation-list',
                        'donation-create',
                        'donation-category-list',
                        'donation-pending-cause',
                        'donation-withdraw-list',
                        'onation-payment-list',
                        'donation-cause-report',
                        'donation-flag-report-list',
                        'donation-settings'
                        ])

                    <li class="main_dropdown @if(request()->is(['admin-home/donations/*','admin-home/donations'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-agenda mr-2"></i> {{__('Donation')}}
                             <span class="badge">{{__('PC')}}{{$pending_cases_count}}</span>
                            <span class="badge">{{__('PW')}}{{$pending_withdraw_count}}</span>
                        </a>
                        <ul class="collapse">
                            @can('donation-list')
                                <li class="{{active_menu('admin-home/donations')}}"><a
                                            href="{{route('admin.donations.all')}}">{{__('All Causes')}}</a>
                                </li>
                            @endcan
                            @can('donation-create')
                                <li class="{{active_menu('admin-home/donations/new')}}"><a
                                            href="{{route('admin.donations.new')}}">{{__('Add New Cause')}}</a>
                                </li>
                            @endcan
                            @can('donation-category-list')
                                <li class="{{active_menu('admin-home/donations/category')}}"><a
                                            href="{{route('admin.donations.category.all')}}">{{__('Causes Category')}}</a>
                                </li>
                            @endcan
                            @can('donation-pending-cause')
                                <li class="{{active_menu('admin-home/donations/pending')}}"><a
                                            href="{{route('admin.donations.pending.all')}}">{{__('All Pending Causes')}} <span class="badge">{{$pending_cases_count}}</span></a>
                                </li>
                            @endcan
                            @can('donation-withdraw-list')
                                <li class="{{active_menu('admin-home/donations/withdraw/request/all')}}"><a
                                            href="{{route('admin.all.donation.withdraw.request')}}">{{__('All Withdraw Requests')}} <span class="badge">{{$pending_withdraw_count}}</span></a>
                                </li>
                            @endcan
                            @can('donation-payment-list')
                                <li class="{{active_menu('admin-home/donations/payment-logs')}}"><a
                                            href="{{route('admin.donations.payment.logs')}}">{{__('Causes Payment Logs')}}</a>
                                </li>
                            @endcan
                            @can('donation-cause-report')
                                <li class="{{active_menu('admin-home/donations/report')}}">
                                    <a href="{{route('admin.donations.report')}}">{{__('Causes Report')}}</a>
                                </li>
                            @endcan
                            @can('donations-flag-report-list')
                                <li class="{{active_menu('admin-home/donations/flag-reports')}}">
                                    <a href="{{route('admin.donations.flag.reports')}}">{{__('Flags')}}</a>
                                </li>
                            @endcan

                            @can('donation-settings')
                                <li class="{{active_menu('admin-home/donations/settings')}}">
                                    <a href="{{route('admin.donations.settings')}}">{{__('Settings')}}</a>
                                </li>

                                <li class="{{active_menu('admin-home/donations/single-page-variant')}}">
                                    <a href="{{route('admin.donations.single.page.variant')}}">{{__('Single Page Variant')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


                 @canany([
                    'appearance-topbar-settings',
                    'appearance-navbar-settings',
                    'appearance-home-variant',
                    'appearance-menu-manage-list',
                    'appearance-widget-manage',
                    'appearance-widget-manage',
                    'appearance-form-builder',
                    'appearance-media-image'
                    ])

                    <li class="main_dropdown
                    @if(request()->is(['admin-home/appearance-settings/topbar/*','admin-home/appearance-settings/navbar/*','admin-home/appearance-settings/home-variant/*','admin-home/media-upload/page','admin-home/menu','admin-home/menu-edit/*','admin-home/widgets','admin-home/widgets/*','admin-home/popup-builder/*','admin-home/form-builder/*'])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>{{__('Appearance Settings')}}</span></a>
                        <ul class="collapse ">
                            @can('appearance-topbar-settings')
                                <li class="{{active_menu('admin-home/appearance-settings/topbar/all')}}">
                                    <a href="{{route('admin.topbar.settings')}}"
                                       aria-expanded="true">
                                        {{__('Topbar Settings')}}
                                    </a>
                                </li>
                            @endcan
                            @can('appearance-navbar-settings')
                                <li class="{{active_menu('admin-home/appearance-settings/navbar/all')}}">
                                    <a href="{{route('admin.navbar.settings')}}">{{__('Navbar Settings')}}</a>
                                </li>
                            @endcan
                            @can('appearance-home-variant')
                                <li class="main_dropdown {{active_menu('admin-home/appearance-settings/home-variant/select')}}">
                                    <a href="{{route('admin.home.variant')}}"
                                       aria-expanded="true">
                                        {{__('Home Variant')}}
                                    </a>
                                </li>
                            @endcan
                            @can('appearance-menu-manage-list')
                                <li
                                        class="main_dropdown
                                        {{active_menu('admin-home/menu')}}
                                        @if(request()->is('admin-home/menu-edit/*')) active @endif
                                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        {{__('Menus Manage')}}</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/menu')}}"><a
                                                    href="{{route('admin.menu')}}">{{__('All Menus')}}</a></li>
                                    </ul>
                                </li>
                            @endcan
                            @can('appearance-widget-manage')
                                <li
                                        class="main_dropdown
                                            {{active_menu('admin-home/widgets')}}
                                        @if(request()->is('admin-home/widgets/*')) active @endif
                                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        {{__('Widgets Manage')}}</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/widgets')}}"><a
                                                    href="{{route('admin.widgets')}}">{{__('All Widgets')}}</a></li>
                                    </ul>
                                </li>
                            @endcan
                            @can('appearance-form-builder')
                                <li class="main_dropdown @if(request()->is('admin-home/form-builder/*')) active @endif">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        {{__('Form Builder')}}
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/form-builder/get-in-touch')}}"><a
                                                    href="{{route('admin.form.builder.get.in.touch')}}">{{__('Get In Touch Form')}}</a>
                                        </li>

                                        <li class="{{active_menu('admin-home/form-builder/apply-job-form')}}"><a
                                                    href="{{route('admin.form.builder.apply.job.form')}}">{{__('Apply Job Form')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/form-builder/event-attendance')}}"><a
                                                    href="{{route('admin.form.builder.event.attendance.form')}}">{{__('Event Attendance Form')}}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('appearance-media-image')
                                <li class="main_dropdown {{active_menu('admin-home/media-upload/page')}}">
                                    <a href="{{route('admin.upload.media.images.page')}}"
                                       aria-expanded="true">
                                        {{__('Media Images Manage')}}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


                    @canany([
                'page-settings-home-page-manage',
                'page-settings-about-page-manage',
                'page-settings-event-page-manage',
                'page-settings-contact-page-manage',
                'page-settings-success-story-page-manage',
                'page-settings-error-page-manage',
                'page-settings-maintain-page-manage'
                ])
                    <li class="main_dropdown
                        @if(request()->is([
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
                        ])  ) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>{{__('All Page Settings')}}</span></a>
                        <ul class="collapse ">
                            @can('page-settings-home-page-manage')
                                <li class="main_dropdown
                                @if(request()->is(['admin-home/home-page-01/*','admin-home/header','admin-home/keyfeatures','admin-home/home-page-04/*','admin-home/home-page-05/*','admin-home/home-page-06/*'])  ) active @endif
                                        ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        {{__('Home Page Manage')}}
                                    </a>
                                    <ul class="collapse">
                                        @if(in_array(get_static_option('home_page_variant'),['01','02','03']))
                                            <li class="{{active_menu('admin-home/home-page-01/header')}}">
                                                <a href="{{route('admin.header')}}">
                                                    {{__('Header Area')}}
                                                </a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/about-us')}}"><a
                                                        href="{{route('admin.homeone.about.us')}}">{{__('About Us Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/feature-area')}}"><a
                                                        href="{{route('admin.homeone.feature.area')}}">{{__('Feature Area')}}</a>
                                            </li>

                                            <li class="{{active_menu('admin-home/home-page-01/donation-category-area')}}"><a
                                                        href="{{route('admin.homeone.donation.category.area')}}">{{__('Cause Category Area')}}</a>
                                            </li>

                                            <li class="{{active_menu('admin-home/home-page-01/feature-cause-area')}}"><a
                                                        href="{{route('admin.homeone.featured.cause.area')}}">{{__('Featured Cause Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/video-area')}}"><a
                                                        href="{{route('admin.homeone.video.area')}}">{{__('Video Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/latest-cause-area')}}"><a
                                                        href="{{route('admin.homeone.latest.cause.area')}}">{{__('Latest Cause Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/team-member')}}"><a
                                                        href="{{route('admin.homeone.team.member')}}">{{__('Team Member Area')}}</a>
                                            </li>
                                            @if(in_array(get_static_option('home_page_variant'),['02','03']))
                                                <li class="{{active_menu('admin-home/home-page-01/what-we-do-area')}}"><a
                                                            href="{{route('admin.homeone.what.we.do.area')}}">{{__('What We Do Area')}}</a>
                                                </li>
                                                <li class="{{active_menu('admin-home/home-page-01/coutnerup-area')}}"><a
                                                            href="{{route('admin.homeone.counterup.area')}}">{{__('Counterup Area')}}</a>
                                                </li>
                                            @endif
                                            <li class="{{active_menu('admin-home/home-page-01/testimonial')}}"><a
                                                        href="{{route('admin.homeone.testimonial')}}">{{__('Testimonial Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/latest-event')}}"><a
                                                        href="{{route('admin.homeone.latest.event')}}">{{__('Latest Event Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/latest-news')}}"><a
                                                        href="{{route('admin.homeone.latest.news')}}">{{__('Latest News Area')}}</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/home-page-01/section-manage')}}">
                                                <a href="{{route('admin.homeone.section.manage')}}">{{__('Section Manage')}}</a>
                                            </li>
                                        @endif

                                            @if(get_static_option('home_page_variant') == '04')

                                                <li class="{{active_menu('admin-home/home-page-04/header-area')}}">
                                                    <a href="{{route('admin.home.four.header.area')}}">
                                                        {{__('Header Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/feature-area')}}">
                                                    <a href="{{route('admin.home.four.feature.area')}}">
                                                        {{__('Feature Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/success-story-area')}}">
                                                    <a href="{{route('admin.home.four.success.story.area')}}">
                                                        {{__('Success Story Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/about-us-area')}}">
                                                    <a href="{{route('admin.home.four.about.us.area')}}">
                                                        {{__('About Us Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/events-area')}}">
                                                    <a href="{{route('admin.home.four.events.area')}}">
                                                        {{__('Events Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/recent-causes-area')}}">
                                                    <a href="{{route('admin.home.four.recent.causes.area')}}">
                                                        {{__('Recent Causes Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04/recent-blog-area')}}">
                                                    <a href="{{route('admin.home.four.recent.blog.area')}}">
                                                        {{__('Recent Blog Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-04-05-06/section-manage')}}">
                                                    <a href="{{route('admin.home.four.five.six.section.manage')}}">{{__('Section Manage')}}</a>
                                                </li>
                                            @endif

                                            @if(get_static_option('home_page_variant') == '05')

                                                <li class="{{active_menu('admin-home/home-page-01/header')}}">
                                                    <a href="{{route('admin.header')}}">
                                                        {{__('Header Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/rise-area')}}">
                                                    <a href="{{route('admin.home.five.rise.area')}}">
                                                        {{__('Rise Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/feature-area')}}">
                                                    <a href="{{route('admin.home.five.feature.area')}}">
                                                        {{__('Feature Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/category-area')}}">
                                                    <a href="{{route('admin.home.five.category.area')}}">
                                                        {{__('Category Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/success-story-area')}}">
                                                    <a href="{{route('admin.home.five.success.story.area')}}">
                                                        {{__('Success Story Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/recent-causes-area')}}">
                                                    <a href="{{route('admin.home.five.recent.causes.area')}}">
                                                        {{__('Recent Causes Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/events-area')}}">
                                                    <a href="{{route('admin.home.five.events.area')}}">
                                                        {{__('Events Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-05/recent-blog-area')}}">
                                                    <a href="{{route('admin.home.five.recent.blog.area')}}">
                                                        {{__('Recent Blog Area')}}
                                                    </a>
                                                </li>
                                                <li class="{{active_menu('admin-home/home-page-04-05-06/section-manage')}}">
                                                    <a href="{{route('admin.home.four.five.six.section.manage')}}">{{__('Section Manage')}}</a>
                                                </li>
                                            @endif


                                            @if(get_static_option('home_page_variant') == '06')

                                                <li class="{{active_menu('admin-home/home-page-06/header')}}">
                                                    <a href="{{route('admin.home.six.header.area')}}">
                                                        {{__('Header Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/rise-area')}}">
                                                    <a href="{{route('admin.home.six.rise.area')}}">
                                                        {{__('Rise Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/feature-area')}}">
                                                    <a href="{{route('admin.home.six.feature.area')}}">
                                                        {{__('Feature Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/category-area')}}">
                                                    <a href="{{route('admin.home.six.category.area')}}">
                                                        {{__('Category Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/recent-causes-area')}}">
                                                    <a href="{{route('admin.home.six.recent.causes.area')}}">
                                                        {{__('Recent Causes Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/success-story-area')}}">
                                                    <a href="{{route('admin.home.six.success.story.area')}}">
                                                        {{__('Success Story Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/about-us-area')}}">
                                                    <a href="{{route('admin.home.six.about.us.area')}}">
                                                        {{__('About Us Area')}}
                                                    </a>
                                                </li>

                                                <li class="{{active_menu('admin-home/home-page-06/events-area')}}">
                                                    <a href="{{route('admin.home.six.events.area')}}">
                                                        {{__('Events Area')}}
                                                    </a>
                                                </li>
                                                <li class="{{active_menu('admin-home/home-page-04-05-06/section-manage')}}">
                                                    <a href="{{route('admin.home.four.five.six.section.manage')}}">{{__('Section Manage')}}</a>
                                                </li>
                                            @endif
                                    </ul>
                                </li>
                            @endcan

                            @can('page-settings-about-page-manage')
                                <li class="main_dropdown @if(request()->is('admin-home/about-page/*')  ) active @endif ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        {{__('About Page Manage')}}
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/about-page/about-us')}}"><a
                                                    href="{{route('admin.about.page.about')}}">{{__('About Us Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/our-mission')}}"><a
                                                    href="{{route('admin.about.our.mission')}}">{{__('Our Mission Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/counterup')}}"><a
                                                    href="{{route('admin.about.counterup')}}">{{__('Counterup Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/what-we-do')}}"><a
                                                    href="{{route('admin.about.what.we.do')}}">{{__('What We Do Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/testimonial')}}"><a
                                                    href="{{route('admin.about.testimonial')}}">{{__('Testimonial Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/team-member')}}"><a
                                                    href="{{route('admin.about.team.member')}}">{{__('Team Member Section')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/section-manage')}}"><a
                                                    href="{{route('admin.about.page.section.manage')}}">{{__('Section Manage')}}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('page-settings-event-page-manage')
                                <li class="main_dropdown @if(request()->is('admin-home/events/page-manage')  ) active @endif ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        {{__('Events Page Manage')}}
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/events/page-manage')}}"><a
                                                    href="{{route('admin.event.page.manage')}}">{{__('Page Manage')}}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan
                            @can('page-settings-contact-page-manage')
                                <li class="main_dropdown @if(request()->is('admin-home/contact-page/*')  ) active @endif">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                        {{__('Contact Page Manage')}}
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/contact-page/contact-info')}}">
                                            <a href="{{route('admin.contact.info')}}">{{__('Contact Info')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/contact-page/form-area')}}">
                                            <a href="{{route('admin.contact.page.form.area')}}">{{__('Form Area')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/contact-page/map')}}">
                                            <a href="{{route('admin.contact.page.map')}}">{{__('Google Map Area')}}</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/contact-page/section-manage')}}">
                                            <a href="{{route('admin.contact.page.section.manage')}}">{{__('Section Manage')}}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                                @can('page-settings-success-story-page-manage')
                                <li class="main_dropdown {{active_menu('admin-home/success-story-page-manage')}}">
                                    <a href="{{route('admin.success.story.page.manage')}}" aria-expanded="true">
                                        {{__('Success Story Page Manage')}}</a>
                                </li>
                                @endcan

                            @can('page-settings-error-page-manage')
                                <li class="main_dropdown {{active_menu('admin-home/404-page-manage')}}">
                                    <a href="{{route('admin.404.page.settings')}}" aria-expanded="true">
                                        {{__('404 Page Manage')}}</a>
                                </li>
                            @endcan
                            @can('page-settings-maintain-page-manage')
                                <li class="main_dropdown {{active_menu('admin-home/maintains-page/settings')}}">
                                    <a href="{{route('admin.maintains.page.settings')}}"
                                       aria-expanded="true">
                                        {{__('Maintain Page Manage')}}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany([
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
                    ])
                       <li class="main_dropdown @if(request()->is('admin-home/general-settings/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>{{__('General Settings')}}</span></a>
                        <ul class="collapse ">
                            @can('general-settings-site-identity')
                                <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a
                                            href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-basic-settings')
                                <li class="{{active_menu('admin-home/general-settings/basic-settings')}}"><a
                                            href="{{route('admin.general.basic.settings')}}">{{__('Basic Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-color-settings')
                                <li class="{{active_menu('admin-home/general-settings/color-settings')}}"><a
                                            href="{{route('admin.general.color.settings')}}">{{__('Color Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-typography')
                                <li class="{{active_menu('admin-home/general-settings/typography-settings')}}"><a
                                            href="{{route('admin.general.typography.settings')}}">{{__('Typography Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-seo-settings')
                                <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a
                                            href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-third-party-script')
                                <li class="{{active_menu('admin-home/general-settings/scripts')}}"><a
                                            href="{{route('admin.general.scripts.settings')}}">{{__('Third Party Scripts')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-email-template')
                                <li class="{{active_menu('admin-home/general-settings/email-template')}}"><a
                                            href="{{route('admin.general.email.template')}}">{{__('Email Template')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/email-settings')}}"><a
                                            href="{{route('admin.general.email.settings')}}">{{__('Email Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-smtp-settings')
                                <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a
                                            href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-regenerate-media-image')
                                <li class="{{active_menu('admin-home/general-settings/regenerate-image')}}"><a
                                            href="{{route('admin.general.regenerate.thumbnail')}}">{{__('Regenerate Media Image')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-page-settings')
                                <li class="{{active_menu('admin-home/general-settings/page-settings')}}"><a
                                            href="{{route('admin.general.page.settings')}}">{{__('Page Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-payment-gateway')
                                @if(!empty(get_static_option('site_payment_gateway')))
                                    <li class="{{active_menu('admin-home/general-settings/payment-settings')}}"><a
                                                href="{{route('admin.general.payment.settings')}}">{{__('Payment Gateway Settings')}}</a>
                                    </li>
                                @endif
                            @endcan
                            @can('general-settings-custom-css')
                                <li class="{{active_menu('admin-home/general-settings/custom-css')}}"><a
                                            href="{{route('admin.general.custom.css')}}">{{__('Custom CSS')}}</a></li>
                            @endcan
                            @can('general-settings-custom-js')
                                <li class="{{active_menu('admin-home/general-settings/custom-js')}}"><a
                                            href="{{route('admin.general.custom.js')}}">{{__('Custom JS')}}</a></li>
                            @endcan
                            @can('general-settings-cache-settings')
                                <li class="{{active_menu('admin-home/general-settings/cache-settings')}}"><a
                                            href="{{route('admin.general.cache.settings')}}">{{__('Cache Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-gdpr-settings')
                                <li class="{{active_menu('admin-home/general-settings/gdpr-settings')}}"><a
                                            href="{{route('admin.general.gdpr.settings')}}">{{__('GDPR Compliant Cookies Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-sitemap')
                                <li class="{{active_menu('admin-home/general-settings/sitemap-settings')}}"><a
                                            href="{{route('admin.general.sitemap.settings')}}">{{__('Sitemap Settings')}}</a>
                                </li>
                            @endcan
                            @can('general-settings-rss-feed')
                                <li class="{{active_menu('admin-home/general-settings/rss-settings')}}"><a

                                            href="{{route('admin.general.rss.feed.settings')}}">{{__('RSS Feed Settings')}}</a>
                                </li>
                            @endcan
                                @can('general-settings-database-upgrade')
                                <li class="{{active_menu('admin-home/general-settings/database-upgrade')}}"><a
                                            href="{{route('admin.general.database.upgrade')}}">{{__('Database Upgrade')}}</a>
                                </li>
                                @endcan
                            @can('general-settings-license')
                                <li class="{{active_menu('admin-home/general-settings/license-setting')}}"><a
                                            href="{{route('admin.general.license.settings')}}">{{__('Licence Settings')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany


                    @can('language-list')
                    <li class="@if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ) active @endif">
                        <a href="{{route('admin.languages')}}" aria-expanded="true"><i class="ti-signal"></i>
                            <span>{{__('Languages')}}</span></a>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </div>
</div>
