@if(!empty(filter_static_option_value('site_google_analytics',$global_static_field_data)))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{filter_static_option_value('site_google_analytics',$global_static_field_data)}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', "{{filter_static_option_value('site_google_analytics',$global_static_field_data)}}");
    </script>
@endif