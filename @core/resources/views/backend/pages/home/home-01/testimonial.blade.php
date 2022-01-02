@extends('backend.admin-master')
@section('site-title')
    {{__('Testimonial Area')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
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
                        <h4 class="header-title">{{__('Testimonial Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.testimonial')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="home_page_01_testimonial_section_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_01_testimonial_section_title" class="form-control" value="{{get_static_option('home_page_01_testimonial_section_title')}}" >
                                <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_testimonial_section_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="home_page_01_testimonial_section_subtitle" class="form-control" value="{{get_static_option('home_page_01_testimonial_section_subtitle')}}" >
                            </div>

                            <div class="form-group">
                                <label for="home_01_testimonial_bg">{{__('Background Image')}}</label>
                                @php $home_03_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $home_03_img = get_attachment_image_by_id(get_static_option('home_01_testimonial_bg'),null,false);
                                        @endphp
                                        @if (!empty($home_03_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$home_03_img['img_url']}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            @php $home_03_image_upload_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="home_01_testimonial_bg" value="{{get_static_option('home_01_testimonial_bg')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{get_static_option('home_01_testimonial_bg')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($home_03_image_upload_btn_label)}}
                                    </button>
                                </div>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')

    <script>
        <x-btn.update/>
    </script>
@endsection
