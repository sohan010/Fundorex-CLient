<?php

namespace App\Listeners;

use App\Cause;
use App\CauseLogs;
use App\Events\DonationSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DonationDatabaseUpdate
{

    public function __construct()
    {
        //
    }

    public function handle(DonationSuccess $event)
    {
        if (empty($event->data) && !isset($event->data['transaction_id'])){return;}

        //update donation log status/transaction id

        $payment_log_details = CauseLogs::findOrFail($event->data['donation_log_id']);
        $payment_log_details->status = 'complete';
        $payment_log_details->transaction_id = $event->data['transaction_id'];
        $payment_log_details->save();

        $event_details = Cause::find($payment_log_details->cause_id);
        //update donation raised amount
        $event_details->raised = (int) $event_details->raised + (int) $payment_log_details->amount;
        $event_details->save();
    }
}
