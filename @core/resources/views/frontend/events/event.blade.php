@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('events_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('events_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('events_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('events_page_meta_tags')}}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($all_events as $data)
                        <div class="events-single-item bg-image margin-bottom-30"{!! render_background_image_markup_by_attachment_id(get_static_option('event_page_bg_image'))  !!}">
                            <div class="thumb">
                                <div class="bg-image"
                                    {!! render_background_image_markup_by_attachment_id($data->image,'','grid')  !!} >
                                    <div class="post-time">
                                        <h5 class="title">{{date('d',strtotime($data->date))}}</h5>
                                        <span>{{date('M',strtotime($data->date))}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content">
                                    <a href="{{route('frontend.events.single',$data->slug)}}">
                                        <h4 class="title">{{$data->title ?? ''}}</h4></a>
                                    <ul class="info-items-03">
                                        <li><a href="{{route('frontend.events.single',$data->slug)}}"><i class="far fa-clock"></i>{{$data->time}}</a></li>
                                        <li><a href="{{route('frontend.events.single',$data->slug)}}"><i class="fas fa-map-marker-alt"></i>{{$data->venue_location ?? ''}}</a></li>
                                    </ul>
                                    <div class="events-btn-wrapper">
                                        <a href="{{route('frontend.events.single',$data->slug)}}" class="book-btn">{{get_static_option('event_page_button_text')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12 text-center">
                        <nav class="pagination-wrapper " aria-label="Page navigation ">
                            {{$all_events->links()}}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('event',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
