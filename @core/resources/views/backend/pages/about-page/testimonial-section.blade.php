@extends('backend.admin-master')
@section('style')
    <x-media.css/>
@endsection
@section('site-title')
    {{__('Testimonial Section')}}
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
                        <h4 class="header-title">{{__('Testimonial Section Settings')}}</h4>

                        <form action="{{route('admin.about.testimonial')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="about_page_testimonial_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="about_page_testimonial_subtitle" value="{{get_static_option('about_page_testimonial_subtitle')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="about_page_testimonial_title">{{__('Title')}}</label>
                                <input type="text" name="about_page_testimonial_title" value="{{get_static_option('about_page_testimonial_title')}}" class="form-control">
                                <x-title-info-text/>
                            </div>

                            <div class="form-group">
                                <label for="about_page_testimonial_item">{{__('Testimonial Items')}}</label>
                                <input type="text" name="about_page_testimonial_item" value="{{get_static_option('about_page_testimonial_item')}}" class="form-control" id="about_page_testimonial_item">
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
