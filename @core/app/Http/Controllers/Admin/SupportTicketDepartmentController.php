<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\SupportTicketDepartment;
use Illuminate\Http\Request;

class SupportTicketDepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('permission:support-ticket-category-index|support-ticket-category-create|support-ticket-category-edit|support-ticket-category-delete',
            ['only'=> 'category']);
        $this->middleware('permission:support-ticket-category-create',['only'=>'new_category']);
        $this->middleware('permission:support-ticket-category-edit',['only'=>'update']);
        $this->middleware('permission:support-ticket-category-delete',['only'=>['delete','bulk_action']]);

    }
    public function category(){
        $all_category = SupportTicketDepartment::all();
        return view('backend.support-ticket.support-ticket-category.category')->with([
            'all_category' => $all_category
        ]);
    }
    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:support_ticket_departments',
            'status' => 'required|string|max:191'
        ]);

        SupportTicketDepartment::create([
            'name'=> purify_html($request->name),
            'status'=> $request->status,
        ]);

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:support_ticket_departments,id,'.$request->id,
            'status' => 'required|string|max:191'
        ]);

        SupportTicketDepartment::find($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'lang' => $request->lang,
        ]);

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function delete(Request $request,$id){
        SupportTicketDepartment::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action(Request $request){
        SupportTicketDepartment::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
