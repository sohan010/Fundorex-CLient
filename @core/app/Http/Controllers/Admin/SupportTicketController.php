<?php

namespace App\Http\Controllers\Admin;

use App\Events\SupportMessage;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\SupportTicket;
use App\SupportTicketDepartment;
use App\SupportTicketMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    const BASE_PATH = 'backend.support-ticket.';

    public function __construct(){
        $this->middleware('permission:support-ticket-index|support-ticket-create|support-ticket-view|support-ticket-delete',
            ['only'=> ['all_tickets','priority_change','status_change']]);
        $this->middleware('permission:support-ticket-create',['only'=>['new_ticket','store_ticket']]);
        $this->middleware('permission:support-ticket-view',['only'=>['view','send_message']]);
        $this->middleware('permission:support-ticket-delete',['only'=>['delete','bulk_action']]);
        $this->middleware('permission:support-ticket-page-settings',['only'=>['page_settings','update_page_settings']]);

    }

    public function new_ticket(){
        $all_users = User::all();
        $all_departments = SupportTicketDepartment::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'new-ticket')->with(['all_users' => $all_users,'departments' => $all_departments]);
    }
    public function store_ticket(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'subject' => 'required|string|max:191',
            'priority' => 'required|string|max:191',
            'description' => 'required|string',
            'department_id' => 'required|string',
        ],[
            'title.required' => __('title required'),
            'subject.required' =>  __('subject required'),
            'priority.required' =>  __('priority required'),
            'description.required' => __('description required'),
            'department_id.required' => __('departments required'),
        ]);
        SupportTicket::create([
            'title' => $request->title,
            'via' => 'admin',
            'operating_system' => null,
            'user_agent' => null,
            'description' => $request->description,
            'subject' => $request->subject,
            'status' => 'open',
            'priority' => $request->priority,
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            'admin_id' => Auth::guard('admin')->user()->id
        ]);
        $msg =  __('new ticket created successfully');
        return back()->with(FlashMsg::settings_update($msg));
    }

    public function all_tickets(){
        $all_tickets = SupportTicket::orderBy('id','desc')->get();
        return view(self::BASE_PATH .'all-tickets')->with(['all_tickets' => $all_tickets ]);
    }

    public function priority_change(Request $request){
        $this->validate($request,[
            'priority' => 'required|string|max:191'
        ]);
        SupportTicket::findOrFail($request->id)->update([
            'priority' => $request->priority,
        ]);
        return 'ok';
    }
    public function status_change(Request $request){
        $this->validate($request,[
            'status' => 'required|string|max:191'
        ]);
        SupportTicket::findOrFail($request->id)->update([
            'status' => $request->status,
        ]);
        return 'ok';
    }

    public function delete(Request $request,$id){
        SupportTicket::findOrFail($id)->delete();
        return back()->with(FlashMsg::item_delete());
    }

    public function view(Request $request,$id){
        $ticket_details = SupportTicket::findOrFail($id);
        $all_messages = SupportTicketMessage::where(['support_ticket_id'=>$id])->get();
        $q = $request->q ?? '';
        return view(self::BASE_PATH.'view-ticket')->with(['ticket_details' => $ticket_details,'all_messages' => $all_messages,'q' => $q]);
    }

    public function send_message(Request $request){

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
            'admin_id' => Auth::guard('admin')->user()->id,
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

        return back()->with(FlashMsg::settings_update(__('Message send')));
    }

    public function bulk_action(Request $request){
       $all = SupportTicket::find($request->ids);

       foreach($all as $item){
           $item->delete();
       }
        return response()->json('Deleted');
    }

    public function page_settings(){
        return view(self::BASE_PATH.'page-settings');
    }

    public function update_page_settings(Request $request){
        $this->validate($request,[
            'support_ticket_login_notice' => 'nullable|string',
            'support_ticket_form_title' => 'nullable|string',
            'support_ticket_button_text' => 'nullable|string',
            'support_ticket_success_message' => 'nullable|string',
        ]);
        $field_list = [
            'support_ticket_login_notice',
            'support_ticket_form_title',
            'support_ticket_button_text',
            'support_ticket_success_message',
        ];
        foreach ($field_list as $field){
            update_static_option($field,$request->$field);
        }

        return back()->with(FlashMsg::settings_update());
    }
}
