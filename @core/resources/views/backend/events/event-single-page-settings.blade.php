@extends('backend.admin-master')
@section('site-title')
    {{__('Events Single Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Events Single Page Settings")}}</h4>
                        <form action="{{route('admin.events.single.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                                        <div class="form-group">
                                            <label for="event_single_event_info_title">{{__('Event Info Title')}}</label>
                                            <input type="text" name="event_single_event_info_title"  class="form-control" value="{{get_static_option('event_single_event_info_title')}}" id="event_single_event_info_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_date_title">{{__('Date Title')}}</label>
                                            <input type="text" name="event_single_date_title"  class="form-control" value="{{get_static_option('event_single_date_title')}}" id="event_single_date_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_time_title">{{__('Time Title')}}</label>
                                            <input type="text" name="event_single_time_title"  class="form-control" value="{{get_static_option('event_single_time_title')}}" id="event_single_time_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_cost_title">{{__('Cost Title')}}</label>
                                            <input type="text" name="event_single_cost_title"  class="form-control" value="{{get_static_option('event_single_cost_title')}}" id="event_single_cost_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_category_title">{{__('Category Title')}}</label>
                                            <input type="text" name="event_single_category_title"  class="form-control" value="{{get_static_option('event_single_category_title')}}" id="event_single_category_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_organizer_title">{{__('Event Organizer Title')}}</label>
                                            <input type="text" name="event_single_organizer_title"  class="form-control" value="{{get_static_option('event_single_organizer_title')}}" id="event_single_organizer_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_organizer_name_title">{{__('Organizer Name Title')}}</label>
                                            <input type="text" name="event_single_organizer_name_title"  class="form-control" value="{{get_static_option('event_single_organizer_name_title')}}" id="event_single_organizer_name_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_organizer_email_title">{{__('Organizer Email Title')}}</label>
                                            <input type="text" name="event_single_organizer_email_title"  class="form-control" value="{{get_static_option('event_single_organizer_email_title')}}" id="event_single_organizer_email_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_organizer_phone_title">{{__('Organizer Phone Title')}}</label>
                                            <input type="text" name="event_single_organizer_phone_title"  class="form-control" value="{{get_static_option('event_single_organizer_phone_title')}}" id="event_single_organizer_phone_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_organizer_website_title">{{__('Organizer Website Title')}}</label>
                                            <input type="text" name="event_single_organizer_website_title"  class="form-control" value="{{get_static_option('event_single_organizer_website_title')}}" id="event_single_organizer_website_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_venue_title">{{__('Event Venue Title')}}</label>
                                            <input type="text" name="event_single_venue_title"  class="form-control" value="{{get_static_option('event_single_venue_title')}}" id="event_single_venue_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_venue_name_title">{{__('Venue Name Title')}}</label>
                                            <input type="text" name="event_single_venue_name_title"  class="form-control" value="{{get_static_option('event_single_venue_name_title')}}" id="event_single_venue_name_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_venue_location_title">{{__('Venue Location Title')}}</label>
                                            <input type="text" name="event_single_venue_location_title"  class="form-control" value="{{get_static_option('event_single_venue_location_title')}}" id="event_single_venue_location_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_venue_phone_title">{{__('Venue Phone Title')}}</label>
                                            <input type="text" name="event_single_venue_phone_title"  class="form-control" value="{{get_static_option('event_single_venue_phone_title')}}" id="event_single_venue_phone_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_reserve_button_title">{{__('Reserve Seat Button Text')}}</label>
                                            <input type="text" name="event_single_reserve_button_title"  class="form-control" value="{{get_static_option('event_single_reserve_button_title')}}" id="event_single_reserve_button_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_available_ticket_text">{{__('Available Ticket Text')}}</label>
                                            <input type="text" name="event_single_available_ticket_text"  class="form-control" value="{{get_static_option('event_single_available_ticket_text')}}" id="event_single_available_ticket_text">
                                        </div>
                                        <div class="form-group">
                                            <label for="event_single_event_expire_text">{{__('Event Expire Text')}}</label>
                                            <input type="text" name="event_single_event_expire_text"  class="form-control" value="{{get_static_option('event_single_event_expire_text')}}" id="event_single_event_expire_text">
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
