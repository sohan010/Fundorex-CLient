@php
    $home_page_variant = $home_page ?? get_static_option('home_page_variant');
@endphp
<footer class="footer-area home-variant-{{$home_page_variant}}">

    <div class="copyright-area  @if($home_page_variant == '02') style-01 bg-image @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-item">
                        <div class="copyright-area-inner text-center pt-5 mt-5">
                            {!! purify_html_raw(get_footer_copyright_text()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="back-to-top">
    <span class="back-top">
        <i class="fas fa-angle-up"></i>
    </span>
</div>
@if(preg_match('/(xgenious)/',url('/')))
<script type="text/javascript"> adroll_adv_id = "GXM5SRU2XZE7JOKGHSZPSZ"; adroll_pix_id = "WP43YTLBS5BQXDP6XUEIC7"; adroll_version = "2.0";  (function(w, d, e, o, a) { w.__adroll_loaded = true; w.adroll = w.adroll || []; w.adroll.f = [ 'setProperties', 'identify', 'track' ]; var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js"; for (a = 0; a < w.adroll.f.length; a++) { w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([ n, arguments ]) } })(w.adroll.f[a]) }  e = d.createElement('script'); o = d.getElementsByTagName('script')[0]; e.async = 1; e.src = roundtripUrl; o.parentNode.insertBefore(e, o); })(window, document); adroll.track("pageView"); </script>
    <div class="buy-now-wrap">
        <ul class="buy-list">
            <li><a target="_blank"href="https://xgenious.com/docs/fundorex/" data-container="body" data-toggle="popover" data-placement="left" data-content="{{__('Documentation')}}"><i class="far fa-file-alt"></i></a></li>
            <li><a target="_blank"href="https://codecanyon.net/item/fundorex-crowdfunding-platform/33286096"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a target="_blank"href="https://xgenious51.freshdesk.com/"><i class="fas fa-headset"></i></a></li>
        </ul>
    </div>
@endif

<!-- load all script -->

<script src="{{asset('assets/common/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.waypoints.js')}}"></script>


<script src="{{asset('assets/frontend/js/jQuery.rProgressbar.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/active.rProgressbar.js')}}"></script>
<script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>




<script src="{{asset('assets/frontend/js/dynamic-script.js')}}"></script>
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>

@include('frontend.partials.google-captcha')
@include('frontend.partials.gdpr-cookie')
@include('frontend.partials.inline-script')
@include('frontend.partials.twakto')

<script>
    $( document ).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({'placement': 'left','color':'green'});
    });


</script>

<x-sweet-alert-msg/>
@yield('scripts')








</body>
</html>
