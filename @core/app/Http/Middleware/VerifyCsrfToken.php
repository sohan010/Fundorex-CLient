<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;


    protected $except = [
       'paytm-ipn',
       'paypal-ipn',
       'event-paypal-ipn',
       'event-paytm-ipn',
       'donation-paypal-ipn',
       'donation-paytm-ipn',
       'admin-home/update-static-option',
       'admin-home/get-static-option',
       'admin-home/set-static-option',
       'job-paypal-ipn',
       'job-paytm-ipn',
       'donation-payfast',
       'event-payfast',
       'job-payfast',
        'donation-midtrans'
    ];
}
