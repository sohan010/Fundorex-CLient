@extends('backend.admin-master')
@section('site-title')
    {{__('All Campaign Withdraw Requests')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Withdraw Details')}}</h4>
                            <div class="btn-wrapper">
                                <a class="btn btn-info" href="{{route('admin.all.donation.withdraw.request')}}">{{__('All Withdraw')}}</a>
                            </div>
                        </div>
                        <ul class="margin-top-20">
                            <li><strong>{{__('Cause')}}:</strong> {{optional($withdraw->cause)->title ?? __('untitled')}} </li>
                            <li><strong>{{__('Requested By')}}:</strong> {{optional($withdraw->user)->name }} ({{optional($withdraw->user)->username }})</li>
                            @if($withdraw->payment_status === 'pending')
                                <li><strong>{{__('Raised Amount')}}:</strong> {{amount_with_currency_symbol(optional($withdraw->cause)->raised ?? 0)}}</li>
                            @php
                                $withdraw_able_amount_without_admin_charge = optional($withdraw->cause)->raised - optional($withdraw->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum();
                               $charge_text = '';
                               $donation_charge_form = get_static_option('donation_charge_form');
                               if ($donation_charge_form === 'campaign_owner'){
                                   $charge_text = __('after admin charge applied');
                                   echo '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                                   $withdraw_able_amount_without_admin_charge -= \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
                               }
                            @endphp
                                <li><strong>{{__('Available For Withdraw Amount').' '.$charge_text}}:</strong>{{amount_with_currency_symbol($withdraw_able_amount_without_admin_charge)}} </li>
                            @endif
                            <li><strong>{{__('Requested Withdraw Amount')}}:</strong> {{amount_with_currency_symbol($withdraw->withdraw_request_amount)}} </li>
                            <li><strong>{{__('Payment Gateway')}}:</strong> {{$withdraw->payment_gateway}} </li>
                            <li><strong>{{__('Payment Status')}}:</strong> {{$withdraw->payment_status}} </li>
                            <li><strong>{{__('Date')}}:</strong> {{$withdraw->created_at->format('D, d M Y')}} </li>
                            @if($withdraw->payment_status === 'approved')
                                <li><strong>{{__('Approved Date')}}:</strong> {{$withdraw->updated_at->format('D, d M Y')}} </li>
                            @endif
                            <li><strong>{{__('Payment Account Details ')}}:</strong> {{$withdraw->payment_account_details}} </li>
                            <li><strong>{{__('Additional Comment by user')}}:</strong> {{$withdraw->additional_comment_by_user}} </li>
                        </ul>
                        <h3 class="header-title margin-top-40">{{__('Admin Response')}}</h3>
                        <ul class="margin-top-20">
                            <li><strong>{{__('Transaction Id')}}:</strong> {{$withdraw->transaction_id}} </li>
                            <li><strong>{{__('Payment Receipt')}}:</strong>
                                @if($withdraw->payment_receipt && file_exists('assets/uploads/donation-withdraw/'.$withdraw->payment_receipt))
                                    <a href="{{asset('assets/uploads/donation-withdraw/'.$withdraw->payment_receipt)}}" download="">{{$withdraw->payment_receipt}}</a>
                                @else
                                    {{$withdraw->payment_receipt}}
                                @endif
                            </li>
                            <li><strong>{{__('Payment information')}}:</strong> {{$withdraw->payment_information}} </li>
                            <li><strong>{{__('Additional Comment by Admin')}}:</strong> {{$withdraw->additional_comment_by_admin}} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection