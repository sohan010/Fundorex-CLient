<?php

namespace App\Http\Controllers\Admin;

use App\Cause;
use App\CauseCategory;
use App\CauseUpdate;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class UpdateCauseController extends Controller
{
    private const BASE_PATH = 'backend.donations.';
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function all_update_causes($id){
        $all_update_causes = CauseUpdate::where(['cause_id' => $id])->get();
        $cause_id = $id;
        return view(self::BASE_PATH.'update-cause')->with([
            'all_update_causes' => $all_update_causes,
            'cause_id'=>$cause_id
        ]);


    }

    public function store_update_causes(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',

        ],[
            'title.required' => __('title is required'),
            'status.required' => __('status is required'),
        ]);

        $id = CauseUpdate::create([
            'title' => $request->title,
            'cause_id' => $request->cause_id,
            'description' => $request->description,
            'image' => $request->image,
        ])->id;

        Cause::where('id',$request->cause_id)->update(['cause_update_id'=>$id]);

        return redirect()->back()->with(['msg' => __('New item added'),'type' => 'success']);


    }

    public function update_update_causes(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'nullable|string',
        ],[
            'title.required' => __('title is required'),
        ]);

        CauseUpdate::findOrFail($request->case_update_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'cause_id' => $request->cause_id,
        ]);

        return redirect()->back()->with(['msg' => __('Update success'),'type' => 'success']);

    }

    public function delete_update_cause(Request $request,$id){
        CauseUpdate::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('item deleted'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = CauseUpdate::findOrFail($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }


}
