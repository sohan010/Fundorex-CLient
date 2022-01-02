<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\SupportTicket;
use App\SupportTicketDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    const BASE_PATH = 'frontend.pages.support-ticket.';

    public function page(){
        $departments = SupportTicketDepartment::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'support-ticket',compact('departments'));
    }

    public function store(Request $request){
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
            'department_id.required' => __('department required'),
        ]);

        SupportTicket::create([
            'title' => $request->title,
            'via' => $request->via,
            'operating_system' => null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'description' => $request->description,
            'subject' => $request->subject,
            'status' => 'open',
            'priority' => $request->priority,
            'user_id' => Auth::guard('web')->user()->id,
            'admin_id' => null,
            'department_id' => $request->department_id
        ]);
        $msg = get_static_option('support_ticket_success_message') ?? __('thanks for contact us, we will reply soon');
        return back()->with(FlashMsg::item_new($msg));
    }
}
