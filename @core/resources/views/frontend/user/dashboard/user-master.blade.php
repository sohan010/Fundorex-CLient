@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('User Dashboard')}}
@endsection
@section('content')

    <div class="contatiner">
        <!-- banner -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="profile">
                    <div class="img-circle float-start">
                        {!! render_image_markup_by_attachment_id( optional(Auth::guard('web')->user())->image) !!}
                    </div>
                    <span class="float-start"><span class="statusDonatur">{{ optional(Auth::guard('web')->user())->name }}</span>
                </div>
            </div>
        </div>
        <!-- /banner -->

        <!-- saldo -->
        <div class="row mb-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto wrapSaldo">
                <div class="saldo p-2">

                    <span class="float-start saldoText">Saldo anda</span><br><span class="jumlahSaldo">Rp 0</span>
                    <a href="" class="btn btn-success"> Isi saldo</a>
                    <a href="{{url('/')}}" class="btn btn-warning" target="_blank"> {{__('Home')}}</a>
                </div>
            </div>
        </div>
        <!-- /saldo -->


        <!-- menuProfile -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto menuProfile">
                <ul>
                    <li><a href="{{route('user.home')}}"><img src="{{asset('assets/frontend/img/pengaturan.png')}}" class="img-fluid" alt="Donasi - Profile"> {{__('Dashboard')}}</a></li>

                    @if(!empty(get_static_option('donations_module_status')))
                    <li><a href="{{route('user.home.donations')}}"><img src="{{asset('assets/frontend/img/faq.png')}}" class="img-fluid" alt="Donasi - Profile">
                            {{__('All ')}} {{get_static_option('donation_page_name')}} </a>
                    </li>
                    @endif

                    @if(Auth::guard('web')->user()->user_info_verified == 1)
                    <li><a href="{{route('user.campaign.all')}}"><img src="{{asset('assets/frontend/img/hubungi.png')}}" class="img-fluid"
                         alt="Donasi - Profile"> {{__('Campaign List')}}</a>
                    </li>
                    <li><a href="{{ route('user.campaign.log.withdraw') }}"><img src="{{asset('assets/frontend/img/tentang.png')}}" class="img-fluid" alt="Donasi-Profile">
                    {{__('Withdraw Logs')}}</a>
                    </li>
                    @endif

                    <li><a href="{{route('user.home.support.tickets')}}"><img src="{{asset('assets/frontend/img/pengaturan.png')}}"
                     class="img-fluid " alt="Donasi - Profile">
                     {{__('All')}} {{get_static_option('support_ticket_page_name')}}</a>
                    </li>

                    <li><a href="{{route('user.home.edit.profile')}}"><img src="{{asset('assets/frontend/img/pengaturan.png')}}" class="img-fluid" alt="Donasi - Profile"> {{__('Edit Profile')}}</a></li>
                    <li><a href="{{route('user.home.change.password')}}"><img src="{{asset('assets/frontend/img/pengaturan.png')}}" class="img-fluid " alt="Donasi - Profile"> {{__('Change Password')}}</a></li>
                    <li><a href="{{ route('frontend.user.logout') }}"><img src="{{asset('assets/frontend/img/keluar.png')}}" class="img-fluid d-inline-block pr-2" alt="Donasi - Profile">{{__('Logout')}}</a></li>
                    <li>
                    @if(Auth::guard('web')->user()->user_info_verified == 0)
                        @if(!request()->routeIs('user.dashboard.verify.info.page'))
                        <div class="alert alert-warning ">
                            <h3 class="text-center">{{__('Please Verify your KYC Information (For Campaign)')}}</h3>
                           <h6 class="text-center"> <a class="btn btn-primary btn-sm text-white" href="{{route('user.dashboard.verify.info.page')}}">{{__('Verify Now')}}</a></h6>
                        </div>
                        @endif
                     @endif
                    </li>

                </ul>
            </div>
        </div>


        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto wrapSaldo">
                    <div class="message-show margin-top-10">
                        <x-msg.success/>
                        <x-msg.error/>
                    </div>
                    @yield('section')
                </div>
            </div>
        </div>





        <!-- /menuProfile -->

        <!-- menu bottom -->
{{--        <div class="row mt-15 pl-25 pr-25">--}}
{{--            <nav class="navbar navbar-white bg-white navbar-expand fixed-bottom col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">--}}
{{--                <ul class="navbar-nav nav-justified w-100">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link text-center">--}}
{{--                            <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path class="svgMenuBottom" d="M10.0693 2.8201L3.13929 8.37009C2.35929 8.99009 1.85929 10.3001 2.02929 11.2801L3.35929 19.2401C3.59929 20.6601 4.95928 21.8101 6.39928 21.8101H17.5993C19.0293 21.8101 20.3993 20.6501 20.6393 19.2401L21.9693 11.2801C22.1293 10.3001 21.6293 8.99009 20.8593 8.37009L13.9293 2.83008C12.8593 1.97008 11.1293 1.9701 10.0693 2.8201Z" fill="#E2E4E3"/>--}}
{{--                                <path class="inner-svgMenuBottom" d="M12 15.5C13.3807 15.5 14.5 14.3807 14.5 13C14.5 11.6193 13.3807 10.5 12 10.5C10.6193 10.5 9.5 11.6193 9.5 13C9.5 14.3807 10.6193 15.5 12 15.5Z" fill="#C8CBCA"/>--}}
{{--                            </svg>--}}
{{--                            <span class="small d-block textMenuBottom">Home</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link text-center">--}}
{{--                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path class="svgMenuBottom" d="M16.44 3.1001C14.63 3.1001 13.01 3.98008 12 5.33008C10.99 3.98008 9.37 3.1001 7.56 3.1001C4.49 3.1001 2 5.60009 2 8.69009C2 9.88009 2.19 10.9801 2.52 12.0001C4.1 17.0001 8.97 19.9901 11.38 20.8101C11.72 20.9301 12.28 20.9301 12.62 20.8101C15.03 19.9901 19.9 17.0001 21.48 12.0001C21.81 10.9801 22 9.88009 22 8.69009C22 5.60009 19.51 3.1001 16.44 3.1001Z" fill="#E2E4E3"/>--}}
{{--                                <path opacity="0.5" d="M12.7754 13.8998C12.7406 13.8998 12.7057 13.8917 12.6736 13.8703L11.8423 13.3742C11.6358 13.2509 11.483 12.9801 11.483 12.7414V11.642C11.483 11.5321 11.5742 11.4409 11.6841 11.4409C11.794 11.4409 11.8852 11.5321 11.8852 11.642V12.7414C11.8852 12.8379 11.9657 12.9801 12.0488 13.0283L12.88 13.5244C12.9766 13.5807 13.0061 13.704 12.9497 13.8006C12.9095 13.8649 12.8425 13.8998 12.7754 13.8998Z" fill="#C8CBCA"/>--}}
{{--                                <path class="inner-svgMenuBottom" d="M12.0061 8.94306C11.9201 8.94306 11.8279 8.95534 11.7418 8.96149L11.9139 8.76478C12.0799 8.57422 12.0615 8.27915 11.8709 8.11318C11.6803 7.9472 11.3853 7.96565 11.2193 8.15621L10.1927 9.33032C10.1866 9.33647 10.1866 9.34262 10.1804 9.34877C10.1743 9.35491 10.1681 9.35491 10.1681 9.36106C10.1558 9.3795 10.1497 9.4041 10.1374 9.42868C10.1251 9.45942 10.1067 9.48401 10.1005 9.51474C10.0944 9.54547 10.0944 9.57006 10.0882 9.6008C10.0882 9.63153 10.0821 9.65612 10.0821 9.68686C10.0821 9.7176 10.0944 9.74219 10.1067 9.77293C10.1128 9.80366 10.1251 9.82825 10.1374 9.85283C10.1497 9.87742 10.1743 9.90201 10.1927 9.9266C10.2112 9.94504 10.2173 9.96963 10.2358 9.98192C10.2419 9.98807 10.2481 9.98808 10.2542 9.99423C10.2604 10.0004 10.2604 10.0065 10.2665 10.0065L11.459 10.8794C11.539 10.9409 11.6373 10.9655 11.7295 10.9655C11.8709 10.9655 12.0123 10.8979 12.1045 10.7749C12.252 10.5721 12.209 10.2831 12.0061 10.1295L11.6619 9.87742C11.7725 9.86513 11.8893 9.85283 12.0061 9.85283C13.4446 9.85283 14.6187 11.027 14.6187 12.4654C14.6187 13.9038 13.4446 15.0779 12.0061 15.0779C10.5677 15.0779 9.3936 13.9038 9.3936 12.4654C9.3936 11.9429 9.54729 11.4449 9.83006 11.0147C9.97145 10.8057 9.91611 10.5167 9.70096 10.3754C9.49196 10.234 9.20305 10.2893 9.06166 10.5044C8.67439 11.0884 8.46538 11.7646 8.46538 12.4654C8.46538 14.414 10.0514 16 12 16C13.9487 16 15.5346 14.414 15.5346 12.4654C15.5346 10.5167 13.9548 8.94306 12.0061 8.94306Z" fill="#C8CBCA"/>--}}
{{--                            </svg>--}}
{{--                            <span class="small d-block textMenuBottom">Donasi Terkini</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link text-center">--}}
{{--                            <!-- <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <circle cx="20.5" cy="20" r="20" fill="#1DBF73"/>--}}
{{--                                <path d="M31.4467 15.285C31.4467 15.485 31.4467 15.685 31.4334 15.8716C29.3934 15.1116 26.9934 15.5783 25.3934 17.0183C24.3134 16.045 22.9134 15.4983 21.42 15.4983C18.14 15.4983 15.4734 18.1783 15.4734 21.485C15.4734 25.2583 17.3667 28.0183 19.18 29.805C19.0334 29.7917 18.9134 29.765 18.8067 29.725C15.3534 28.5383 7.63336 23.6317 7.63336 15.285C7.63336 11.605 10.5933 8.63165 14.2467 8.63165C16.42 8.63165 18.34 9.67164 19.54 11.285C20.7534 9.67164 22.6734 8.63165 24.8334 8.63165C28.4867 8.63165 31.4467 11.605 31.4467 15.285Z" fill="white"/>--}}
{{--                                <path d="M28.9666 17.285C27.54 17.285 26.2466 17.9783 25.4466 19.045C24.6466 17.9783 23.3666 17.285 21.9266 17.285C19.5 17.285 17.5267 19.2583 17.5267 21.7117C17.5267 22.6583 17.6733 23.525 17.94 24.325C19.1933 28.285 23.0466 30.645 24.9533 31.2983C25.22 31.3917 25.66 31.3917 25.94 31.2983C27.8466 30.645 31.7 28.285 32.9533 24.325C33.22 23.5117 33.3666 22.645 33.3666 21.7117C33.3666 19.2583 31.3933 17.285 28.9666 17.285Z" fill="white"/>--}}
{{--                                </svg>--}}
{{--                            <span class="small d-block textMenuBottom">Donasi Bebas</span> -->--}}
{{--                            <div class='containerDonasiBebas'>--}}
{{--                                    <span class='pulse-button'>--}}
{{--                                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <circle cx="20.5" cy="20" r="20" fill="#1DBF73"/>--}}
{{--                                            <path d="M31.4467 15.285C31.4467 15.485 31.4467 15.685 31.4334 15.8716C29.3934 15.1116 26.9934 15.5783 25.3934 17.0183C24.3134 16.045 22.9134 15.4983 21.42 15.4983C18.14 15.4983 15.4734 18.1783 15.4734 21.485C15.4734 25.2583 17.3667 28.0183 19.18 29.805C19.0334 29.7917 18.9134 29.765 18.8067 29.725C15.3534 28.5383 7.63336 23.6317 7.63336 15.285C7.63336 11.605 10.5933 8.63165 14.2467 8.63165C16.42 8.63165 18.34 9.67164 19.54 11.285C20.7534 9.67164 22.6734 8.63165 24.8334 8.63165C28.4867 8.63165 31.4467 11.605 31.4467 15.285Z" fill="white"/>--}}
{{--                                            <path d="M28.9666 17.285C27.54 17.285 26.2466 17.9783 25.4466 19.045C24.6466 17.9783 23.3666 17.285 21.9266 17.285C19.5 17.285 17.5267 19.2583 17.5267 21.7117C17.5267 22.6583 17.6733 23.525 17.94 24.325C19.1933 28.285 23.0466 30.645 24.9533 31.2983C25.22 31.3917 25.66 31.3917 25.94 31.2983C27.8466 30.645 31.7 28.285 32.9533 24.325C33.22 23.5117 33.3666 22.645 33.3666 21.7117C33.3666 19.2583 31.3933 17.285 28.9666 17.285Z" fill="white"/>--}}
{{--                                            </svg>--}}
{{--                                    </span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link text-center">--}}
{{--                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path class="svgMenuBottom" d="M16.44 3.1001C14.63 3.1001 13.01 3.98008 12 5.33008C10.99 3.98008 9.37 3.1001 7.56 3.1001C4.49 3.1001 2 5.60009 2 8.69009C2 9.88009 2.19 10.9801 2.52 12.0001C4.1 17.0001 8.97 19.9901 11.38 20.8101C11.72 20.9301 12.28 20.9301 12.62 20.8101C15.03 19.9901 19.9 17.0001 21.48 12.0001C21.81 10.9801 22 9.88009 22 8.69009C22 5.60009 19.51 3.1001 16.44 3.1001Z" fill="#E2E4E3"/>--}}
{{--                                <path d="M11.9329 8C10.8413 8 9.95377 8.8875 9.95377 9.97917C9.95377 11.05 10.7913 11.9167 11.8829 11.9542C11.9163 11.95 11.9496 11.95 11.9746 11.9542C11.9829 11.9542 11.9871 11.9542 11.9954 11.9542C11.9996 11.9542 11.9996 11.9542 12.0038 11.9542C13.0704 11.9167 13.9079 11.05 13.9121 9.97917C13.9121 8.8875 13.0246 8 11.9329 8Z" fill="#C8CBCA"/>--}}
{{--                                <path class="inner-svgMenuBottom" opacity="0.5" d="M14.05 13.0625C12.8875 12.2875 10.9917 12.2875 9.82083 13.0625C9.29167 13.4166 9 13.8958 9 14.4083C9 14.9208 9.29167 15.3958 9.81667 15.7458C10.4 16.1375 11.1667 16.3333 11.9333 16.3333C12.7 16.3333 13.4667 16.1375 14.05 15.7458C14.575 15.3916 14.8666 14.9166 14.8666 14.4C14.8625 13.8875 14.575 13.4125 14.05 13.0625Z" fill="#C8CBCA"/>--}}
{{--                            </svg>--}}
{{--                            <span class="small d-block textMenuBottom">Donasi Saya</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item active">--}}
{{--                        <a href="#" class="nav-link text-center">--}}
{{--                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path class="svgMenuBottom" d="M12 2C9.38 2 7.25 4.13 7.25 6.75C7.25 9.32 9.26 11.4 11.88 11.49C11.96 11.48 12.04 11.48 12.1 11.49C12.12 11.49 12.13 11.49 12.15 11.49C12.16 11.49 12.16 11.49 12.17 11.49C14.73 11.4 16.74 9.32 16.75 6.75C16.75 4.13 14.62 2 12 2Z" fill="#C8CBCA"/>--}}
{{--                                <path class="inner-svgMenuBottom" d="M17.0809 14.1499C14.2909 12.2899 9.74094 12.2899 6.93094 14.1499C5.66094 14.9999 4.96094 16.1499 4.96094 17.3799C4.96094 18.6099 5.66094 19.7499 6.92094 20.5899C8.32094 21.5299 10.1609 21.9999 12.0009 21.9999C13.8409 21.9999 15.6809 21.5299 17.0809 20.5899C18.3409 19.7399 19.0409 18.5999 19.0409 17.3599C19.0309 16.1299 18.3409 14.9899 17.0809 14.1499Z" fill="#E2E4E3"/>--}}
{{--                            </svg>--}}
{{--                            <span class="small d-block textMenuBottom">Profile</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </div>

{{--    <section class="login-page-wrapper">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}

{{--                    <div class="user-dashboard-wrapper">--}}
{{--                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link"><i class="fa fa-user mr-1"></i>{{ optional(Auth::guard('web')->user())->name }}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(request()->routeIs('user.home')) active @endif" href="{{route('user.home')}}">{{__('Dashboard')}}</a>--}}
{{--                            </li>--}}

{{--                            @if(!empty(get_static_option('donations_module_status')))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link @if(request()->routeIs('user.home.donations')) active @endif" href="{{route('user.home.donations')}}" >{{__('All ')}} {{get_static_option('donation_page_name')}}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if( request()->routeIs('user.campaign.all') || request()->routeIs('user.campaign.new') ||request()->routeIs('user.campaign.edit') || request()->routeIs('user.all.update.cause.page') || request()->routeIs('user.add.new.update.cause.page') ) active @endif " href="{{route('user.campaign.all')}}">{{__('Campaign List')}}</a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link  @if( request()->routeIs('user.campaign.log.withdraw')) active @endif"  href="{{ route('user.campaign.log.withdraw') }}">{{__('Withdraw Logs')}}</a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(request()->routeIs('user.home.support.tickets')) active @endif" href="{{route('user.home.support.tickets')}}" >{{__('All')}} {{get_static_option('support_ticket_page_name')}}</a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(request()->routeIs('user.home.edit.profile')) active @endif " href="{{route('user.home.edit.profile')}}">{{__('Edit Profile')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(request()->routeIs('user.home.change.password')) active @endif " href="{{route('user.home.change.password')}}">{{__('Change Password')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link"  href="{{ route('user.logout') }}"--}}
{{--                                   onclick="event.preventDefault();document.getElementById('logout_submit_btn').dispatchEvent(new MouseEvent('click'));">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                    <button id="logout_submit_btn" type="submit"></button>--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="tab-content">--}}
{{--                            <div class="tab-pane active" role="tabpanel">--}}
{{--                                <div class="message-show margin-top-10">--}}
{{--                                    <x-msg.success/>--}}
{{--                                    <x-msg.error/>--}}
{{--                                </div>--}}
{{--                                @yield('section')--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection


{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--           $('select[name="country"] option[value="{{optional(auth()->guard('web')->user())->country}}"]').attr('selected',true);--}}
{{--           $(document).on('click','.mobile_nav',function(e){--}}
{{--              e.preventDefault(); --}}
{{--               $(this).parent().toggleClass('show');--}}
{{--           });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
