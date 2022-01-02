@if(get_static_option('home_page_navbar_button_status'))
    @php
        $button_url =  !empty(filter_static_option_value('home_page_navbar_button_url',$global_static_field_data)) ? filter_static_option_value('home_page_navbar_button_url',$global_static_field_data) : route('frontend.campaign.user');
    @endphp
    <li id="donate"><a href="{{$button_url}}">{{filter_static_option_value('home_page_navbar_button_title',$global_static_field_data)}}</a></li>
@endif