@extends('frontend.user.dashboard.user-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Campaigns')}}
@endsection
@section('section')
 <div class="form-header-wrap margin-bottom-50 d-flex justify-content-between">
     <h3 class="mb-3">{{__('All Campaigns List')}}</h3>
     <a href="{{route('user.campaign.new')}}"
        class="btn btn-info btn-sm mb-3 campaign-title" >{{__('Create New Campaign')}}</a>
 </div>
  <div class="table-wrap table-responsive all-user-campaign-table">
      <table class="table table-defaul" id="all_blog_table">
          <thead class="bg-dark text-light" style="margin-bottom:20px;">
          <th>{{__('Info')}}</th>
          <th>{{__('Action')}}</th>
          </thead>
          <tbody>
          @foreach($all_donations as $data)
              <tr>
                  <td>
                     <div class="campaign-image-wrap margin-bottom-25">
                         {!! render_image_markup_by_attachment_id($data->image,null,'thumb') !!}
                     </div>
                      <ul>
                          <li><strong>{{__('Title')}}:</strong> {{$data->title}}</li>
                          <li><strong>{{__('featured')}}:</strong> @if($data->featured) {{__('Yes')}} @else {{__('No')}} @endif
                          </li>
                          <li><strong>{{__('Goal')}}:</strong> {{amount_with_currency_symbol($data->amount)}}</li>
                          @php
                              $withdraw_able_amount_without_admin_charge = $data->raised;
                             $charge_text = '';
                             $donation_charge_form = get_static_option('donation_charge_form');
                             if ($donation_charge_form === 'campaign_owner'){
                                 $charge_text = __('after admin charge applied');
                                 echo '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                                 $withdraw_able_amount_without_admin_charge -= \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
                             }
                          @endphp
                          <li><strong>{{__('Raised')}}:</strong> {{amount_with_currency_symbol($withdraw_able_amount_without_admin_charge)}}</li>
                          <li><strong>{{__('Withdraw')}}:</strong> {{amount_with_currency_symbol($data->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum())}}</li>
                          <li><strong>{{__('Created At')}}:</strong> {{date("d - M - Y", strtotime($data->created_at))}}</li>

                          <li><strong>{{__('Status')}}:</strong>
                              <div class="status-wrap mt-3 my-2">
                                  <x-status-span :status="$data->status" />
                              </div>
                          </li>
                      </ul>
                  </td>
                  <td>

                    <a href="{{route('user.campaign.edit',$data->id)}}"
                       class="btn btn-primary text-white btn-sm"><i class="fas fa-edit"></i>
                    </a>
                    <a tabindex="0" class="btn btn-danger btn-sm swal_delete_button text-light">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form method='post' action='{{route('user.campaign.delete',$data->id)}}' class="d-none">
                    <input type='hidden' name='_token' value='{{csrf_token()}}'>
                    <br>
                    <button type="submit" class="swal_form_submit_btn d-none"></button>
                     </form>

                    <a href="{{route('frontend.donations.single',$data->slug)}}"
                       class="btn btn-dark text-white btn-sm my-2" target="_blank"> <i class="fa fa-eye"></i>
                    </a>

                  <a href="{{route('user.all.update.cause.page',$data->id)}}"
                      class="btn btn-info text-white btn-sm">{{__('Add/Edit Update About Cause')}}
                  </a>

                  </td>
              </tr>
          @endforeach
          </tbody>
      </table>
  </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
              $(document).on('click','.swal_delete_button',function(e){
                e.preventDefault();
                  Swal.fire({
                    title: '{{__("Are you sure?")}}',
                    text: '{{__("You would not be able to revert this item!")}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                  });
              });
            })


        })(jQuery)
    </script>

    <x-datatable.js/>
@endsection
