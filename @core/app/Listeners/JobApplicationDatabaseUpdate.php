<?php

namespace App\Listeners;

use App\Events\JobApplication;
use App\JobApplicant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobApplicationDatabaseUpdate
{

    public function __construct()
    {
        //
    }

    public function handle(JobApplication $event)
    {
        $data = $event->data;
        if (!isset($data['transaction_id']) && !isset($data['job_application_id'])){return;}

        JobApplicant::where('id',$data['job_application_id'])->update([
            'transaction_id' => $data['transaction_id'],
            'payment_status' => 'complete',
        ]);
    }
}
