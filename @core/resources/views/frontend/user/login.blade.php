@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Login')}}
@endsection
@section('content')

    <div class="contatiner">

        <!-- logo -->
        <div class="row mb-25 pl-25 pr-15">
            <nav class="navbar sticky-top navbar-white bg-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto ">
                    <a href="{{url('/')}}">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                    </a>
                </div>
        </div>
        </nav>
    </div>
    <!-- /logo -->

    <!-- form -->
    <div class="row mb-100 pt-4 pl-25 pr-25 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <h4>Masuk ke akun anda</h4>
            <h6>Yuk berdonasi</h6>

            <form action="{{route('user.login')}}" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
                @csrf
                <div class="error-wrap"></div>

                <label for="text" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">


                <div class="d-grid gap-2 pt-4">
                    <button id="login_btn"  type="submit" class="btn btn-lg btn-success d-block">Masuk</button>
                </div>

            </form>

            <div class="text-center pt-4">Belum punya akun? <a href="{{route('user.register')}}">Yuk Daftar</a></div>
            <div class="text-center pt-4"> <a href="{{route('user.forget.password')}}">{{__('Forgot Password?')}}</a></div>


            <div class="d-grid gap-2 mt-5 pt-5">
                <a href="{{route('login.google.redirect')}}" type="button" class="btn btn-outline-danger"><i class="bi bi-google google-icon"></i> Masuk menggunakan Google</a>
                <a href="{{route('login.facebook.redirect')}}" type="button" class="btn btn-outline-primary"><i class="bi bi-facebook facebook-icon"></i> Masuk menggunakan Facebook</a>
            </div>
        </div>
    </div>
    <!-- /form -->


    </div>



{{--    <section class="login-page-wrapper">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center py-5 my-5">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="login-form-wrapper">--}}
{{--                    <h2>{{$title ?? __('Login To Your Account')}}</h2><br>--}}
{{--                    <x-msg.error/>--}}
{{--                    <x-msg.success/>--}}
{{--                    <form action="{{route('user.login')}}" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">--}}
{{--                        @csrf--}}
{{--                        <div class="error-wrap"></div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" name="username" class="form-control" placeholder="{{__('Username')}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group btn-wrapper">--}}
{{--                            <button type="submit" id="login_btn" class="submit-btn boxed-btn reverse-color ">{{__('Login')}}</button>--}}
{{--                        </div>--}}
{{--                        <div class="row mb-4 rmber-area">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="custom-control custom-checkbox mr-sm-2">--}}
{{--                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember">--}}
{{--                                    <label class="custom-control-label" for="remember">{{__('Remember Me')}}</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6 text-right">--}}
{{--                                <a class="d-block" href="{{route('user.register')}}">{{__('Create New account?')}}</a>--}}
{{--                                <a href="{{route('user.forget.password')}}">{{__('Forgot Password?')}}</a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div class="social-login-wrap">--}}
{{--                                    @if(get_static_option('enable_facebook_login'))--}}
{{--                                    <a href="{{route('login.facebook.redirect')}}" class="facebook"><i class="fab fa-facebook-f"></i> {{__('Login With Facebook')}}</a>--}}
{{--                                    @endif--}}
{{--                                    @if(get_static_option('enable_google_login'))--}}
{{--                                        <a href="{{route('login.google.redirect')}}" class="google"><i class="fab fa-google"></i> {{__('Login With Google')}}</a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

@endsection
@section('scripts')
    <script>
        (function($){
            "use strict";
            $(document).on('click', '#login_btn', function (e) {
                e.preventDefault();
                var formContainer = $('#login_form_order_page');
                var el = $(this);
                var username = formContainer.find('input[name="username"]').val();
                var password = formContainer.find('input[name="password"]').val();
                var remember = formContainer.find('input[name="remember"]').val();

                el.text('{{__("Please Wait")}}');

                $.ajax({
                    type: 'post',
                    url: "{{route('user.ajax.login')}}",
                    data: {
                        _token: "{{csrf_token()}}",
                        username : username,
                        password : password,
                        remember : remember,
                    },
                    success: function (data){
                        if(data.status == 'invalid'){
                            el.text('{{__("Login")}}')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                        }else{
                            formContainer.find('.error-wrap').html('');
                            el.text('{{__("Login Success.. Redirecting ..")}}');
                            location.reload();
                        }
                    },
                    error: function (data){
                        var response = data.responseJSON.errors;
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response,function (value,index){
                            formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                        });
                        el.text('{{__("Login")}}');
                    }
                });
            });
        })(jQuery)
    </script>
@endsection
