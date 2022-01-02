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
<form method="POST" action="{{ $paystack_data['route'] }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <input type="hidden" name="name" value="{{$paystack_data['name']}}">
            <input type="hidden" name="email" value="{{$paystack_data['email']}}"> {{-- required --}}
            <input type="hidden" name="order_id" value="{{$paystack_data['order_id']}}">
            <input type="hidden" name="orderID" value="{{$paystack_data['order_id']}}">
            <input type="hidden" name="amount" value="{{$paystack_data['price'] * 100}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="{{$paystack_data['currency']}}">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['track' => $paystack_data['track'],'type' => $paystack_data['type']]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <p>
                <button id="submit_btn" type="submit" >{{__('Redirecting..')}}</button>
            </p>
        </div>
    </div>
</form>

<script>
    (function($){
    "use strict";
        var submitBtn = $('#submit_btn');
        $(document).ready(function (){
            submitBtn.trigger('click');
            submitBtn.text("{{__('Do not close or reload the page...')}}");
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
