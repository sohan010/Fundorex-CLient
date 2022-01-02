@extends('backend.admin-master')
@section('site-title')
    {{__('Job Applicant Details')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Job Applicant Details")}}</h4>
                        <ul>
                            <li><strong>{{__('Title')}}:</strong> {{optional($applicant->job)->title}}</li>
                            <li><strong>{{__('Name')}}:</strong> {{$applicant->name}}</li>
                            <li><strong>{{__('Email')}}:</strong> {{$applicant->email}}</li>

                            <li><strong>{{__('Application Fee')}}:</strong> {{amount_with_currency_symbol($applicant->application_fee)}}</li>
                            <li><strong>{{__('Payment Gateway')}}:</strong> {{$applicant->payment_gateway}}</li>
                            <li><strong>{{__('Transaction ID')}}:</strong> {{$applicant->transaction_id}}</li>
                            <li><strong>{{__('Payment Status')}}:</strong> {{$applicant->payment_status}}</li>
                            <li><strong>{{__('Applied At')}}:</strong> {{$applicant->created_at->format('D,d m Y')}}</li>
                            @php
                                $custom_fields = unserialize($applicant->form_content,['class' => false]);
                                unset($custom_fields['captcha_token']);
                                $attachments = unserialize($applicant->attachment,['class' => false]);
                            @endphp
                            @if(!empty($custom_fields))
                            <li><strong>{{__('Custom Fields')}}:</strong>
                                <ul class="ml-2">
                                    @foreach($custom_fields as $field => $value)
                                    <li><strong>{{str_replace(['-','_'],[' ',' '],$field)}}:</strong> {{purify_html($value)}}</li>
                                    @endforeach
                                </ul>
                            </li>
                           @endif
                            @if(!empty($attachments))
                            <li><strong>{{__('Attachments')}}:</strong>
                                <ul class="ml-2">
                                    @foreach($attachments as $field => $value)
                                        <li><strong>{{str_replace(['-','_'],[' ',' '],$field)}}:</strong>
                                            <a href="{{asset($value)}}" download="">{{purify_html($value)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection