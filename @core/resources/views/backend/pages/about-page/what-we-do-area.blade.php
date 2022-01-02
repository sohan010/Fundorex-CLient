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
                        <form action="{{route('admin.about.what.we.do')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="about_page_what_we_do_area_subtitle">{{__('Subtitle')}}</label>
                                <input type="text" name="about_page_what_we_do_area_subtitle" class="form-control" value="{{get_static_option('about_page_what_we_do_area_subtitle')}}" >
                            </div>
                            <div class="form-group">
                                <label for="about_page_what_we_do_area_title">{{__('Title')}}</label>
                                <input type="text" name="about_page_what_we_do_area_title" class="form-control" value="{{get_static_option('about_page_what_we_do_area_title')}}" >
                                <x-title-info-text/>
                            </div>

                            @php
                                $all_icon_fields =  get_static_option('about_page_what_we_do_section_icon');
                                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['flaticon-transfusion'];
                            @endphp
                            @foreach($all_icon_fields as $index => $icon_field)
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">
                                        <div class="tab-content margin-top-30" id="myTabContent">

                                                @php
                                                    $all_title_fields = get_static_option('about_page_what_we_do_section_title');
                                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['Education'];
                                                    $all_description_fields = get_static_option('about_page_what_we_do_section_description');
                                                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : ['We are a non-profit organisation in USA that works towards supporting underprivileged children.'];
                                                    $all_url_fields =  get_static_option('about_page_what_we_do_section_url');
                                                    $all_url_fields = !empty($all_url_fields) ? unserialize($all_url_fields) : ['#'];
                                                @endphp


                                                <div class="form-group">
                                                    <label for="about_page_what_we_do_section_title">{{__('Title')}}</label>
                                                    <input type="text" name="about_page_what_we_do_section_title[]" class="form-control" value="{{$all_title_fields[$index] ?? ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="about_page_what_we_do_section_description">{{__('Description')}}</label>
                                                    <textarea name="about_page_what_we_do_section_description[]" class="form-control">{{$all_description_fields[$index] ?? ''}}</textarea>
                                                </div>


                                            <div class="form-group">
                                                <label for="about_page_what_we_do_section_url">{{__('Description')}}</label>
                                                <input type="text" name="about_page_what_we_do_section_url[]" class="form-control" value="{{$all_url_fields[$index] ?? ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="about_page_what_we_do_section_icon" class="d-block">{{__('Icon')}}</label>
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
                                                <input type="hidden" class="form-control" value="{{$icon_field}}" name="about_page_what_we_do_section_icon[]">
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
