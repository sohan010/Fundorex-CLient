<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\EventsCategory;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class EventsCategoryController extends Controller
{
    private const BASE_PATH = 'backend.events.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:event-category-list|event-category-create|event-category-edit|event-category-delete',['only' => ['all_events_category']]);
        $this->middleware('permission:event-category-create',['only' => ['store_events_category']]);
        $this->middleware('permission:event-category-edit',['only' => ['update_events_category']]);
        $this->middleware('permission:event-category-delete',['only' => ['delete_events_category','bulk_action']]);
    }

    public function all_events_category(){

        $all_category = EventsCategory::latest()->get();
        return view(self::BASE_PATH.'all-events-category')->with(['all_category' => $all_category] );
    }

    public function store_events_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191|unique:events_categories',
            'status' => 'required|string|max:191'
        ]);

        EventsCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_events_category(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        EventsCategory::find($request->id)->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __( 'Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_events_category(Request $request,$id){
        if (Events::where('category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Event...'),
                'type' => 'danger'
            ]);
        }
        EventsCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = EventsCategory::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
