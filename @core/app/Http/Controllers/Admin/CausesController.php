<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Cause;
use App\CauseCategory;
use App\CauseLogs;

use App\EventAttendance;
use App\EventPaymentLogs;
use App\Helpers\DataTableHelpers\Donation;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use App\Mail\BasicMail;
use App\Mail\DonationMessage;
use App\Mail\PaymentSuccess;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CausesController extends Controller
{
    private const BASE_PATH = 'backend.donations.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:donation-list|donation-create|donation-edit|donation-delete',['only' => 'all_donation','donated_donors']);
        $this->middleware('permission:donation-create',['only' => 'new_donation','store_donation']);
        $this->middleware('permission:donation-edit',['only' => 'edit_donation','update_donation','clone_donation','donation_approve']);
        $this->middleware('permission:donation-delete',['only' => 'delete_donation','bulk_action']);
        /* ==== pending cause permission ====*/
        $this->middleware('permission:donation-pending-cause',['only' => 'all_pending_donation']);
        /* ==== donation settings ====*/
        $this->middleware('permission:donation-settings',['only' => 'update_settings','settings']);
        $this->middleware('permission:donation-pending-cause',['only' => 'all_pending_donation']);
        /* ==== donation payment log ====*/
        $this->middleware('permission:donation-payment-list|donation-payment-edit|donation-payment-delete',['only' => 'donation_payment_logs']);
        $this->middleware('permission:donation-payment-edit',['only' => 'approve_donation_payment','donation_reminder']);
        $this->middleware('permission:donation-payment-delete',['only' => 'delete_donation_payment_logs','donation_payment_logs_bulk_action']);
    }

    public function all_donation(Request $request)
    {
        if ($request->ajax()){
            $data = Cause::select('*')->orderBy('id','desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('info',function ($row){
                    return Donation::infoColumn($row);
                })
                ->addColumn('image',function ($row){
                    return General::image($row->image);
                })
                ->addColumn('category',function ($row){
                    return donation_category_by_id($row->categories_id);
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $action .= General::viewIcon(route('frontend.donations.single',$row->slug));
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('donation-delete')){
                        $action .= General::deletePopover(route('admin.donations.delete',$row->id));
                    }
                    if ($admin->can('donation-edit')){
                        $action .= General::editIcon(route('admin.donations.edit',$row->id));
                        $action .= General::cloneIcon(route('admin.donations.clone'),$row->id);
                        $action .= General::anchor(route('admin.donations.donors',$row->id),__('Donors'));
                        $action .= Donation::aboutUpdate($row->id);
                        $action .= Donation::comments($row->id);
                        if ($row->created_by === 'user' && $row->status === 'pending'){
                            $action .= Donation::campaignApprove($row->id);
                        }
                    }
                    return $action;
                })
                ->rawColumns(['action','checkbox','image','info'])
                ->make(true);
        }
        return view(self::BASE_PATH . 'all-donations');

    }
    public function all_pending_donation(Request $request)
    {
        if ($request->ajax()){
            $data = Cause::select('*')->where(['status' => 'pending'])->orderBy('id','desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('info',function ($row){
                    return Donation::infoColumn($row);
                })
                ->addColumn('image',function ($row){
                    return General::image($row->image);
                })
                ->addColumn('category',function ($row){
                    return donation_category_by_id($row->categories_id);
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $action .= General::deletePopover(route('admin.donations.delete',$row->id));
                    $action .= General::editIcon(route('admin.donations.edit',$row->id));
                    $action .= General::viewIcon(route('frontend.donations.single',$row->slug));
                    $action .= General::cloneIcon(route('admin.donations.clone'),$row->id);
                    $action .= Donation::aboutUpdate($row->id);
                    $action .= Donation::comments($row->id);

                    if ($row->created_by === 'user' && $row->status === 'pending'){
                        $action .= Donation::campaignApprove($row->id);
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','image','info'])
                ->make(true);
        }
        return view(self::BASE_PATH . 'pending-donations');

    }

    public function new_donation()
    {
        $all_category = CauseCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH . 'new-donation')->with(['all_category' => $all_category]);
    }

    public function store_donation(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'cause_content' => 'required|string',
            'amount' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'deadline' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'image_gallery' => 'nullable|string',
            'medical_document' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'featured' => 'nullable|string',
            'emmergency' => 'nullable|string',
            'emmergency_title' => 'nullable|string',
            'categories_id' => 'required|string',
            'og_meta_title' => 'nullable|string',
            'og_meta_description' => 'nullable|string',
            'og_meta_image' => 'nullable|string',
        ], [
            'title.required' => __('title is required'),
            'cause_content.required' => __('donation content is required'),
            'amount.required' => __('amount is required'),
            'status.required' => __('status is required'),
            'categories_id.required' => __('category is required'),
        ]);
        $faq_item = $request->faq ?? ['title' => ['']];
        Cause::create([
            'title' => $request->title,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title),
            'cause_content' => $request->cause_content,
            'amount' => $request->amount,
            'status' => $request->status,
            'image' => $request->image,
            'deadline' => $request->deadline,
            'image_gallery' => $request->image_gallery,
            'medical_document' => $request->medical_document,
            'faq' => serialize($faq_item),
            'admin_id' => Auth::guard('admin')->user()->id,
            'created_by' => 'admin',
            'excerpt' => $request->excerpt,
            'meta_title' => $request->meta_title,
            'categories_id' => $request->categories_id,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'featured' => $request->featured,
            'emmergency' => $request->emmergency,
            'emmergency_title' => $request->emmergency_title,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);

        return redirect()->back()->with(['msg' => __('New Cause Added'), 'type' => 'success']);
    }

    public function edit_donation($id)
    {

        $donation = Cause::findOrFail($id);
        $all_category = CauseCategory::all();

        return view(self::BASE_PATH . 'edit-donations')->with(['donation' => $donation, 'all_category' => $all_category]);
    }

    public function update_donation(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'slug' => 'nullable|string',
            'cause_content' => 'required|string',
            'amount' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'deadline' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'image_gallery' => 'nullable|string',
            'medical_document' => 'nullable|string',
            'featured' => 'nullable|string',
            'emmergency' => 'nullable|string',
            'emmergency_title' => 'nullable|string',
            'categories_id' => 'required|string',
        ],
            [
                'title.required' => __('title is required'),
                'cause_content.required' => __('donation content is required'),
                'amount.required' => __('amount is required'),
                'status.required' => __('status is required'),
                'categories_id.required' => __('category is required'),
            ]);
            $cause =  Cause::findOrFail($request->donation_id);
        $faq_item = $request->faq ?? ['title' => ['']];
        Cause::findOrFail($request->donation_id)->update([
            'title' => $request->title,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title),
            'cause_content' => $request->cause_content,
            'amount' => $request->amount,
            'status' => $request->status,
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
            'featured' => $request->featured,
            'emmergency' => $request->emmergency,
            'emmergency_title' => $request->emmergency_title,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);

        return redirect()->back()->with(['msg' => __('Cause Updated...'), 'type' => 'success']);
    }

    public function delete_donation(Request $request, $id)
    {
        Cause::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('Donation Deleted...'), 'type' => 'danger']);
    }

    public function clone_donation(Request $request)
    {
        $donation_details = Cause::findOrFail($request->item_id);
        Cause::create([
            'title' => $donation_details->title,
            'slug' => !empty($donation_details->slug) ? $donation_details->slug : \Str::slug($donation_details->title),
            'cause_content' => $donation_details->cause_content,
            'amount' => $donation_details->amount,
            'status' => 'draft',
            'image' => $donation_details->image,
            'meta_tags' => $donation_details->meta_tags,
            'meta_description' => $donation_details->meta_description,
            'deadline' => $donation_details->deadline,
            'image_gallery' => $donation_details->image_gallery,
            'medical_document' => $donation_details->medical_document,
            'faq' => $donation_details->faq,
            'admin_id' => $donation_details->admin_id,
            'created_by' => 'admin',
            'meta_title' => $donation_details->meta_title,
            'categories_id' => $donation_details->categories_id,
            'featured' => $donation_details->featured,
            'emmergency' => $donation_details->emmergency,
            'emmergency_title' => $donation_details->emmergency_title,
            'excerpt' => $donation_details->excerpt,
            'og_meta_title' => $request->og_meta_title,
            'og_meta_description' => $request->og_meta_description,
            'og_meta_image' => $request->og_meta_image,
        ]);

        return redirect()->back()->with(['msg' => __('Cause Cloned...'), 'type' => 'success']);
    }


    public function donation_payment_logs(Request $request)
    {

        if ($request->ajax()){
            $donation_logs =  CauseLogs::select('*')->orderBy('id','desc');
            return DataTables::of($donation_logs)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('info',function ($row){
                    return Donation::paymentInfoColumn($row);
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                ->addColumn('action', function($row){
                    $admin = auth()->guard('admin')->user();
                    $action = '';
                    if ($admin->can('donation-payment-delete')){
                        $action .= General::deletePopover(route('admin.donations.payment.delete',$row->id));
                    }
                    if ($admin->can('donation-payment-edit')){
                        if($row->payment_gateway == 'manual_payment' && $row->status == 'pending'){
                            $action .= General::paymentAccept(route('admin.donations.payment.approve',$row->id));
                        }
                        if($row->status == 'complete'){
                            $action .= General::invoiceBtn(route('frontend.donation.invoice.generate'),$row->id);
                        }
                        if(!empty($row->user_id) && $row->status == 'pending'){
                            $action .= General::reminderMail(route('admin.donation.reminder'),$row->id);
                        }
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status'])
                ->make(true);
        }
        return view(self::BASE_PATH . 'donation-payment-logs-all');
    }

    public function delete_donation_payment_logs(Request $request, $id)
    {
        CauseLogs::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('Donation Payment Log Deleted..'), 'type' => 'danger']);
    }

    public function approve_donation_payment(Request $request, $id)
    {

        $payment_logs = CauseLogs::findOrFail($id);
        $payment_logs->status = 'complete';
        $payment_logs->save();

        //update donation raised amount
        $event_details = Cause::findOrFail($payment_logs->cause_id);
        $event_details->raised = (int)$event_details->raised + (int)$payment_logs->amount;
        $event_details->save();

        $site_title = get_static_option('site_' . get_default_language() . '_title');
        $customer_subject = __('Your donation payment success for') . ' ' . $site_title;
        $admin_subject = __('You have a new donation payment from') . ' ' . $site_title;
        $admin_mail = get_static_option('site_global_email');
        $donation_notify_mail = get_static_option('donation_notify_mail') ??  $admin_mail;
        try{
            Mail::to($donation_notify_mail)->send(new DonationMessage($payment_logs, $admin_subject, 'owner'));
            Mail::to($payment_logs->email)->send(new DonationMessage($payment_logs, $customer_subject, 'customer'));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => __('Manual Payment Accept Success, but mail not send'), 'type' => 'success']);
        }
     
        return redirect()->back()->with(['msg' => __('Manual Payment Accept Success'), 'type' => 'success']);
    }

    public function bulk_action(Request $request)
    {
        Cause::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function donation_payment_logs_bulk_action(Request $request)
    {
        $all = CauseLogs::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function donation_report(Request $request)
    {
        $order_data = '';
        $query = CauseLogs::query();
        if (!empty($request->start_date)) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if (!empty($request->end_date)) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if (!empty($request->payment_status)) {
            $query->where(['status' => $request->payment_status]);
        }
        $error_msg = __('select start & end date to generate event payment report');
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $query->orderBy('id', 'DESC');
            $order_data = $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH . 'donation-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'payment_status' => $request->payment_status,
            'error_msg' => $error_msg
        ]);
    }

    //
    public function donation_reminder(Request $request)
    {
        $order_details = CauseLogs::findOrFail($request->id);
        $data['subject'] = __('your donation is still in pending at') . ' ' . get_static_option('site_title');
        $data['message'] = __('hello') . ' ' . $order_details->name . '<br>';
        $data['message'] .= __('your event booking') . ' #' . $order_details->id . ' ';
        $data['message'] .= __('is still in pending, to complete your donation go to');
        $data['message'] .= ' <a href="' . route('user.home') . '">' . __('your dashboard') . '</a>';

        //send mail while order status change
        try{
            Mail::to($order_details->email)->send(new BasicMail($data));
        }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(), 'type' => 'danger']);
        }
       

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'), 'type' => 'success']);
    }


    public function settings()
    {
        return view(self::BASE_PATH . 'settings');
    }

    public function update_settings(Request $request)
    {
        $this->validate($request, [
            'donation_charge_active_deactive_button' => 'nullable|string',
            'charge_amount_type' => 'nullable|string',
            'charge_amount' => 'nullable|string',
            'donation_deadline_text' => 'nullable|string',
        ]);
        $fields = [
            'donation_charge_active_deactive_button',
            'charge_amount_type',
            'charge_amount',
            'donation_button_text',
            'donation_raised_text',
            'donation_goal_text',
            'site_events_post_items',
            'donation_single_form_button_text',
            'donation_single_recent_donation_text',
            'donation_custom_amount',
            'donation_default_amount',
            'donation_notify_mail',
            'donation_single_faq_title',
            'cause_single_donate_button_text',
            'cause_single_donate_sidebar_text',
            'donation_success_page_title',
            'donation_success_page_description',
            'donation_cancel_page_title',
            'donation_cancel_page_description',
            'donation_single_page_countdown_status',
            'donation_charge_form',
            'user_campaign_metadata_status',
            'allow_user_to_add_custom_tip_in_donation',
            'donation_deadline_text',
            'donation_medical_document_button_text',
            'emmergency_donation_text',
            'releated_donation_text',
            'donation_medical_document_button_show_hide',
            'donation_flag_show_hide',
            'donation_descriptions_show_hide',
            'donation_updates_show_hide',
            'donation_comments_show_hide',
            'donation_faq_show_hide',

            'donation_social_icons_show_hide',
            'donation_recent_donors_show_hide',
        ];

        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }


    public function donation_approve(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $msg = __('Approve Success');
        $cause = Cause::findOrFail($request->id);
        $cause->status = 'publish';
        $cause->save();
        $user_details = User::find($cause->user_id);
        if ($user_details->email){
            try{
                Mail::to($user_details->email)->send(new BasicMail([
                    'subject' => __('your campaign is approve'),
                    'message' => __('congrats').'<br>'.__('your campaign is now live'),
                ]));
            }catch(\Exception $e){
                return back()->with(['msg' => $msg, 'type' => 'success']);
                return redirect()->back()->with(['msg' => $msg.' '.__(',notification mail send failed'), 'type' => 'success']);
            }

            $msg .= ' '.__(',notification mail send');
        }
        return back()->with(['msg' => $msg, 'type' => 'success']);
    }

        public function single_variant()
        {
            return view(self::BASE_PATH.'single-page-variant');
        }

        public function update_single_variant(Request $request)
        {
            $this->validate($request, [
                'donation_single_page_variant' => 'required|string'
            ]);
            update_static_option('donation_single_page_variant', $request->donation_single_page_variant);
            return redirect()->back()->with(['msg' => __('Donation Single Page Variant Updated..'), 'type' => 'success']);
        }

    public function donated_donors($id){
        if (empty($id) && !is_int($id)){
            abort(404);
        }
        $cause = Cause::findOrfail($id);
        $selected_winner = !empty($cause->winners_donation_ids) ? json_decode($cause->winners_donation_ids) : [];
        $winners = [];
        if (!empty($selected_winner)){
            $winners = CauseLogs::whereIn('id',$selected_winner)->get();
        }
        if (\request()->ajax()){
            $donation_logs = CauseLogs::where(['status' => 'complete','cause_id' => $id])->orderBy('id','desc')->get();
            return DataTables::of($donation_logs)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('info',function ($row){
                    return Donation::paymentInfoColumn($row);
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                ->addColumn('action', function($row){
                    $admin = auth()->guard('admin')->user();
                    $action = '';
                    if ($admin->can('donation-payment-delete')){
                        $action .= General::deletePopover(route('admin.donations.payment.delete',$row->id));
                    }
                    if ($admin->can('donation-payment-edit')){
                        if($row->payment_gateway == 'manual_payment' && $row->status == 'pending'){
                            $action .= General::paymentAccept(route('admin.donations.payment.approve',$row->id));
                        }
                        if($row->status == 'complete'){
                            $action .= General::invoiceBtn(route('frontend.donation.invoice.generate'),$row->id);
                        }
                        if(!empty($row->user_id) && $row->status == 'pending'){
                            $action .= General::reminderMail(route('admin.donation.reminder'),$row->id);
                        }
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status'])
                ->make(true);
        }

        return view(self::BASE_PATH .'donation-payment-logs',compact('id','cause','winners'));
    }

}
