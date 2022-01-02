<?php

namespace App\Http\Controllers\Admin;

use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\EventsCategory;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Language;
use App\Mail\BasicMail;
use App\Mail\OrderReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class EventsController extends Controller
{
    private const BASE_PATH = 'backend.events.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:event-list|event-create|event-edit|event-delete',['only' => ['all_events']]);
        $this->middleware('permission:event-create',['only' => ['new_event','store_event']]);
        $this->middleware('permission:event-edit',['only' => ['edit_event','update_event','clone_event']]);
        $this->middleware('permission:event-delete',['only' => ['delete_event','bulk_action']]);

        /* event attendance permission */
        $this->middleware('permission:event-attendance-list|event-attendance-create|event-attendance-edit|event-attendance-delete',['only' => ['event_attendance_logs','event_attendance_view']]);
        $this->middleware('permission:event-attendance-edit',['only' => ['update_event_attendance_logs_status']]);
        $this->middleware('permission:event-attendance-delete',['only' => ['delete_event_attendance_logs','attendance_logs_bulk_action']]);
        $this->middleware('permission:event-attendance-mail',['only' => ['event_attedance_reminder']]);

        /* event payment log permission */
        $this->middleware('permission:event-payment-log-list|event-payment-log-delete|event-payment-log-view',['only' => ['event_payment_logs']]);
        $this->middleware('permission:event-payment-log-delete',['only' => ['delete_event_payment_logs','payment_logs_bulk_action']]);
        $this->middleware('permission:event-payment-log-view',['only' => ['payment_logs_view']]);
        $this->middleware('permission:event-payment-log-edit',['only' => ['approve_event_payment']]);
        /* ----------- Event attendance report ---------- */
        $this->middleware('permission:event-attendance-report',['only' => ['attendance_report']]);
        $this->middleware('permission:event-payment-log-report',['only' => ['payment_report']]);
        $this->middleware('permission:event-single-settings',['only' => ['single_page_settings','update_single_page_settings']]);
        $this->middleware('permission:event-settings',['only' => ['page_settings','update_page_settings']]);

    }

    public function all_events(){
        $all_events = Events::latest()->get();
        return view(self::BASE_PATH.'all-events')->with(['all_events' => $all_events]);
    }

    public function new_event(){
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'new-event')->with(['all_categories' => $all_categories]);
    }

    public function store_event(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'category_id' => 'required|string|max:191',
            'event_content' => 'required|string',
            'organizer' => 'nullable|string',
            'organizer_email' => 'nullable|string',
            'organizer_website' => 'nullable|string',
            'organizer_phone' => 'nullable|string',
            'venue' => 'nullable|string',
            'venue_location' => 'nullable|string',
            'venue_phone' => 'nullable|string',
            'time' => 'required|string',
            'image' => 'nullable|string',
            'date' => 'required|string',
            'cost' => 'required|string',
            'available_tickets' => 'required|string',
            'slug' => 'nullable|string',
            'meta_title' => 'nullable|string',
        ]);

        Events::create([
            'title' => $request->title,
            'slug' => ($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title),
            'content' => $request->event_content,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'date' => $request->date,
            'time' => $request->time,
            'cost' => $request->cost,
            'available_tickets' => $request->available_tickets,
            'image' => $request->image,
            'organizer' => $request->organizer,
            'organizer_email' => $request->organizer_email,
            'organizer_website' => $request->organizer_website,
            'organizer_phone' => $request->organizer_phone,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'venue_phone' => $request->venue_phone,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
        ]);

        return redirect()->back()->with(['msg' => __('New Event Created Success...'),'type'=>'success']);
    }


    public function edit_event($id){
        $event = Events::findOrfail($id);
        $all_categories = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'edit-event')->with(['all_categories' => $all_categories,'event' => $event]);
    }

    public function delete_event(Request $request,$id){
        Events::findOrFail($id)->delete();
        return redirect()->back()->with(['msg' => __('Event Delete Success...'),'type'=>'danger']);
    }

    public function update_event(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'category_id' => 'required|string|max:191',
            'event_content' => 'required|string',
            'organizer' => 'nullable|string',
            'organizer_email' => 'nullable|string',
            'organizer_website' => 'nullable|string',
            'organizer_phone' => 'nullable|string',
            'venue' => 'nullable|string',
            'venue_location' => 'nullable|string',
            'venue_phone' => 'nullable|string',
            'time' => 'required|string',
            'image' => 'nullable|string',
            'date' => 'required|string',
            'cost' => 'required|string',
            'available_tickets' => 'required|string',
            'slug' => 'nullable|string',
            'meta_title' => 'nullable|string',
        ]);

        Events::findOrfail($request->event_id)->update([
            'title' => $request->title,
            'slug' => ($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title),
            'content' => $request->event_content,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'date' => $request->date,
            'time' => $request->time,
            'cost' => $request->cost,
            'available_tickets' => $request->available_tickets,
            'image' => $request->image,
            'organizer' => $request->organizer,
            'organizer_email' => $request->organizer_email,
            'organizer_website' => $request->organizer_website,
            'organizer_phone' => $request->organizer_phone,
            'venue' => $request->venue,
            'venue_location' => $request->venue_location,
            'venue_phone' => $request->venue_phone,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
        ]);

        return redirect()->back()->with(['msg' => __('Event Update Success...'),'type'=>'success']);
    }

    public function single_page_settings(){
        return view(self::BASE_PATH.'event-single-page-settings');
    }

    public function update_single_page_settings(Request $request){

            $this->validate($request,[
                'site_events_category_title'  => 'nullable|string'
            ]);
            $all_fields = [
              'event_single_event_info_title',
              'event_single_date_title',
              'event_single_time_title',
              'event_single_cost_title',
              'event_single_category_title',
              'event_single_organizer_title',
              'event_single_organizer_name_title',
              'event_single_organizer_email_title',
              'event_single_organizer_phone_title',
              'event_single_organizer_website_title',
              'event_single_venue_title',
              'event_single_venue_name_title',
              'event_single_venue_location_title',
              'event_single_venue_phone_title',
              'event_single_category_title',
              'event_single_available_ticket_text',
              'event_single_reserve_button_title',
              'event_single_event_expire_text',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }


        return redirect()->back()->with(['msg' => __('Events Single Page Settings Success...'),'type' => 'success']);
    }


    public function page_settings(){
        return view(self::BASE_PATH.'event-page-settings');
    }

    public function update_page_settings(Request $request){

            $this->validate($request,[
                'disable_guest_mode_for_event_module'  => 'nullable|string',
                 'event_attendance_page_title'  => 'nullable|string',
                'event_attendance_page_form_button_title'  => 'nullable|string',
                'event_attendance_receiver_mail' => 'nullable|string|max:191',
                'event_cancel_page_description' => 'nullable|string|max:191',
                'event_cancel_page_subtitle' => 'nullable|string|max:191',
                'event_cancel_page_title' => 'nullable|string|max:191',
                'event_success_page_title' => 'nullable|string|max:191',
                'event_page_button_text' => 'nullable|string|max:191',
                'event_success_page_description' => 'nullable|string|max:191',
            ]);

            $fields = [
                'disable_guest_mode_for_event_module',
                'event_attendance_page_title',
                'event_attendance_page_form_button_title',
                'event_attendance_receiver_mail',
                'event_cancel_page_description',
                'event_cancel_page_subtitle',
                'event_cancel_page_title',
                'event_success_page_title',
                'event_page_button_text',
                'event_success_page_description',
            ];
            foreach ($fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function clone_event(Request $request){
        $event_details = Events::find($request->item_id);
        Events::create([
            'title' => $event_details->title,
            'slug' => ($event_details->slug) ? $event_details->slug.$event_details->id : \Str::slug($event_details->title),
            'content' => $event_details->content,
            'category_id' => $event_details->category_id,
            'status' => 'draft',
            'date' => $event_details->date,
            'time' => $event_details->time,
            'cost' => $event_details->cost,
            'available_tickets' => $event_details->available_tickets,
            'image' => $event_details->image,
            'organizer' => $event_details->organizer,
            'organizer_email' => $event_details->organizer_email,
            'organizer_website' => $event_details->organizer_website,
            'organizer_phone' => $event_details->organizer_phone,
            'venue' => $event_details->venue,
            'venue_location' => $event_details->venue_location,
            'venue_phone' => $event_details->venue_phone,
            'meta_title' => $event_details->meta_title,
        ]);
        return redirect()->back()->with(['msg' => __('Events Clone Success...'),'type' => 'success']);
    }


    public function event_attendance_logs(Request $request){

        if ($request->ajax()){
            $attendance = EventAttendance::orderBy('id','desc')->get();
            return DataTables::of($attendance)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('event_name',function ($row){
                    return $row->event_name;
                })
                ->addColumn('payment_status',function ($row){
                    return General::statusSpan($row->payment_status);
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                 ->addColumn('date',function ($row){
                    return $row->created_at->format('D, d m Y');
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $action .= General::viewIcon(route('admin.event.attendance.view',$row->id));
                    $admin = auth()->guard('admin')->user();

                    if ($admin->can('event-attendance-delete')){
                        $action .= General::deletePopover(route('admin.event.attendance.logs.delete',$row->id));
                    }
                    if ($admin->can('event-attendance-mail')){
                        $action .= '<a href="#" data-toggle="modal"  data-target="#user_edit_modal" class="btn btn-lg btn-primary btn-sm mb-3 mr-1 user_edit_btn"> <i class="ti-email"></i></a>';
                    }
                    if ($admin->can('event-attendance-edit')){
                        $action .= '<a href="#" data-id="'.$row->id.'" data-status="'.$row->status.'" data-toggle="modal" data-target="#order_status_change_modal" class="btn btn-lg btn-info btn-sm mb-3 mr-1 order_status_change_btn" >'.__("Update Status").'</a>';
                        if(!empty($row->user_id) && $row->payment_status === 'pending'){
                            $action .= General::reminderMail(route('admin.event.attendance.reminder'),$row->id);
                        }
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status','payment_status'])
                ->make(true);
        }
        return view(self::BASE_PATH.'event-attendance-all');
    }

    public function delete_event_attendance_logs(Request $request,$id){
        $attendance_details = EventAttendance::find($id);
        $event_payment_logs = EventPaymentLogs::where('attendance_id',$attendance_details->id)->first();
        if (!empty($event_payment_logs)){
            return redirect()->back()->with(['msg' => __('Your Can not delete this attendance, it already associated with a event payment log.'),'type' => 'danger']);
        }
        $attendance_details->delete();
        return redirect()->back()->with(['msg' => __('Events Attendance Log Deleted...'),'type' => 'danger']);
    }

    public function update_event_attendance_logs_status(Request $request){
        EventAttendance::where('id',$request->attendance_id)->update(['status' => $request->attendance_status]);
        return redirect()->back()->with(['msg' => __('Events Attendance Status Updated...'),'type' => 'success']);
    }

    public function send_mail_event_attendance_logs(Request $request){
        $this->validate($request,[
            'email' => 'required|string|max:191',
            'name' => 'required|string|max:191',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $subject = str_replace('{site}',get_static_option('site_'.get_default_language().'_title'),$request->subject);
        $data = [
            'name' => $request->name,
            'message' => $request->message,
        ];
        try{
             Mail::to($request->email)->send(new OrderReply($data,$subject));
        }catch(\Exceptoin $e){
            return redirect()->back()->with(['msg' => __('Attendance Reply Mail Send Failed'),'type' => 'danger']);
        }
        return redirect()->back()->with(['msg' => __('Attendance Reply Mail Send Success...'),'type' => 'success']);
    }

    public function event_payment_logs(Request $request){

        if ($request->ajax()){
            $payment_logs = EventPaymentLogs::orderBy('id','desc')->get();
            return DataTables::of($payment_logs)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('payer_name',function ($row){
                    return $row->name;
                })
                ->addColumn('payment_gateway',function ($row){
                    return ucwords(str_replace('_',' ',$row->package_gateway));
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->status);
                })
                ->addColumn('date',function ($row){
                    return date_format($row->created_at,'d M Y');
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('event-payment-log-delete')){
                        $action .= General::deletePopover(route('admin.event.payment.delete',$row->id));
                    }
                    if ($admin->can('event-payment-log-view')){
                        $action .= General::viewIcon(route('admin.event.payment.view',$row->id));
                    }
                    if ($admin->can('event-payment-log-edit')){
                        if($row->package_gateway === 'manual_payment' && $row->status === 'pending'){
                            $action .= General::paymentAccept(route('admin.event.payment.approve',$row->id));
                        }
                    }
                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status'])
                ->make(true);
        }

        return view(self::BASE_PATH.'event-payment-logs-all');

    }
    public function delete_event_payment_logs(Request $request,$id){
        EventPaymentLogs::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Event Payment Log Delete Success...'),'type' => 'danger']);
    }

    public function approve_event_payment(Request $request,$id){

        $payment_logs = EventPaymentLogs::find($id);
        $payment_logs->status = 'complete';
        $payment_logs->save();

        $event_attendance = EventAttendance::find($payment_logs->attendance_id);
        $event_attendance->payment_status = 'complete';
        $event_attendance->status = 'complete';
        $event_attendance->save();

        $event_details = Events::find($event_attendance->event_id);
        $event_details->available_tickets = $event_details->available_tickets - $event_attendance->quantity;
        $event_details->save();

        //update database
        $event_payment_logs = EventPaymentLogs::find($id);
        $event_attendance = EventAttendance::find($event_payment_logs->attendance_id);

        $order_mail = get_static_option('event_attendance_receiver_mail') ? get_static_option('event_attendance_receiver_mail') : get_static_option('site_global_email');
        $event_details = Events::find($event_attendance->event_id);

        //send mail to admin
        $subject = __('you have an event booking order');
        $message = __('you have an event booking order. attendance Id').' #'.$event_attendance->id;
        $message .= ' '.__('at').' '.date_format($event_attendance->created_at,'d F Y H:m:s');
        $message .= ' '.__('via').' '.str_replace('_',' ',$event_payment_logs->package_gateway);
        $admin_mail = !empty(get_static_option('event_attendance_receiver_mail')) ? get_static_option('event_attendance_receiver_mail') : get_static_option('site_global_email');

       try{
            Mail::to($admin_mail)->send(new \App\Mail\EventAttendance([
                'subject' => $subject,
                'message' => $message,
                'event_attendance' => $event_attendance,
                'event_details' => $event_details,
                'event_payment_logs' => $event_payment_logs,
            ]));
       }catch(\Exception $e){
           return redirect()->back()->with(['msg' => __('Manual Payment Accept Success').' '. __('Mail Send Failed'),'type' => 'success']);
       }

        //send mail to user
        $subject = __('your event booking order has been placed');
        $message = __('your event booking order has been placed. attendance Id').' #'.$event_attendance->id;
        $message .= ' '.__('at').' '.date_format($event_attendance->created_at,'d F Y H:m:s');
        $message .= ' '.__('via').' '.str_replace('_',' ',$event_payment_logs->package_gateway);
        
         try{
            Mail::to($order_mail)->send(new \App\Mail\EventAttendance([
                'subject' => $subject,
                'message' => $message,
                'event_attendance' => $event_attendance,
                'event_details' => $event_details,
                'event_payment_logs' => $event_payment_logs,
            ]));
       }catch(\Exception $e){
           return redirect()->back()->with(['msg' => __('Manual Payment Accept Success').' '. __('Mail Send Failed'),'type' => 'success']);
       }
       
       

        return redirect()->back()->with(['msg' => __('Manual Payment Accept Success'),'type' => 'success']);
    }

    public function payment_success_page_settings(){
        return view(self::BASE_PATH.'event-payment-success-page');
    }

    public function update_payment_success_page_settings(Request $request){

            $this->validate($request,[
                'event_success_page_title' => 'nullable|string',
                'event_success_page_description' => 'nullable|string',
            ]);
            $all_fields = [
                'event_success_page_title',
                'event_success_page_description',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(['msg' => __('Settings Update Success'),'type' => 'success']);
    }

    public function payment_cancel_page_settings(){
        return view(self::BASE_PATH.'event-payment-cancel-page');
    }

    public function update_payment_cancel_page_settings(Request $request){

            $this->validate($request,[
                'event_cancel_page_title' => 'nullable|string',
                'event_cancel_page_subtitle' => 'nullable|string',
                'event_cancel_page_description' => 'nullable|string',
            ]);
            $all_fields = [
                'event_cancel_page_title',
                'event_cancel_page_subtitle',
                'event_cancel_page_description',
            ];
            foreach ($all_fields as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with(['msg' => __('Settings Update Success'),'type' => 'success']);
    }

    public function bulk_action(Request $request){
        $all = Events::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function attendance_logs_bulk_action(Request $request){
        $all = EventAttendance::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function payment_logs_bulk_action(Request $request){
        $all = EventPaymentLogs::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function payment_report(Request  $request){
        $order_data = '';
        $query = EventPaymentLogs::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->payment_status)){
            $query->where(['status' => $request->payment_status ]);
        }
        $error_msg = __('select start & end date to generate event payment report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH.'payment-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'payment_status' => $request->payment_status,
            'error_msg' => $error_msg
        ]);
    }

    public function attendance_report(Request  $request){
        $order_data = '';
        $events = Events::where(['status' => 'publish'])->get();
        $query = EventAttendance::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->event_id)){
            $query->where(['event_id' => $request->event_id ]);
        }
        $error_msg = __('select start & end date to generate event attendance report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH.'attendance-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'event_id' => $request->event_id,
            'events' => $events,
            'error_msg' => $error_msg
        ]);
    }

    public function event_attedance_reminder(Request $request){
        //send order reminder mail
        $order_details = EventAttendance::find($request->id);
        $payment_log = EventPaymentLogs::where(['attendance_id' => $request->id])->first();
        $data['subject'] = __('your event booking is still in pending at').' '. get_static_option('site_'.get_default_language().'_title');
        $data['message'] = __('hello').' '.$payment_log->name .'<br>';
        $data['message'] .= __('your event booking').' #'.$order_details->id.' ';
        $data['message'] .= __('is still in pending, to complete your booking go to');
        $data['message'] .= ' <a href="'.route('user.home').'">'.__('your dashboard').'</a>';

        //send mail while order status change
       try{
            Mail::to($payment_log->email)->send(new BasicMail($data));
       }catch(\Exception $e){
            return redirect()->back()->with(['msg' => $e->getMessage(),'type' => 'danger']);
       }

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'),'type' => 'success']);
    }

    public function event_attendance_view($id){
        $attendance = EventAttendance::findOrFail($id);
        return view(self::BASE_PATH.'attendance-view',compact('attendance'));
    }
    public function payment_logs_view($id){
        $payment = EventPaymentLogs::findOrFail($id);
        return view(self::BASE_PATH.'payment-log-view',compact('payment'));
    }
}
