@extends('frontend.frontend-page-master')
@php
    $post_img = null;
    $blog_image = get_attachment_image_by_id($event->image,"full",false);
    $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
@endphp
@section('og-meta')
    <meta property="og:url"  content="{{route('frontend.events.single',$event->slug)}}" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="{{$event->title}}" />
    <meta property="og:image" content="{{$post_img}}" />
@endsection
@section('site-title')
    {{$event->title}}
@endsection
@section('page-title')
    {{$event->title}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$event->meta_tags}}">
    <meta name="tags" content="{{$event->meta_description}}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-event-details">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($event->image,'','large') !!}
                        </div>
                        <div class="content">
                            <div class="details-content-area mt-4">
                                {!! purify_html_raw($event->content )!!}
                            </div>
                            <div class="event-venue-details-information margin-top-40">
                                <h4 class="venue-title">{{get_static_option('event_single_venue_title')}}</h4>
                                <div class="bottom-content">
                                    <div class="venue-details">
                                        @if(!empty($event->venue))
                                        <div class="venue-details-block">
                                            <h4 class="title">{{get_static_option('event_single_venue_name_title')}}</h4>
                                            <span class="details">{{$event->venue}}</span>
                                        </div>
                                        @endif
                                        @if(!empty($event->venue_location))
                                        <div class="venue-details-block">
                                            <h4 class="title">{{get_static_option('event_single_venue_location_title')}}</h4>
                                            <span class="details">{{$event->venue_location}}</span>
                                        </div>
                                        @endif
                                        @if(!empty($event->venue_phone))
                                        <div class="venue-details-block">
                                            <h4 class="title">{{get_static_option('event_single_venue_phone_title')}}</h4>
                                            <span class="details">{{$event->venue_phone}}</span>
                                        </div>
                                        @endif
                                    </div>
                                    @if(!empty($event->venue_location))
                                    <div class="map-location">
                                        {!! render_embed_google_map($event->venue_location) !!}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @if($event->date >= date('Y-m-d'))
                                <div class="btn-wrapper margin-top-30">
                                    <a href="{{route('frontend.event.booking',$event->id)}}" class=" boxed-btn reverse-color style-01">{{get_static_option('event_single_reserve_button_title')}}</a>
                                    <p class="info-text padding-top-10">{{get_static_option('event_single_available_ticket_text').' '.$event->available_tickets}}</p>
                                </div>
                            @else
                                <p class="alert alert-danger margin-top-30">{{get_static_option('event_single_event_expire_text')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="counterdown-wrap event-page">
                            <div id="event_countdown"></div>
                        </div>
                        <div class="widget event-info">
                            <h4 class="widget-title">{{get_static_option('event_single_event_info_title')}}</h4>
                            <ul class="icon-with-title-description">
                                <li>
                                    <div class="icon"><i class="far fa-calendar-plus"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_date_title')}}</h4>
                                        <span class="details">{{date('d M Y',strtotime($event->date))}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-clock"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_time_title')}}</h4>
                                        <span class="details">{{$event->time}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_cost_title')}}</h4>
                                        <span class="details">{{amount_with_currency_symbol($event->cost)}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="far fa-folder-open"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_category_title')}}</h4>
                                        <span class="details">
                                           {!! get_events_category_by_id($event->category_id,'link') !!}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget event-info">
                            <h4 class="widget-title">{{get_static_option('event_single_organizer_title')}}</h4>
                            <ul class="icon-with-title-description">
                                @if(!empty($event->organizer))
                                <li>
                                    <div class="icon"><i class="fas fa-store"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_organizer_name_title')}}</h4>
                                        <span class="details">{{$event->organizer}}</span>
                                    </div>
                                </li>
                                @endif
                                 @if(!empty($event->organizer_email))
                                <li>
                                    <div class="icon"><i class="fas fa-envelope"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_organizer_email_title')}}</h4>
                                        <span class="details">{{$event->organizer_email}}</span>
                                    </div>
                                </li>
                                @endif
                                @if(!empty($event->organizer_phone))
                                <li>
                                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_organizer_phone_title')}}</h4>
                                        <span class="details">{{$event->organizer_phone}}</span>
                                    </div>
                                </li>
                                @endif
                                @if(!empty($event->organizer_website))
                                <li>
                                    <div class="icon"><i class="fas fa-globe"></i></div>
                                    <div class="content">
                                        <h4 class="title">{{get_static_option('event_single_organizer_website_title')}}</h4>
                                        <span class="details">{{$event->organizer_website}}</span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('assets/common/js/countdown.jquery.js')}}"></script>
    <script>
        (function($){
            "use strict";
            var ev_offerTime = "{{$event->date}}";
            var ev_year = ev_offerTime.substr(0, 4);
            var ev_month = ev_offerTime.substr(5, 2);
            var ev_day = ev_offerTime.substr(8, 2);

            if (ev_offerTime) {
                $('#event_countdown').countdown({
                    year: ev_year,
                    month: ev_month,
                    day: ev_day,
                    labels: true,
                    labelText: {
                        'days': "{{__('days')}}",
                        'hours': "{{__('hours')}}",
                        'minutes': "{{__('min')}}",
                        'seconds': "{{__('sec')}}",
                    }
                });
            }
        })(jQuery);
    </script>
@endsection