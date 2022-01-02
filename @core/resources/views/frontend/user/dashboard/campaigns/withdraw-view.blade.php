@extends('frontend.user.dashboard.user-master')
@section('site-title')
    {{__('Withdraw Details')}}
@endsection
@section('section')
 <div class="form-header-wrap margin-bottom-20 d-flex justify-content-between">
     <h3 class="mb-3">{{__('Withdraw Details')}}</h3>
     <a href="{{route('user.campaign.log.withdraw')}}"
        class="btn btn-info btn-sm mb-3 campaign-title" >{{__('All Withdraw')}}</a>
 </div>
  <div class="table-wrap table-responsive all-user-campaign-table">
      <ul class="margin-top-20">
          <li><strong>{{__('Cause')}}:</strong> {{optional($withdraw->cause)->title ?? __('untitled')}} </li>
          <li><strong>{{__('Requested By')}}:</strong> {{optional($withdraw->user)->name }} ({{optional($withdraw->user)->username }})</li>
          @if($withdraw->payment_status === 'pending')
              <li><strong>{{__('Raised Amount')}}:</strong> {{amount_with_currency_symbol(optional($withdraw->cause)->raised ?? 0)}}</li>
              <li><strong>{{__('Available For Withdraw Amount')}}:</strong>{{amount_with_currency_symbol(optional($withdraw->cause)->raised - optional($withdraw->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum())}} </li>
          @endif
          <li><strong>{{__('Requested Withdraw Amount')}}:</strong> {{amount_with_currency_symbol($withdraw->withdraw_request_amount)}} </li>
          <li><strong>{{__('Payment Gateway')}}:</strong> {{$withdraw->payment_gateway}} </li>
          <li><strong>{{__('Payment Status')}}:</strong> {{$withdraw->payment_status}} </li>
          <li><strong>{{__('Request Date')}}:</strong> {{$withdraw->created_at->format('D, d M Y')}} </li>
          @if($withdraw->payment_status === 'approved')
              <li><strong>{{__('Approved Date')}}:</strong> {{$withdraw->updated_at->format('D, d M Y')}} </li>
          @endif
          <li><strong>{{__('Payment Account Details ')}}:</strong> {{$withdraw->payment_account_details}} </li>
          <li><strong>{{__('Additional Comment by You')}}:</strong> {{$withdraw->additional_comment_by_user}} </li>
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
@endsection
