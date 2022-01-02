@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Reset Password')}}
@endsection
@section('content')
    <section class="login-page-wrapper padding-bottom-120 padding-top-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2 class="margin-bottom-40">{{__('Reset Password')}}</h2>
                       <x-msg.success/>
                       <x-msg.error/>
                        <form action="{{route('user.reset.password.change')}}" method="post" enctype="multipart/form-data" class="account-form">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="form-group">
                                <input type="text" id="username" class="form-control" readonly value="{{$username}}" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password_confirmation"  class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class="submit-btn width-220">{{__('Reset Password')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

