@extends('backend.admin-master')
@section('site-title')
    {{__('Job Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Job Settings")}}</h4>
                        <form action="{{route('admin.jobs.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="job_success_page_title">{{__('Success Page Main Title')}}</label>
                                <input type="text" name="job_success_page_title"  class="form-control" value="{{get_static_option('job_success_page_title')}}" id="job_success_page_title">
                            </div>
                            <div class="form-group">
                                <label for="job_success_page_description">{{__('Success Page  Description')}}</label>
                                <textarea name="job_success_page_description" class="form-control" id="job_success_page_description" cols="30" rows="5">{{get_static_option('job_success_page_description')}}</textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="job_cancel_page_title">{{__('Cancel Page Main Title')}}</label>
                                <input type="text" name="job_cancel_page_title"  class="form-control" value="{{get_static_option('job_cancel_page_title')}}" id="job_cancel_page_title">
                            </div>
                            <div class="form-group">
                                <label for="job_cancel_page_description">{{__('Cancel Page Description')}}</label>
                                <textarea name="job_cancel_page_description" class="form-control" id="job_cancel_page_description" cols="30" rows="5">{{get_static_option('job_cancel_page_description')}}</textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="site_job_post_items">{{__('Jobs Page Items')}}</label>
                                <input type="number" name="site_job_post_items" class="form-control" value="{{get_static_option('site_job_post_items')}}">
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="job_single_page_job_context_label">{{__('Job Context Label')}}</label>
                                <input type="text" name="job_single_page_job_context_label"  class="form-control" value="{{get_static_option('job_single_page_job_context_label')}}" id="job_single_page_job_context_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_responsibility_label">{{__('Job Responsibility Label')}}</label>
                                <input type="text" name="job_single_page_job_responsibility_label"  class="form-control" value="{{get_static_option('job_single_page_job_responsibility_label')}}" id="job_single_page_job_responsibility_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_education_requirement_label">{{__('Education Requirement Label')}}</label>
                                <input type="text" name="job_single_page_education_requirement_label"  class="form-control" value="{{get_static_option('job_single_page_education_requirement_label')}}" id="job_single_page_education_requirement_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_experience_requirement_label">{{__('Experience Requirement Label')}}</label>
                                <input type="text" name="job_single_page_experience_requirement_label"  class="form-control" value="{{get_static_option('job_single_page_experience_requirement_label')}}" id="job_single_page_experience_requirement_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_additional_requirement_label">{{__('Additional Requirement Label')}}</label>
                                <input type="text" name="job_single_page_additional_requirement_label"  class="form-control" value="{{get_static_option('job_single_page_additional_requirement_label')}}" id="job_single_page_additional_requirement_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_others_benefits_label">{{__('Others Benefits Label')}}</label>
                                <input type="text" name="job_single_page_others_benefits_label"  class="form-control" value="{{get_static_option('job_single_page_others_benefits_label')}}" id="job_single_page_others_benefits_label">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_apply_button_text">{{__('Job Apply Button Text')}}</label>
                                <input type="text" name="job_single_page_apply_button_text"  class="form-control" value="{{get_static_option('job_single_page_apply_button_text')}}" id="job_single_page_apply_button_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_info_text">{{__('Job Information Text')}}</label>
                                <input type="text" name="job_single_page_job_info_text"  class="form-control" value="{{get_static_option('job_single_page_job_info_text')}}" id="job_single_page_job_info_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_company_name_text">{{__('Company Name Text')}}</label>
                                <input type="text" name="job_single_page_company_name_text"  class="form-control" value="{{get_static_option('job_single_page_company_name_text')}}" id="job_single_page_company_name_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_category_text">{{__('Job Category Text')}}</label>
                                <input type="text" name="job_single_page_job_category_text"  class="form-control" value="{{get_static_option('job_single_page_job_category_text')}}" id="job_single_page_job_category_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_position_text">{{__('Job Position Text')}}</label>
                                <input type="text" name="job_single_page_job_position_text"  class="form-control" value="{{get_static_option('job_single_page_job_position_text')}}" id="job_single_page_job_position_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_type_text">{{__('Job Type Text')}}</label>
                                <input type="text" name="job_single_page_job_type_text"  class="form-control" value="{{get_static_option('job_single_page_job_type_text')}}" id="job_single_page_job_type_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_salary_text">{{__('Salary Text')}}</label>
                                <input type="text" name="job_single_page_salary_text"  class="form-control" value="{{get_static_option('job_single_page_salary_text')}}" id="job_single_page_salary_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_location_text">{{__('Job Location Text')}}</label>
                                <input type="text" name="job_single_page_job_location_text"  class="form-control" value="{{get_static_option('job_single_page_job_location_text')}}" id="job_single_page_job_location_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_deadline_text">{{__('Deadline Text')}}</label>
                                <input type="text" name="job_single_page_job_deadline_text"  class="form-control" value="{{get_static_option('job_single_page_job_deadline_text')}}" id="job_single_page_job_deadline_text">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_job_application_fee_text">{{__('Application Fee Text')}}</label>
                                <input type="text" name="job_single_page_job_application_fee_text"  class="form-control" value="{{get_static_option('job_single_page_job_application_fee_text')}}">
                            </div>

                            <div class="form-group">
                                <label for="job_single_page_applicant_mail">{{__('Job Application Receiving Mail')}}</label>
                                <input type="text" name="job_single_page_applicant_mail"  class="form-control" value="{{get_static_option('job_single_page_applicant_mail')}}" id="job_single_page_applicant_mail">
                            </div>
                            <div class="form-group">
                                <label for="job_single_page_apply_form"><strong>{{__('Apply Page Enable/Disable')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="job_single_page_apply_form"  @if(!empty(get_static_option('job_single_page_apply_form'))) checked @endif id="job_single_page_apply_form">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function($){
            "use strict";
            <x-btn.update/>
        })(jQuery);
    </script>
@endsection