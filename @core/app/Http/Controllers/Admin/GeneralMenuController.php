<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class GeneralMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function general_menu_manage(){
        return view('backend.pages.menu.general-menu-settings');
    }

    public function update_general_menu_manage(Request $request){
        $this->validate($request,[
            'menu_home' => 'required',
            'menu_recent_donation' => 'required',
            'menu_my_donation' => 'required',
            'menu_profile' => 'required',
        ]);

        $data = ['menu_home','menu_recent_donation','menu_my_donation','menu_profile'];

        foreach ($data as $item){
            if($request->has($item)){
                update_static_option($item,$request->$item);
            }
        }

        return redirect()->back()->with([
            'msg' => __('New Menu Updatesd...'),
            'type' => 'success'
        ]);
    }


}
