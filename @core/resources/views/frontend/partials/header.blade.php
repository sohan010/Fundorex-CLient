<!DOCTYPE html>
<html class="no-js" lang="{{get_default_language()}}"  dir="{{get_default_language_direction()}}">
<head>
    @include('frontend.partials.google-analytics')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(request()->routeIs('homepage'))
        <meta name="description" content="{{filter_static_option_value('site_meta_description',$global_static_field_data)}}">
        <meta name="tags" content="{{filter_static_option_value('site_meta_tags',$global_static_field_data)}}">
    @else
        @yield('page-meta-data')
    @endif
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    {!! load_google_fonts() !!}


    <link rel="icon" type="image/x-icon" href="{{asset('assets/frontend/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

    @include('frontend.partials.css-variable')
    @yield('style')

    @if(!empty(filter_static_option_value('site_rtl_enabled',$global_static_field_data)) || get_user_lang_direction() == 'rtl')
         <link rel="stylesheet" href="{{asset('assets/frontend/css/rtl.css')}}">
     @endif
    <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery-migrate-3.1.0.min.js')}}"></script>
    @include('frontend.partials.og-meta')

    <script>var siteurl = "{{url('/')}}"</script>
    {!! filter_static_option_value('site_third_party_tracking_code',$global_static_field_data) !!}
</head>
@php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant',$global_static_field_data);
@endphp
<body class="version_{{getenv('XGENIOUS_SCRIPT_VERSION')}} {{filter_static_option_value('item_license_status',$global_static_field_data)}} apps_key_{{getenv('XGENIOUS_API_KEY')}} ">
@include('frontend.partials.preloader')
