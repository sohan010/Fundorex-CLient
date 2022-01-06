<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AppointmentBooking;
use App\CourseEnroll;
use App\Cause;
use App\CauseLogs;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events\SupportMessage;
use App\Helpers\DonationHelpers;
use App\Helpers\FlashMsg;
use App\Helpers\NexelitHelpers;
use App\Mail\BasicMail;
use App\Mail\DonationWithdrawRequest;
use App\Mail\UserEmailVeiry;
use App\Order;
use App\CauseCategory;
use App\CauseUpdate;
use App\Products;
use App\SupportTicket;
use App\SupportTicketMessage;
use App\User;
use App\DonationWithdraw;
use App\UserVerify;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public const BASE_PATH = 'frontend.user.dashboard.';

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function user_index()
    {
        $event_attendances = EventAttendance::where('user_id', $this->logged_user_details()->id)->count();
        $donation = CauseLogs::where('user_id', $this->logged_user_details()->id)->count();
        $campaigns = Cause::where('user_id', $this->logged_user_details()->id)->count();
        $support_tickets = SupportTicket::where('user_id',$this->logged_user_details()->id)->count();

        return view('frontend.user.dashboard.user-home')->with(
            [
                'event_attendances' => $event_attendances,
                'donation' => $donation,
                'campaigns' => $campaigns,
                'support_tickets' => $support_tickets,
            ]);
    }

    public function user_email_verify_index()
    {
        $user_details = Auth::guard('web')->user();
        if ($user_details->email_verified == 1) {
            return redirect()->route('user.home');
        }
        if (empty($user_details->email_verify_token)) {
            User::find($user_details->id)->update(['email_verify_token' => \Str::random(8)]);
            $user_details = User::find($user_details->id);
            $message_body = __('Here is your verification code') . ' <span class="verify-code">' . $user_details->email_verify_token . '</span>';
            
            try{
                 Mail::to($user_details->email)->send(new BasicMail([
                    'subject' => __('Verify your email address'),
                    'message' => $message_body
                ]));
                
            }catch(\Exception $e){
                
            }
        }
        return view('frontend.user.email-verify');
    }

    public function reset_user_email_verify_code()
    {
        $user_details = Auth::guard('web')->user();
        if ($user_details->email_verified == 1) {
            return redirect()->route('user.home');
        }
        $message_body = __('Here is your verification code') . ' <span class="verify-code">' . $user_details->email_verify_token . '</span>';
        
        try{
           Mail::to($user_details->email)->send(new BasicMail([
                'subject' => __('Verify your email address'),
                'message' => $message_body
            ]));
        }catch(\Exception $e){
            return redirect()->route('user.email.verify')->with(['msg' => $e->getMessage(), 'type' => 'danger']);
        }
        
        return redirect()->route('user.email.verify')->with(['msg' => __('Resend Verify Email Success'), 'type' => 'success']);
    }

    public function user_email_verify(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required'
        ], [
            'verification_code.required' => __('verify code is required')
        ]);
        $user_details = Auth::guard('web')->user();
        $user_info = User::where(['id' => $user_details->id, 'email_verify_token' => $request->verification_code])->first();
        if (empty($user_info)) {
            return redirect()->back()->with(['msg' => __('your verification code is wrong, try again'), 'type' => 'danger']);
        }
        $user_info->email_verified = 1;
        $user_info->save();
        return redirect()->route('user.home');
    }

    public function user_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,id,'.$request->user_id,
            'phone' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'zipcode' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'address' => 'nullable|string',
            'image' => 'nullable|string',
        ], [
            'name.' => __('name is required'),
            'email.required' => __('email is required'),
            'email.email' => __('provide valid email'),
        ]);
        User::find(Auth::guard()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $request->image,
                'phone' => $request->phone,
                'state' => $request->state,
                'city' => $request->city,
                'zipcode' => $request->zipcode,
                'country' => $request->country,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with(['msg' => __('Profile Update Success'), 'type' => 'success']);
    }

    public function user_password_change(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ],
            [
                'old_password.required' => __('Old password is required'),
                'password.required' => __('Password is required'),
                'password.confirmed' => __('password must have to be confirmed')
            ]
        );

        $user = User::findOrFail(Auth::guard()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::guard('web')->logout();

            return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function event_order_cancel(Request $request)
    {
        $order_details = EventAttendance::where(['id' => $request->order_id, 'user_id' => Auth::guard('web')->user()->id])->first();
        EventAttendance::where('id', $order_details->id)->update([
            'status' => 'cancel'
        ]);
        $event_payment_log = EventPaymentLogs::where(['attendance_id' => $request->order_id])->first();
        $admin_mail = !empty(get_static_option('event_attendance_receiver_mail')) ? get_static_option('event_attendance_receiver_mail') : get_static_option('site_global_email');
        //send mail to admin
        $data['subject'] = __('one of your event booking order has been cancelled');
        $data['message'] = __('hello') . '<br>';
        $data['message'] .= __('your event attendance id') . ' #' . $order_details->id . ' ';
        $data['message'] .= __('has been cancelled by the user.');
        
        try{
            Mail::to($admin_mail)->send(new BasicMail($data));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'danger']);
        }
        
        if (!empty($event_payment_log)) {
            //send mail to customer
            $data['subject'] = __('your event booking has benn cancelled');
            $data['message'] = __('hello') . $event_payment_log->name . '<br>';
            $data['message'] .= __('your event attendance id') . ' #' . $order_details->id . ' ';
            $data['message'] .= __('booking status has been changed to cancel.');
            
            //send mail while order status change
            try{
                Mail::to($event_payment_log->email)->send(new BasicMail($data));
            }catch(\Exception $e){
                return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'danger']);
            }
        }
        
        return redirect()->back()->with(['msg' => __('Order Cancel'), 'type' => 'warning']);
    }

    public function donation_order_cancel(Request $request)
    {
        $order_details = CauseLogs::where(['id' => $request->order_id, 'user_id' => Auth::guard('web')->user()->id])->first();
        CauseLogs::where('id', $order_details->id)->update([
            'status' => 'cancel'
        ]);

        $donation_notify_mail = get_static_option('donation_notify_mail');
        $admin_mail = !empty($donation_notify_mail) ? $donation_notify_mail : get_static_option('site_global_email');

        //send mail to admin
        $data['subject'] = __('one of your donation has been cancelled');
        $data['message'] = __('hello') . '<br>';
        $data['message'] .= __('your donation log id') . ' #' . $order_details->id . ' ';
        $data['message'] .= __('has been cancelled by the user.');
        
        try{
             Mail::to($admin_mail)->send(new BasicMail($data));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'danger']);
        }
        
        //send mail to customer
        $data['subject'] = __('your donation has benn cancelled');
        $data['message'] = __('hello') . $order_details->name . '<br>';
        $data['message'] .= __('your donation log id') . ' #' . $order_details->id . ' ';
        $data['message'] .= __('status has been changed to cancel.');
        
        //send mail while order status change
        try{
             Mail::to($order_details->email)->send(new BasicMail($data));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'danger']);
        }
       
        return redirect()->back()->with(['msg' => __('donation Cancel'), 'type' => 'warning']);
    }

    public function event_booking()
    {
        $event_attendances = EventAttendance::where('user_id', $this->logged_user_details()->id)->orderBy('id', 'DESC')->paginate(10);
        return view(self::BASE_PATH . 'event-booking')->with(['event_attendances' => $event_attendances]);
    }

    public function donations()
    {
        $donations = CauseLogs::where('user_id', $this->logged_user_details()->id)->orderBy('id', 'DESC')->paginate(10);
        return view(self::BASE_PATH . 'donations')->with(['donation' => $donations]);
    }

    public function edit_profile()
    {
        return view(self::BASE_PATH . 'edit-profile')->with(['user_details' => $this->logged_user_details()]);
    }


    public function change_password()
    {
        return view(self::BASE_PATH . 'change-password');
    }

    public function logged_user_details()
    {
        $old_details = '';
        if (empty($old_details)) {
            $old_details = User::findOrFail(Auth::guard('web')->user()->id);
        }
        return $old_details;
    }


//===================== USER CAMPAIGNS CODE =====================//

    // Cause Update Code
    public function user_all_update_causes($id)
    {
        $all_update_causes = CauseUpdate::where(['cause_id' => $id])->get();
        $cause_id = $id;
        return view(self::BASE_PATH . 'campaigns.cause-update.all-update-cause')->with([
            'all_update_causes' => $all_update_causes,
            'cause_id' => $cause_id
        ]);
    }

    public function new_user_update_cause($id)
    {
        $cause_id = $id;
        return view(self::BASE_PATH . 'campaigns.cause-update.new-update-cause', compact('cause_id'));
    }

    public function store_update_causes(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',

        ], [
            'title.required' => __('title is required'),
            'status.required' => __('status is required'),
        ]);

        $id = CauseUpdate::create([
            'title' => $request->title,
            'cause_id' => $request->cause_id,
            'description' => $request->description,
            'image' => $request->image,
        ])->id;

        Cause::where('id', $request->cause_id)->update(['cause_update_id' => $id]);

        return redirect()->back()->with(['msg' => __('New item added'), 'type' => 'success']);
    }


    public function update_update_causes(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'nullable|string',
        ], [
            'title.required' => __('title is required'),
        ]);

        CauseUpdate::findOrFail($request->case_update_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'cause_id' => $request->cause_id,
        ]);

        return redirect()->back()->with(['msg' => __('Update success'), 'type' => 'success']);

    }

    public function delete_update_cause(Request $request, $id)
    {
        CauseUpdate::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('item deleted'), 'type' => 'danger']);
    }

    // User Campaign Log and Withdraw Code
    public function campaign_log_withdraw()
    {
        $causes = Cause::where('user_id', $this->logged_user_details()->id)->get();
        $withdraw_logs = DonationWithdraw::where('user_id', $this->logged_user_details()->id)->paginate(10);
        return view(self::BASE_PATH . 'campaigns.campaign-log-withdraw')->with(['causes' => $causes, 'withdraw_logs' => $withdraw_logs]);
    }

    public function campaign_withdraw_view($id){
        $withdraw = DonationWithdraw::where(['user_id' => $this->logged_user_details()->id,'id' => $id])->first();
        return view(self::BASE_PATH.'campaigns.withdraw-view')->with(['withdraw' => $withdraw]);
    }

    public function campaign_withdraw_submit(Request $request)
    {
        $request->validate([
            'payment_gateway' => 'required',
            'withdraw_request_amount' => 'required',
            'payment_account_details' => 'required',
            'additional_comment_by_user' => 'nullable',
        ]);
        $user_details = User::find($this->logged_user_details()->id);
        $cause = Cause::where(['id' => $request->cause_id, 'user_id' => $this->logged_user_details()->id,'status' => 'publish'])->first();
        if(empty($cause)){
             return redirect()->back()->with(['msg' => __('Your Campagian is not yet approve or not exists'), 'type' => 'danger']);
        }
        if($request->withdraw_request_amount < 1){
             return redirect()->back()->with(['msg' => __('you can not withdraw less than').' '.amount_with_currency_symbol(1), 'type' => 'danger']);
        }
        $raised_amount = (int)$cause->raised;
        $all_withdraws = DonationWithdraw::where(['donation_id' => $cause->id, 'user_id' => $this->logged_user_details()->id])->where('payment_status', '!=', 'reject')->get()->pluck('withdraw_request_amount')->sum();
        $available_amount = ($raised_amount < $all_withdraws) ? 0 : $raised_amount - $all_withdraws;

        if ($request->withdraw_request_amount > $available_amount) {
            return back()->with(FlashMsg::item_delete(__('you withdraw amount is getter than your raised amount')));
        }

        DonationWithdraw::create([
            'donation_id' => $request->cause_id,
            'user_id' => $this->logged_user_details()->id,
            'payment_gateway' => $request->payment_gateway,
            'withdraw_request_amount' => $request->withdraw_request_amount,
            'payment_account_details' => $request->payment_account_details,
            'additional_comment_by_user' => $request->additional_comment_by_user,
        ]);
        
        $admin_mail = get_static_option('site_global_email');

        try{
            Mail::to($admin_mail)->send(new DonationWithdrawRequest([
                'subject' => __('You have new donation withdrawal Message'),
                'user_name' => $user_details->name ?? __('user not found'),
                'amount' => $request->withdraw_request_amount,
            ]));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'success']);
        }
        
        return redirect()->back()->with(['msg' => __('Your Withdraw Request has been sent'), 'type' => 'success']);
    }


    public function campaign_withdraw_check(Request $request)
    {
        $cause = Cause::where(['id' => $request->id, 'user_id' => $this->logged_user_details()->id,'status' => 'publish'])->first();
        if(empty($cause)){
             return response()->json([
                'withdraw_sum' => 0,
                'raised_amount' => 0,
                'available_amount' => 0,
            ]);
        }
        $raised_amount = (int)$cause->raised;
        $all_withdraws = DonationWithdraw::where(['donation_id' => $cause->id, 'user_id' => $this->logged_user_details()->id])->where('payment_status', '!=', 'reject')->get()->pluck('withdraw_request_amount')->sum();
        $available_amount = ($raised_amount < $all_withdraws) ? 0 : $raised_amount - $all_withdraws;
        return response()->json([
            'withdraw_sum' => $all_withdraws,
            'raised_amount' => $raised_amount,
            'available_amount' => $available_amount -  DonationHelpers::get_donation_charge_for_campaign_owner($available_amount),
            'admin_charge' => DonationHelpers::get_donation_charge_for_campaign_owner($available_amount),
        ]);
    }

    //Support Tickets
    public function support_tickets(){
        $all_tickets = SupportTicket::where('user_id',$this->logged_user_details()->id)->paginate(10);
        return view(self::BASE_PATH.'support-tickets')->with([ 'all_tickets' => $all_tickets]);
    }

    public function support_ticket_priority_change(Request $request){
        $this->validate($request,[
            'priority' => 'required|string|max:191'
        ]);
        SupportTicket::findOrFail($request->id)->update([
            'priority' => $request->priority,
        ]);
        return 'ok';
    }

    public function support_ticket_status_change(Request $request){
        $this->validate($request,[
            'status' => 'required|string|max:191'
        ]);
        SupportTicket::findOrFail($request->id)->update([
            'status' => $request->status,
        ]);
        return 'ok';
    }
    public function support_ticket_view(Request $request,$id){
        $ticket_details = SupportTicket::findOrFail($id);
        $all_messages = SupportTicketMessage::where(['support_ticket_id'=>$id])->get();
        $q = $request->q ?? '';
        return view(self::BASE_PATH.'view-ticket')->with(['ticket_details' => $ticket_details,'all_messages' => $all_messages,'q' => $q]);
    }

    public function support_ticket_message(Request $request){
        $this->validate($request,[
            'ticket_id' => 'required',
            'user_type' => 'required|string|max:191',
            'message' => 'required',
            'send_notify_mail' => 'nullable|string',
            'file' => 'nullable|mimes:zip',
        ]);

        $ticket_info = SupportTicketMessage::create([
            'support_ticket_id' => $request->ticket_id,
            'type' => $request->user_type,
            'message' => $request->message,
            'notify' => $request->send_notify_mail ? 'on' : 'off',
        ]);

        if ($request->hasFile('file')){
            $uploaded_file = $request->file;
            $file_extension = $uploaded_file->getClientOriginalExtension();
            $file_name =  pathinfo($uploaded_file->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$file_extension;
            $uploaded_file->move('assets/uploads/ticket',$file_name);
            $ticket_info->attachment = $file_name;
            $ticket_info->save();
        }
        //send mail to user
        event(new SupportMessage($ticket_info));
        return back()->with(FlashMsg::item_update(__('Message send')));
    }

    public function verify_info()
    {
        return view('frontend.user.dashboard.verify-user');
    }

    public function verify_info_store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'date_of_birth' => 'required|string',
            'family_card_photo' => 'required|max:5000',
            'selfie_photo' => 'required|max:5000',
            'selfie_with_family_card_photo' => 'required|max:5000',
        ],[
            'family_card_photo.max'=> __('Image must be less than 5 mb'),
            'selfie_photo.max'=>  __('Image must be less than 5 mb'),
            'selfie_with_family_card_photo.max'=>  __('Image must be less than 5 mb')
        ]);

        UserVerify::create([
            'user_id'=> $request->user_id,
            'name'=> $request->name,
            'date_of_birth'=> $request->date_of_birth,
            'family_card_photo'=> $request->family_card_photo,
            'selfie_photo'=> $request->selfie_photo,
            'selfie_with_family_card_photo'=> $request->selfie_with_family_card_photo,
        ]);

        User::where('id',$request->user_id)->update(['user_info_verified'=>1]);

        return redirect()->route('user.campaign.all')->with(FlashMsg::item_new(__('Your kyc document submited now you can create campaign and withdraw..!')));

    }
}
