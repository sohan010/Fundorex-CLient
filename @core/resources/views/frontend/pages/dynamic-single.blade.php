@extends('frontend.frontend-page-master')
@section('page-meta-data')
<meta name="description" content="{{$page_post->meta_description}}">
<meta name="tags" content="{{$page_post->meta_tags}}">
@endsection

@section('site-title')
    {{$page_post->title}}
@endsection

@section('page-title')
    {{$page_post->title}}
@endsection

@section('og-meta')
    <meta name="og:title" content="{{$page_post->og_meta_title}}">
    <meta name="og:description" content="{{$page_post->og_meta_description}}">
    {!! render_og_meta_image_by_attachment_id($page_post->og_meta_image) !!}
@endsection

@section('content')
    <section class="dynamic-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(!auth()->guard('web')->check() && $page_post->visibility === 'everyone')
                        <div class="dynamic-page-content-wrap">
                            {!! $page_post->page_content !!}
                        </div>
                    @elseif(auth()->guard('web')->check())
                     <div class="dynamic-page-content-wrap">
                        {!! $page_post->page_content !!}
                    </div>
                    @else
                        <div class="alert alert-warning">
                            <p><a class="text-primary" href="{{route('user.login')}}">{{__('login')}}</a> {{__(' to see this page')}} </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
