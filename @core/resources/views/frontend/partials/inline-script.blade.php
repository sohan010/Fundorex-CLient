
<script>
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    (function ($) {
        "use strict";

        @if(!empty(get_static_option('site_sticky_navbar_enabled')))
        $(window).on('scroll', function () {

            if ($(window).width() > 992) {
                /*--------------------------
                sticky menu activation
               -------------------------*/
                var st = $(this).scrollTop();
                var mainMenuTop = $('.navbar-area');
                if ($(window).scrollTop() > 1000) {
                    // active sticky menu on scrollup
                    mainMenuTop.addClass('nav-fixed');
                } else {
                    mainMenuTop.removeClass('nav-fixed ');
                }
            }
        });
        @endif
        $(document).on('click','.language_dropdown ul li',function(e){
            var el = $(this);
            el.parent().parent().find('.selected-language').text(el.text());
            el.parent().removeClass('show');
            $.ajax({
                url : "{{route('frontend.langchange')}}",
                type: "GET",
                data:{
                    'lang' : el.data('value')
                },
                success:function (data) {
                    location.reload();
                }
            })
        });
        $(document).on('click', '.newsletter-form-wrap .submit-btn', function (e) {
            e.preventDefault();
            var email = $('.newsletter-form-wrap input[type="email"]').val();
            var errrContaner = $(this).parent().parent().parent().find('.form-message-show');
            errrContaner.html('');
            var paperIcon = 'fa-paper-plane';
            var spinnerIcon = 'fa-spinner fa-spin';
            var el = $(this);
            el.find('i').removeClass(paperIcon).addClass(spinnerIcon);
            $.ajax({
                url: "{{route('frontend.subscribe.newsletter')}}",
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    email: email
                },
                success: function (data) {
                    errrContaner.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
                    el.find('i').addClass(paperIcon).removeClass(spinnerIcon);
                },
                error: function (data) {
                    el.find('i').addClass(paperIcon).removeClass(spinnerIcon);
                    var errors = data.responseJSON.errors;
                    errrContaner.html('<div class="alert alert-danger">' + errors.email[0] + '</div>');
                }
            });
        });


    }(jQuery));
</script>