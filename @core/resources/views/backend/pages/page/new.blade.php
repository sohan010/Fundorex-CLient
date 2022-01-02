@extends('backend.admin-master')
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('site-title')
    {{__('New Page')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Add New Page')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.page') }}" class="btn btn-primary mt-4 pr-4 pl-4">{{__('All Pages')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.page.new')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control" name="title" placeholder="{{__('Title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control" name="slug" placeholder="{{__('Slug')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <input type="hidden" name="page_content">
                                    <div class="summernote"></div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input type="text" name="meta_title" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="og_meta_title">{{__('OG Meta Title')}}</label>
                                        <input type="text" name="og_meta_title" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description" class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="og_meta_description">{{__('OG Meta Description')}}</label>
                                        <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description"></textarea>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                           id="meta_tags">
                              </div>


                            <div class="form-group col-md-6">
                                <label for="og_meta_image">{{__('OG Meta Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="og_meta_image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                            </div>

                                <div class="form-group col-md-6">
                                    <x-fields.status :name="'status'" :title="__('Status')"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <x-fields.page-show-type :name="'visibility'" :title="__('Visibility')"/>
                                </div>
                         </div>




                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
    <x-media.js/>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
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
                if($('.summernote').length > 1){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }
            });

        })(jQuery);
    </script>
@endsection

