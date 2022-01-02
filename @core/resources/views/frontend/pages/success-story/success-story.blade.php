@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('success_story_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('success_story_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('success_story_page_name_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('success_story_page_name_page_meta_tags')}}">
@endsection

@section('content')

    <section class="success-area padding-top-140 padding-bottom-140">
        <div class="success-icon-shapes">
            <img src="{{asset('assets/frontend/img/success/success-icon-s.png')}}" alt="">
        </div>
        <div class="container">

            <div class="row ">
                <div class="col-lg-8">
                        @foreach($all_success_stories as $key=> $data)
                            <div class="single-success-items success-page">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <div class="success-contents-all">
                                            <div class="single-success-images">
                                                <div class="success-thums success-thums-two margin-bottom-30">
                                                    {!! render_image_markup_by_attachment_id($data->image) !!}
                                                </div>
                                            </div>
                                            <div class="single-success-contents">
                                                <div class="success-contents margin-bottom-30">
                                                    <a href=""><h4 class="success-titles"> {{$data->title ?? ''}}</h4></a>

                                                    <p>{{purify_html($data->excerpt) }}</p>
                                                    @php
                                                        $classes = ['reverse-color','btn-color-three','btn-dander','btn-color-three'];
                                                    @endphp

                                                    <div class="btn-wrapper">
                                                        <a href="{{route('frontend.success.story.single',$data->slug)}}" class="boxed-btn {{$classes[$key % count($classes)]}}"> {!! get_static_option('home_page_04_success_story_area_button_text') !!}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                        {{$all_success_stories->links()}}
                    </nav>

                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('success-story',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection