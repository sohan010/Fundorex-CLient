@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Cancelled Of:'.' '.$attendance_details->event_name)}}
@endsection
@section('content')
    <div class="error-page-content padding-120 my-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                        <h1 class="title">{{get_static_option('event_cancel_page_title')}}</h1>
                        <h3 class="sub-title">
                            @php
                                $subtitle = get_static_option('event_cancel_page_subtitle');
                                $subtitle = str_replace('{evname}',$attendance_details->event_name,$subtitle);
                            @endphp
                            {{$subtitle}}
                        </h3>
                        <p>
                            {{get_static_option('event_cancel_page_description')}}
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
