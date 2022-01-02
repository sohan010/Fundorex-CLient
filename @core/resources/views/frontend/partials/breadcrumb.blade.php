<section class="breadcrumb-area breadcrumb-bg "
    {!! render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_bg')) !!}
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">@yield('page-title')</h1>
                    <ul class="page-list">
                        <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
                        @if(request()->is(get_static_option('blog_page_slug').'/*') || request()->is(get_static_option('blog_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('blog_page_slug')}}">{{get_static_option('blog_page_name')}}</a></li>

                        @elseif(request()->is(get_static_option('career_with_us_page_slug').'/*') || request()->is(get_static_option('career_with_us_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('career_with_us_page_slug')}}">{{get_static_option('career_with_us_page_name')}}</a></li>
                        @elseif(request()->is(get_static_option('events_page_slug').'/*') || request()->is(get_static_option('events_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('events_page_slug')}}">{{get_static_option('events_page_name')}}</a></li>
                        @elseif(request()->is(get_static_option('success_story_page_slug').'/*') || request()->is(get_static_option('success_story_page_slug').'-category'.'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('success_story_page_slug')}}">{{get_static_option('success_story_page_name')}}</a></li>

                        @elseif(request()->is(get_static_option('donation_page_slug').'/*'))
                            <li><a href="{{url('/').'/'.get_static_option('donation_page_slug')}}">{{get_static_option('donation_page_name')}}</a></li>
                        @endif
                        <li>@yield('page-title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
