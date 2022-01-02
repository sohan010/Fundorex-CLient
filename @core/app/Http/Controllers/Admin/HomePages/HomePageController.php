<?php

namespace App\Http\Controllers\Admin\HomePages;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomePageController extends Controller
{
    public $base_path;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-settings-home-page-manage');
        $this->base_path = 'backend.pages.home.home-01.';
    }

    public function home_01_about_us()
    {
        return view($this->base_path . 'about-us');
    }

    public function home_01_update_about_us(Request $request)
    {

        $this->validate($request, [
            'home_page_01_about_us_title' => 'nullable|string',
            'home_page_01_about_us_subtitle' => 'nullable|string',
            'home_page_01_about_us_donation_text' => 'nullable|string',
            'home_page_02_about_us_donation_text' => 'nullable|string',
            'home_page_01_about_us_description' => 'nullable|string',
            'home_page_01_about_us_lists' => 'nullable|string',
            'home_page_02_about_us_short_description' => 'nullable|string',

            'home_page_01_about_us_total_donation' => 'nullable|string|max:191',
            'home_page_01_about_us_right_image' => 'nullable|string|max:191',
            'home_page_02_about_us_left_image' => 'nullable|string|max:191',
            'home_page_02_about_us_icon' => 'nullable|string|max:191',
            'home_page_02_about_us_right_bottom_image' => 'nullable|string|max:191',
            'home_page_03_about_us_right_image' => 'nullable|string|max:191',
        ]);

        $save_data = [
            'home_page_01_about_us_title',
            'home_page_01_about_us_subtitle',
            'home_page_02_about_us_donation_text',
            'home_page_01_about_us_donation_text',
            'home_page_01_about_us_description',
            'home_page_01_about_us_lists',
            'home_page_02_about_us_short_description',

            'home_page_01_about_us_total_donation',
            'home_page_01_about_us_right_image',
            'home_page_02_about_us_left_image',
            'home_page_02_about_us_right_bottom_image',
            'home_page_03_about_us_right_image',
            'home_page_02_about_us_icon',
        ];
        foreach ($save_data as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function home_01_testimonial()
    {
        $all_languages =  Language::orderBy('default','desc')->get();
        return view($this->base_path . 'testimonial')->with(['all_languages' => $all_languages]);
    }
    public function home_02_counterup_area()
    {
        return view($this->base_path . 'counterup');
    }
    public function home_02_update_counterup_area(Request $request)
    {
        $this->validate($request,[
            'home_page_02_coutnerup_background_image' => 'required|string'
        ]);
        update_static_option('home_page_02_coutnerup_background_image', $request->home_page_02_coutnerup_background_image);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_update_testimonial(Request $request)
    {
            $this->validate($request, [
                'home_page_01_testimonial_section_title' => 'nullable|string',
                'home_page_01_testimonial_section_subtitle' => 'nullable|string',
            ]);

            $fields = [
                'home_page_01_testimonial_section_title',
                'home_page_01_testimonial_section_subtitle'
            ];
            foreach ($fields as $field){
                if ($request->has($field)){
                    update_static_option($field, $request->$field);
                }
            }

        update_static_option('home_01_testimonial_bg', $request->home_01_testimonial_bg);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_latest_news()
    {
        return view($this->base_path . 'latest-news');
    }

    public function home_01_update_latest_news(Request $request)
    {
        $this->validate($request, [
            'home_page_01_latest_news_items' => 'required'
        ], [
            'home_page_01_latest_news_items.required' => __('total item field is required')
        ]);

            $this->validate($request, [
                'home_page_01_latest_news_title' => 'nullable|string',
                'home_page_01_latest_news_subtitle' => 'nullable|string',
            ]);
            $fields = [
                'home_page_01_latest_news_title',
                'home_page_01_latest_news_subtitle'
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }

        update_static_option('home_page_01_latest_news_items', $request->home_page_01_latest_news_items);
        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function home_01_feature_area()
    {
        return view($this->base_path . 'feature-area');
    }

    public function home_01_update_feature_area(Request $request)
    {

            $this->validate($request, [
                'homepage_01_feature_section_icon' => 'required|array',
                'homepage_01_feature_section_icon.*' => 'required|string',
                'homepage_01_feature_section_url' => 'required|array',
                'homepage_01_feature_section_url.*' => 'required|string',
                'homepage_01_feature_section_title' => 'required|array',
                'homepage_01_feature_section_title.*' => 'required|string',
                'homepage_01_feature_section_description' => 'required|array',
                'homepage_01_feature_section_description.*' => 'required|string',
            ]);

            $field_list = [
                'homepage_01_feature_section_icon',
                'homepage_01_feature_section_url',
                'homepage_01_feature_section_title',
                'homepage_01_feature_section_description'
            ];

            foreach ($field_list as $field) {
                $value = $request->$field ?? [];
                update_static_option($field, serialize($value));
            }


        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_featured_cause_area()
    {
        return view($this->base_path . 'featured-cause-area');
    }

    public function home_01_donation_category_area()
    {
        return view($this->base_path . 'donation-category');
    }

    public function home_01_update_featured_cause_area(Request $request)
    {

            $this->validate($request, [
                'home_page_01_featured_cause_area_subtitle' => 'nullable|string',
                'home_page_01_featured_cause_area_title' => 'nullable|string',
                'home_page_01_featured_cause_area_button_text' => 'nullable|string',
            ]);

            $fields = [
                'home_page_01_featured_cause_area_subtitle',
                'home_page_01_featured_cause_area_title',
                'home_page_01_featured_cause_area_button_text',
            ];

            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }


        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_update_donation_category_area(Request $request)
    {

            $this->validate($request, [
                'home_page_01_donation_category_subtitle' => 'nullable|string',
                'home_page_01_donation_category_title' => 'nullable|string',
            ]);

            $fields = [
                'home_page_01_donation_category_subtitle',
                'home_page_01_donation_category_title',
            ];

            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }


        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_case_study_area()
    {
        return view($this->base_path . 'case-study');
    }

    public function home_01_update_case_study_area(Request $request)
    {
        $this->validate($request, [
            'home_page_01_case_study_items' => 'nullable|string',
            'home_page_02_case_study_background_image' => 'nullable|string'
        ]);
        $all_language =  Language::orderBy('default','desc')->get();
        foreach ($all_language as $lang) {
            $this->validate($request, [
                'home_page_01_' . $lang->slug . '_case_study_title' => 'nullable|string',
                'home_page_01_' . $lang->slug . '_case_study_description' => 'nullable|string',
            ]);
            $field_name = 'home_page_01_' . $lang->slug . '_case_study_title';
            $field_name_two = 'home_page_01_' . $lang->slug . '_case_study_description';
            update_static_option($field_name, $request->$field_name);
            update_static_option($field_name_two, $request->$field_name_two);
        }

        update_static_option('home_page_01_case_study_items', $request->home_page_01_case_study_items);
        update_static_option('home_page_02_case_study_background_image', $request->home_page_02_case_study_background_image);

        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function home_01_latest_event()
    {
        return view($this->base_path . 'event-area');
    }

    public function home_01_update_latest_event(Request $request)
    {
            $this->validate($request, [
                'home_page_01_latest_event_subtitle' => 'nullable|string',
                'home_page_01_latest_event_title' => 'nullable|string',
                'home_page_01_latest_event_button_text' => 'nullable|string',
                'home_page_01_latest_event_items' => 'nullable|string',
            ]);

            $fields = [
                'home_page_01_latest_event_subtitle',
                'home_page_01_latest_event_button_text',
                'home_page_01_latest_event_title'
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }


        update_static_option('home_page_01_latest_event_items', $request->home_page_01_latest_event_items);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_02_03_section_manage()
    {
        return view('backend.pages.section-manage-home-01-02-03.section-manage');
    }

    public function update_home_01_02_03_section_manage(Request $request)
    {
        $this->validate($request, [
            'home_page_header_slider_section_status' => 'nullable|string',
            'home_page_key_feature_section_status' => 'nullable|string',
            'home_page_what_we_do_section_status' => 'nullable|string',
            'home_page_about_us_section_status' => 'nullable|string',
            'home_page_cause_category_section_status' => 'nullable|string',
            'home_page_feature_cause_section_status' => 'nullable|string',
            'home_page_video_section_status' => 'nullable|string',
            'home_page_recent_cause_section_status' => 'nullable|string',
            'home_page_testimonial_section_status' => 'nullable|string',
            'home_page_team_member_section_status' => 'nullable|string',
            'home_page_counterup_section_status' => 'nullable|string',
            'home_page_latest_events_section_status' => 'nullable|string',
            'home_page_latest_blog_section_status' => 'nullable|string',
        ]);

        $fields = [
            'home_page_header_slider_section_status',
            'home_page_key_feature_section_status',
            'home_page_what_we_do_section_status',
            'home_page_about_us_section_status',
            'home_page_cause_category_section_status',
            'home_page_feature_cause_section_status',
            'home_page_video_section_status',
            'home_page_recent_cause_section_status',
            'home_page_testimonial_section_status',
            'home_page_team_member_section_status',
            'home_page_counterup_section_status',
            'home_page_latest_events_section_status',
            'home_page_latest_blog_section_status',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }

        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function home_04_05_06_section_manage()
    {
        return view('backend.pages.section-manage-home-04-05-06.section-manage');
    }
    public function update_home_04_05_06_section_manage(Request $request){

        $home_variant = get_static_option('home_page_variant');
        if($home_variant == '04')
            $fields = ['header_area_04','category_area_04','feature_area_04','success_story_area_04','aboutus_area_04','counterup_area_04','events_area_04','recent_cause_area_04','blog_area_04','client_area_04'];
        elseif($home_variant == '05')
            $fields =['header_slider_area_05','rise_area_05','feature_area_05','category_area_05','success_story_area_05','counterup_area_05','recent_cause_area_05','events_area_05','blog_area_05','client_area_05'];
        elseif($home_variant == '06')
            $fields = ['header_slider_area_06','rise_area_06','feature_area_06','category_area_06','recent_cause_area_06','success_story_area_06','aboutus_area_06','counterup_area_06','events_area_06','client_area_06'];
        foreach($fields as $field){
            $filed_name = 'home_page_'.$field.'_section_status';
            update_static_option($filed_name,$request->$filed_name);
        }

        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->back()->with(FlashMsg::settings_update());
    }



    public function home_01_team_member()
    {
        return view($this->base_path . 'team-member');
    }

    public function home_01_update_team_member(Request $request)
    {
            $this->validate($request, [
                'home_page_01_team_member_section_title' => 'nullable|string',
                'home_page_01_team_member_section_subtitle' => 'nullable|string',
                'home_page_01_team_member_items' => 'nullable|string'
            ]);
            $fields = [
                'home_page_01_team_member_section_title',
                'home_page_01_team_member_section_subtitle'
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }


        update_static_option('home_page_01_team_member_items', $request->home_page_01_team_member_items);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_latest_cause_area()
    {
        return view($this->base_path . 'latest-cause');
    }

    public function home_01_update_latest_cause_area(Request $request)
    {
            $this->validate($request, [
                'home_page_01_latest_cause_subtitle' => 'nullable|string',
                'home_page_01_latest_cause_title' => 'nullable|string',
                'home_page_01_latest_cause_readmore' => 'nullable|string',
                'home_page_01_latest_cause_button_text' => 'nullable|string',
                'home_page_01_latest_cause_items' => 'nullable|string'
            ]);
            $fields = [
                'home_page_01_latest_cause_subtitle',
                'home_page_01_latest_cause_readmore',
                'home_page_01_latest_cause_button_text',
                'home_page_01_latest_cause_title'
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }

        update_static_option('home_page_01_latest_cause_items', $request->home_page_01_latest_cause_items);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_2_what_we_do_area()
    {
        $all_languages =  Language::orderBy('default','desc')->get();
        return view($this->base_path . 'what-we-do-area')->with(['all_languages' => $all_languages]);
    }

    public function home_2_what_we_do_area_update(Request $request)
    {
        $this->validate($request, [
            'homepage_02_what_we_do_section_icon' => 'required|array',
            'homepage_02_what_we_do_section_icon.*' => 'required|string',
            'homepage_02_what_we_do_section_url' => 'nullable|array',
            'homepage_02_what_we_do_section_url.*' => 'nullable|string',
            'home_page_02_what_we_do_left_image' => 'nullable|string',
            'home_page_02_what_we_do_area_subtitle' => 'nullable|string',
            'home_page_02_what_we_do_area_title' => 'nullable|string',
        ]);

            $all_fields = [
                'home_page_02_what_we_do_area_subtitle',
                'home_page_02_what_we_do_area_title'
            ];
            foreach ($all_fields as $fild) {
                if ($request->has($fild)) {
                    update_static_option($fild, $request->$fild);
                }
            }

            $all_fields = [
                'homepage_02_what_we_do_section_icon',
                'homepage_02_what_we_do_section_url',
                'homepage_02_what_we_do_section_title',
                'homepage_02_what_we_do_section_description'
            ];

            foreach ($all_fields as $field) {
                $fild_value = $request->$field ?? [];
                update_static_option($field, serialize($fild_value));
            }

        update_static_option('home_page_02_what_we_do_left_image',$request->home_page_02_what_we_do_left_image);

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function home_01_video_area()
    {
        return view($this->base_path . 'cta-area');
    }

    public function home_01_update_video_area(Request $request)
    {
        $this->validate($request, [
            'home_page_01_cta_area_signature_image' => 'nullable|string',
            'home_page_01_cta_area_background_image' => 'nullable|string',
            'home_page_01_cta_area_video_url' => 'nullable|string',
            'home_page_01_cta_area_title' => 'nullable|string'
        ]);

            $_cta_area_title = 'home_page_01_cta_area_title';
            if ($request->has($_cta_area_title)) {
                update_static_option($_cta_area_title, $request->$_cta_area_title);

            }

        $all_fields = [
            'home_page_01_cta_area_video_url',
            'home_page_01_cta_area_background_image',
            'home_page_01_cta_area_signature_image',
        ];

        foreach ($all_fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

}
