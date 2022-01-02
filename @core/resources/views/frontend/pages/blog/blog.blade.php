@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('blog_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('blog_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('blog_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('blog_page_meta_tags')}}">
@endsection
@section('content')
    <section class="blog-content-area our-attoryney padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach($all_blogs as $data)
                        <x-frontend.blog.list01
                        :image="$data->image"
                        :date="$data->created_at"
                        :title="$data->title"
                        :slug="$data->slug"
                        :author="$data->author"
                        :catid="$data->blog_categories_id"
                        :content="$data->blog_content">
                        </x-frontend.blog.list01>
                    @endforeach
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                       {{$all_blogs->links()}}
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('blog',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
