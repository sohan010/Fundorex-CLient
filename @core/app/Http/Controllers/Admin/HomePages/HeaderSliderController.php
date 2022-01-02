<?php

namespace App\Http\Controllers\Admin\HomePages;

use App\HeaderSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){

        $all_header_slider = HeaderSlider::all();
        return view('backend.pages.home.header')->with(['all_header_slider' => $all_header_slider]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'title' => 'nullable|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'btn_01_text' => 'nullable|string|max:191',
            'btn_01_url' => 'nullable|string|max:191',
            'btn_01_status' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);

        HeaderSlider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'btn_01_text' => $request->btn_01_text,
            'btn_01_url' => $request->btn_01_url,
            'btn_01_status' => $request->btn_01_status,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect()->back()->with(['msg' => __('New Header Slider Added...'),'type' => 'success']);
    }

    public function update(Request $request){

        $this->validate($request,[
            'title' => 'nullable|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'btn_01_text' => 'nullable|string|max:191',
            'btn_01_url' => 'nullable|string|max:191',
            'btn_01_status' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);

        HeaderSlider::find($request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'btn_01_text' => $request->btn_01_text,
            'btn_01_url' => $request->btn_01_url,
            'btn_01_status' => $request->btn_01_status,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect()->back()->with(['msg' => __('Header Slider Updated...'),'type' => 'success']);
    }

    public function delete($id){

        HeaderSlider::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = HeaderSlider::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
