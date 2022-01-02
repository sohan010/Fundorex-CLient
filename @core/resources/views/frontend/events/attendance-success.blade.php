@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Payment Success For:'.' '.$attendance_details->event_name)}}
@endsection
@section('content')
    <div class="event-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-success-area margin-bottom-50">
                        <h1 class="title">{{get_static_option('event_success_page_title')}}</h1>
                        <p>{{get_static_option('event_success_page_description')}}</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h2 class="billing-title">{{__('Billing Details')}}</h2>
                    <ul class="billing-details">
                        <li><strong>{{__('Attendance ID')}}:</strong> #{{$payment_log->id}}</li>
                        <li><strong>{{__('Name')}}:</strong> {{$payment_log->name}}</li>
                        <li><strong>{{__('Email')}}:</strong> {{$payment_log->email}}</li>
                        <li><strong>{{__('Payment Method')}}:</strong> {{str_replace('_',' ',$payment_log->package_gateway)}}</li>
                        <li><strong>{{__('Payment Status')}}:</strong> {{$payment_log->status}}</li>
                        <li><strong>{{__('Transaction id')}}:</strong> {{$payment_log->transaction_id}}</li>
                    </ul>


                    <div class="event-single-wrap  margin-top-40">
                        <div class="events-single-item bg-image margin-bottom-30"{!! render_background_image_markup_by_attachment_id(get_static_option('event_page_bg_image'))  !!}">
                        <div class="thumb">
                            <div class="bg-image"
                                    {!! render_background_image_markup_by_attachment_id($event_details->image,'','grid')  !!} >
                                <div class="post-time">
                                    <h5 class="title">{{date('d',strtotime($event_details->date))}}</h5>
                                    <span>{{date('M',strtotime($event_details->date))}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="content-wrapper">
                            <div class="content">
                                <a href="{{route('frontend.events.single',$event_details->slug)}}">
                                    <h4 class="title">{{$event_details->title ?? ''}}</h4></a>
                                <ul class="info-items-03">
                                    <li><a href="{{route('frontend.events.single',$event_details->slug)}}"><i class="far fa-clock"></i>{{$event_details->time}}</a></li>
                                    <li><a href="{{route('frontend.events.single',$event_details->slug)}}"><i class="fas fa-map-marker-alt"></i>{{$event_details->venue_location ?? ''}}</a></li>
                                </ul>
                                <div class="events-btn-wrapper">
                                    <a href="{{route('frontend.events.single',$event_details->slug)}}" class="book-btn">{{get_static_option('event_page_button_text')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="btn-wrapper margin-top-40">
                    @if(auth()->guard('web')->check())
                        <a href="{{route('user.home')}}" class="boxed-btn reverse-color">{{__('Go To Dashboard')}}</a>
                    @else
                        <a href="{{url('/')}}" class="boxed-btn reverse-color">{{__('Back To Home')}}</a>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
