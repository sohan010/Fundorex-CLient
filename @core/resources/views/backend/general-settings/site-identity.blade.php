@extends('backend.admin-master')
@section('site-title')
    {{__('Site Identity')}}
@endsection
@section('style')
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Site Identity Settings")}}</h4>
                        <form action="{{route('admin.general.site.identity')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="site_logo"><strong>{{__('Site Logo')}}</strong></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $blog_img = get_attachment_image_by_id(get_static_option('site_logo'),null,true);
                                            $blog_image_btn_label = 'Upload Image';
                                        @endphp
                                        @if (!empty($blog_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$blog_img['img_url']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @php  $blog_image_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" id="site_logo" name="site_logo" value="{{get_static_option('site_logo')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Site Logo Image')}}" data-modaltitle="{{__('Upload Site Logo Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($blog_image_btn_label)}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_white_logo"><strong>{{__('White Site Logo')}}</strong></label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $site_white_logo = get_attachment_image_by_id(get_static_option('site_white_logo'),null,true);
                                            $site_white_logo_btn_label = 'Upload Image';
                                        @endphp
                                        @if (!empty($site_white_logo))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$site_white_logo['img_url']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @php  $site_white_logo_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" id="site_white_logo" name="site_white_logo" value="{{get_static_option('site_white_logo')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Site Logo Image')}}" data-modaltitle="{{__('Upload Site Logo Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($site_white_logo_btn_label)}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 160x50')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_favicon">{{__('Favicon')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),null,true);
                                            $site_favicon_btn_label = 'Upload Image';
                                        @endphp
                                        @if (!empty($site_favicon))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$site_favicon['img_url']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @php  $site_favicon_btn_label = 'Change Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" id="site_favicon" name="site_favicon" value="{{get_static_option('site_favicon')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Site Favicon Image')}}" data-modaltitle="{{__('Upload Site Favicon Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($site_favicon_btn_label)}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png. Recommended image size 40x40')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_favicon">{{__('Breadcrumb Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $site_breadcrumb_bg = get_attachment_image_by_id(get_static_option('site_breadcrumb_bg'),null,true);
                                            $site_breadcrumb_bg_btn_label = 'Upload Breadcrumb Image';
                                        @endphp
                                        @if (!empty($site_breadcrumb_bg))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$site_breadcrumb_bg['img_url']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @php  $site_breadcrumb_bg_btn_label = 'Change Breadcrumb Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" id="site_breadcrumb_bg" name="site_breadcrumb_bg" value="{{get_static_option('site_breadcrumb_bg')}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Site Breadcrumb Image')}}" data-modaltitle="{{__('Upload Site Breadcrumb Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($site_breadcrumb_bg_btn_label)}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png, Recommended image size 1920x600')}}</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
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
@endsection

