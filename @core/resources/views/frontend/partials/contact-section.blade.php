@if(!empty(get_static_option('home_page_contact_section_status')))
    <div class="contact-section">
        <div class="map-wrapper">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="contact_map">
                            <div id="map">
                                {!! render_embed_google_map(get_static_option('home_page_01_contact_area_map_location')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="contact-wrapper margin-top-120 margin-bottom-120">
                    <div class="col-lg-10">
                        <div class="contact-info bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h4 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_contact_area_title')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('frontend.get.touch')}}" id="get_in_touch_form" method="post" enctype="multipart/form-data"
                                  class="contact-page-form">
                                <div class="error-message"></div>
                                @csrf
                                 <input type="hidden" name="captcha_token" id="gcaptcha_token">
                                <div class="row">
                                    <div class="col-lg-12">
                                        {!! render_form_field_for_frontend(get_static_option('get_in_touch_form_fields')) !!}
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-wrapper">
                                            <button type="submit" id="get_in_touch_submit_btn"
                                                    class="boxed-btn">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_contact_area_button_text')}}</button>
                                            <div class="ajax-loading-wrap hide">
                                                <div class="sk-fading-circle">
                                                    <div class="sk-circle1 sk-circle"></div>
                                                    <div class="sk-circle2 sk-circle"></div>
                                                    <div class="sk-circle3 sk-circle"></div>
                                                    <div class="sk-circle4 sk-circle"></div>
                                                    <div class="sk-circle5 sk-circle"></div>
                                                    <div class="sk-circle6 sk-circle"></div>
                                                    <div class="sk-circle7 sk-circle"></div>
                                                    <div class="sk-circle8 sk-circle"></div>
                                                    <div class="sk-circle9 sk-circle"></div>
                                                    <div class="sk-circle10 sk-circle"></div>
                                                    <div class="sk-circle11 sk-circle"></div>
                                                    <div class="sk-circle12 sk-circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#get_in_touch_submit_btn', function (e) {
                e.preventDefault();
                var myForm = document.getElementById('get_in_touch_form');
                var formData = new FormData(myForm);

                $.ajax({
                    type: "POST",
                    url: "{{route('frontend.get.touch')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                    success: function (data) {
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        errMsgContainer.html('');

                        if(data.status == '400'){
                            errMsgContainer.append('<span class="text-danger">'+data.msg+'</span>');
                        }else{
                            errMsgContainer.append('<span class="text-success">'+data.msg+'</span>');
                        }
                        console.log(data);
                    },
                    error: function (data) {
                        var error = data.responseJSON;
                        var errMsgContainer = $('#get_in_touch_form').find('.error-message');
                        errMsgContainer.html('');
                        $.each(error.errors,function (index,value) {
                            errMsgContainer.append('<span class="text-danger">'+value+'</span>');
                        });
                        $('#get_in_touch_submit_btn').parent().find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                    }
                });
            });
        });
    </script>
@endsection
