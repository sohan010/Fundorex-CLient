<?php

namespace App\Http\Controllers\Admin\HomePages;

use App\Cause;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageSixController extends Controller
{
    private const BASE_PATH = 'backend.pages.home.home-06.';

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function header_area()
    {
        $all_donations = Cause::where(['status'=>'publish'])->get();
        return view(self::BASE_PATH. 'header-area',compact('all_donations'));
    }

    public function update_header_area(Request $request)
    {
        $this->validate($request,[
            'home_page_06_header_area_title' => 'nullable|array',
            'home_page_06_header_area_subtitle' => 'nullable|array',
            'home_page_06_header_area_donate_button_title' => 'nullable|array',
            'home_page_06_header_area_donate_button_url' => 'nullable|array',
            'home_page_06_header_area_read_more_button_title' => 'nullable|array',
            'home_page_06_header_area_read_more_button_url' => 'nullable|array',
            'home_page_06_header_area_donation' => 'nullable|array',
            'home_page_06_header_area_image' => 'required|array',
            'home_page_06_header_area_image.*' => 'required|string',
            'home_page_06_header_area_bg_image' => 'required|string',
        ]);

        //save repeater values
        $all_fields = [
            'home_page_06_header_area_title',
            'home_page_06_header_area_subtitle',
            'home_page_06_header_area_donate_button_title',
            'home_page_06_header_area_donate_button_url',
            'home_page_06_header_area_read_more_button_title',
            'home_page_06_header_area_read_more_button_url',
            'home_page_06_header_area_image',
            'home_page_06_header_area_donation',
        ];
        foreach ($all_fields as $field){
            $value = $request->$field ?? [];
            update_static_option($field,serialize($value));
        }

        $bg_img = 'home_page_06_header_area_bg_image';
        update_static_option($bg_img,$request->$bg_img);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function rise_area()
    {
        return view(self::BASE_PATH. 'rise-area');
    }

    public function update_rise_area(Request $request)
    {

        $this->validate($request, [
            'home_page_06_rise_area_heading_title' => 'nullable|string',
            'home_page_06_rise_area_button_text' => 'nullable|string',
        ]);

        $save_data = [
            'home_page_06_rise_area_heading_title',
            'home_page_06_rise_area_button_text',

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
        return view(self::BASE_PATH. 'feature-area');
    }

    public function update_feature_area(Request $request)
    {

        $this->validate($request, [
            'home_page_06_feature_area_title' => 'nullable|string',
            'home_page_06_feature_area_donation_button_text' => 'nullable|string',
        ]);

        $save_data = [
            'home_page_06_feature_area_title',
            'home_page_06_feature_area_donation_button_text',
        ];
        foreach ($save_data as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function category_area()
    {
        return view(self::BASE_PATH. 'category-area');
    }

    public function update_category_area(Request $request)
    {

        $this->validate($request, [
            'home_page_06_category_area_title' => 'nullable|string',
        ]);

        $save_data = [
            'home_page_06_category_area_title',
        ];
        foreach ($save_data as $item) {
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
            'home_page_06_recent_causes_area_title' => 'required|string',
            'home_page_06_recent_causes_area_button_text' => 'required|string',
            'home_page_06_recent_causes_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_06_recent_causes_area_title',
            'home_page_06_recent_causes_area_button_text',
            'home_page_06_recent_causes_area_item_show',
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
            'home_page_06_success_story_area_button_text' => 'required|string',
            'home_page_06_success_story_area_item_show' => 'required|string',
        ]);

        $field_list = [
            'home_page_06_success_story_area_button_text',
            'home_page_06_success_story_area_item_show',
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
            'home_page_06_about_us_area_title' => 'required|string',
            'home_page_06_about_us_area_description' => 'required|string',
            'home_page_06_about_us_area_button_text' => 'required|string',
            'home_page_06_about_us_area_button_url' => 'required|string',
        ]);

        $field_list = [
            'home_page_06_about_us_area_title',
            'home_page_06_about_us_area_description',
            'home_page_06_about_us_area_button_text',
            'home_page_06_about_us_area_button_url',
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
        return view(self::BASE_PATH. 'events-area');
    }

    public function update_events_area(Request $request)
    {

        $this->validate($request, [
            'home_page_06_events_area_title' => 'nullable|string',
            'home_page_06_events_area_item_show' => 'nullable|string',
        ]);

        $save_data = [
            'home_page_06_events_area_title',
            'home_page_06_events_area_item_show',
        ];
        foreach ($save_data as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }





}
