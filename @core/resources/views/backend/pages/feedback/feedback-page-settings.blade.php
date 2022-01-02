@extends('backend.admin-master')
@section('site-title')
    {{__('Feedback Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Feedback Page Settings")}}</h4>
                        <form action="{{route('admin.feedback.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="feedback_page_form_form_title">{{__('Form Title')}}</label>
                                <input type="text" name="feedback_page_form_form_title"  class="form-control" value="{{get_static_option('feedback_page_form_form_title')}}" id="feedback_page_form_form_title">
                            </div>
                            <div class="form-group">
                                <label for="feedback_page_form_name_label">{{__('Name Label')}}</label>
                                <input type="text" name="feedback_page_form_name_label"  class="form-control" value="{{get_static_option('feedback_page_form_name_label')}}" id="feedback_page_form_name_label">
                            </div>
                            <div class="form-group">
                                <label for="feedback_page_form_email_label">{{__('Email Label')}}</label>
                                <input type="text" name="feedback_page_form_email_label"  class="form-control" value="{{get_static_option('feedback_page_form_email_label')}}" id="feedback_page_form_email_label">
                            </div>
                            <div class="form-group">
                                <label for="feedback_page_form_ratings_label">{{__('Ratings Label')}}</label>
                                <input type="text" name="feedback_page_form_ratings_label"  class="form-control" value="{{get_static_option('feedback_page_form_ratings_label')}}" id="feedback_page_form_ratings_label">
                            </div>
                            <div class="form-group">
                                <label for="feedback_page_form_description_label">{{__('Description Label')}}</label>
                                <input type="text" name="feedback_page_form_description_label"  class="form-control" value="{{get_static_option('feedback_page_form_description_label')}}" id="feedback_page_form_description_label">
                            </div>
                            <div class="form-group">
                                <label for="feedback_page_form_button_text">{{__('Button Text')}}</label>
                                <input type="text" name="feedback_page_form_button_text"  class="form-control" value="{{get_static_option('feedback_page_form_button_text')}}" id="feedback_page_form_button_text">
                            </div>

                            <div class="form-group">
                                <label for="feedback_notify_mail">{{__('Feedback Notify Email')}}</label>
                                <input type="text" name="feedback_notify_mail"  class="form-control" value="{{get_static_option('feedback_notify_mail')}}" id="feedback_notify_mail">
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
        <x-btn.update/>
    </script>
@endsection

