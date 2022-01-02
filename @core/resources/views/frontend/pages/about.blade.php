@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('about_page_name')}}
@endsection
@section('page-title',get_static_option('about_page_name'))
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('about_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('about_page__meta_tags')}}">
@endsection
@section('content')
    <!-- About Section -->
    <div class="about-area padding-top-115 padding-bottom-120">
        <div class="container">
            @if(!empty(get_static_option('about_page_about_us_section_status')))
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-title-content margin-bottom-50">
                        <div class="section-title desktop-left">
                            <span>{{get_static_option('about_page_about_section_subtitle')}}</span>
                            <h3 class="title">{!! render_colored_text(get_static_option('about_page_about_section_title')) !!}</h3>
                        </div>
                        <div class="section-paragraph">
                            {!! get_static_option('about_page_about_section_description') !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(!empty(get_static_option('about_page_our_mission_section_status')))
            <div class="about-content-area padding-top-60 padding-bottom-60">
                <div class="bg-img" {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_our_mission_left_image_image')) !!}></div>
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="about-content">
                            <div class="section-title">
                                <h3 class="title">{{get_static_option('about_page_our_mission_title')}}</h3>
                                <div>{!! get_static_option('about_page_our_mission_description') !!}</div>
                            </div>
                            <div class="content">
                                <ul>
                                    @php
                                        $all_icon_fields =  get_static_option('about_page_our_mission_list_section_icon');
                                        $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                                        $all_title_fields = get_static_option('about_page_our_mission_list_section_title');
                                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                                    @endphp
                                    @foreach($all_icon_fields as $icon)
                                    <li><i class="{{$icon}}"></i> {{$all_title_fields[$loop->index] ?? ''}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if(!empty(get_static_option('about_page_counterup_section_status')))
    <!-- Counter Area -->
    <div class="counterup-area bg-image padding-bottom-105 padding-top-110"
    {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_counterup_background_image')) !!}
    >
        <div class="container">
            <div class="row">
                @foreach($all_counterup as $data)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-counterup-01">
                            <div class="icon">
                                <i class="{{$data->icon}}"></i>
                            </div>
                            <div class="content">
                                <div class="count-wrap"><span class="count-num">{{$data->number}}</span>{{$data->extra_text}}</div>
                                <h4 class="title">{{$data->title}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @if(!empty(get_static_option('about_page_what_we_do_section_status')))
    <!-- Follow Problem -->
    <section class="problem-area padding-top-100 padding-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-11 col-11">
                    <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                        <span>{{get_static_option('about_page_what_we_do_area_subtitle')}}</span>
                        <h2 class="title">{!! render_colored_text(get_static_option('about_page_what_we_do_area_title')) !!}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $all_icon_fields =  get_static_option('about_page_what_we_do_section_icon');
                    $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                    $all_title_fields = get_static_option('about_page_what_we_do_section_title');
                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                    $all_description_fields = get_static_option('about_page_what_we_do_section_description');
                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : [];
                    $all_url_fields =  get_static_option('about_page_what_we_do_section_url');
                    $all_url_fields = !empty($all_url_fields) ? unserialize($all_url_fields) : [];
                @endphp
                @foreach($all_icon_fields as $icon)
                    <div class="col-lg-4 col-md-6">
                        <div class="problem-single-item margin-bottom-30">
                            <div class="icon style-0{{$loop->index}}">
                                <i class="{{$icon}}"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    <a href="{{$all_url_fields[$loop->index] ?? ''}}">{{$all_title_fields[$loop->index] ?? ''}}</a>
                                </h4>
                                <p>{{$all_description_fields[$loop->index] ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
    @if(!empty(get_static_option('about_page_testimonial_section_status')))
    <!-- testimonial area start  -->
    <section class="testimonial-area-02 padding-bottom-100 padding-top-120" style="background-image: url({{asset('assets/frontend/img/shape/03.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12 p-0">
                    <div class="section-title desktop-center margin-bottom-50">
                        <span>{{get_static_option('about_page_testimonial_subtitle')}}</span>
                        <h3 class="title">{!! render_colored_text(get_static_option('about_page_testimonial_title')) !!}</h3>
                    </div>
                </div>
            </div>
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-7">
                    <div class="global-carousel-init slider-dots"
                         data-loop="true"
                         data-desktopitem="1"
                         data-mobileitem="1"
                         data-tabletitem="1"
                         data-dots="true"
                         data-margin="0"
                         data-autoplay="true"
                    >
                        @foreach($all_testimonial as $data)
                            <div class="single-testimonial-item dark">
                                <div class="thumb bg-image" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
                                    <div class="icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">{{$data->name}}</h4>
                                            <span class="designation">{{$data->designation}}</span>
                                        </div>
                                    </div>
                                    <p class="description">{{$data->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- testimonial area end -->
    @if(!empty(get_static_option('about_page_team_member_section_status')))
    <!-- Volunteer Area -->
    <section class="volunteer-area padding-bottom-120 padding-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="volunteer-title-content margin-bottom-50">
                        <div class="section-title desktop-left">
                            <span>{{get_static_option('about_page_team_member_section_subtitle')}}</span>
                            <h3 class="title">{!! render_colored_text(get_static_option('about_page_team_member_section_title')) !!}</h3>
                        </div>
                        <div class="section-paragraph volunteer-slider-container"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="global-carousel-init slider-dots"
                         data-loop="true"
                         data-desktopitem="4"
                         data-mobileitem="1"
                         data-tabletitem="2"
                         data-dots="true"
                         data-nav="true"
                         data-margin="30"
                         data-autoplay="true"
                         data-navcontainer=".volunteer-slider-container"
                    >
                        @foreach($all_team_members as $data)
                            <x-frontend.team.grid
                                    :image="$data->image"
                                    :index="$loop->index"
                                    :name="$data->name"
                                    :iconone="$data->icon_one"
                                    :icononeurl="$data->icon_one_url"
                                    :icontwo="$data->icon_two"
                                    :icontwourl="$data->icon_two_url"
                                    :iconthree="$data->icon_three"
                                    :iconthreeurl="$data->icon_three_url">
                            </x-frontend.team.grid>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
