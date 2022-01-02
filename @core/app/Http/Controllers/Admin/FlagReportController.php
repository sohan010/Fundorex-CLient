<?php

namespace App\Http\Controllers\Admin;

use App\Cause;
use App\FlagReport;
use App\Http\Controllers\Controller;
use App\Mail\SubscriberMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FlagReportController extends Controller
{
    private const BASE_PATH = 'backend.donations.flag-report.';
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:donations-flag-report-list|donations-flag-report-delete|donations-flag-report-view|donations-flag-report-mail-send|donations-flag-report-status-update',['only' => ['index']]);
        $this->middleware('permission:donations-flag-report-view',['only' => ['view']]);
        $this->middleware('permission:donations-flag-report-mail-send',['only' => ['mail_send']]);
        $this->middleware('permission:donations-flag-report-delete',['only' => ['delete','bulk_action']]);
     }

    public function index(){
        $all_flag_reports = FlagReport::all();
        return view(self::BASE_PATH.'index')->with([
            'all_flag_reports' => $all_flag_reports,
        ]);
    }

    public function view($id){
        $flag_report = FlagReport::find($id);
        return view(self::BASE_PATH.'view')->with([
            'flag_report' => $flag_report,
        ]);
    }


    public function delete($id){
        FlagReport::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Flag Report Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){

        $all = FlagReport::find($request->ids);

        foreach ($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function mail_send(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to($request->email)->send(new SubscriberMessage($data));

        return redirect()->back()->with([
            'msg' => __('Mail Send Success...'),
            'type' => 'success'
        ]);
    }

    public function update_cause_status(Request $request){

        Cause::where('id',$request->cause_id)->update(['status' => $request->status]);
        return redirect()->back()->with(['msg' => __('Cause Status Updated...'),'type' => 'success']);
    }

}
