@extends('backend.admin-master')
@section('site-title')
    {{__('Counterup Area')}}
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
                        <h4 class="header-title">{{__('Counterup Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.counterup.area')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>{{__('Right Image')}}</label>
                                @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php $home_page_01_about_us_right_image = get_static_option('home_page_02_coutnerup_background_image'); @endphp
                                        {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                    </div>
                                    <input type="hidden" name="home_page_02_coutnerup_background_image" value="{{$home_page_01_about_us_right_image}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($background_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 550x410 pixel')}}</small>
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