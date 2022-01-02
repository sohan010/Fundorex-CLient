@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Payment Success For:'.' '.$donation_logs->cause->title)}}
@endsection
@section('content')
    <div class="donation-success-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-success-area">
                        <h1 class="title">{{get_static_option('donation_success_page_title')}}</h1>
                        <p>{{get_static_option('donation_success_page_description')}}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="billing-title">{{__('Donation Details')}}</h2>
                    <ul class="billing-details">
                        <li><strong>{{__('Name')}}:</strong> {{$donation_logs->name}}</li>
                        <li><strong>{{__('Email')}}:</strong> {{$donation_logs->email}}</li>
                        <li><strong>{{__('Amount')}}:</strong> {{amount_with_currency_symbol($donation_logs->amount)}}</li>
                        <li><strong>{{__('Payment Method')}}:</strong>  {{str_replace('_',' ',$donation_logs->payment_gateway)}}</li>
                        <li><strong>{{__('Payment Status')}}:</strong> {{$donation_logs->status}}</li>
                        <li><strong>{{__('Transaction id')}}:</strong> {{$donation_logs->transaction_id}}</li>
                    </ul>
                    <div class="donation-wrap donation-success-page">
                        <div class="contribute-single-item">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($donation->image,'','grid') !!}
                                <div class="thumb-content">
                                </div>
                            </div>
                            <div class="content">
                                <a href="{{route('frontend.donations.single',$donation->slug)}}"><h4 class="title">{{$donation->title}}</h4></a>
                                <p>{{strip_tags(Str::words(strip_tags($donation->donation_content),20))}}</p>
                                <div class="btn-wrapper">
                                    <a href="{{route('frontend.donations.single',$donation->slug)}}" class="boxed-btn">{{get_static_option('donation_button_text')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-wrapper margin-top-40">
                        @if(auth()->guard('web')->check())
                            <div class="btn-wrapper">
                              <a href="{{route('user.home')}}" class="boxed-btn reverse-color">{{__('Go To Dashboard')}}</a>
                            </div>
                        @else
                            <div class="btn-wrapper">
                            <a href="{{url('/')}}" class="boxed-btn reverse-color">{{__('Back To Home')}}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
