@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
    <x-media.css/>
@endsection

@section('site-title')
    {{__('Header Area')}}
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
                        <h4 class="header-title">{{__('Header Area Settings')}}</h4>
                        <form action="{{route('admin.home.six.header.area')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group mt-3">
                                <label for="home_page_04_idiology_area_item_image mt-3">{{__('Background Shade')}}</label>
                                @php $signature_image_upload_btn_label = 'Upload Background Shade'; @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @php
                                            $signature_img = get_attachment_image_by_id(get_static_option('home_page_06_header_area_bg_image'),null,false);
                                        @endphp
                                        @if (!empty($signature_img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb"
                                                             src="{{$signature_img['img_url']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @php $signature_image_upload_btn_label = 'Change BG Image'; @endphp
                                        @endif
                                    </div>
                                    <input type="hidden" name="home_page_06_header_area_bg_image"
                                           value="{{ get_static_option('home_page_06_header_area_bg_image') }}">
                                    <button type="button" class="btn btn-info media_upload_form_btn"
                                            data-btntitle="{{__('Select Image')}}"
                                            data-modaltitle="{{__('Upload Image')}}"
                                            data-imgid="{{ get_static_option('home_page_06_header_area_bg_image') }}" data-toggle="modal"
                                            data-target="#media_upload_modal">
                                        {{__($signature_image_upload_btn_label)}}
                                    </button>
                                </div>
                                <small>{{__('recommended image size is 1920 x 980 pixel')}}</small>
                            </div>



                            @php
                                $all_image_fields =  get_static_option('home_page_06_header_area_image');
                                $all_image_fields = !empty($all_image_fields) ? unserialize($all_image_fields,['class' => false]) : [''];
                            @endphp

                        @foreach($all_image_fields as $index => $image_field)
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">

                                        <div class="tab-content margin-top-30" id="myTabContent">
                                            @php
                                                $all_title_fields = get_static_option('home_page_06_header_area_title');
                                                $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [''];

                                                $all_sub_fields = get_static_option('home_page_06_header_area_subtitle');
                                                $all_sub_fields = !empty($all_sub_fields) ? unserialize($all_sub_fields) : [''];

                                                $all_donate_button_title_fields = get_static_option('home_page_06_header_area_donate_button_title');
                                                $all_donate_button_title_fields = !empty($all_donate_button_title_fields) ? unserialize($all_donate_button_title_fields) : [''];

                                                $all_donate_button_title_url_fields = get_static_option('home_page_06_header_area_donate_button_url');
                                                $all_donate_button_title_url_fields = !empty($all_donate_button_title_url_fields) ? unserialize($all_donate_button_title_url_fields) : [''];

                                                $all_read_more_button_title_fields = get_static_option('home_page_06_header_area_read_more_button_title');
                                                $all_read_more_button_title_fields = !empty($all_read_more_button_title_fields) ? unserialize($all_read_more_button_title_fields) : [''];

                                                $all_read_more_button_title_url_fields =  get_static_option('home_page_06_header_area_read_more_button_url');
                                                $all_read_more_button_title_url_fields = !empty($all_read_more_button_title_url_fields) ? unserialize($all_read_more_button_title_url_fields) : ['#'];
                                            @endphp
                                            <div class="form-group">
                                                <label>{{__('Title')}}</label>
                                                <input type="text" name="home_page_06_header_area_title[]" class="form-control" value="{{$all_title_fields[$index] ?? ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label >{{__('Subtitle')}}</label>
                                                <input type="text" name="home_page_06_header_area_subtitle[]" class="form-control" value="{{$all_sub_fields[$index] ?? ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label >{{__('Donate Button Title')}}</label>
                                                <input type="text" name="home_page_06_header_area_donate_button_title[]" class="form-control"value="{{$all_donate_button_title_fields[$index] ?? '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label>{{__('Donate Button Url')}}</label>
                                                <input type="text" name="home_page_06_header_area_donate_button_url[]" class="form-control donation_button_url" value="{{$all_donate_button_title_url_fields[$index] ?? ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label >{{__('Read More Button Title')}}</label>
                                                <input type="text" name="home_page_06_header_area_read_more_button_title[]" class="form-control" value="{{$all_read_more_button_title_fields[$index] ?? ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label>{{__('Read More Button Url')}}</label>
                                                <input type="text" name="home_page_06_header_area_read_more_button_url[]" class="form-control donation_read_more_url" value="{{$all_read_more_button_title_url_fields[$index] ?? ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label>{{__('Select Cause')}}</label>
                                                <select class="form-control nice-select wide" name="home_page_06_header_area_donation[]" id="donation_select">
                                                    @foreach($all_donations as $donation)
                                                    <option value="{{$donation->id}}">{{$donation->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group mt-3">
                                                <label for="home_page_04_idiology_area_item_image mt-3">{{__(' Image')}}</label>
                                                @php $signature_image_upload_btn_label = 'Upload Image'; @endphp
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap">
                                                        @php
                                                            $signature_img = get_attachment_image_by_id($image_field,null,false);
                                                        @endphp
                                                        @if (!empty($signature_img))
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb"
                                                                             src="{{$signature_img['img_url']}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php $signature_image_upload_btn_label = 'Change Image'; @endphp
                                                        @endif
                                                    </div>
                                                    <input type="hidden" name="home_page_06_header_area_image[]"
                                                           value="{{$image_field}}">
                                                    <button type="button" class="btn btn-info media_upload_form_btn"
                                                            data-btntitle="{{__('Select Image')}}"
                                                            data-modaltitle="{{__('Upload Image')}}"
                                                            data-imgid="{{$image_field}}" data-toggle="modal"
                                                            data-target="#media_upload_modal">
                                                        {{__($signature_image_upload_btn_label)}}
                                                    </button>
                                                </div>
                                                <small>{{__('recommended image size is 1920 x 980 pixel')}}</small>
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
    <script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
    <script>
        $(document).ready(function () {
            <x-btn.update/>

            // $(document).on('change','#donation_select',function(){
            //     var donationId = $(this).val();
            //     var PaymentPageUrl = $('#donation_select option[value="'+donationId+'"]').data('url');
            //     var singlePageUrl = $('#donation_select option[value="'+donationId+'"]').data('singleurl');
            //     $('.donation_button_url').val(PaymentPageUrl);
            //     $('.donation_read_more_url').val(singlePageUrl);
            //
            // })

            var $selector = $('.nice-select');
            if($selector.length > 0){
                $selector.niceSelect();
            }
        });
    </script>

    <x-repeater/>
    <x-icon-picker-activate-js/>

@endsection
