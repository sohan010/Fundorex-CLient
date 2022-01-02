@extends('backend.admin-master')
@section('site-title')
    {{__('Events Area')}}
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
                        <h4 class="header-title">{{__('Events Area')}}</h4>
                        <form action="{{route('admin.home.five.events.area')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <div class="form-group">
                                    <label>{{__('Title')}}</label>
                                    <input type="text" name="home_page_05_events_area_title" class="form-control"
                                           value="{{get_static_option('home_page_05_events_area_title')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Subtitle')}}</label>
                                    <input type="text" name="home_page_05_events_area_subtitle" class="form-control"
                                           value="{{get_static_option('home_page_05_events_area_subtitle')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Events Item Show')}}</label>
                                    <input type="number" name="home_page_05_events_area_item_show" class="form-control"
                                           value="{{get_static_option('home_page_05_events_area_item_show')}}">
                                </div>

                                <div class="form-group">
                                    <label for="site_logo"><strong>{{__('Left Image')}}</strong></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $blog_img = get_attachment_image_by_id(get_static_option('home_page_05_events_area_left_image'),null,true);
                                                $blog_image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($blog_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$blog_img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $blog_image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="home_page_05_events_area_left_image" name="home_page_05_events_area_left_image" value="{{get_static_option('home_page_05_events_area_left_image')}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Site Logo Image')}}" data-modaltitle="{{__('Upload Site Logo Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($blog_image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 520 x 597')}}</small>
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