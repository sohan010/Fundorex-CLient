<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\AppointmentBooking;
use App\CauseLogs;
use App\Course;
use App\CourseEnroll;
use App\Donation;
use App\DonationLogs;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\Events\JobApplication;
use App\Http\Traits\PaytmTrait;
use App\JobApplicant;
use App\Jobs;
use App\Mail\BasicMail;
use App\Mail\ContactMessage;
use App\Mail\DonationMessage;
use App\Mail\PaymentSuccess;
use App\Mail\PlaceOrder;
use App\Order;
use App\PaymentLogs;
use App\PricePlan;
use App\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use phpDocumentor\Reflection\Types\Self_;
use Razorpay\Api\Api;
use Stripe\Charge;
use Mollie\Laravel\Facades\Mollie;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Session;
use function App\Http\Traits\getChecksumFromArray;

class PaymentLogController extends Controller
{


    public function paystack_pay()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function paystack_callback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status']) {
            $meta_data = $paymentDetails['data']['metadata'];
                if ($meta_data['type'] == 'event') {
    
                    $payment_log_details = EventPaymentLogs::where('track', $meta_data['track'])->first();
    
                    event(new Events\AttendanceBooking([
                        'attendance_id' => $payment_log_details->attendance_id,
                        'transaction_id' => $paymentDetails['data']['reference']
                    ]));
    
                    $order_id = Str::random(6) . $payment_log_details->attendance_id . Str::random(6);
                    return redirect()->route('frontend.event.payment.success', $order_id);
    
                } elseif ($meta_data['type'] == 'donation') {
    
                    $payment_log_details = CauseLogs::where('track', $meta_data['track'])->first();
                    event(new Events\DonationSuccess([
                        'donation_log_id' => $payment_log_details->id,
                        'transaction_id' =>  $paymentDetails['data']['reference'],
                    ]));
    
                    $order_id = Str::random(6) . $payment_log_details->id . Str::random(6);
                    return redirect()->route('frontend.donation.payment.success', $order_id);
    
                } elseif ($meta_data['type'] == 'job') {
    
                    $job_applicant_details = JobApplicant::where('track', $meta_data['track'])->first();
                    event(new JobApplication([
                        'transaction_id' => $paymentDetails['data']['reference'],
                        'job_application_id' => $job_applicant_details->id
                    ]));
                    $order_id = Str::random(6) . $job_applicant_details->id . Str::random(6);
                    return redirect()->route('frontend.job.payment.success', $order_id);
    
                } else {
                    return redirect()->route('homepage');
                }
            } else {
                return redirect()->route('homepage');
            }
        }

}
