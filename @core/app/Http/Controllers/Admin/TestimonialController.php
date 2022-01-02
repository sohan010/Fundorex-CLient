<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Donor;
use App\Helpers\FlashMsg;
use App\Language;
use App\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete',['only' => ['index']]);
        $this->middleware('permission:testimonial-create',['only' => ['store']]);
        $this->middleware('permission:testimonial-edit',['only' => ['update','clone']]);
        $this->middleware('permission:testimonial-delete',['only' => ['delete','bulk_action']]);
    }
    public function index(){
        $all_testimonials = Testimonial::all();
        return view('backend.pages.testimonial')->with([
            'all_testimonials' => $all_testimonials,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'description' => 'required',
            'designation' => 'string|max:191',
            'status' => 'string|max:191',
            'image' => 'nullable|string|max:191',
        ]);
        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'designation' => $request->designation,
            'image' => $request->image
        ]);
        return redirect()->back()->with(FlashMsg::item_new('New Testimonial Added'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'description' => 'required',
            'designation' => 'string|max:191',
            'status' => 'string|max:191',
            'image' => 'nullable|string|max:191',
        ]);
        Testimonial::find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'designation' => $request->designation,
            'image' => $request->image
        ]);

        return redirect()->back()->with(FlashMsg::item_update('Testimonial Updated'));
    }
    public function clone(Request $request){
        $testimonial = Testimonial::find($request->item_id);

        Testimonial::create([
            'name' => $testimonial->name,
            'description' => $testimonial->description,
            'status' => 'draft',
            'designation' => $testimonial->designation,
            'image' => $testimonial->image
        ]);

        return redirect()->back()->with(FlashMsg::item_clone('Testimonial Clone Successfully'));
    }

    public function delete(Request $request,$id){

        $testimonial = Testimonial::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete('Testimonial Deleted'));
    }

    public function bulk_action(Request $request){
        $all = Testimonial::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
