@extends('frontend.frontend-page-master')
@section('site-title')
    {{$job->title}}
@endsection
@section('page-title')
    {{$job->title}}
@endsection
@section('meta-tags')
    <meta name="description" content="{{$job->meta_description}}">
    <meta name="tags" content="{{$job->meta_tags}}">
@endsection
@section('og-meta')
    <meta property="og:url"  content="{{route('frontend.jobs.single',$job->slug)}}" />
    <meta property="og:type"  content="job" />
    <meta property="og:title"  content="{{$job->title}}" />
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-job-details">
                        <ul class="job-meta-list">
                            @if(!empty($job->job_context))
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title"> {{get_static_option('job_single_page_job_context_label')}}</h4>
                                    <p>{!! $job->job_context !!}</p>
                                </div>
                            </li>
                            @endif
                            @if(!empty($job->job_responsibility))
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title">{{get_static_option('job_single_page_job_responsibility_label')}}</h4>
                                    <p>{!! $job->job_responsibility !!}</p>
                                </div>
                            </li>
                            @endif
                            @if(!empty($job->education_requirement))
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title">  {{get_static_option('job_single_page_education_requirement_label')}}</h4>
                                        <p>{!! $job->education_requirement !!}</p>
                                    </div>
                                </li>
                            @endif
                            @if(!empty($job->experience_requirement))
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title"> {{get_static_option('job_single_page_experience_requirement_label')}}</h4>
                                        <p>{!! $job->experience_requirement !!}</p>
                                    </div>
                                </li>
                            @endif
                            @if(!empty($job->additional_requirement))
                            <li>
                                <div class="single-job-meta-block">
                                    <h4 class="title"> {{get_static_option('job_single_page_additional_requirement_label')}}</h4>
                                    <p>{!! $job->additional_requirement !!}</p>
                                </div>
                            </li>
                            @endif
                            @if(!empty($job->other_benefits))
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title">{{get_static_option('job_single_page_others_benefits_label')}}</h4>
                                        <p>{!! $job->other_benefits !!}</p>
                                    </div>
                                </li>
                            @endif
                            @if(!empty($job->application_fee_status) && $job->application_fee > 0)
                                <li>
                                    <div class="single-job-meta-block">
                                        <h4 class="title">{{get_static_option('job_single_page_job_application_fee_text')}}</h4>
                                        <p>{{amount_with_currency_symbol($job->application_fee )}}</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="apply-procedure">
                             @if(date('Y-m-d') >= $job->deadline )
                                <div class="alert alert-danger margin-top-30">{{__('Dead Line Expired')}}</div>
                            @else
                                @if(!empty(get_static_option('job_single_page_apply_form')))
                                    <div class="btn-wrapper">
                                        <a class="boxed-btn reverse-color margin-top-30" href="{{route('frontend.jobs.apply',$job->id)}}">{{get_static_option('job_single_page_apply_button_text')}}</a>
                                    </div>
                                @else
                                    <p>{{get_static_option('job_single_page_apply_button_text')}}: <span>{{$job->email}}</span></p>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                            <div class="widget job_information">
                                <h2 class="widget-title">{{get_static_option('job_single_page_job_info_text')}}</h2>
                                <ul class="job-information-list">
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_company_name_text')}}</h4>
                                                <span class="details">{{$job->company_name}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_job_category_text')}}</h4>
                                                <span class="details">{!! get_jobs_category_by_id($job->category_id,'link') !!}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_job_position_text')}}</h4>
                                                <span class="details">{{$job->position}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-folder"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_job_type_text')}}</h4>
                                                <span class="details">{{str_replace('_',' ',$job->employment_status)}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-wallet"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_salary_text')}}</h4>
                                                <span class="details">{{$job->salary}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_job_location_text')}}</h4>
                                                <span class="details">{{$job->job_location}}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-job-info">
                                            <div class="icon">
                                                <i class="far fa-calendar-alt"></i>
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{get_static_option('job_single_page_job_deadline_text')}}</h4>
                                                <span class="details">{{date('d M Y',strtotime($job->deadline))}}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection