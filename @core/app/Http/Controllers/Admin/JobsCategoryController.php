<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Jobs;
use App\JobsCategory;


class JobsCategoryController extends Controller
{
    private const BASE_PATH = 'backend.jobs.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:job-category-list|job-category-create|job-category-edit|job-category-delete',['only' => ['all_jobs_category']]);
        $this->middleware('permission:job-category-create',['only' => ['store_jobs_category']]);
        $this->middleware('permission:job-category-edit',['only' => ['update_jobs_category']]);
        $this->middleware('permission:job-category-delete',['only' => ['delete_jobs_category','bulk_action']]);
    }

    public function all_jobs_category(){

        $all_category = JobsCategory::latest()->get();
        return view(self::BASE_PATH.'all-jobs-category')->with(['all_category' => $all_category]);
    }

    public function store_jobs_category(Request $request){
        $request->validate([
            'title' => 'required|string|max:191|unique:jobs_categories',
            'status' => 'required|string|max:191'
        ]);

        JobsCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('New Category Added...'),
            'type' => 'success'
        ]);
    }

    public function update_jobs_category(Request $request){
        $request->validate([
            'title' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        JobsCategory::find($request->id)->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        return redirect()->back()->with([
            'msg' => __('Category Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_jobs_category(Request $request,$id){
        if (Jobs::where('category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        JobsCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Category Delete Success...'),
            'type' => 'danger'
        ]);
    }
    public function bulk_action(Request $request){
        $all = JobsCategory::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }


}
