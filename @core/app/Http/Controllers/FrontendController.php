<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Banner;
use App\Cause;
use App\CauseCategory;
use App\CauseLogs;
use App\ClientArea;
use App\ContactInfoItem;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\EventsCategory;
use App\Faq;
use App\Feedback;
use App\GeneralMenu;
use App\Helpers\HomePageStaticSettings;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use App\ImageGalleryCategory;
use App\JobApplicant;
use App\Jobs;
use App\JobsCategory;
use App\Language;
use App\Mail\AdminResetEmail;
use App\Mail\BasicMail;
use App\Mail\CallBack;
use App\Mail\ContactMessage;
use App\Mail\PlaceOrder;
use App\Menu;
use App\Newsletter;
use App\Page;
use App\Blog;
use App\BlogCategory;
use App\HeaderSlider;
use App\KeyFeatures;
use App\StaticOption;
use App\SuccessStory;
use App\SuccessStoryCategory;
use App\TeamMember;
use App\User;
use App\Counterup;
use App\Testimonial;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Svg\Tag\Image;
use Symfony\Component\Process\Process;

class FrontendController extends Controller
{

    public function index()
    {
        $all_header_slider = HeaderSlider::all();
        $urgent_cause = Cause::where(['status' => 'publish','emmergency' => 'on'])->inRandomOrder()->get();
        $featured_causes = Cause::where(['status' => 'publish','featured' => 'on'])->inRandomOrder()->get();
        $all_donation_category = CauseCategory::where(['status' => 'publish'])->get();
        $banner = Banner::first();

        //make a function to call all static option by home page
        $static_field_data = StaticOption::whereIn('option_name',HomePageStaticSettings::get_home_field(get_static_option('home_page_variant')))->get()->mapWithKeys(function ($item) {
            return [$item->option_name => $item->option_value];
        })->toArray();

        $all_client_area = ClientArea::all();

        return view('frontend.frontend-home')->with([
            'all_header_slider' => $all_header_slider,
            'static_field_data' => $static_field_data,
            'all_donation_category' => $all_donation_category,
            'urgent_cause' => $urgent_cause,
            'featured_causes' => $featured_causes,
            'all_client_area' => $all_client_area,
            'banner' => $banner,
        ]);
    }

    public function home_page_change($id)
    {
//        $whitelist = array(
//            '127.0.0.1',
//            '::1',
//        );
//        $remote_addr = $_SERVER['REMOTE_ADDR'];
//        preg_match('/xgenious/',$remote_addr,$match);
//        if(in_array($remote_addr, $whitelist) || !empty($match)){
//            return redirect()->route('homepage');
//        }
        if(!in_array($id,['01','02','03','04','05','06'])){
            abort(404);
        }

        $home_page_variant = get_static_option('home_page_variant');

        $all_header_slider = HeaderSlider::all();
        $all_counterup = Counterup::all();
        $all_testimonial = Testimonial::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        $all_team_members = TeamMember::orderBy('id', 'desc')->take(get_static_option('home_page_01_team_member_items'))->get();;
        $all_donation_category = CauseCategory::where(['status' => 'publish'])->get();
        $feature_cause = Cause::where(['status' => 'publish','featured' => 'on'])->inRandomOrder()->get();
        $all_recent_donation = Cause::select('title','amount','cause_content','raised','image','slug','categories_id','excerpt','featured','id')->where(['status' => 'publish'])->orderBY('id','desc');
        $all_recent_events = Events::select('title','content','date','time','cost','image','slug','category_id','venue_location','id')->where(['status' => 'publish'])
            ->orderBY('id','desc');
        $all_blog = Blog::where([ 'status' => 'publish'])->orderBy('id', 'desc');
        $all_success_stories = SuccessStory::where('status','publish')->orderBy('id', 'desc');


        //make a function to call all static option by home page
        $static_field_data = StaticOption::whereIn('option_name',HomePageStaticSettings::get_home_field($id))->get()->mapWithKeys(function ($item) {
            return [$item->option_name => $item->option_value];
        })->toArray();

        $all_client_area = ClientArea::all();

        return view('frontend.frontend-home-demo')->with([
            'all_header_slider' => $all_header_slider,
            'all_counterup' => $all_counterup,
            'all_testimonial' => $all_testimonial,
            'all_team_members' => $all_team_members,
            'static_field_data' => $static_field_data,
            'all_donation_category' => $all_donation_category,
            'feature_cause' => $feature_cause,
            'home_page' => $id,

            'all_client_area' => $all_client_area,
        ]);
    }


    public function flutterwave_pay_get()
    {
        return redirect_404_page();
    }


    public function blog_page()
    {
        $all_recent_blogs = Blog::orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_blogs = Blog::orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.blog.blog')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }

    public function category_wise_blog_page($id)
    {
        $all_blogs = Blog::where(['blog_categories_id' => $id])->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        if(empty($all_blogs)){
                abort(404);
        }
        $all_recent_blogs = Blog::orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        $category_name = BlogCategory::where(['id' => $id, 'status' => 'publish'])->first()->name;
        return view('frontend.pages.blog.blog-category')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'category_name' => $category_name,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }

    public function tags_wise_blog_page($tag)
    {
        $all_blogs = Blog::Where('tags', 'LIKE', '%' . $tag . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
            if(empty($all_blogs)){
                abort(404);
            }
        $all_recent_blogs = Blog::orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        return view('frontend.pages.blog.blog-tags')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'tag_name' => $tag,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }

    public function blog_search_page(Request $request)
    {
        $all_recent_blogs = Blog::orderBy('id', 'desc')->take(get_static_option('blog_page_recent_post_widget_item'))->get();
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();
        $all_blogs = Blog::Where('title', 'LIKE', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));

        return view('frontend.pages.blog.blog-search')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'search_term' => $request->search,
            'all_recent_blogs' => $all_recent_blogs,
        ]);
    }

    public function blog_single_page($slug)
    {

        $blog_post = Blog::where('slug', $slug)->first();
        if(empty($blog_post)){
            abort('404');
        }
        $all_recent_blogs = Blog::orderBy('id', 'desc')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $all_category = BlogCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();

        $all_related_blog = Blog::Where('blog_categories_id', $blog_post->blog_categories_id)->orderBy('id', 'desc')->take(6)->get();
        return view('frontend.pages.blog.blog-single')->with([
            'blog_post' => $blog_post,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs,
            'all_related_blog' => $all_related_blog,
        ]);
    }


    public function dynamic_single_page($slug)
    {
        $page_post = Page::where('slug', $slug)->first();
        if(empty($page_post)){
            abort(404);
        }
        
        return view('frontend.pages.dynamic-single')->with([
            'page_post' => $page_post
        ]);
    }

    public function showAdminForgetPasswordForm()
    {
        return view('auth.admin.forget-password');
    }

    public function sendAdminForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = Admin::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!empty($user_info)) {
            $token_id = Str::random(30);
            $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
            if (empty($existing_token)) {
                DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
            }
            $message = 'Here is you password reset link, If you did not request to reset your password just ignore this mail. <a class="btn" href="' . route('admin.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">Click Reset Password</a>';
            $data = [
                'username' => $user_info->username,
                'message' => $message
            ];
            
           try{
                Mail::to($user_info->email)->send(new AdminResetEmail($data));
           }catch(\Exception $e){
                return redirect()->back()->with([
                'msg' => $e->getMessage(),
                'type' => 'success'
            ]);
           }

            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Your Username or Email Is Wrong!!!'),
            'type' => 'danger'
        ]);
    }

    public function showAdminResetPasswordForm($username, $token)
    {
        return view('auth.admin.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }

    public function AdminResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = Admin::where('username', $request->username)->first();
        $user = Admin::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function lang_change(Request $request)
    {
        session()->put('lang', $request->lang);
        return redirect()->route('homepage');
    }


    public function about_page()
    {
        $all_team_members = TeamMember::orderBy('id', 'desc')->take(get_static_option('about_page_team_member_item'))->get();
        $all_testimonial = Testimonial::orderBy('id', 'desc')->take(get_static_option('about_page_testimonial_item'))->get();
        $all_counterup = Counterup::orderBy('id', 'desc')->get();

        return view('frontend.pages.about')->with([
            'all_team_members' => $all_team_members,
            'all_testimonial' => $all_testimonial,
            'all_counterup' => $all_counterup,
        ]);
    }


    public function team_page()
    {
        $all_team_members = TeamMember::orderBy('id', 'desc')->paginate(12);
        return view('frontend.pages.team-page')->with(['all_team_members' => $all_team_members]);
    }

    public function faq_page()
    {
        $all_faq = Faq::where([ 'status' => 'publish'])->get();
        return view('frontend.pages.faq-page')->with([
            'all_faqs' => $all_faq
        ]);
    }

    public function success_story_page()
    {
        $all_success_stories = SuccessStory::where([ 'status' => 'publish'])->paginate(get_static_option('success_story_page_item_show'));
        return view('frontend.pages.success-story.success-story')->with([
            'all_success_stories' => $all_success_stories
        ]);
    }

    public function success_story_single($slug)
    {

        $success_story = SuccessStory::where('slug', $slug)->first();
        if(empty($success_story)){
            abort('404');
        }
        $all_category = SuccessStoryCategory::where(['status' => 'publish'])->orderBy('id', 'desc')->get();

        return view('frontend.pages.success-story.success-story-single')->with([
            'success_story' => $success_story,
            'all_categories' => $all_category,
        ]);
    }

    public function success_story_category($id)
    {
        $all_success_stories = SuccessStory::where(['success_story_category_id' => $id])->orderBy('id', 'desc')->paginate(2);
        if(empty($all_success_stories)){
            abort(404);
        }
        $category_name = SuccessStoryCategory::where(['id' => $id, 'status' => 'publish'])->first()->name;
        return view('frontend.pages.success-story.success-story-category')->with([
            'category_name' => $category_name,
            'all_success_stories' => $all_success_stories,

        ]);
    }



    public function contact_page()
    {
        $all_contact_info = ContactInfoItem::get();
        return view('frontend.pages.contact-page')->with([
            'all_contact_info' => $all_contact_info
        ]);
    }


    public function request_quote()
    {
        return view('frontend.pages.quote-page');
    }

    public function subscribe_newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:191|unique:newsletters'
        ]);
        $verify_token = Str::random(32);
        Newsletter::create([
            'email' => $request->email,
            'verified' => 0,
            'verify_token' => $verify_token
        ]);
        $message = __('verify your email to get all news from '). get_static_option('site_'.get_default_language().'_title') . '<div class="btn-wrap"> <a class="anchor-btn" href="' . route('subscriber.verify', ['token' => $verify_token]) . '">' . __('verify email') . '</a></div>';
        $data = [
            'message' => $message,
            'subject' => __('verify your email')
        ];
        //send verify mail to newsletter subscriber
        Mail::to($request->email)->send(new BasicMail($data));

        return response()->json([
            'msg' => __('Thanks for Subscribe Our Newsletter'),
            'type' => 'success'
        ]);
    }

    public function subscriber_verify(Request $request){
        $newsletter = Newsletter::where('token',$request->token)->first();
        $title = __('Sorry');
        $description = __('your token is expired');
        if (!empty($newsletter)){
            Newsletter::where('token',$request->token)->update([
                'verified' => 1
            ]);
            $title = __('Thanks');
            $description = __('we are really thankful to you for subscribe our newsletter');
        }
        return view('frontend.thankyou',compact('title','description'));
    }


    public function booking_confirm($id)
    {
        $attendance_details = EventAttendance::find($id);
        return view('frontend.payment.booking-confirm')->with(['attendance_details' => $attendance_details]);
    }


    public function showUserForgetPasswordForm()
    {
        return view('frontend.user.forget-password');
    }

    public function sendUserForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!empty($user_info)) {
            $token_id = Str::random(30);
            $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
            if (empty($existing_token)) {
                DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
            }
            $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') . ' <a class="btn" href="' . route('user.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">' . __('Click Reset Password') . '</a>';
            $data = [
                'username' => $user_info->username,
                'message' => $message
            ];
            try{
                Mail::to($user_info->email)->send(new AdminResetEmail($data));
            }catch(\Eception $e){
                return redirect()->back()->with([
                    'type' => 'danger',
                    'msg' => $e->getMessage()
                ]);
            }

            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Your Username or Email Is Wrong!!!'),
            'type' => 'danger'
        ]);
    }

    public function showUserResetPasswordForm($username, $token)
    {
        return view('frontend.user.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }

    public function UserResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = User::where('username', $request->username)->first();
        $user = User::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }


    public function generate_event_invoice(Request $request)
    {
        $attendance_details = EventAttendance::find($request->id);
        if (empty($attendance_details)) {
            return redirect_404_page();
        }
        $payment_log = EventPaymentLogs::where(['attendance_id' => $request->id])->first();
        $pdf = PDF::loadView('invoice.event-attendance', ['attendance_details' => $attendance_details, 'payment_log' => $payment_log]);
        return $pdf->download('event-attendance-invoice.pdf');
    }


    public function testimonials()
    {
        $all_testimonials = Testimonial::paginate(6);
        return view('frontend.pages.testimonial-page')->with(['all_testimonials' => $all_testimonials]);
    }

    public function feedback_page()
    {
        return view('frontend.pages.feedback-page');
    }

    public function clients_feedback_page()
    {
        $all_feedback = Feedback::all();
        return view('frontend.pages.clients-feedback')->with(['all_feedback' => $all_feedback]);
    }

    public function image_gallery_page()
    {
        $order = !empty(get_static_option('site_image_gallery_order')) ? get_static_option('site_image_gallery_order') : 'DESC';
        $order_by = !empty(get_static_option('site_image_gallery_order_by')) ? get_static_option('site_image_gallery_order_by') : 'id';
        $all_gallery_images = ImageGallery::orderBy($order_by, $order)->paginate(get_static_option('site_image_gallery_post_items'));
        $all_contain_cat = $all_gallery_images->map(function ($item){
            return $item->cat_id;
        });
        $all_category = ImageGalleryCategory::find($all_contain_cat);
        return view('frontend.pages.image-gallery')->with(['all_gallery_images' => $all_gallery_images,'all_category' => $all_category]);
    }

    public function donor_list()
    {
        $all_donation_log = CauseLogs::where('status', 'complete')->orderBy('id','desc')->paginate(40);
        return view('frontend.pages.donor-list')->with(['all_donation_log' => $all_donation_log]);
    }

    public function ajax_login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:6'
        ],[
            'username.required'   => __('username required'),
            'password.required' => __('password required'),
            'password.min' => __('password length must be 6 characters')
        ]);

        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return response()->json([
                'msg' => __('login Success Redirecting'),
                'type' => 'danger',
                'status' => 'valid'
            ]);
        }
        return response()->json([
            'msg' => __('Username Or Password Doest Not Matched !!!'),
            'type' => 'danger',
            'status' => 'invalid'
        ]);
    }

    public function user_campaign(){
        if (Auth::guard('web')->check()){
            return redirect()->route('user.campaign.new');
        }
        return view('frontend.user.login')->with(['title' => __('Login To Create New Campaign')]);
    }

    public function user_logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }


}//end class
