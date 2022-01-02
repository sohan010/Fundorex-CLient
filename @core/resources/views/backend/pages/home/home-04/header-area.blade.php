@extends('backend.admin-master')
@section('site-title')
    {{__('Header Area')}}
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
                        <h4 class="header-title">{{__('Header Area')}}</h4>
                        <form action="{{route('admin.home.four.header.area')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <div class="form-group">
                                    <label>{{__('Title')}}</label>
                                    <input type="text" name="home_page_04_header_area_title" class="form-control"
                                           value="{{get_static_option('home_page_04_header_area_title')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Subtitle')}}</label>
                                    <input type="text" name="home_page_04_header_area_subtitle" class="form-control"
                                           value="{{get_static_option('home_page_04_header_area_subtitle')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Donate Button Text')}}</label>
                                    <input type="text" name="home_page_04_donate_button_text" class="form-control"
                                           value="{{get_static_option('home_page_04_donate_button_text')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Donate Button URL')}}</label>
                                    <input type="text" name="home_page_04_donate_button_text_url" class="form-control"
                                           value="{{get_static_option('home_page_04_donate_button_text_url')}}">
                                    <small class="text-danger">{{__('If you dont have any custom url then leave this field blank..!')}}</small>
                                </div>


                                <div class="form-group">
                                    <label for="home_page_04_header_area_subtitle">{{__('Right Side Heading ')}}</label>
                                    <input type="text" name="home_page_04_right_side_heading" class="form-control"
                                           value="{{get_static_option('home_page_04_right_side_heading')}}">
                                </div>

                                <div class="form-group">
                                    <label for="home_page_04_header_area_lists">{{__('Right Side Donate Button Text')}}</label>
                                    <input type="text" name="home_page_04_right_side_donate_button_text" class="form-control"
                                           value="{{get_static_option('home_page_04_right_side_donate_button_text')}}">
                                </div>

                                    <div class="form-group">
                                        <label>{{__('Line Image')}}</label>
                                        @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @php $home_page_04_header_area_line_image = get_static_option('home_page_04_header_area_line_image'); @endphp
                                                {!! render_attachment_preview_for_admin($home_page_04_header_area_line_image) !!}
                                            </div>
                                            <input type="hidden" name="home_page_04_header_area_line_image"
                                                   value="{{$home_page_04_header_area_line_image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="{{__('Select Image')}}"
                                                    data-modaltitle="{{__('Upload Image')}}"
                                                    data-imgid="{{$home_page_04_header_area_line_image}}"
                                                    data-toggle="modal" data-target="#media_upload_modal">
                                                {{__($background_image_upload_btn_label)}}
                                            </button>
                                        </div>
                                        <small>{{__('recommended image size is 310 x 182 pixel')}}</small>
                                    </div>


                                    <div class="form-group">
                                        <label>{{__('Background Image')}}</label>
                                        @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @php $home_page_04_header_area_bg_image = get_static_option('home_page_04_header_area_bg_image'); @endphp
                                                {!! render_attachment_preview_for_admin($home_page_04_header_area_bg_image) !!}
                                            </div>
                                            <input type="hidden" name="home_page_04_header_area_bg_image"
                                                   value="{{$home_page_04_header_area_bg_image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn"
                                                    data-btntitle="{{__('Select Image')}}"
                                                    data-modaltitle="{{__('Upload Image')}}"
                                                    data-imgid="{{$home_page_04_header_area_bg_image}}"
                                                    data-toggle="modal" data-target="#media_upload_modal">
                                                {{__($background_image_upload_btn_label)}}
                                            </button>
                                        </div>
                                        <small>{{__('recommended image size is 1920 x 802 pixel')}}</small>
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
                        <x-btn.update/>

                    });
                })(jQuery);
            </script>
@endsection