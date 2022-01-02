@extends('backend.admin-master')
@section('site-title')
    {{__('Attendance Details')}}
@endsection

@section('style')
    <x-media.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Attendance Details')}}</h4>
                        <ul>
                            <li><strong>{{__('Event')}}:</strong> {{optional($attendance->event)->title}}</li>
                            <li><strong>{{__('Ticket Cost')}}
                                    :</strong> {{amount_with_currency_symbol($attendance->event_cost)}}</li>
                            <li><strong>{{__('Ticket Quantity')}}:</strong> {{$attendance->quantity}}</li>
                            <li><strong>{{__('Status')}}:</strong> {{$attendance->status}}</li>
                            <li><strong>{{__('Payment Status')}}:</strong> {{$attendance->status}}</li>
                            @php
                            $custom_fields = unserialize($attendance->custom_fields,['class' => false]);
                            $attachment = unserialize($attendance->attachment,['class' => false]);
                            unset($custom_fields['event_id'],$custom_fields['quantity'],$custom_fields['selected_payment_gateway']);
                            @endphp
                            @if(!empty($custom_fields))
                            <li><strong>{{__('Custom Fields')}}:</strong>
                              <ul class="ml-2">
                                  @foreach($custom_fields as $field => $value)
                                      <li><storng>{{str_replace(['-','_'],[' ',' '],$field)}}:</storng> {{$value}}</li>
                                  @endforeach
                              </ul>
                            </li>
                            @endif
                            @if(!empty($attachment))
                            <li><strong>{{__('Attachments')}}:</strong>
                                <ul class="ml-2">
                                    @foreach($attachment as $field => $value)
                                    <li><storng>{{str_replace(['-','_'],[' ',' '],$field)}}:</storng> {{$value}}</li>
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
