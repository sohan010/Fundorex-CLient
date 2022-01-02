@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Verify Your Account')}}
@endsection
@section('content')
    <section class="login-page-wrapper padding-top-110 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper my-5 py-5">
                        <h2>{{__('Verify Your Account')}}</h2>
                        <x-msg.error/>
                        <x-msg.success/>
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ __('Check Mail for Verification code.') }}</strong>
                        </div>
                        <form action="{{route('user.email.verify')}}" method="post" enctype="multipart/form-data" class="account-form verify-mail">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="verification_code" class="form-control" placeholder="{{__('Verify Code')}}">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class="submit-btn boxed-btn reverse-color">{{__('Verify Email')}}</button>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-12 text-center">
                                    <a href="{{route('user.resend.verify.mail')}}">{{__('Send Verify Code Again?')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
