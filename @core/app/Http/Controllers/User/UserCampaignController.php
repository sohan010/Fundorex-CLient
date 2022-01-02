<?php

namespace App\Http\Controllers\User;

use App\Cause;
use App\CauseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BasicMail;

class UserCampaignController extends Controller
{
    public const BASE_PATH = 'frontend.user.dashboard.';
  
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function all_campaign(){
        $auth_id = auth()->guard('web')->user()->id;
        $all_donations = Cause::where('user_id',$auth_id)->get();
        return view(self::BASE_PATH.'campaigns.all-campaigns')->with(['all_donations' => $all_donations]);
    }
  
    public function new_campaign(){
        $all_category = CauseCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'campaigns.new-campaign')->with(['all_category' => $all_category]);
    }
  
    public function store_campaign(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'cause_content' => 'required|string',
            'amount' => 'required|string',
            'status' => 'nullable|string',
            'image' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'deadline' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'categories_id' => 'required|string',
            'og_meta_title' => 'nullable|string',
            'og_meta_description' => 'nullable|string',
            'og_meta_image' => 'nullable|string',
        ],[
            'title.required' => __('title is required'),
            'cause_content.required' => __('donation content is required'),
            'amount.required' => __('amount is required'),
            'status.required' => __('status is required'),
            'categories_id.required' => __('category is required'),
        ]);

        $faq_item = $request->faq ?? ['title' => ['']];
        $slug = !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title);
        $old_slug = Cause::where(['slug' => $slug])->first();

        Cause::create([
            'title' => $request->title,
            'slug' =>  $old_slug ? $slug.random_int(99,99) : $slug,
            'cause_content' => $request->cause_content,
            'amount' => $request->amount,
            'status' => 'pending',
            'image' => $request->image,
            'deadline' => $request->deadline,
            'image_gallery' => $request->image_gallery,
            'medical_document' => $request->medical_document,
            'faq' => serialize($faq_item),
            'user_id' => Auth::guard('web')->user()->id,
            'created_by' => 'user',
            'excerpt' => $request->excerpt,
            'meta_title' => $request->meta_title,
            'categories_id' => $request->categories_id,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);
      
      
      	$msg = __('notify to admin');
        $admin_email = get_static_option('site_global_email');
        $message = __('Hello').'<br>';
        $message .= '<p>'.__('A new campaign created by');
        $message .= ' '.optional(auth()->guard('web')->user())->name;
        $message .= ' '.__('checkout admin panel for approve it.').'</p>';
        try {
            Mail::to($admin_email)->send(new BasicMail([
                'subject' => __('a new campaign created by user'),
                'message' => $message
            ]));
        }catch (\Exception $e){
            $msg = __('notify to admin failed');
        }

      

        return redirect()->route('user.campaign.new')->with(['msg' => __('New Campaign Added, Waiting for admin approval').' '.$msg,'type' => 'success']);
    }
  
    public function edit_campaign($id){

        $donation = Cause::find($id);
        $all_category = CauseCategory::all();

        return view('frontend.user.dashboard.campaigns.edit-campaign')->with([
            'donation' => $donation,
            'all_category' => $all_category
        ]);
    }

    public function update_campaign(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'cause_content' => 'required|string',
            'amount' => 'required|string',
            'status' => 'nullable|string',
            'image' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'deadline' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'categories_id' => 'required|string',
        ],
            [
                'title.required' => __('title is required'),
                'cause_content.required' => __('donation content is required'),
                'amount.required' => __('amount is required'),
                'status.required' => __('status is required'),
                'categories_id.required' => __('category is required'),
            ]);
        $faq_item = $request->faq ?? ['title' => ['']];
        $slug = !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title);
        $old_slug = Cause::where(['slug' => $slug])->first();

        Cause::findOrFail($request->donation_id)->update([
            'title' => $request->title,
            'slug' => !empty($old_slug) && $old_slug->id != $request->donation_id ? $slug.random_int(99,99) : $slug,
            'cause_content' => $request->cause_content,
            'amount' => $request->amount,
            'image' => $request->image,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'deadline' => $request->deadline,
            'image_gallery' => $request->image_gallery,
            'medical_document' => $request->medical_document,
            'faq' => serialize($faq_item),
            'meta_title' => $request->meta_title,
            'excerpt' => $request->excerpt,
            'categories_id' => $request->categories_id,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);

        return redirect()->back()->with(['msg' => __('Campaign Updated...'),'type' => 'success']);
    }

    public function delete_campaign(Request $request,$id){
        Cause::where(['user_id' => auth()->guard('web')->user()->id,'id' => $id])->delete();
        return redirect()->back()->with(['msg' => __('Campaign Deleted...'),'type' => 'danger']);
    }
}
