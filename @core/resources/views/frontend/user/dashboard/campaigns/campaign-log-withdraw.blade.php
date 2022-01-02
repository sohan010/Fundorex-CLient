@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="heading-wrap d-flex justify-content-between margin-bottom-25">
        <h4 class="title">{{__('All Withdraws')}}</h4>
        <div class="btn-wrapper">
            <a href="#" data-toggle="modal" data-target="#donation_withdraw_modal" class="boxed-btn reverse-color">{{__('New Withdraw')}}</a>
        </div>
    </div>
    <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{__('Information')}}</th>
                    <th scope="col"> {{__('Withdraw Status')}}</th>
                    <th scope="col">{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($withdraw_logs as $data)
                    <tr>
                        <td>
                            <ul>
                                <li><strong>{{__("Cause")}}:</strong> {{$data->cause->title}}</li>
                                <li><strong>{{__("Amount")}}:</strong> {{amount_with_currency_symbol($data->withdraw_request_amount)}}</li>
                                <li><strong>{{__("Payment Gateway")}}:</strong> {{$data->payment_gateway}}</li>
                                @php
                                    $withdraw_able_amount_without_admin_charge = optional($data->cause)->raised - optional($data->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum();
                                   $charge_text = '';
                                   $donation_charge_form = get_static_option('donation_charge_form');
                                   if ($donation_charge_form === 'campaign_owner'){
                                       $charge_text = __('after admin charge applied');
                                       echo '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                                       $withdraw_able_amount_without_admin_charge -= \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
                                   }
                                @endphp
                                <li><strong>{{__('Available For Withdraw').' '.$charge_text}}:</strong>{{amount_with_currency_symbol($withdraw_able_amount_without_admin_charge)}} </li>
                            </ul>
                        </td>
                        <td><x-status-span :status="$data->payment_status"/></td>
                        <td>
                            <a href="{{route('user.campaign.withdraw.view',$data->id)}}" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    <div class="blog-pagination">
         {{ $withdraw_logs->links() }}
    </div>

    {{-- Withdraw Modal --}}
    <div class="modal fade" id="donation_withdraw_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>{{__('User Campaign Donation Withdraw')}}</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('user.campaign.withdraw.submit')}}" method="post" id="donation_withdraw_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="user_id" value="" id="user_id">
                        <div class="withdraw_modal_msg_wrap" ></div>
                        <div class="form-group">
                            <label for="edit_name">{{__('Select Cause')}}</label>
                            <select class="form-control" name="cause_id">
                                <option value="">{{__("select cause")}}</option>
                                @foreach($causes as $cause)
                                <option value="{{$cause->id}}">{{$cause->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field_wrap d-none">
                            <div class="form-group">
                                <label for="edit_name">{{__('Withdraw Amount')}}</label>
                                <input type="number" class="form-control" name="withdraw_request_amount" id="withdraw_amount">
                                <div id="withdraw_able_amount_wrap"></div>
                            </div>
                            <div class="form-group">
                                <label for="edit_name">{{__('Payment Gateway')}}</label>
                                <select class="form-control" name="payment_gateway">
                                    {!! render_payment_gateway_select() !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_name">{{__('Payment Account Details')}}</label>
                                <textarea name="payment_account_details" cols="4" rows="4" class="form-control"></textarea>
                                <span class="info-text">{{__('enter your selected payment gateway account details, where admin will send your withdrawal amount')}}</span>
                            </div>

                            <div class="form-group">
                                <label for="edit_name">{{__('Additional Comment ')}}</label>
                                <textarea name="additional_comment_by_user" cols="4" rows="4" class="form-control"></textarea>
                                <span class="info-text">{{__('leave any additional comment if you have any')}}</span>
                            </div>
                            <button type="submit" class="submit-btn">{{__('Submit')}}</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
      <x-btn.submit/>
      (function($){
        "use strict";

        $(document).ready(function(){
            
       $(document).on('click','.mobile_nav',function(e){
          e.preventDefault(); 
           $(this).parent().toggleClass('show');
       });
               
        var withdrawAbleAmount = 0;

        $(document).on('keyup','input[name="withdraw_request_amount"]',function (){
            var value = $(this).val();
            var formContainer = $('#donation_withdraw_form');
            var amountWrap = $('#withdraw_able_amount_wrap');

            if(value <= withdrawAbleAmount){
                amountWrap.find('.text-danger').remove();
                formContainer.find('button[type="submit"]').attr('disabled',false);
            }else{
                amountWrap.find('.text-danger').remove();
                amountWrap.append('<p class="text-danger">{{__('you can not withdraw more than')}} '+withdrawAbleAmount+'{{get_static_option('site_global_currency')}}</p>');
                formContainer.find('button[type="submit"]').attr('disabled',true);
            }
        });

        $(document).on('change','select[name="cause_id"]',function (){
            var modalForm = $('#donation_withdraw_form');

            var causeID = $(this).val();
            $.ajax({
               type: 'POST',
               url: "{{route('user.campaign.withdraw.check')}}",
               data: {
                   id: causeID,
                   _token : "{{csrf_token()}}"
               },
               success: function (data){
                   withdrawAbleAmount = data.available_amount;
                   if (data.available_amount > 0){
                       modalForm.find('.field_wrap').removeClass('d-none').addClass('d-block');
                       modalForm.find('#withdraw_able_amount_wrap').html('<p class="text-success text-capitalize">{{__('withdraw able balance')}} '+data.available_amount+'{{get_static_option('site_global_currency')}}</p><p class="text-warning text-capitalize"> '+data.admin_charge+'{{get_static_option('site_global_currency')}} {{__('Admin Charge Applied.')}}</p>');
                   }else{
                       modalForm.find('.withdraw_modal_msg_wrap').html('');
                       modalForm.find('.withdraw_modal_msg_wrap').append('<p class="text-danger text-capitalize">{{__('does not have amount to withdraw from this cause')}}</p>');
                       modalForm.find('.field_wrap').removeClass('d-block').addClass('d-none');
                   }
               }
            });
        });

        })
      })(jQuery);

    </script>
@endsection
