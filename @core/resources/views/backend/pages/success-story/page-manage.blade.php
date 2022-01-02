@extends('backend.admin-master')
@section('site-title')
    {{__('Success Story Area')}}
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
                        <h4 class="header-title">{{__('Success Story Area')}}</h4>
                        <form action="{{route('admin.success.story.page.manage')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <div class="form-group">
                                    <label>{{__('Button Text')}}</label>
                                    <input type="text" name="success_story_page_button_text" class="form-control"
                                           value="{{get_static_option('success_story_page_button_text')}}">
                                </div>

                                <div class="form-group">
                                    <label>{{__('Item Show')}}</label>
                                    <input type="number" name="success_story_page_item_show" class="form-control"
                                           value="{{get_static_option('success_story_page_item_show')}}">
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