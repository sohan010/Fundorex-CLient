@extends('backend.admin-master')
@section('site-title')
    {{__('Video Area')}}
@endsection
@section('style')
  <x-media.css/>
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
                        <h4 class="header-title">{{__('Video Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.video.area')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="home_page_01_cta_area_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_01_cta_area_title" class="form-control" value="{{get_static_option('home_page_01_cta_area_title')}}" id="home_page_01_cta_area_title">
                            </div>


                            @if( get_static_option('home_page_variant') === '01')
                            <div class="form-group">
                                <label>{{__('Signature Image')}}</label>
                                @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php $home_page_01_about_us_right_image = get_static_option('home_page_01_cta_area_signature_image'); @endphp
                                        {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                    </div>
                                    <input type="hidden" name="home_page_01_cta_area_signature_image" value="{{$home_page_01_about_us_right_image}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($background_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 650x260 pixel')}}</small>
                            </div>
                            @endif
                            <div class="form-group">
                                <label>{{__('Background Image')}}</label>
                                @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php $home_page_01_about_us_right_image = get_static_option('home_page_01_cta_area_background_image'); @endphp
                                        {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                    </div>
                                    <input type="hidden" name="home_page_01_cta_area_background_image" value="{{$home_page_01_about_us_right_image}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($background_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 1920x700 pixel')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_cta_area_video_url">{{__('Button URL')}}</label>
                                <input type="text" name="home_page_01_cta_area_video_url" class="form-control" value="{{get_static_option('home_page_01_cta_area_video_url')}}" id="home_page_01_cta_area_button_url">
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
   <x-media.js/>

    <script>
        <x-btn.update/>
    </script>

@endsection
