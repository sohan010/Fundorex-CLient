<?php

namespace App\Http\Controllers\Admin;

use App\GeneralMenu;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class GeneralMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_menu = GeneralMenu::where('status','publish')->get();

        return view('backend.pages.menu.menu-index')->with([
            'all_menu' => $all_menu,
        ]);
    }

    public function store_new_menu(Request $request){
        $this->validate($request,[
            'status' => 'required',
            'custom_url' => 'nullable',
            'title' => 'required',
        ]);

        GeneralMenu::create([
            'status' => $request->status,
            'custom_url' => $request->custom_url,
            'title' => $request->title,
        ]);

        return redirect()->back()->with([
            'msg' => __('New Menu Created...'),
            'type' => 'success'
        ]);
    }
    public function edit_menu($id){
        $page_post = GeneralMenu::find($id);

        return view('backend.pages.menu.menu-edit')->with([
            'page_post' => $page_post,
        ]);
    }
    public function update_menu(Request $request,$id){

        $this->validate($request,[
            'content' => 'nullable',
            'title' => 'required',
        ]);
        GeneralMenu::where('id',$id)->update([
            'content' => $request->menu_content,
            'title' => $request->title,
        ]);

        return redirect()->back()->with([
            'msg' => __('Menu updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_menu(Request $request,$id){
        GeneralMenu::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Menu Delete Success...'),
            'type' => 'danger'
        ]);
    }

}
