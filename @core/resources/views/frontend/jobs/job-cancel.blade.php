@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Cancelled Of:').' '.$job_details->title}}
@endsection
@section('content')
    <div class="error-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                        <h1 class="title">{{get_static_option('job_cancel_page__title')}}</h1>
                        <p>
                            {{get_static_option('job_cancel_page__description')}}
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
