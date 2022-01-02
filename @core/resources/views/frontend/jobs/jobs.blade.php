@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('career_with_us_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('career_with_us_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('career_with_us_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('career_with_us_page_meta_tags')}}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @forelse($all_jobs as $data)
                            <div class="col-lg-12">
                                <div class="single-job-list-item">
                                    <span class="job_type"><i class="far fa-clock"></i> {{__(str_replace('_',' ',$data->employment_status))}}</span>
                                    <a href="{{route('frontend.jobs.single',$data->slug)}}"><h3 class="title">{{$data->title}}</h3></a>
                                    <span class="company_name"><strong>{{__('Company:')}}</strong> {{$data->company_name}}</span>
                                    <span class="deadline"><strong>{{__('Deadline:')}}</strong> {{date("d M Y", strtotime($data->deadline))}}</span>
                                    <ul class="jobs-meta">
                                        <li><i class="fas fa-briefcase"></i> {{$data->position}}</li>
                                        <li><i class="fas fa-wallet"></i> {{$data->salary}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i> {{$data->job_location}}</li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-warning d-block">{{__('No Job Posts Found')}}</div>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-lg-12 text-center">
                        <nav class="pagination-wrapper " aria-label="Page navigation ">
                            {{$all_jobs->links()}}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        {!! render_frontend_sidebar('job',['column' => false]) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
