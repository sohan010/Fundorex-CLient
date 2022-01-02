@extends('backend.admin-master')
@section('site-title')
    {{__('Payment Details')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                       <div class="header-wrap d-flex justify-content-between margin-bottom-40">
                           <h4 class="header-title">{{__('Payment Details')}}</h4>
                           <a href="{{route('admin.payment.logs')}}" class="btn btn-info">{{__('All Payments Log')}}</a>
                       </div>
                        <div class="booking-details-info">
                            <ul>
                                <li><strong>{{__('Order ID')}}</strong> : #{{$payment_log->order_id}}</li>
                                <li><strong>{{__('Name')}}</strong> : {{$payment_log->name}}</li>
                                <li><strong>{{__('Email')}}</strong> : {{$payment_log->email}}</li>
                                 <li><strong>{{__('Package Name')}}</strong> : {{purify_html($payment_log->package_name)}}</li>
                                <li><strong>{{__('Package Price')}}</strong> : {{$payment_log->package_price}}</li>
                                <li><strong>{{__('Payment Gateway')}}</strong> : {{str_replace('_',' ',$payment_log->package_gateway)}}</li>
                                <li><strong>{{__('Payment Status')}}</strong> : {{$payment_log->status}}</li>
                                <li><strong>{{__('Transaction ID')}}</strong> : {{$payment_log->transaction_id}}</li>
                                <li><strong>{{__('Date')}}</strong> : {{$payment_log->status}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
