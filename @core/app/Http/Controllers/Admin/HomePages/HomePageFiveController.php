<?php

namespace App\Http\Controllers\Admin\HomePages;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageFiveController extends Controller
{
    private const BASE_PATH = 'backend.pages.home.home-05.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function rise_area()
    {
        return view(self::BASE_PATH. 'rise-area');
    }

    public function update_rise_area(Request $request)
    {

        $this->validate($request, [
            'home_page_05_rise_area_heading_title' => 'nullable|string',
            'home_page_05_rise_area_button_text' => 'nullable|string',
        ]);

        $save_data = [
            'home_page_05_rise_area_heading_title',
            'home_page_05_rise_area_button_text',

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
            'home_page_05_feature_area_title' => 'required|string',
            'home_page_05_feature_area_subtitle' => 'required|string',
            'home_page_05_feature_area_donation_button_text' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_feature_area_title',
            'home_page_05_feature_area_subtitle',
            'home_page_05_feature_area_donation_button_text'
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function category_area()
    {
        return view( self::BASE_PATH.'category-area');
    }

    public function update_category_area(Request $request)
    {
        $this->validate($request, [
            'home_page_05_category_area_title' => 'required|string',
            'home_page_05_category_area_subtitle' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_category_area_title',
            'home_page_05_category_area_subtitle',
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
            'home_page_05_success_story_area_title' => 'required|string',
            'home_page_05_success_story_area_subtitle' => 'required|string',
            'home_page_05_success_story_area_button_text' => 'required|string',
            'home_page_05_success_story_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_success_story_area_title',
            'home_page_05_success_story_area_subtitle',
            'home_page_05_success_story_area_button_text',
            'home_page_05_success_story_area_item_show',
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
            'home_page_05_recent_causes_area_title' => 'required|string',
            'home_page_05_recent_causes_area_subtitle' => 'required|string',
            'home_page_05_recent_causes_area_see_all_button_text' => 'required|string',
            'home_page_05_recent_causes_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_recent_causes_area_title',
            'home_page_05_recent_causes_area_subtitle',
            'home_page_05_recent_causes_area_see_all_button_text',
            'home_page_05_recent_causes_area_item_show',
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
            'home_page_05_events_area_title' => 'required|string',
            'home_page_05_events_area_subtitle' => 'required|string',
            'home_page_05_events_area_left_image' => 'required|string',
            'home_page_05_events_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_events_area_title',
            'home_page_05_events_area_subtitle',
            'home_page_05_events_area_left_image',
            'home_page_05_events_area_item_show',
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
            'home_page_05_recent_blog_area_title' => 'required|string',
            'home_page_05_recent_blog_area_subtitle' => 'required|string',
            'home_page_05_recent_blog_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_05_recent_blog_area_title',
            'home_page_05_recent_blog_area_subtitle',
            'home_page_05_recent_blog_area_item_show',
        ];

        foreach ($field_list as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }





}
