@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('New Donation')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('section')

  <div class="card">
      <div class="card-body">
          <h5 class="modal-title">{{__('Add new Cause Update')}}
              <a class="btn btn-success pull-right btn-sm" href="{{route('user.all.update.cause.page',$cause_id)}}">{{__('Go Back')}}</a>
          </h5>

          <form action="{{route('user.add.new.update.cause.page',$cause_id)}}" method="post" id="addCauseUpdateForm">
              <div class="modal-body">
                  @csrf
                  <input type="hidden" name="cause_id" value="{{$cause_id}}">

                  <div class="form-group">
                      <label for="name">{{__('Title')}}</label>
                      <input type="text" class="form-control" name="title" placeholder="{{__('title')}}">
                  </div>
                  <div class="form-group">
                      <label for="description">{{__('Description')}}</label>
                      <textarea name="description" class="form-control" cols="30" rows="5"
                                placeholder="{{__('Description')}}"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="image">{{__('Image')}}</label>
                      <div class="media-upload-btn-wrapper">
                          <div class="img-wrap"></div>
                          <input type="hidden" name="image">
                          <button type="button" class="btn btn-info media_upload_form_btn"
                                  data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}"
                                  data-toggle="modal" data-target="#media_upload_modal">
                              {{__('Upload Image')}}
                          </button>
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
                  <button id="submit" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
              </div>
          </form>

      </div>
  </div>

  <x-media.markup
          :userUpload="true"
          :imageUploadRoute="route('user.upload.media.file')">
  </x-media.markup>
@endsection
@section('scripts')
  <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
                <x-btn.submit/>

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
            });
        })(jQuery);
    </script>

  <x-media.js
          :deleteRoute="route('user.upload.media.file.delete')"
          :imgAltChangeRoute="route('user.upload.media.file.alt.change')"
          :allImageLoadRoute="route('user.upload.media.file.all')">
  </x-media.js>

@endsection
