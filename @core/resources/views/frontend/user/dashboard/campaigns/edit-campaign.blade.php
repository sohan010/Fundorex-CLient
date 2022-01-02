@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('Edit Campaign')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection

@section('section')

    <div class="header-area-wrap d-flex justify-content-between">
        <h4 class="header-title">{{__('Edit Campaign')}}</h4>
        <div class="btn-wrapper">
            <a href="{{route('user.campaign.all')}}" class="btn btn-info">{{__('All Campaigns')}}</a>
            <a href="{{route('user.campaign.new')}}" class="btn btn-secondary ml-1">{{__('Add New')}}</a>
        </div>
    </div>
    <form action="{{route('user.campaign.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="donation_id" value="{{$donation->id}}">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="title">{{__('Title')}}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$donation->title}}">
                </div>
                <div class="form-group">
                    <label for="slug">{{__('Slug')}}</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$donation->slug}}"
                           placeholder="{{__('slug')}}">
                </div>
                <div class="form-group">
                    <label>{{__('Content')}}</label>
                    <input type="hidden" name="cause_content" value="{{$donation->cause_content}}">
                    <div class="summernote" data-content='{{$donation->cause_content}}'></div>
                </div>
                <div class="form-group">
                    <label for="amount">{{__('Amount')}}</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{$donation->amount}}">
                </div>
                <div class="form-group">
                    <label for="excerpt">{{__('Excerpt')}}</label>
                    <textarea class="form-control" name="excerpt" rows="5"
                              placeholder="{{__('expert')}}">{{$donation->excerpt}}</textarea>
                </div>
                <div class="form-group">
                    <label for="categories_id"><strong>{{__('Category')}}</strong></label>
                    <select name="categories_id" class="form-control">
                        @foreach($all_category as $cat)
                            <option value="{{$cat->id}}"
                                    @if($cat->id == $donation->categories_id) selected @endif>{{$cat->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">{{__('Deadline')}}</label>
                    <input type="date" class="form-control" value="{{$donation->deadline}}" name="deadline">
                </div>
                @if(!empty(get_static_option('user_campaign_metadata_status')))
                <div class="form-group">
                    <label for="meta_title">{{__('Meta Title')}}</label>
                    <input type="text" name="meta_title" value="{{$donation->meta_title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                           value="{{$donation->meta_tags}}" id="meta_tags">
                </div>
                <div class="form-group">
                    <label for="meta_description">{{__('Meta Description')}}</label>
                    <textarea name="meta_description" class="form-control" rows="5"
                              >{{$donation->meta_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">{{__('Og Meta Title')}}</label>
                    <input type="text" name="meta_title" value="{{$donation->meta_title}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="meta_description">{{__('Og Meta Description')}}</label>
                    <textarea name="meta_description" class="form-control" rows="5"
                              >{{$donation->meta_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">{{__('Og Meta Image')}}</label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            {!! render_attachment_preview_for_admin($donation->og_meta_image) !!}
                        </div>
                        <input type="hidden" name="og_meta_image" value="{{$donation->og_meta_image}}">
                        <button type="button" class="btn btn-info media_upload_form_btn"
                                data-btntitle="{{__('Select Donation Image')}}"
                                data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal"
                                data-target="#media_upload_modal">
                            {{'Change Image'}}
                        </button>
                    </div>

                </div>
                @endif
                <div class="form-group">
                    <label for="image">{{__('Image')}}</label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            {!! render_attachment_preview_for_admin($donation->image) !!}
                        </div>
                        <input type="hidden" name="image" value="{{$donation->image}}">
                        <button type="button" class="btn btn-info media_upload_form_btn"
                                data-btntitle="{{__('Select Donation Image')}}"
                                data-modaltitle="{{__('Upload Donation Image')}}" data-toggle="modal"
                                data-target="#media_upload_modal">
                            {{'Change Image'}}
                        </button>
                    </div>
                    <small>{{__('Recommended image size 1920x1280')}}</small>
                </div>
                <div class="form-group">
                    <label for="image">{{__('Image Gallery')}}</label>
                    <div class="media-upload-btn-wrapper">
                        <div class="img-wrap">
                            {!! render_gallery_image_attachment_preview($donation->image_gallery) !!}
                        </div>
                        <input type="hidden" name="image_gallery" value="{{$donation->image_gallery}}">
                        <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true"
                                data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}"
                                data-toggle="modal" data-target="#media_upload_modal">
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
                                <textarea name="faq[description][]"
                                          class="form-control">{{$faq_items['description'][$loop->index] ?? ''}}</textarea>
                            </div>
                            <div class="action-wrap">
                                <span class="add"><i class="fas fa-plus"></i></span>
                                <span class="remove"><i class="fas fa-trash"></i></span>
                            </div>
                        </div>
                    @empty
                        <div class="all-field-wrap">
                            <div class="form-group">
                                <label for="faq">{{__('Faq Title')}}</label>
                                <input type="text" name="faq[title][]" class="form-control"
                                       placeholder="{{__('faq title')}}">
                            </div>
                            <div class="form-group">
                                <label for="faq_desc">{{__('Faq Description')}}</label>
                                <textarea name="faq[description][]" class="form-control"
                                          placeholder="{{__('faq description')}}"></textarea>
                            </div>
                            <div class="action-wrap">
                                <span class="add"><i class="fas fa-plus"></i></span>
                                <span class="remove"><i class="fas fa-trash"></i></span>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button id="update" type="submit"
                        class="submit-btn margin-top-40">{{__('Update Campaign')}}</button>
            </div>
        </div>
    </form>
    <x-media.markup
            :userUpload="true"
            :imageUploadRoute="route('user.upload.media.file')">
    </x-media.markup>
@endsection

@section('scripts')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
                <x-btn.update/>
                $('.summernote').summernote({
                    height: 500,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if ($('.summernote').length > 0) {
                    $('.summernote').each(function (index, value) {
                        $(this).summernote('code', $(this).data('content'));
                    });
                }
            });
        })(jQuery)
    </script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <x-media.js
            :deleteRoute="route('user.upload.media.file.delete')"
            :imgAltChangeRoute="route('user.upload.media.file.alt.change')"
            :allImageLoadRoute="route('user.upload.media.file.all')">
    </x-media.js>
    <x-repeater/>

@endsection
