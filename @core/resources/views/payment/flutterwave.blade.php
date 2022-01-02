<head>
    {!! load_google_fonts() !!}
    {!! render_favicon_by_id(get_static_option('site_favicon')) !!}
    <title> {{get_static_option('site_title')}}
        - {{get_static_option('site_tag_line')}}</title>
</head>
<body>
<form method="POST" action="{{$flutterwave_data['form_action']}}" id="paymentForm">
    {{ csrf_field() }}
    <input type="hidden" name="amount" value="{{$flutterwave_data['amount']}}" /> <!-- Replace the value with your transaction amount -->
    <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both -->
    <input type="hidden" name="description" value="{{$flutterwave_data['description']}}" /> <!-- Replace the value with your transaction description -->
    <input type="hidden" name="country" value="{{$flutterwave_data['country']}}" /> <!-- Replace the value with your transaction country -->
    <input type="hidden" name="currency" value="{{$flutterwave_data['currency']}}" /> <!-- Replace the value with your transaction currency -->
    <input type="hidden" name="email" value="{{$flutterwave_data['email']}}" /> <!-- Replace the value with your customer email -->
    <input type="hidden" name="firstname" value="{{$flutterwave_data['name']}}" /> <!-- Replace the value with your customer firstname -->
    {{--                <input type="hidden" name="lastname" value="Adebiyi" /> <!-- Replace the value with your customer lastname -->--}}
    <input type="hidden" name="metadata" value="{{ json_encode($flutterwave_data['metadata']) }}" > <!-- Meta data that might be needed to be passed to the Rave Payment Gateway -->
    {{--                <input type="hidden" name="phonenumber" value="090929992892" /> <!-- Replace the value with your customer phonenumber -->--}}
    <div class="btn-wrapper text-center">
        <input type="submit" id="submit_btn" value="{{ __('Pay Now')}}"  />
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded',function (){
        document.getElementById('submit_btn').dispatchEvent(new MouseEvent('click'));
        document.getElementById('submit_btn').value = "{{__('Redirecting..')}}";
    });
</script>
</body>
</html>
