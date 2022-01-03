@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Register')}}
@endsection
@section('content')

    <div class="contatiner">

        <!-- logo -->
        <div class="row mb-25 pl-25 pr-15">
            <nav class="navbar sticky-top navbar-white bg-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                    <a href="{{url('/')}}">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                    </a>
                </div>
        </div>
        </nav>
    </div>
    <!-- /logo -->

    <!-- form -->
    <div class="row mb-10 pt-4 pl-25 pr-15 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <h4>Daftar akun anda</h4>
            <h6>Yuk berdonasi</h6>

            @include('backend.partials.message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form action="{{route('user.register')}}" class="formDaftar mt-35" method="post" enctype="multipart/form-data">
                @csrf
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control">

                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">

                <label for="password" class="form-label">Password Confirm</label>
                <input type="password" id="password" name="password_confirmation" class="form-control">

                <div class="d-grid gap-2 pt-4">
                    <button type="submit" class="btn btn-lg btn-success d-block">Daftar</button>
                </div>

            </form>

            <div class="text-center pt-4">Sudah punya akun? <a href="{{route('user.login')}}">Yuk Masuk</a></div>

            <div class="d-grid gap-2 pt-4">
                <a href="{{route('login.google.redirect')}}" type="button" class="btn btn-outline-danger"><i class="bi bi-google google-icon"></i> Daftar menggunakan Google</a>
                <a href="{{route('login.facebook.redirect')}}" type="button" class="btn btn-outline-primary"><i class="bi bi-facebook facebook-icon"></i> Daftar menggunakan Facebook</a>
            </div>
        </div>
    </div>
    <!-- /form -->


    </div>











    {{--    <section class="login-page-wrapper py-5 my-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="login-form-wrapper">--}}
{{--                        <h2 class="text-center">{{__('Register New Account')}}</h2><br>--}}
{{--                        @include('backend.partials.message')--}}
{{--                        @if($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach($errors->all() as $error)--}}
{{--                                        <li>{{$error}}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <form action="{{route('user.register')}}" method="post" enctype="multipart/form-data" class="account-form">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="captcha_token" id="gcaptcha_token">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" name="name" class="form-control" placeholder="{{__('Name')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" name="username" class="form-control" placeholder="{{__('Username')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" name="email" class="form-control" placeholder="{{__('Email')}}">--}}
{{--                            </div>--}}
{{--
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" name="city" class="form-control" placeholder="{{__('City')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('Confirm Password')}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group btn-wrapper">--}}
{{--                                <button type="submit" class="submit-btn boxed-btn reverse-color">{{__('Register')}}</button>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-4 rmber-area">--}}
{{--                                <div class="col-12 text-center">--}}
{{--                                    <a href="{{route('user.login')}}">{{__('Already Have account?')}}</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
@endsection
