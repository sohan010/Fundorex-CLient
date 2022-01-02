@extends('backend.admin-master')
@section('site-title')
    {{__('What We Do Area')}}
@endsection
@section('style')
  <x-media.css/>
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
                        <h4 class="header-title">{{__('What We Do Area Settings')}}</h4>
                        <form action="{{route('admin.homeone.what.we.do.area')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="home_page_02_what_we_do_area_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="home_page_02_what_we_do_area_subtitle" class="form-control" value="{{get_static_option('home_page_02_what_we_do_area_subtitle')}}" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_02_what_we_do_area_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_02_what_we_do_area_title" class="form-control" value="{{get_static_option('home_page_02_what_we_do_area_title')}}" >
                                <div class="info-text">{{__('user {color} color text {/color} to make text colorful')}}</div>
                            </div>

                            @if(get_static_option('home_page_variant') == '02')
                            <div class="form-group">
                                <label>{{__('Left Background Image')}}</label>
                                @php $background_image_upload_btn_label = 'Upload Image'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php $home_page_01_about_us_right_image = get_static_option('home_page_02_what_we_do_left_image'); @endphp
                                        {!! render_attachment_preview_for_admin($home_page_01_about_us_right_image) !!}
                                    </div>
                                    <input type="hidden" name="home_page_02_what_we_do_left_image" value="{{$home_page_01_about_us_right_image}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-imgid="{{$home_page_01_about_us_right_image}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__($background_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 1050x1050 pixel')}}</small>
                            </div>
                            @endif
                            @php
                                $all_icon_fields =  get_static_option('homepage_02_what_we_do_section_icon');
                                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['flaticon-transfusion'];
                            @endphp
                            @foreach($all_icon_fields as $index => $icon_field)
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">

                                        <div class="tab-content margin-top-30" id="myTabContent">

                                                @php
                                                    $all_title_fields = get_static_option('homepage_02_what_we_do_section_title');
                                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['Education'];
                                                    $all_description_fields = get_static_option('homepage_02_what_we_do_section_description');
                                                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : ['We are a non-profit organisation in USA that works towards supporting underprivileged children.'];
                                                    $all_url_fields =  get_static_option('homepage_02_what_we_do_section_url');
                                                    $all_url_fields = !empty($all_url_fields) ? unserialize($all_url_fields) : ['#'];
                                                @endphp


                                                <div class="form-group">
                                                    <label for="homepage_02_what_we_do_section_title">{{__('Title')}}</label>
                                                    <input type="text" name="homepage_02_what_we_do_section_title[]" class="form-control" value="{{$all_title_fields[$index] ?? ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="homepage_02_what_we_do_section_description">{{__('Description')}}</label>
                                                    <textarea name="homepage_02_what_we_do_section_description[]" class="form-control">{{$all_description_fields[$index] ?? ''}}</textarea>
                                                </div>

                                            <div class="form-group">
                                                <label for="homepage_02_what_we_do_section_url">{{__('Description')}}</label>
                                                <input type="text" name="homepage_02_what_we_do_section_url[]" class="form-control" value="{{$all_url_fields[$index] ?? ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="homepage_02_what_we_do_section_icon" class="d-block">{{__('Icon')}}</label>
                                                <div class="btn-group ">
                                                    <button type="button" class="btn btn-primary iconpicker-component">
                                                        <i class="{{$icon_field}}"></i>
                                                    </button>
                                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                            data-selected="{{$icon_field}}" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu"></div>
                                                </div>
                                                <input type="hidden" class="form-control" value="{{$icon_field}}" name="homepage_02_what_we_do_section_icon[]">
                                            </div>
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    <x-repeater/>
    <x-icon-picker-activate-js/>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')

    <script>
        <x-btn.update/>
    </script>
@endsection
