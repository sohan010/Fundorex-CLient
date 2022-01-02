<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\SocialIcons;
use Illuminate\Http\Request;

class TopbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:appearance-topbar-settings');
    }
    public function topbar_settings()
    {
        $all_social_icons = SocialIcons::all();
        return view('backend.pages.topbar-settings')->with(['all_social_icons' => $all_social_icons]);
    }

    public function update_topbar_settings(Request $request)
    {

        $this->validate($request, [
            'navbar_button' => 'nullable|string',
            'navbar_button_custom_url' => 'nullable|string',
            'navbar_button_custom_url_status' => 'nullable|string',
        ]);

        update_static_option('navbar_button', $request->navbar_button);
        update_static_option('navbar_button_custom_url', $request->navbar_button_custom_url);
        update_static_option('navbar_button_custom_url_status', $request->navbar_button_custom_url_status);

            $filed_name = 'navbar_button_text';
            update_static_option('navbar_button_text', $request->$filed_name);


        return redirect()->back()->with(['msg' => __('Navbar Settings Updated..'), 'type' => 'success']);
    }

    public function new_social_item(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'url' => 'required|string',
        ]);

        SocialIcons::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Social Item Added...'),
            'type' => 'success'
        ]);
    }
    public function update_social_item(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'url' => 'required|string',
        ]);

        SocialIcons::find($request->id)->update([
            'icon' => $request->icon,
            'url' => $request->url,
        ]);

        return redirect()->back()->with([
            'msg' => __('Social Item Updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_social_item(Request $request,$id){
        SocialIcons::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Social Item Deleted...'),
            'type' => 'danger'
        ]);
    }

    public function update_top_menu(Request $request){

            $this->validate($request,[
                'top_bar_right_menu' => 'nullable|string|max:191'
            ]);
            $filed = 'top_bar_right_menu';
            update_static_option('top_bar_right_menu',$request->$filed);

        return redirect()->back()->with(['msg' => __('Settings Updated...'),'type' => 'success']);
    }
    public function update_top_button(Request $request){


            $this->validate($request,[
                'top_bar_button_text' => 'nullable|string|max:191'
            ]);
            $filed = 'top_bar_button_text';
            update_static_option('top_bar_button_text',$request->$filed);


        return redirect()->back()->with(['msg' => __('Settings Updated...'),'type' => 'success']);
    }

    public function update_topbar_info_items(Request $request){

            $this->validate($request,[
                'home_page_01_topbar_info_list_text' => 'required|array',
                'home_page_01_topbar_info_list_text.*' => 'required|string',
                'home_page_01_topbar_info_list_icon_icon' => 'required|array',
                'home_page_01_topbar_info_list_icon_icon.*' => 'required|string',
            ],[
                'home_page_01_topbar_info_list_icon_icon.required' => __('icon field is required'),
                'home_page_01_topbar_info_list_text.required' => __('text field is required'),
            ]);

            //save repeater values
            $all_fields = [
                'home_page_01_topbar_info_list_text',
                'home_page_01_topbar_info_list_icon_icon',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,serialize($request->$field));
            }


        return redirect()->back()->with([
            'msg' => __('Settings Updated ...'),
            'type' => 'success'
        ]);
    }
}
