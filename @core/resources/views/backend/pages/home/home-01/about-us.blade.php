@extends('backend.admin-master')
@section('site-title')
    {{__('About Us Area')}}
@endsection
@section('style')
    <x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
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
                        <h4 class="header-title">{{__('About Us Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.about.us')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div>

                                    <div class="form-group">
                                        <label for="home_page_01_about_us_subtitle">{{__('Subtitle')}}</label>
                                        <input type="text" name="home_page_01_about_us_subtitle" class="form-control" value="{{get_static_option('home_page_01_about_us_subtitle')}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_title">{{__('Title')}}</label>
                                        <input type="text" name="home_page_01_about_us_title" class="form-control" value="{{get_static_option('home_page_01_about_us_title')}}">
                                        <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                                    </div>
                                    @if(in_array(get_static_option('home_page_variant'), ['02','03']))
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_donation_text">{{__('Donation Text')}}</label>
                                        <input type="text" name="home_page_01_about_us_donation_text" class="form-control" value="{{get_static_option('home_page_01_about_us_donation_text')}}">
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="home_page_01_about_us_description">{{__('Description')}}</label>
                                        <input type="hidden" name="home_page_01_about_us_description" value='{{get_static_option('home_page_01_about_us_description')}}'/>
                                        <div class="summernote" data-content='{{get_static_option('home_page_01_about_us_description')}}'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_lists">{{__('Lists')}}</label>
                                        <textarea name="home_page_01_about_us_lists" class="form-control" cols="30" rows="5">{{get_static_option('home_page_01_about_us_lists')}}</textarea>
                                        <span class="info-text">{{__('separate item by new line')}}</span>
                                    </div>

                                    @if(get_static_option('home_page_variant') === '02')
                                        <div class="form-group">
                                            <label for="home_page_02_about_us_donation_text">{{__('Donation Text')}}</label>
                                            <input type="text" name="home_page_02_about_us_donation_text" class="form-control" value="{{get_static_option('home_page_02_about_us_donation_text')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_02_about_us_short_description">{{__('Short Description')}}</label>
                                            <input type="hidden" name="home_page_02_about_us_short_description" value='{{get_static_option('home_page_02_about_us_short_description')}}'/>
                                            <div class="summernote" data-content='{{get_static_option('home_page_02_about_us_short_description')}}'></div>
                                        </div>
                                    @endif

                            <div class="form-group">
                                <label for="home_page_01_about_us_total_donation">{{__('Total Donation')}}</label>
                                <input type="text" name="home_page_01_about_us_total_donation" class="form-control" value="{{get_static_option('home_page_01_about_us_total_donation')}}">
                            </div>
                            @if(get_static_option('home_page_variant') === '01')
                            <div class="form-group">
                                <label>{{__('Right Image')}}</label>
                                @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php $home_page_01_about_us_right_image = get_static_option('home_page_01_about_us_right_image'); @endphp
                                        {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                    </div>
                                    <input type="hidden" name="home_page_01_about_us_right_image" value="{{$home_page_01_about_us_right_image}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($background_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 550x410 pixel')}}</small>
                            </div>
                            @endif
                            @if(get_static_option('home_page_variant') === '02')
                                <div class="form-group">
                                    <label>{{__('Left Image')}}</label>
                                    @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php $home_page_01_about_us_right_image = get_static_option('home_page_02_about_us_left_image'); @endphp
                                            {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_left_image" value="{{$home_page_01_about_us_right_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($background_image_upload_btn_label)}}
                                        </button>
                                    </div>
                                    <small>{{__('recommended image size is 350x450 pixel')}}</small>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Right Bottom Image')}}</label>
                                    @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php $home_page_01_about_us_right_image = get_static_option('home_page_02_about_us_right_bottom_image'); @endphp
                                            {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_right_bottom_image" value="{{$home_page_01_about_us_right_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($background_image_upload_btn_label)}}
                                        </button>
                                    </div>
                                    <small>{{__('recommended image size is 350x450 pixel')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="home_page_02_about_us_icon" class="d-block">{{__('Icon')}}</label>
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-primary iconpicker-component">
                                            <i class="{{get_static_option('home_page_02_about_us_icon')}}"></i>
                                        </button>
                                        <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                data-selected="{{get_static_option('home_page_02_about_us_icon')}}" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"></div>
                                    </div>
                                    <input type="hidden" class="form-control" value="{{get_static_option('home_page_02_about_us_icon')}}" name="home_page_02_about_us_icon">
                                </div>
                            @endif

                            @if(get_static_option('home_page_variant') === '03')
                                <div class="form-group">
                                    <label>{{__('Right Image')}}</label>
                                    @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php $home_page_01_about_us_right_image = get_static_option('home_page_03_about_us_right_image'); @endphp
                                            {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                        </div>
                                        <input type="hidden" name="home_page_03_about_us_right_image" value="{{$home_page_01_about_us_right_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($background_image_upload_btn_label)}}
                                        </button>
                                    </div>
                                    <small>{{__('recommended image size is 950x680 pixel')}}</small>
                                </div>
                            @endif
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
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
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>

                $('.summernote').summernote({
                    height: 200,   //set editable area's height
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

                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });

            });
        })(jQuery);
    </script>
@endsection