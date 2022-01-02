@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Category:')}} {{' '.$category_name}}
@endsection
@section('site-title')
    {{__('Category:')}} {{' '.$category_name}}
@endsection

@section('content')

    <section class="blog-content-area padding-top-100 padding-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                        @forelse($all_success_stories as $data)
                            <div class="col-lg-12">
                                <div class="contribute-single-item">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <a href="{{route('frontend.success.story.single',$data->slug)}}">{{$data->title ?? ''}}</a>
                                        </h3>
                                        <div class="excpert">
                                            {{ purify_html($data->excerpt) }}
                                        </div>
                                        <div class="btn-wrapper margin-top-30">
                                            <a href="{{route('frontend.success.story.single',$data->slug)}}" class="boxed-btn">{{ get_static_option('success_story_page_button_text') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="alert alert-danger">
                                {{__('No Post Available In ').$category_name.__(' Category')}}
                            </div>
                        @endforelse
                    <div class="pagination-wrapper" aria-label="Page navigation">
                       {{$all_success_stories->links()}}
                    </div>
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
