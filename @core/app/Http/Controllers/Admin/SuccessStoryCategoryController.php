<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\SuccessStory;
use App\SuccessStoryCategory;
use Illuminate\Http\Request;

class SuccessStoryCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:success-story-category-list|success-story-category-create|success-story-category-edit|success-story-category-delete',['only'=> ['category']]);
        $this->middleware('permission:success-story-category-create',['only'=> ['new_category']]);
        $this->middleware('permission:success-story-category-edit',['only'=> ['update_category']]);
        $this->middleware('permission:success-story-category-delete',['only'=> ['delete_category','category_bulk_action']]);
    }

    public function category()
    {
        $all_category = SuccessStoryCategory::latest()->get();
        return view('backend.pages.success-story.category',compact('all_category'));
    }

    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:blog_categories',
            'status' => 'required|string|max:191'
        ]);

        $data = [
          'name' => $request->sanitize_html('name'),
          'status' => $request->sanitize_html('status'),
        ];

        SuccessStoryCategory::create($data);


        return redirect()->back()->with(FlashMsg::item_new('Category Added Succesfully'));
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        SuccessStoryCategory::findOrFail($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (SuccessStory::where('success_story_category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        SuccessStoryCategory::findOrFail($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_bulk_action(Request $request){

        SuccessStoryCategory::whereIn('id',$request->ids)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }
}
