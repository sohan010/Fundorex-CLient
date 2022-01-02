@extends('frontend.frontend-page-master')

@section('og-meta')
    <meta name="og:title" content="{{purify_html($success_story->og_meta_title)}}">
    <meta name="og:description" content="{{purify_html($success_story->og_meta_description)}}">
    {!! render_og_meta_image_by_attachment_id($success_story->og_meta_image) !!}
    <meta name="og:description" content=" {{purify_html($success_story->description)}}">
@endsection

@section('site-title')
    {{$success_story->title}}
@endsection
@section('page-title')
    {{$success_story->title}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$success_story->meta_tags}}">
    <meta name="tags" content="{{$success_story->meta_description}}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-event-details">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($success_story->image,'','large') !!}
                        </div>
                        <div class="content">
                            <div class="details-content-area mt-4">
                                {!! purify_html_raw($success_story->story_content )!!}
                            </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('success-story',['column' => false]) !!}
                    </div>
                </div>
        </div>
    </section>
@endsection
