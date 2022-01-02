@extends('backend.admin-master')
@section('site-title')
    {{__('Events Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Settings")}}</h4>
                        <form action="{{route('admin.events.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="disable_guest_mode_for_event_module"><strong>{{__('Enable/Disable Guest Mode')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_guest_mode_for_event_module"  @if(!empty(get_static_option('disable_guest_mode_for_event_module'))) checked @endif id="disable_guest_mode_for_event_module">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="event_page_button_text">{{__('Event Page Button Text')}}</label>
                                <input type="text" name="event_page_button_text"  class="form-control" value="{{get_static_option('event_page_button_text')}}" >
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="event_attendance_page_title">{{__('Attendance Page Title')}}</label>
                                <input type="text" name="event_attendance_page_title"  class="form-control" value="{{get_static_option('event_attendance_page_title')}}" id="event_attendance_page_title">
                            </div>
                            <div class="form-group">
                                <label for="event_attendance_page_form_button_title">{{__('Attendance Page Form Button Title')}}</label>
                                <input type="text" name="event_attendance_page_form_button_title"  class="form-control" value="{{get_static_option('event_attendance_page_form_button_title')}}" id="event_attendance_page_form_button_title">
                            </div>

                            <div class="form-group">
                                <label for="event_attendance_receiver_mail">{{__('Events Attendance Mail')}}</label>
                                <input type="text" name="event_attendance_receiver_mail"  class="form-control" value="{{get_static_option('event_attendance_receiver_mail')}}" id="event_attendance_receiver_mail">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="event_cancel_page_title">{{__('Payment Cancel Page Main Title')}}</label>
                                <input type="text" name="event_cancel_page_title"  class="form-control" value="{{get_static_option('event_cancel_page_title')}}" id="event_cancel_page_title">
                            </div>
                            <div class="form-group">
                                <label for="event_cancel_page_subtitle">{{__('Payment Cancel Page Subtitle')}}</label>
                                <input type="text" name="event_cancel_page_subtitle"  class="form-control" value="{{get_static_option('event_cancel_page_subtitle')}}" id="event_cancel_page_subtitle">
                                <small class="info-text">{{__('{evname} will be replaced by package name')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="event_cancel_page_description">{{__('Payment Cancel Page Description')}}</label>
                                <textarea name="event_cancel_page_description" class="form-control" id="event_cancel_page_description" cols="30" rows="5">{{get_static_option('event_cancel_page_description')}}</textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="event_success_page_title">{{__('Payment Success Page Main Title')}}</label>
                                <input type="text" name="event_success_page_title" class="form-control"
                                       value="{{get_static_option('event_success_page_title')}}"
                                       id="event_success_page_title">
                            </div>
                            <div class="form-group">
                                <label for="event_success_page_description">{{__('Payment Success Page Description')}}</label>
                                <textarea name="event_success_page_description" class="form-control"
                                          id="event_success_page_description" cols="30"
                                          rows="10">{{get_static_option('event_success_page_description')}}</textarea>
                            </div>
                            <hr>
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