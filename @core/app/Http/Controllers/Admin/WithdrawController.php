<?php

namespace App\Http\Controllers\Admin;

use App\Cause;
use App\CauseCategory;
use App\CauseLogs;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Helpers\DataTableHelpers\Donation;
use App\Helpers\DataTableHelpers\General;
use App\Http\Controllers\Controller;
use App\DonationWithdraw;
use App\Mail\BasicMail;
use App\Mail\DonationMessage;
use App\Mail\PaymentSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class WithdrawController extends Controller
{
    private const BASE_PATH = 'backend.donations.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:donation-withdraw-list|donation-withdraw-edit|donation-withdraw-delete|donation-withdraw-view',['only' => ['all_donation_withdraw']]);
        $this->middleware('permission:donation-withdraw-edit',['only' => ['edit_donation_withdraw','update_donation_withdraw','Withdraw_Approval']]);
        $this->middleware('permission:donation-withdraw-delete',['only' => ['delete_donation_withdraw','bulk_action']]);
        $this->middleware('permission:donation-withdraw-view',['only' => ['view_donation_withdraw']]);
    }

    public function all_donation_withdraw(Request $request)
    {
        if ($request->ajax()){
            $withdraw = DonationWithdraw::orderBy('id','desc')->get();
            return DataTables::of($withdraw)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('info',function ($row){
                    return Donation::withdrawInfoColumn($row);
                })
                ->addColumn('status',function ($row){
                    return General::statusSpan($row->payment_status);
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('permission:donation-withdraw-delete')){
                        $action .= General::deletePopover(route('admin.donations.withdraw.delete',$row->id));
                    }
                    if ($admin->can('permission:donation-withdraw-view')){
                        $action .= General::viewIcon(route('admin.donations.withdraw.view',$row->id));
                    }
                    if ($admin->can('donation-withdraw-edit')){
                        if($row->payment_status !== 'approved'){
                            $action .= General::editIcon(route('admin.donations.withdraw.edit',$row->id));
                        }
                    }

                    return $action;
                })
                ->rawColumns(['action','checkbox','info','status'])
                ->make(true);

        }
        return  view(self::BASE_PATH . 'donation-withdraw');
    }


    public function edit_donation_withdraw($id)
    {

        $withdraw = DonationWithdraw::findOrFail($id);
        return view(self::BASE_PATH . 'edit-withdraw')->with([
            'withdraw' => $withdraw
        ]);
    }

    public function update_donation_withdraw(Request $request)
    {

        $this->validate($request, [
            'transaction_id' => 'nullable|string',
            'payment_information' => 'nullable|string',
            'additional_comment_by_admin' => 'nullable|string',
            'payment_receipt' => 'nullable|mimes:pdf,jpg,jpeg,png',
        ]);

        $withdraw = DonationWithdraw::find($request->withdraw_id);
        $withdraw_able_amount = optional($withdraw->cause)->raised - optional($withdraw->cause)->withdraws->where('payment_status', 'approved')->pluck('withdraw_request_amount')->sum();

        if ($withdraw->withdraw_request_amount > $withdraw_able_amount) {
            return redirect()->back()->with(['msg' => __("withdaw able amount is less than requested amount"),'type' => 'danger']);
        }

        if ($request->file('payment_receipt')) {

            if (file_exists('assets/uploads/donation-withdraw/' . $withdraw->payment_receipt)) {
                @unlink('assets/uploads/donation-withdraw/' . $withdraw->payment_receipt);
            }
            $attachment = $request->file('payment_receipt');
            $attachmentName = 'payment_receipt_' . uniqid('', true) . '.' . $attachment->getClientOriginalExtension();
            $folder_path = 'assets/uploads/donation-withdraw/';
            $attachment->move($folder_path, $attachmentName);
        } else {
            $attachmentName = $withdraw->payment_receipt;
        }

        DonationWithdraw::findOrFail($request->withdraw_id)->update([
            'transaction_id' => $request->transaction_id,
            'payment_information' => $request->payment_information,
            'additional_comment_by_admin' => $request->additional_comment_by_admin,
            'payment_receipt' => $attachmentName,
            'payment_status' => $request->payment_status,
        ]);

        $user_email = optional($withdraw->user)->email;
        if ($user_email) {
           try{
                Mail::to($user_email)->send(new BasicMail([
                    'subject' => __('Your donation withdrawal Status Has Been Change'),
                    'message' => __('Status is ') . ": " . $request->payment_status . '<br>' . $request->additional_comment_by_admin
                ]));
           }catch(\Exception $e){
             return  redirect()->back()->with(['msg' => __('Donation Withdraw Updated').' '.__('Mail Send Failed'), 'type' => 'success']);
           }
        }


        return redirect()->back()->with(['msg' => __('Donation Withdraw Updated...'), 'type' => 'success']);
    }


    public function Withdraw_Approval($id)
    {
        $withdraw_approval = DonationWithdraw::findOrFail($id);

        $raised_amount = $withdraw_approval->donation->raised;
        $user_withdraw_amount_request = $withdraw_approval->withdraw_request_amount;

        $user_withdrawable_amount = $withdraw_approval->campaign_withdrawable_amount;

        $deduction_raised_amount = ($raised_amount - $user_withdraw_amount_request);

        $cause_id = $withdraw_approval->donation->id;
        Cause::where('id', $cause_id)->update(['raised' => $deduction_raised_amount]);
        DonationWithdraw::where('id', $id)->update(['payment_status' => 'approved']);

        if ($user_withdrawable_amount > $user_withdraw_amount_request) {
            DonationWithdraw::where('id', $id)->update(['transaction_status' => 'not-full-paid']);
        } else {
            DonationWithdraw::where('id', $id)->update(['transaction_status' => 'full-paid']);
        }

        $user_email = $withdraw_approval->user->email;
       try{
            Mail::to($user_email)->send(new BasicMail([
                'subject' => __('Your donation withdrawal request has been approved and you will get back your withdrawalbe amount soon.'),
                'message' => "Status is : Changed"
            ]));
       }catch(\Exception $e){
           return redirect()->back()->with(['msg' => __('Donation Withdraw Approved...').' '.__('Mail Send Failed'), 'type' => 'success']);
       }

        return redirect()->back()->with(['msg' => __('Donation Withdraw Approved...'), 'type' => 'success']);

    }


    public function delete_donation_withdraw(Request $request, $id)
    {
        $data = DonationWithdraw::findOrFail($id);
         if (file_exists('assets/uploads/donation-withdraw/'.$data->payment_receipt)) {
              @unlink('assets/uploads/donation-withdraw/'.$data->payment_receipt);
           }

        DonationWithdraw::findOrFail($id)->delete();
        return redirect()->back()->with([ 'msg' => __('Donation Withdraw Deleted...'), 'type' => 'danger ']);
    }

    public function bulk_action(Request $request)
    {
        $all = DonationWithdraw::findOrFail($request->ids);
        foreach ($all as $item) {
             if (file_exists('assets/uploads/donation-withdraw/' . $item->payment_receipt)) {
                @unlink('assets/uploads/donation-withdraw/' . $item->payment_receipt);
             }
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function view_donation_withdraw($id){
        $withdraw = DonationWithdraw::findOrFail($id);
        return view(self::BASE_PATH.'donation-withdraw-view')->with(['withdraw' => $withdraw]);
    }


}
