@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('contact_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('contact_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('contact_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('contact_page_meta_tags')}}">
@endsection
@section('content')
    @if(!empty(get_static_option('contact_page_contact_info_section_status')))
        <div class="inner-contact-section padding-top-120 padding-bottom-120">
            <div class="container">
                <div class="row">
                    @php $a = 1;@endphp
                    @foreach($all_contact_info as $data)
                        <div class="col-md-6 col-lg-3">
                            <div class="single-contact-item">
                                <div class="icon style-0{{$a}}">
                                    <i class="{{$data->icon}}"></i>
                                </div>
                                <div class="content">
                                    <span class="title">{{$data->title}}</span>
                                    @php
                                        $info_details = !empty($data->description) ? explode("\n",$data->description) : [];
                                    @endphp
                                    @foreach($info_details as $item)
                                        <p class="details">{{$item}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php if($a == 4){$a =1;}else{$a++;} @endphp
                    @endforeach
                </div>
            </div>

        </div>
    @endif
    @if(!empty(get_static_option('contact_page_contact_section_status')))
        <div class="contact-section padding-bottom-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h4 class="title">{{get_static_option('contact_page_form_section_title')}}</h4>
                                    </div>
                                    @include('backend.partials.message')
                                    @if($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <form action="{{route('frontend.contact.message')}}" method="POST"
                                  class="contact-page-form style-01" id="contact_us_form">
                                <input type="hidden" name="captcha_token" id="gcaptcha_token">
                                @csrf
                                <div class="error-message margin-bottom-20"></div>
                                {!! render_form_field_for_frontend(get_static_option('contact_page_contact_form_fields')) !!}
                                <div class="btn-wrapper">
                                    <button id="contact_us_submit_btn" type="submit" class="boxed-btn reverse-color">{{get_static_option('contact_page_form_submit_btn_text')}}</button>
                                </div>

                            </form>
                        </div>
                    </div>


                    <div class="col-md-6 offset-lg-1 col-lg-5">
                        <div class="map-area mt-5 pt-5">
                            <div class="container-fluid p-0">
                                <div class="contact_map">
                                    {!! render_embed_google_map(get_static_option('contact_page_map_section_location'),get_static_option('contact_page_map_section_zoom')) !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
@section('scripts')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                function removeTags(str) {
                    if ((str === null) || (str === '')) {
                        return false;
                    }
                    str = str.toString();
                    return str.replace(/(<([^>]+)>)/ig, '');
                }

                $(document).on('click', '#contact_us_submit_btn', function (e) {
                    e.preventDefault();
                    var el = $(this);
                    var myForm = document.getElementById('contact_us_form');
                    var formData = new FormData(myForm);
                    $.ajax({
                        type: "POST",
                        url: "{{route('frontend.contact.message')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            el.html('<i class="fas fa-spinner fa-spin mr-1"></i> {{__("Submitting")}}');
                        },
                        success: function (data) {
                            var errMsgContainer = $('#contact_us_form').find('.error-message');
                            errMsgContainer.html('');
                            errMsgContainer.html('<div class="alert alert-' + data.type + '">' + removeTags(data.msg) + '</div>');
                            $('#contact_us_form').find('.form-control').val('');
                            el.text('{{__("Submit")}}');
                        },
                        error: function (data) {
                            var error = data.responseJSON;
                            var errMsgContainer = $('#contact_us_form').find('.error-message');
                            errMsgContainer.html('<div class="alert alert-danger"></div>');
                            $.each(error.errors, function (index, value) {
                                errMsgContainer.find('.alert').append('<span>' + removeTags(value) + '</span>');
                            });
                            el.text('{{__("Submit")}}');
                        }
                    });
                });
            });
        })(jQuery);
    </script>

    @if(!empty(get_static_option('site_google_captcha_v3_site_key')))
        <script src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function (token) {
                    document.getElementById('gcaptcha_token').value = token;
                });
            });
        </script>
    @endif
@endsection
