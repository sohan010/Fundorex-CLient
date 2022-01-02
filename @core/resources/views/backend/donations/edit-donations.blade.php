@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Donation Post')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title">{{__('Edit Donation Cause')}}</h4>
                                <div class="headerbtn-wrap pull-right mb-3">
                                    <div class="btn-wrapper">
                                        <a href="{{route('admin.donations.all')}}" class="btn btn-info">{{__('All Donation Cause')}}</a>
                                        <a href="{{route('admin.donations.new')}}" class="btn btn-secondary ml-1">{{__('Add New Cause')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('admin.donations.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="donation_id" value="{{$donation->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$donation->title}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="{{$donation->slug}}" placeholder="{{__('slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="cause_content" value="{{$donation->cause_content}}">
                                        <div class="summernote" data-content='{{$donation->cause_content}}'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">{{__('Amount')}}</label>
                                        <input type="number" class="form-control"  id="amount" name="amount" value="{{$donation->amount}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="excerpt">{{__('Excerpt')}}</label>
                                        <textarea class="form-control" name="excerpt" rows="5" placeholder="{{__('expert')}}">{{$donation->excerpt}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories_id"><strong>{{__('Category')}}</strong></label>
                                        <select name="categories_id" class="form-control">
                                            @foreach($all_category as $cat)
                                                <option value="{{$cat->id}}" @if($cat->id == $donation->categories_id) selected @endif>{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Deadline')}}</label>
                                        <input type="date" class="form-control" value="{{$donation->deadline}}" name="deadline" >
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input type="text" name="meta_title" value="{{$donation->meta_title}}"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">{{__('Meta Tags')}}</label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="{{$donation->meta_tags}}" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$donation->meta_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Og Meta Title')}}</label>
                                        <input type="text" name="meta_title" value="{{$donation->meta_title}}"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">{{__('Og Meta Description')}}</label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description">{{$donation->meta_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Og Meta Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_attachment_preview_for_admin($donation->og_meta_image) !!}
                                            </div>
                                            <input type="hidden" name="og_meta_image" value="{{$donation->og_meta_image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Donation Image')}}" data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{'Change Image'}}
                                            </button>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                           <div class="img-wrap">
                                               {!! render_attachment_preview_for_admin($donation->image) !!}
                                           </div>
                                            <input type="hidden" name="image" value="{{$donation->image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Donation Image')}}" data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{'Change Image'}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option @if($donation->status === 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option @if($donation->status === 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                            <option @if($donation->status === 'archive') selected @endif value="archive">{{__('Archive')}}</option>
                                            <option @if($donation->status === 'banned') selected @endif value="banned">{{__('Banned')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Image Gallery')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_gallery_image_attachment_preview($donation->image_gallery) !!}
                                            </div>
                                            <input type="hidden" name="image_gallery" value="{{$donation->image_gallery}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Images')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{__('Medical Documents')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                {!! render_gallery_image_attachment_preview($donation->medical_document) !!}
                                            </div>
                                            <input type="hidden" name="medical_document" value="{{$donation->medical_document}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Document')}}" data-modaltitle="{{__('Upload Document')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__('Upload Images')}}
                                            </button>
                                        </div>
                                        <small>{{__('Recommended image size 1920x1280')}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Featured')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="featured"  @if(!empty($donation->featured)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="featured"><strong>{{__('Emmergency')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="emmergency"  @if(!empty($donation->emmergency)) checked @endif>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="iconbox-repeater-wrapper">
                                        @php
                                        $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => ['']];
                                        @endphp
                                        @forelse($faq_items['title'] as $faq)
                                        <div class="all-field-wrap">
                                            <div class="form-group">
                                                <label for="faq">{{__('Faq Title')}}</label>
                                                <input type="text" name="faq[title][]" class="form-control" value="{{$faq}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="faq_desc">{{__('Faq Description')}}</label>
                                                <textarea name="faq[description][]" class="form-control">{{$faq_items['description'][$loop->index] ?? ''}}</textarea>
                                            </div>
                                            <div class="action-wrap">
                                                <span class="add"><i class="ti-plus"></i></span>
                                                <span class="remove"><i class="ti-trash"></i></span>
                                            </div>
                                        </div>
                                        @empty
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
                                                    <span class="add"><i class="ti-plus"></i></span>
                                                    <span class="remove"><i class="ti-trash"></i></span>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Cause')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>
                $('.summernote').summernote({
                    height: 500,   //set editable area's height
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

                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $('select[name="categories_id"]').html('<option value="">{{__('Select Category')}}</option>');
                    $.ajax({
                        url: "{{route('admin.donations.category.by.lang')}}",
                        type: "POST",
                        data: {
                            _token : "{{csrf_token()}}",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $.each(data,function(index,value){
                                $('select[name="categories_id"]').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });


            });
        })(jQuery)
    </script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
   <x-media.js/>
   <x-repeater/>
@endsection
