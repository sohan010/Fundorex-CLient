@extends('backend.admin-master')
@section('site-title')
    {{__('About Us Area')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('About Us Area')}}</h4>
                        <form action="{{route('admin.home.six.about.us.area')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group">
                                    <label>{{__('Title')}}</label>
                                    <input type="text" name="home_page_06_about_us_area_title" class="form-control"
                                           value="{{get_static_option('home_page_06_about_us_area_title')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Description')}}</label>

                                    <textarea id="data" class="form-control" name="home_page_06_about_us_area_description">
                                        {!! get_static_option('home_page_06_about_us_area_description') !!}
                                    </textarea>

                                </div>

                                <div class="form-group">
                                    <label>{{__(' Button Text')}}</label>
                                    <input type="text" name="home_page_06_about_us_area_button_text" class="form-control"
                                           value="{{get_static_option('home_page_06_about_us_area_button_text')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__(' Button URL')}}</label>
                                    <input type="text" name="home_page_06_about_us_area_button_url" class="form-control"
                                           value="{{get_static_option('home_page_06_about_us_area_button_url')}}">
                                </div>


                                <button id="update" type="submit"
                                        class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @include('backend.partials.media-upload.media-upload-markup')
        @endsection
        @section('script')
            <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
            <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
            @include('backend.partials.media-upload.media-js')
            <script>
                (function ($) {
                    "use strict";
                    $(document).ready(function () {
                        $('textarea#data').html($('textarea#data').html().trim());
                        <x-btn.update/>

                    });
                })(jQuery);
            </script>
@endsection