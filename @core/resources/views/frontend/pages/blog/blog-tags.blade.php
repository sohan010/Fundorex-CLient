@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Tags:')}} {{' '.$tag_name}}
@endsection
@section('site-title')
    {{__('Tags:')}} {{' '.$tag_name}}
@endsection
@section('content')
    <section class="blog-content-area padding-120 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @forelse($all_blogs as $data)
                        <x-frontend.blog.list01
                                :image="$data->image"
                                :date="$data->created_at"
                                :title="$data->title"
                                :slug="$data->slug"
                                :author="$data->author"
                                :catid="$data->blog_categories_id"
                                :content="$data->blog_content">
                        </x-frontend.blog.list01>
                    @empty
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                {{__('No Post Available In').' '.$tag_name.__(' Tags')}}
                            </div>
                        </div>
                    @endforelse
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
