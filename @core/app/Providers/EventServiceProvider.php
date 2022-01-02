<?php

namespace App\Providers;

use App\Events\DonationSuccess;
use App\Events\JobApplication;
use App\Events\SupportMessage;
use App\Listeners\DonationDatabaseUpdate;
use App\Listeners\DonationSuccessMailSend;
use App\Listeners\JobApplicationDatabaseUpdate;
use App\Listeners\JobApplicationSuccessMailSendAdmin;
use App\Listeners\JobApplicationSuccessMailSendUser;
use App\Listeners\SupportSendMailToAdmin;
use App\Listeners\SupportSendMailToUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\AttendanceBooking;
use App\Listeners\AttendanceBookingDatabaseUpdate;
use App\Listeners\AttendanceBookingSuccessMailSendAdmin;
use App\Listeners\AttendanceBookingSuccessMailSendUser;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SupportMessage::class => [
            SupportSendMailToAdmin::class,
            SupportSendMailToUser::class
        ],
         AttendanceBooking::class => [
            AttendanceBookingDatabaseUpdate::class,
            AttendanceBookingSuccessMailSendAdmin::class,
            AttendanceBookingSuccessMailSendUser::class
        ],
        DonationSuccess::class => [
            DonationDatabaseUpdate::class,
            DonationSuccessMailSend::class,
        ],
        JobApplication::class => [
            JobApplicationDatabaseUpdate::class,
            JobApplicationSuccessMailSendAdmin::class,
            JobApplicationSuccessMailSendUser::class
        ],
    ];

    public function boot()
    {
        parent::boot();

    }
}
