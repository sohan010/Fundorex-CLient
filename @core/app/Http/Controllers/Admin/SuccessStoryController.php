<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\SuccessStory;
use App\SuccessStoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuccessStoryController extends Controller
{
    private const BASE_PATH = 'backend.pages.success-story.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:success-story-list|success-story-edit|success-story-delete',['only' => ['index']]);
        $this->middleware('permission:success-story-edit',['only' => ['clone_success-story','edit_success-story','update_success-story']]);
        $this->middleware('permission:success-story-delete',['only' => ['delete_success-story','bulk_action']]);
        $this->middleware('permission:success-story-create',['only' => ['new_success-story','store_new_success-story']]);
        $this->middleware('permission:success-story-category-list|success-story-category-create|success-story-category-edit|success-story-category-delete',['only' => ['category']]);
        $this->middleware('permission:page-settings-success-story-page-manage',['only' => ['sucess_story','update_sucess_story']]);
    }
    public function index(){
        $all_success_stories = SuccessStory::all();
        return view(self::BASE_PATH.'index')->with([
            'all_success_stories' => $all_success_stories
        ]);
    }
    public function new_success_story(){
        $all_category = SuccessStoryCategory::all();
        return view(self::BASE_PATH.'new')->with([
            'all_category' => $all_category,
        ]);
    }
    public function store_new_success_story(Request $request){
        $this->validate($request,[
            'category' => 'required',
            'story_content' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'status' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'og_meta_title' => 'nullable|string',
            'og_meta_description' => 'nullable|string',
            'og_meta_image' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);

        SuccessStory::create([
            'success_story_category_id' => $request->category,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title) ,
            'story_content' => purify_html_raw($request->story_content),
            'title' => purify_html($request->title),
            'status' => $request->status,
            'meta_tags' => purify_html($request->meta_tags),
            'meta_title' => purify_html($request->meta_title),
            'meta_description' => purify_html($request->meta_description),
            'excerpt' => purify_html($request->excerpt),
            'image' => $request->image,
            'og_meta_title'=> purify_html($request->og_meta_title),
            'og_meta_description'=> purify_html_raw($request->og_meta_description),
            'og_meta_image'=> $request->og_meta_image,
        ]);
        return redirect()->back()->with([
            'msg' => __('New Item Added...'),
            'type' => 'success'
        ]);
    }
    public function clone_success_story(Request $request)
    {
        $blog_details = SuccessStory::findOrFail($request->item_id);
        SuccessStory::create([
            'success_story_category_id' => $blog_details->success_story_category_id,
            'slug' => !empty($blog_details->slug) ? \Str::slug($blog_details->slug) : \Str::slug($blog_details->title) ,
            'story_content' => $blog_details->story_content,
            'title' => $blog_details->title,
            'status' => 'draft',
            'meta_tags' => $blog_details->meta_tags,
            'meta_description' => $blog_details->meta_description,
            'excerpt' => $blog_details->excerpt,
            'image' => $blog_details->image,
            'meta_title' => $blog_details->meta_title,
            'og_meta_title' => $blog_details->og_meta_title,
            'og_meta_description' => $blog_details->og_meta_description,
            'og_meta_image' => $blog_details->og_meta_image,
        ]);

        return redirect()->back()->with([
            'msg' => __('Success Story Post cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_success_story($id){
        $success_story = SuccessStory::findOrFail($id);
        $all_category = SuccessStoryCategory::all();
        return view(self::BASE_PATH.'edit')->with([
            'all_category' => $all_category,
            'success_story' => $success_story,
        ]);
    }
    public function update_success_story(Request $request,$id){
        $this->validate($request,[
            'category' => 'required',
            'story_content' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'status' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'og_meta_title' => 'nullable|string',
            'og_meta_description' => 'nullable|string',
            'og_meta_image' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);
        SuccessStory::where('id',$id)->update([
            'success_story_category_id' => $request->category,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title) ,
            'story_content' => purify_html_raw($request->story_content),
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);

        return redirect()->back()->with([
            'msg' => __('Item updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_success_story(Request $request,$id){
        SuccessStory::findOrFail($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        SuccessStory::whereIn('id',$request->ids)->delete();

        return redirect()->back()->with([
            'msg' => __('Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function sucess_story()
    {
        return view(self::BASE_PATH. 'page-manage');
    }

    public function update_sucess_story(Request $request)
    {

        $this->validate($request, [
            'success_story_page_button_text' => 'nullable|string',
            'success_story_page_item_show' => 'nullable|string',
        ]);

        $save_data = [
            'success_story_page_button_text',
            'success_story_page_item_show',
        ];
        foreach ($save_data as $item) {
            if ($request->has($item)) {
                update_static_option($item, $request->$item);
            }
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }


}
