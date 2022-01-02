<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\ImageGallery;
use App\ImageGalleryCategory;
use App\Language;
use Illuminate\Http\Request;

class ImageGalleryPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:image-gallery-list|image-gallery-create|image-gallery-edit|image-gallery-delete',['only' => 'index']);
        $this->middleware('permission:image-gallery-create',['only' => 'store']);
        $this->middleware('permission:image-gallery-edit',['only' => 'update']);
        $this->middleware('permission:image-gallery-delete',['only' => 'delete','bulk_action']);
        //image gallery category permission
        $this->middleware('permission:image-gallery-category-list|image-gallery-category-create|image-gallery-category-edit|image-gallery-category-delete',['only' => 'category_index']);
        $this->middleware('permission:image-gallery-category-create',['only' => 'category_store']);
        $this->middleware('permission:image-gallery-category-edit',['only' => 'category_update']);
        $this->middleware('permission:image-gallery-category-delete',['only' => 'category_delete','category_bulk_action']);
        $this->middleware('permission:image-gallery-page-settings',['only' => 'page_settings','update_page_settings']);
    }

    public function index(){
        $all_gallery_images = ImageGallery::all();
        $all_categories = ImageGalleryCategory::where('status', 'publish')->get();
        return view('backend.image-gallery.image-gallery')->with(['all_gallery_images' => $all_gallery_images,'all_categories' => $all_categories]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'image' => 'required|string',
            'title' => 'nullable|string',
            'cat_id' => 'required|string',
        ]);
        ImageGallery::create([
            'image' => $request->image,
            'title' => $request->title,
            'cat_id' => $request->cat_id,
        ]);
        return redirect()->back()->with(['msg' => __('New Image Added...'),'type' => 'success']);
    }
    public function update(Request $request){
        $this->validate($request,[
            'image' => 'required|string',
            'title' => 'nullable|string',
            'cat_id' => 'required|string',
        ]);
        ImageGallery::find($request->id)->update([
            'image' => $request->image,
            'title' => $request->title,
            'cat_id' => $request->cat_id,
        ]);
        return redirect()->back()->with(['msg' => __('Image Updated...'),'type' => 'success']);
    }
    public function delete(Request $request,$id){
        ImageGallery::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Image Delete...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = ImageGallery::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function category_index(){
        $all_gallery_images = ImageGalleryCategory::all();
        return view('backend.image-gallery.image-gallery-category')->with('all_category', $all_gallery_images);
    }
    public function category_store(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|string',
        ]);
        ImageGalleryCategory::create([
            'status' => $request->status,
            'title' => $request->title,
        ]);
        return redirect()->back()->with(['msg' => __('Category Added...'),'type' => 'success']);
    }
    public function category_update(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|string',
        ]);
        ImageGalleryCategory::where('id',$request->id)->update([
            'status' => $request->status,
            'title' => $request->title,
        ]);
        return redirect()->back()->with(['msg' => __('Category Updated...'),'type' => 'success']);
    }
    public function category_delete(Request $request,$id){
        ImageGalleryCategory::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Category Delete...'),'type' => 'danger']);
    }

    public function category_bulk_action(Request $request){
        $all = ImageGalleryCategory::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function page_settings(){
        $all_languages =  Language::orderBy('default','desc')->get();
        return view('backend.image-gallery.image-gallery-page-settings')->with(['all_languages' => $all_languages]);
    }

    public function update_page_settings(Request $request){
        $this->validate($request,[
           'site_image_gallery_post_items' => 'required',
           'site_image_gallery_order' => 'required',
           'site_image_gallery_order_by' => 'required',
        ]);
        $all_fields  = [
            'site_image_gallery_post_items',
            'site_image_gallery_order',
            'site_image_gallery_order_by'
        ];

        foreach ($all_fields as $field){
            update_static_option($field,$request->$field);
        }

        return redirect()->back()->with(['msg' => __('Settings Updated...'),'type' => 'success']);
    }
}
