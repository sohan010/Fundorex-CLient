@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Donation Withdraw')}}
@endsection
@section('style')

@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.error/>
                <x-msg.success/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-wrap d-flex justify-content-between margin-bottom-30">
                                    <h4 class="header-title">{{__('Edit Donation Withdraw')}}</h4>
                                    <div class="headerbtn-wrap">
                                        <div class="btn-wrapper">
                                            <a href="{{route('admin.all.donation.withdraw.request')}}"
                                               class="btn btn-info">{{__('All Donation Withdraw')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="margin-bottom-40">
                            <li><strong>{{__('Cause')}}
                                    :</strong> {{optional($withdraw->cause)->title ?? __('untitled')}} </li>
                            <li><strong>{{__('Requested By')}}:</strong> {{optional($withdraw->user)->name }}
                                ({{optional($withdraw->user)->username }})
                            </li>
                            @if($withdraw->payment_status === 'pending')
                                <li><strong>{{__('Raised Amount')}}
                                        :</strong> {{amount_with_currency_symbol(optional($withdraw->cause)->raised ?? 0)}}
                                </li>
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
                            <li><strong>{{__('Requested Withdraw Amount')}}
                                    :</strong> {{amount_with_currency_symbol($withdraw->withdraw_request_amount)}} </li>
                            <li><strong>{{__('Payment Gateway')}}:</strong> {{$withdraw->payment_gateway}} </li>
                            <li><strong>{{__('Payment Status')}}:</strong> {{$withdraw->payment_status}} </li>
                            <li><strong>{{__('Date')}}:</strong> {{$withdraw->created_at->format('D, d M Y')}} </li>
                            @if($withdraw->payment_status === 'approved')
                                <li><strong>{{__('Approved Date')}}
                                        :</strong> {{$withdraw->updated_at->format('D, d M Y')}} </li>
                            @endif
                            <li><strong>{{__('Payment Account Details ')}}
                                    :</strong> {{$withdraw->payment_account_details}} </li>
                            <li><strong>{{__('Additional Comment ')}}
                                    :</strong> {{$withdraw->additional_comment_by_user}} </li>
                        </ul>

                        <form action="{{route('admin.donations.withdraw.update')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="withdraw_id" value="{{$withdraw->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-info">{{__('Transaction ID')}}</label>
                                        <input type="text" class="form-control" name="transaction_id"
                                               value="{{ $withdraw->transaction_id }}" id="withdraw_amount">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-info" for="edit_name">{{__('Payment Information')}}</label>
                                        <textarea name="payment_information" cols="30" rows="10"
                                                  class="form-control"> {{ $withdraw->payment_information }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-info" for="edit_name">{{__('Additional Comment')}}</label>
                                        <textarea name="additional_comment_by_admin" cols="4" rows="4"
                                                  class="form-control">{{ $withdraw->additional_comment_by_admin }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-info"
                                               for="image">{{__('Payment Receipt - Image/PDF')}}</label>
                                        <input type="file" class="form-control btn btn-info btn-sm"
                                               name="payment_receipt">
                                    </div>
                                    <div>
                                        @if($withdraw->payment_receipt)

                                            <label for="">{{__('Current Payment Receipt')}}:</label>
                                            <a href="{{ asset('assets/uploads/donation-withdraw/'.$withdraw->payment_receipt) }}"
                                               type="application/pdf" target="_blank">{{__('View')}}</a>
                                        @else
                                            <span class="badge badge-danger">{{__('Not Added Yet')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-12 mt-3">
                                        <label class="text-info">{{__('Payment Status')}}</label>
                                        <select name="payment_status" class="form-control">
                                            <option @if($withdraw->payment_status === 'pending') selected
                                                    @endif value="pending">{{__('Pending')}}</option>
                                            <option @if($withdraw->payment_status === 'reject') selected
                                                    @endif value="reject">{{__('Reject')}}</option>
                                            <option @if($withdraw->payment_status === 'approved') selected
                                                    @endif value="approved">{{__('Approved')}}</option>
                                        </select>
                                    </div>
                                </div>

                                <button id="update" type="submit"
                                        class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Withdraw')}}</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-btn.update/>

                $(document).on('keyup', '#paid_amount', function () {
                    var paid_amount = $(this).val();
                    var campaign_withdrawable_amount = $('#campaign_withdrawable_amount').val();
                    var remaining_amount = $('#remaining_amount').val();

                    $('#remaining_amount').val(campaign_withdrawable_amount - paid_amount);
                });


            });
        })(jQuery)
    </script>

@endsection
