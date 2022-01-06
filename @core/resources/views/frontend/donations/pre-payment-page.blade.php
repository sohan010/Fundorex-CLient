@extends('frontend.frontend-page-master')
@section('site-title')
   {{__('Pre PaymentPage')}}
@endsection
@section('page-title')
    {{__('Pre PaymentPage')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('donation_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('donation_page_meta_tags')}}">
@endsection
@section('content')


    <div class="contatiner">
       <div class="d-block">
           <a href="{{url('/')}}" class="btn btn-primary ml-2 mt-3">
               Go Back
           </a>
       </div>
        <!-- detail -->
        <div class="row mb-100 pt-4 pl-25 pr-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">

                <div class="rise-flex-contents">
                    <div class="single-donate margin-bottom-30">
                        <h2 class="title"> {!! get_static_option('home_page_05_rise_area_heading_title') !!} </h2>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <div class="nice-selects">
                            <select id="donation_select">
                                @foreach($all_donation as $donation)
                                    <option value="{{$donation->id}}" data-url="{{route('frontend.donation.in.separate.page',$donation->id)}}"> {{ \Illuminate\Support\Str::words($donation->title,4)  }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <input class="form-control user_input_number" type="number" value="200">
                    </div>
                    <div class="single-donate margin-bottom-30">
                        <button type="submit" class="boxed-btn donate-btn donation_redirect_button"> {{__('Donate')}} </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /detail -->


    </div>

@endsection

@section('scripts')
    <script>
        $(document).on('click','.donation_redirect_button',function(e){
            e.preventDefault();
            var select = $('#donation_select');
            var donationId = select.val();
            var paymentPageUrl = $('#donation_select option[value="'+donationId+'"]').data('url');
            var amount = $('.user_input_number').val();
            window.location = paymentPageUrl+'?number='+amount;
        });

    </script>
@endsection
