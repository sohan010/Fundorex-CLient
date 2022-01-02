<html>
<head>
    {!! load_google_fonts() !!}
    {!! render_favicon_by_id(get_static_option('site_favicon')) !!}
    <title> {{get_static_option('site_title')}}
        - {{get_static_option('site_tag_line')}}</title>
    <script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/common/js/jquery-migrate-3.3.2.min.js')}}"></script>
</head>
<body>
<div class="stripe-payment-wrapper">
    <div class="srtipe-payment-inner-wrapper">
        <form action="{{$razorpay_data['route']}}" method="POST" >
            <!-- Note that the amount is in paise = 50 INR -->
            <input type="hidden" name="order_id" value="{{$razorpay_data['order_id']}}" />
        @php
            $site_logo = get_attachment_image_by_id(get_static_option('site_logo'), "full", false);
            $image_url = isset($site_logo['img_url']) ? $site_logo['img_url'] : '';
        @endphp
        <!--amount need to be in paisa-->
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="{{ get_static_option('razorpay_key') }}"
                    data-currency="{{$razorpay_data['currency']}}"
                    data-amount="{{$razorpay_data['price'] * 100}}"
                    data-buttontext="{{'Pay '.$razorpay_data['price'].' INR'}}"
                    data-name="{{$razorpay_data['title']}}"
                    data-description="{{$razorpay_data['description']}}"
                    data-image="{{$image_url}}"
                    data-prefill.name=""
                    data-prefill.email=""
                    data-theme.color="{{get_static_option('site_color')}}">
            </script>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
</div>

<script>
    (function($){
    "use strict";

    // Create a Stripe client
        var submitBtn = $('input[type="submit"]');
        $(document).ready(function (){
            submitBtn.trigger('click');
            submitBtn.val("{{__('Do not close or reload the page...')}}");
            submitBtn.css({
                'background-color' : 'red',
                'color' : '#fff',
                'border' : 'none',
                'padding' : '5px',
            })
        });

    })(jQuery);
</script>
</body>
</html>
