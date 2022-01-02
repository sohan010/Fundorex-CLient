<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:appearance-navbar-settings');
    }

    public function navbar_settings(){
        return view('backend.pages.navbar-settings');
    }

    public function update_navbar_settings(Request $request){

        $this->validate($request,[
            'home_page_navbar_button_status' => 'nullable',
            'home_page_navbar_button_url' => 'nullable',
            'home_page_navbar_button_icon' => 'nullable',
            ]);

            $this->validate($request,[
                'home_page_navbar_button_subtitle' => 'nullable|string',
                'home_page_navbar_button_title' => 'nullable|string',
            ]);

            //save repeater values
            $all_fields = [
                'home_page_navbar_button_subtitle',
                'home_page_navbar_button_title',
                'home_page_navbar_button_url',
                'home_page_navbar_button_status',
                'home_page_navbar_button_icon',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(FlashMsg::settings_update());
    }
}
