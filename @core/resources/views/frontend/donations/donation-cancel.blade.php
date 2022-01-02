@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Cancelled Of:'.' '.$donation_logs->cause->title)}}
@endsection
@section('content')
    <div class="error-page-content padding-120 my-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                        <h1 class="title">{{get_static_option('donation_cancel_page_title')}}</h1>
                        <p>
                            {{get_static_option('donation_cancel_page_description')}}
                        </p>
                        <div class="btn-wrapper">
                            <a href="{{url('/')}}" class="boxed-btn reverse-color">{{__('Back To Home')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
