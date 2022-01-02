@extends('backend.admin-master')
@section('style')
  <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('site-title')
    {{__('About Section')}}
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
                        <h4 class="header-title">{{__('About Us Section Settings')}}</h4>

                        <form action="{{route('admin.about.page.about')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="about_page_about_section_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="about_page_about_section_subtitle" value="{{get_static_option('about_page_about_section_subtitle')}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="about_page_about_section_title">{{__('Title')}}</label>
                                <input type="text" name="about_page_about_section_title" value="{{get_static_option('about_page_about_section_title')}}" class="form-control" >
                                <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="about_page_about_section_description">{{__('Description')}}</label>
                                <input type="hidden" name="about_page_about_section_description" >
                                <div class="summernote" data-content='{{get_static_option('about_page_about_section_description')}}'></div>
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
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
     <script>
         (function($){
             "use strict"
             $(document).ready(function () {
                <x-btn.update/>
                 $('.summernote').summernote({
                     height: 400,   //set editable area's height
                     codemirror: { // codemirror options
                         theme: 'monokai'
                     },
                     callbacks: {
                         onChange: function(contents, $editable) {
                             $(this).prev('input').val(contents);
                         }
                     }
                 });

                 if($('.summernote').length > 0){
                     $('.summernote').each(function(index,value){
                         $(this).summernote('code', $(this).data('content'));
                     });
                 }

             });
         })(jQuery)
    </script>
@endsection
