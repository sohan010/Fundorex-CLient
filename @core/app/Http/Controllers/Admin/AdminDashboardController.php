<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Brand;
use App\Cause;
use App\CauseLogs;
use App\EventAttendance;
use App\Events;
use App\Faq;
use App\Jobs;
use App\Language;
use App\MediaUpload;
use App\Blog;
use App\ContactInfoItem;
use App\Counterup;
use App\SocialIcons;
use App\TeamMember;
use App\Testimonial;
use App\DonationWithdraw;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:home_variant',['only' => ['home_variant','update_home_variant']]);
    }
    
    public function get_chart_data(Request $request){
      /* -------------------------------------
          TOTAL RAISED BY MONTH CHART DATA
      ------------------------------------- */
        $all_donation_by_month = CauseLogs::select('amount','created_at')->where(['status' => 'complete'])
            ->whereYear('created_at',date('Y'))
            ->get()
            ->groupBy(function ($query){
                return Carbon::parse($query->created_at)->format('F');
            })->toArray();
        $chart_labels = [];
        $chart_data= [];
        foreach ($all_donation_by_month as $month => $amount){
            $chart_labels[] = $month;
            $chart_data[] =  array_sum(array_column($amount,'amount'));
        }
        return response()->json( [
            'labels' => $chart_labels,
            'data' => $chart_data
        ]);
    }

    public function get_chart_by_date_data(Request $request){ 
        /* -----------------------------------------------------
           TOTAL RAISED BY Per Day In Current month CHART DATA
       -------------------------------------------------------- */
        $all_donation_by_month = CauseLogs::select('amount','created_at')->where(['status' => 'complete'])
            // ->whereMonth('created_at',date('m'))
            ->whereDate('created_at', '>', Carbon::now()->subDays(30))
            ->get()
            ->groupBy(function ($query){
                return Carbon::parse($query->created_at)->format('D, d F Y');
            })->toArray();
        $chart_labels = [];
        $chart_data= [];
        foreach ($all_donation_by_month as $month => $amount){
            $chart_labels[] = $month;
            $chart_data[] =  array_sum(array_column($amount,'amount'));
        }

        return response()->json( [
            'labels' => $chart_labels,
            'data' => $chart_data
        ]);
    }

    public function logged_user_details(){
        $old_details = '';
        if (empty($old_details)){
            $old_details = User::findOrFail(Auth::guard('web')->user()->id);
        }
        return $old_details;
    }

    public function adminIndex()
    {
        $total_admin = Admin::count();
        $total_user = User::count();
        $all_blogs = Blog::count();
        $total_testimonial = Testimonial::count();
        $total_team_member = TeamMember::count();
        $total_counterup = Counterup::count();
        $total_jobs = Jobs::count();
        $total_events = Events::count();
        $total_causes = Cause::count();
        $campaign_withdraw = DonationWithdraw::count();

        $total_cause_logs = CauseLogs::where('status','complete')->count();
        $total_event_attendance = EventAttendance::where('status','complete')->count();

        //recent 5 cause and event attendance
        $event_attendance_recent_order = EventAttendance::orderBy('id','desc')->take(5)->get();
        $causes_recent = CauseLogs::orderBy('id','desc')->take(5)->get();

        return view('backend.admin-home')->with([
            'total_admin' => $total_admin,
            'total_user' => $total_user,
            'all_blogs' => $all_blogs,
            'total_testimonial' => $total_testimonial,
            'total_team_member' => $total_team_member,
            'total_counterup' => $total_counterup,
            'total_jobs' => $total_jobs,
            'total_events' => $total_events,
            'total_causes' => $total_causes,
            'total_cause_logs' => $total_cause_logs,
            'total_event_attendance' => $total_event_attendance,
            'event_attendance_recent_order' => $event_attendance_recent_order,
            'causes_recent' => $causes_recent,
            'campaign_withdraw' => $campaign_withdraw,
        ]);
    }


    public function admin_settings()
    {
        return view('auth.admin.settings');
    }

    public function admin_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'username' => 'nullable|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);
        Admin::find(Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email, 'image' => $request->image]);

        return redirect()->back()->with(['msg' => __('Profile Update Success'), 'type' => 'success']);
    }

    public function admin_password_chagne(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = Admin::findOrFail(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with(['msg' => __('You Logged Out !!'), 'type' => 'danger']);
    }

    public function admin_profile()
    {
        return view('auth.admin.edit-profile');
    }

    public function admin_password()
    {
        return view('auth.admin.change-password');
    }

    public function contact()
    {
        $all_contact_info_items = ContactInfoItem::all();
        return view('backend.pages.contact')->with([
            'all_contact_info_item' => $all_contact_info_items
        ]);
    }

    public function update_contact(Request $request)
    {
        $this->validate($request, [
            'page_title' => 'required|string|max:191',
            'get_title' => 'required|string|max:191',
            'get_description' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        update_static_option('contact_page_title', $request->page_title);
        update_static_option('contact_page_get_title', $request->get_title);
        update_static_option('contact_page_get_description', $request->get_description);
        update_static_option('contact_page_latitude', $request->latitude);
        update_static_option('contact_page_longitude', $request->longitude);

        return redirect()->back()->with(['msg' => __('Contact Page Info Update Success'), 'type' => 'success']);
    }


    public function blog_page()
    {
        $all_languages =  Language::orderBy('default','desc')->get();
        return view('backend.pages.blog')->with(['all_languages' => $all_languages]);
    }

    public function blog_page_update(Request $request)
    {

            $this->validate($request, [
                'blog_page_title' => 'nullable',
                'blog_page_item' => 'nullable',
                'blog_page_category_widget_title' => 'nullable',
                'blog_page_recent_post_widget_title' => 'nullable',
                'blog_page_recent_post_widget_item' => 'nullable',
            ]);
            $blog_page_title = 'blog_page_title';
            $blog_page_item = 'blog_page_item';
            $blog_page_category_widget_title = 'blog_page_category_widget_title';
            $blog_page_recent_post_widget_title = 'blog_page_recent_post_widget_title';
            $blog_page_recent_post_widget_item = 'blog_page_recent_post_widget_item';

            update_static_option('blog_page_title', $request->$blog_page_title);
            update_static_option('blog_page_item', $request->$blog_page_item);
            update_static_option('blog_page_category_widget_title', $request->$blog_page_category_widget_title);
            update_static_option('blog_page_recent_post_widget_title', $request->$blog_page_recent_post_widget_title);
            update_static_option('blog_page_recent_post_widget_item', $request->$blog_page_recent_post_widget_item);


        return redirect()->back()->with(['msg' => __('Blog Settings Update Success'), 'type' => 'success']);
    }


    public function home_variant()
    {
        return view('backend.pages.home.home-variant');
    }

    public function update_home_variant(Request $request)
    {
        $this->validate($request, [
            'home_page_variant' => 'required|string'
        ]);
        update_static_option('home_page_variant', $request->home_page_variant);
        return redirect()->back()->with(['msg' => __('Home Variant Settings Updated..'), 'type' => 'success']);
    }

    public function admin_set_static_option(Request $request)
    {
        $this->validate($request,[
            'static_option' => 'required|string',
            'static_option_value' => 'required|string',
        ]);
        set_static_option($request->static_option,$request->static_option_value);
        return 'ok';
    }

    public function admin_get_static_option(Request $request)
    {
        $this->validate($request,[
            'static_option' => 'required|string'
        ]);
        $data = get_static_option($request->static_option);
        return response()->json($data);
    }

    public function admin_update_static_option(Request $request)
    {
        $this->validate($request,[
            'static_option' => 'required|string',
            'static_option_value' => 'required|string',
        ]);
        update_static_option($request->static_option,$request->static_option_value);
        return 'ok';
    }

    public function dark_mode_toggle(Request $request){
        if($request->mode == 'off'){
            update_static_option('site_admin_dark_mode','on');
        }
        if($request->mode == 'on'){
            update_static_option('site_admin_dark_mode','off');
        }

        return response()->json(['status'=>'done']);
    }

}
