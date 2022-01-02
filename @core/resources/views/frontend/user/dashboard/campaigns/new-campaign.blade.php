@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('New Donation')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
@endsection
@section('section')
       <div class="headerbtn-wrap d-flex justify-content-between margin-bottom-50">
           <h3 class="header-title">{{__('Create New Campaign')}}</h3>
           <a href="{{route('user.campaign.all')}}" class="btn btn-info">{{__('All Campaign List')}}</a>
       </div>
        <form action="{{route('user.campaign.new')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">{{__('Slug')}}</label>
                        <input type="text" class="form-control"  id="slug" name="slug" value="{{old('slug')}}" placeholder="{{__('slug')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('Content')}}</label>
                        <input type="hidden" name="cause_content" >
                        <div class="summernote"></div>
                    </div>
                    <div class="form-group">
                        <label for="amount">{{__('Amount')}}</label>
                        <input type="number" class="form-control"  name="amount" placeholder="{{__('amount')}}"  value="{{old('amount')}}" >
                    </div>
                    <div class="form-group">
                        <label for="excerpt">{{__('Excerpt')}}</label>
                        <textarea class="form-control" name="excerpt" rows="5" placeholder="{{__('expert')}}"></textarea>
                        <small class="info-text">{{__('a short brief about campaign')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="categories_id"><strong>{{__('Category')}}</strong></label>
                        <select name="categories_id" class="form-control">
                            <option value="">{{__('Select Category')}}</option>
                            @foreach($all_category as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">{{__('Deadline')}}</label>
                        <input type="date" class="form-control" placeholder="{{__('Deadline')}}" name="deadline" value="{{old('deadline')}}">
                    </div>
                    @if(!empty(get_static_option('user_campaign_metadata_status')))
                    <div class="form-group">
                        <label for="meta_title">{{__('Meta Title')}}</label>
                        <input type="text" name="meta_title"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput"  id="meta_tags">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">{{__('Meta Description')}}</label>
                        <textarea name="meta_description"  class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">{{__('Og Meta Title')}}</label>
                        <input type="text" name="og_meta_title"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">{{__('Og Meta Description')}}</label>
                        <textarea name="og_meta_description"  class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('OG Meta Image')}}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="og_meta_image">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__('Upload Image')}}
                            </button>
                        </div>
                        <small>{{__('Recommended image size 1920x1280')}}</small>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="image">{{__('Image')}}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__('Upload Image')}}
                            </button>
                        </div>
                        <small>{{__('Recommended image size 1920x1280')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('Image Gallery')}}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="image_gallery">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__('Upload Images')}}
                            </button>
                        </div>
                        <small>{{__('Recommended image size 1920x1280')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="image">{{__('Medical Documents')}}</label>
                        <div class="media-upload-btn-wrapper">
                            <div class="img-wrap"></div>
                            <input type="hidden" name="medical_document">
                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                {{__('Upload Document')}}
                            </button>
                        </div>
                        <small>{{__('Recommended image size 1920x1280')}}</small>
                    </div>
                    <div class="iconbox-repeater-wrapper">
                        <div class="all-field-wrap">
                            <div class="form-group">
                                <label for="faq">{{__('Faq Title')}}</label>
                                <input type="text" name="faq[title][]" class="form-control" placeholder="{{__('faq title')}}">
                            </div>
                            <div class="form-group">
                                <label for="faq_desc">{{__('Faq Description')}}</label>
                                <textarea name="faq[description][]" class="form-control" placeholder="{{__('faq description')}}"></textarea>
                            </div>
                            <div class="action-wrap">
                                <span class="add"><i class="fas fa-plus"></i></span>
                                <span class="remove"><i class="fas fa-minus"></i></span>
                            </div>
                        </div>
                    </div>

                    <button id="submit" type="submit" class="submit-btn margin-top-40 reverse-color margin-top-50">{{__('Publish Campaign')}}</button>
                </div>
            </div>
        </form>

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
  <x-repeater/>
@endsection
