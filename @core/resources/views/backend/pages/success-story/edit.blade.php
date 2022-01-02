@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <x-summernote.css/>
    <x-media.css/>
@endsection
@section('site-title')
    {{__('Edit Success Story Post')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Edit Success Story Post')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.success.story') }}"
                                   class="btn btn-primary mt-4 pr-4 pl-4">{{__('All Success Story ')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.success.story.update',$success_story->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title"
                                       value="{{$success_story->title}}">
                            </div>
                            <div class="form-group">
                                <label>{{__(' Content')}}</label>
                                <input type="hidden" name="story_content" value="{{ $success_story->story_content }}">
                                <div class="summernote" data-content="{{ $success_story->story_content }}"></div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control" name="slug"
                                           value="{{$success_story->slug}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" class="form-control" name="meta_tags"
                                           data-role="tagsinput" value="{{$success_story->meta_tags}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">{{__('Excerpt')}}</label>
                                    <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30"
                                              rows="10">{{$success_story->excerpt}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" class="form-control" name="meta_title"
                                           value="{{$success_story->meta_title}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('Og Meta Title')}}</label>
                                    <input type="text" class="form-control" name="og_meta_title"
                                           value="{{$success_story->og_meta_title}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea type="text" class="form-control" name="meta_description"
                                              rows="5" cols="10">{{$success_story->meta_description}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('Og Meta Description')}}</label>
                                    <textarea type="text" class="form-control"
                                              name="og_meta_description" rows="5"
                                              cols="10">{{$success_story->og_meta_description}} </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="image">{{__(' Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($success_story->image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="image" name="image"
                                               value="{{$success_story->image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="{{__('Select Image')}}"
                                                data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png')}}</small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="og_meta_image">{{__('Og Meta Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($success_story->og_meta_image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="og_meta_image" name="og_meta_image"
                                               value="{{$success_story->og_meta_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="{{__('Select Image')}}"
                                                data-modaltitle="{{__('Upload Image')}}" data-toggle="modal"
                                                data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png')}}</small>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="category">{{__('Category')}}</label>
                                    <select name="category" class="form-control" id="category">
                                        <option value="">{{__("Select Category")}}</option>
                                        @foreach($all_category as $category)
                                            <option @if($category->id == $success_story->success_story_category_id) selected
                                                    @endif  value="{{$category->id}}">{{purify_html($category->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">{{__('Status')}}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="draft" {{($success_story->status == 'draft' )? 'selected' : ''}}>{{__("Draft")}}</option>
                                        <option value="publish" {{($success_story->status  == 'publish')? 'selected' : ''}}>{{__("Publish")}}</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="update"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Post')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
    <x-summernote.js/>
    <x-media.js/>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>
                $('.summernote').summernote({
                    height: 400,   //set editable area's height
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
@endsection
