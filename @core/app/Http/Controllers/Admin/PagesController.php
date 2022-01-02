<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Blog;
use App\BlogCategory;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-create|page-edit|page-delete|page-list',['only' => ['index']]);
        $this->middleware('permission:page-create',['only' => ['new_page','store_new_page']]);
        $this->middleware('permission:page-edit',['only' => ['edit_page','update_page']]);
        $this->middleware('permission:page-delete',['only' => ['delete_page','bulk_action']]);
    }
    public function index(){
        $all_pages = Page::all();
        return view('backend.pages.page.index')->with([
            'all_pages' => $all_pages,
        ]);
    }
    public function new_page(){
        return view('backend.pages.page.new');
    }

    public function store_new_page(Request $request){
        $this->validate($request,[
            'page_content' => 'nullable',
            'meta_tags' => 'nullable',
            'meta_description' => 'nullable',
            'title' => 'required',
            'og_meta-title' => 'nullable',
            'og_meta_description' => 'nullable',
            'og_meta_image' => 'nullable',
            'slug' => 'nullable',
            'status' => 'nullable|string|max:191',
            'visibility' => 'required|string|max:191',
        ]);

        Page::create([
            'slug' => !empty($request->slug) ?  \Str::slug($request->slug) : \Str::slug($request->title),
            'status' => $request->status,
            'page_content' => $request->page_content,
            'title' => $request->title,
            'meta_tags' => $request->meta_tags,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
            'visibility' => $request->visibility,
        ]);

        return redirect()->back()->with([
            'msg' => __('New Page Created...'),
            'type' => 'success'
        ]);
    }
    public function edit_page($id){
        $page_post = Page::find($id);
        return view('backend.pages.page.edit')->with([
            'page_post' => $page_post,
        ]);
    }
    public function update_page(Request $request,$id){
        $this->validate($request,[
            'page_content' => 'nullable',
            'meta_tags' => 'nullable',
            'meta_description' => 'nullable',
            'title' => 'required',
            'slug' => 'nullable',
            'status' => 'required|string|max:191',
        ]);
        Page::where('id',$id)->update([
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title),
            'status' => $request->status,
            'page_content' => $request->page_content,
            'title' => $request->title,
            'meta_tags' => $request->meta_tags,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
            'visibility' => $request->visibility,
        ]);


        return redirect()->back()->with([
            'msg' => __('Page updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_page(Request $request,$id){
        Page::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Page Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = Page::whereIn($request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
