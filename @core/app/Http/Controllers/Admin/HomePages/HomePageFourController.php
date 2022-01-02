<?php

namespace App\Http\Controllers\Admin\HomePages;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageFourController extends Controller
{
    private const BASE_PATH = 'backend.pages.home.home-04.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function header_area()
    {
        return view(self::BASE_PATH. 'header-area');
    }

    public function update_header_area(Request $request)
    {

        $this->validate($request, [
            'home_page_04_header_area_title' => 'nullable|string',
            'home_page_04_header_area_subtitle' => 'nullable|string',
            'home_page_04_donate_button_text' => 'nullable|string',
            'home_page_04_donate_button_text_url' => 'nullable|string|max:191',
            'home_page_04_right_side_heading' => 'nullable|string|max:191',
            'home_page_04_right_side_donate_button_text' => 'nullable|string|max:191',
            'home_page_04_header_area_line_image' => 'nullable|string|max:191',
            'home_page_04_header_area_bg_image' => 'nullable|string|max:191',

        ]);

        $save_data = [
            'home_page_04_header_area_title',
            'home_page_04_header_area_subtitle',
            'home_page_04_donate_button_text',
            'home_page_04_donate_button_text_url',
            'home_page_04_right_side_heading',
            'home_page_04_right_side_donate_button_text',
            'home_page_04_header_area_line_image',
            'home_page_04_header_area_bg_image',

        ];
        foreach ($save_data as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function feature_area()
    {
        return view( self::BASE_PATH.'feature-area');
    }

    public function update_feature_area(Request $request)
    {

        $this->validate($request, [
            'home_page_04_feature_area_title' => 'required|string',
            'home_page_04_feature_area_subtitle' => 'required|string',
            'home_page_04_feature_area_donation_button_text' => 'required|string',
        ]);

        $field_list = [
            'home_page_04_feature_area_title',
            'home_page_04_feature_area_subtitle',
            'home_page_04_feature_area_donation_button_text'
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function success_story_area()
    {
        return view( self::BASE_PATH.'success-story-area');
    }

    public function update_success_story_area(Request $request)
    {

        $this->validate($request, [
            'home_page_04_success_story_area_title' => 'required|string',
            'home_page_04_success_story_area_subtitle' => 'required|string',
            'home_page_04_success_story_area_button_text' => 'required|string',
            'home_page_04_success_story_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_04_success_story_area_title',
            'home_page_04_success_story_area_subtitle',
            'home_page_04_success_story_area_button_text',
            'home_page_04_success_story_area_item_show',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function about_us_area()
    {
        return view( self::BASE_PATH.'aboutus-area');
    }

    public function update_about_us_area(Request $request)
    {

        $this->validate($request, [
            'home_page_04_about_us_area_title' => 'required|string',
            'home_page_04_about_us_area_subtitle' => 'required|string',
            'home_page_04_about_us_area_description' => 'required|string',
            'home_page_04_about_us_area_button_text' => 'required|string',
            'home_page_04_about_us_area_button_url' => 'required|string',
        ]);

        $field_list = [
            'home_page_04_about_us_area_title',
            'home_page_04_about_us_area_subtitle',
            'home_page_04_about_us_area_description',
            'home_page_04_about_us_area_button_text',
            'home_page_04_about_us_area_button_url',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function events_area()
    {
        return view( self::BASE_PATH.'events-area');
    }

    public function update_events_area(Request $request)
    {

        $this->validate($request, [
            'home_page_04_events_area_title' => 'required|string',
            'home_page_04_events_area_subtitle' => 'required|string',
            'home_page_04_events_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_04_events_area_title',
            'home_page_04_events_area_subtitle',
            'home_page_04_events_area_item_show',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function recent_causes_area()
    {
        return view( self::BASE_PATH.'recent-causes-area');
    }

    public function update_recent_causes_area(Request $request)
    {
        $this->validate($request, [
            'home_page_04_recent_causes_area_title' => 'required|string',
            'home_page_04_recent_causes_area_subtitle' => 'required|string',
            'home_page_04_recent_causes_area_button_text' => 'required|string',
            'home_page_04_recent_causes_area_see_all_button_text' => 'required|string',
            'home_page_04_recent_causes_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_04_recent_causes_area_title',
            'home_page_04_recent_causes_area_subtitle',
            'home_page_04_recent_causes_area_button_text',
            'home_page_04_recent_causes_area_see_all_button_text',
            'home_page_04_recent_causes_area_item_show',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function recent_blog_area()
    {
        return view( self::BASE_PATH.'recent-blog-area');
    }

    public function update_recent_blog_area(Request $request)
    {
        $this->validate($request, [
            'home_page_04_recent_blog_area_title' => 'required|string',
            'home_page_04_recent_blog_area_subtitle' => 'required|string',
            'home_page_04_recent_blog_area_item_show' => 'required|string',
        ]);
        $field_list = [
            'home_page_04_recent_blog_area_title',
            'home_page_04_recent_blog_area_subtitle',
            'home_page_04_recent_blog_area_item_show',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }


}
