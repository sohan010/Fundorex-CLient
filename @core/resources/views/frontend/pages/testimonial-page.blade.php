@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('testimonial_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('testimonial_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('testimonial_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('testimonial_page_meta_tags')}}">
@endsection
@section('content')
    <section class="testimonial-area padding-top-110 padding-bottom-90">
        <div class="container">
            <div class="row">
                @foreach($all_testimonials as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-testimonial-item-07 margin-bottom-30">
                            <div class="icon style-01">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="content">
                                <p class="description">{{$data->description}}</p>
                                <div class="author-details">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image) !!}
                                    </div>
                                    <div class="author-meta">
                                        <h4 class="title">{{$data->name}}</h4>
                                        <div class="designation">{{$data->designation}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        {{$all_testimonials->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
