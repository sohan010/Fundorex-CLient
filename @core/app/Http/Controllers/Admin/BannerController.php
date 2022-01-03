<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\SocialIcons;
use App\Testimonial;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $all_banners = Banner::all();
        return view('backend.pages.banner',compact('all_banners'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'image' => 'nullable|string',
        ]);

        Banner::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Banner Added...'),
            'type' => 'success'
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'image' => 'nullable|string',
        ]);

        Banner::find($request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $request->image,
        ]);

        return redirect()->back()->with([
            'msg' => __('Banner Item Updated...'),
            'type' => 'success'
        ]);
    }
    public function delete(Request $request,$id){
        Banner::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Banner Item Deleted...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = Banner::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }



}
