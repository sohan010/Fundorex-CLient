<?php

namespace App\Http\Controllers\Frontend;

use App\Cause;
use App\CauseLogs;
use App\Helpers\DonationHelpers;
use App\Http\Controllers\Controller;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\Mail\DonationMessage;
use App\Mail\PaymentSuccess;
use App\PaymentGateway\PaymentGatewaySetup;
use App\PaymentLogs;
use Billow\Contracts\PaymentProcessor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use Mollie\Laravel\Facades\Mollie;
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
use Razorpay\Api\Api;
use Stripe\Charge;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;


class CausesLogController extends Controller
{
    const SUCCESS_ROUTE = 'frontend.donation.payment.success';
    const CANCEL_ROUTE = 'frontend.donation.payment.cancel';

    public function store_donation_logs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'cause_id' => 'required|string',
            'amount' => 'required|string',
            'anonymous' => 'nullable|string',
            'selected_payment_gateway' => 'required|string',
        ],
            [
                'name.required' => __('Name field is required'),
                'email.required' => __('Email field is required'),
                'amount.required' => __('Amount field is required'),
            ]
        );

        if(empty(get_static_option($request->selected_payment_gateway.'_gateway'))){
            return back()->with(['msg' => __('your selected payment gateway is disable, please select avialble payment gateway'),'type' => 'danger']);
        }
        
        $donation_charge_button_status = get_static_option('donation_charge_active_deactive_button');
        $cause_details = Cause::find($request->cause_id);
        if(empty($cause_details)){
            return back()->with(['msg' => __('donation cause not found'),'type' => 'danger']);
        }
        $admin_charge = $request->has('admin_tip') ? $request->admin_tip  : DonationHelpers::get_donation_charge($request->amount, false);
        if (!empty($request->order_id)) {
            $payment_log_id = $request->order_id;
        } else {
            $payment_log_id = CauseLogs::create([
                'email' => $request->email,
                'name' => $request->name,
                'cause_id' => $request->cause_id,
                'amount' => $request->amount,
                'admin_charge' => $admin_charge,
                'anonymous' => !empty($request->anonymous) ? 1 : 0,
                'payment_gateway' => $request->selected_payment_gateway,
                'user_id' => auth()->check() ? auth()->user()->id : '',
                'status' => 'pending',
                'track' => Str::random(10) . Str::random(10),
            ])->id;
        }

        $donation_payment_details = CauseLogs::find($payment_log_id);

        //have to work on below code
        if ($request->selected_payment_gateway === 'paypal') {

            $redirect_url = paypal_gateway()->charge_customer([
                'amount' => DonationHelpers::get_donation_total($request->amount,false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'description' => __('Payment For Donation:') . ' ' . $donation_payment_details->cause->title ?? '' . ' #' . $donation_payment_details->id,
                'item_name' => __('Payment For Donation:') . ' ' . $donation_payment_details->cause->title ?? '',
                'ipn_url' => route('frontend.donation.paypal.ipn'),
                'cancel_url' => route(self::CANCEL_ROUTE, $donation_payment_details->id),
                'payment_track' => $donation_payment_details->track,
            ]);

            session()->put('donation_log_id', $donation_payment_details->id);
            return redirect()->away($redirect_url);

        } elseif ($request->selected_payment_gateway === 'paytm') {

            $redirect_url = paytm_gateway()->charge_customer([
                'order_id' => $donation_payment_details->id,
                'email' => $donation_payment_details->email,
                'name' => $donation_payment_details->name,

                'amount' => DonationHelpers::get_donation_total($request->amount,false, $request->admin_tip ?? null),
                'admin_charge' => $admin_charge,

                'callback_url' => route('frontend.donation.paytm.ipn')
            ]);
            return $redirect_url;

        } elseif ($request->selected_payment_gateway === 'manual_payment') {
            $this->validate($request, [
                'transaction_id' => 'required|string'
            ], ['transaction_id.required' => __('Transaction ID Required')]);

            CauseLogs::where('cause_id', $request->cause_id)->update(['transaction_id' => $request->transaction_id]);
            $order_id = Str::random(6) . $donation_payment_details->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);

        } elseif ($request->selected_payment_gateway === 'stripe') {

            $stripe_data['order_id'] = $donation_payment_details->id;
            $stripe_data['route'] = route('frontend.donation.stripe.charge');
            return view('payment.stripe')->with('stripe_data', $stripe_data);
        } elseif ($request->selected_payment_gateway === 'razorpay') {

            $redirect_url = razorpay_gateway()->charge_customer([
                'price' => DonationHelpers::get_donation_total($request->amount,false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'title' => $donation_payment_details->cause->title ?? __('Untitled Donation'),
                'description' => 'Payment For donation Id: #' . $donation_payment_details->id . ' Payer Name: ' . $donation_payment_details->name . ' Payer Email:' . $donation_payment_details->email,
                'route' => route('frontend.donation.razorpay.ipn'),
                'order_id' => $donation_payment_details->id
            ]);
            return $redirect_url;
        } elseif ($request->selected_payment_gateway === 'paystack') {


            $view_file = paystack_gateway()->charge_customer([
                'amount' => DonationHelpers::get_donation_total($request->amount,false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'package_name' => $donation_payment_details->donation->title ?? __('Untitled Donation'),
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
                'type' => 'donation',
                'route' => route('frontend.donation.paystack.pay'),
            ]);

            return $view_file;
        } elseif ($request->selected_payment_gateway === 'mollie') {

            $return_url = mollie_gateway()->charge_customer([
                'amount' => DonationHelpers::get_donation_total($request->amount,false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'description' => 'Payment For Donation Id: #' . $donation_payment_details->id . ' Payer Name: ' . $donation_payment_details->name . ' Payer Email:' . $donation_payment_details->email,
                'web_hook' => route('frontend.donation.mollie.webhook'),
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
            ]);
            return $return_url;
        } elseif ($request->selected_payment_gateway === 'flutterwave') {

            $view_file = flutterwaverave_gateway()->charge_customer([
                'amount' =>  DonationHelpers::get_donation_total($request->amount,false,$request->admin_tip ?? null),
                'admin_charge' =>$admin_charge,
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
                'description' => 'Payment For Donation Id: #' . $donation_payment_details->id . ' Payer Name: ' . $donation_payment_details->name . ' Payer Email:' . $donation_payment_details->email,
                'callback' => route('frontend.donation.flutterwave.callback'),
            ]);
            return $view_file;
        }
        elseif ($request->selected_payment_gateway === 'payfast') {

            $reponse = PaymentGatewaySetup::payfast()->charge_customer([
                'amount' =>  DonationHelpers::get_donation_total($request->amount, false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
                'ipn_url' => route('frontend.donation.payfast.ipn'),
                'cancel_url' => route(self::CANCEL_ROUTE, $donation_payment_details->id),
                'success_url' => route(self::SUCCESS_ROUTE, random_int(333333,999999).$donation_payment_details->id.random_int(333333,999999)),
                'description' => 'Payment For Donation Id: #' . $donation_payment_details->id . ' Payer Name: ' . $donation_payment_details->name . ' Payer Email:' . $donation_payment_details->email,
            ]);
            session()->put('donation_log_id', $donation_payment_details->id);
            return $reponse;
        }
        elseif ($request->selected_payment_gateway === 'midtrans') {

            $reponse = PaymentGatewaySetup::midtrans()->charge_customer([
                'amount' =>  DonationHelpers::get_donation_total($request->amount, false,$request->admin_tip ?? null),
                'admin_charge' => $admin_charge,
                'name' => $donation_payment_details->name,
                'email' => $donation_payment_details->email,
                'order_id' => $donation_payment_details->id,
                'track' => $donation_payment_details->track,
                'ipn_url' => route('frontend.donation.midtrans.ipn'),
                'cancel_url' => route(self::CANCEL_ROUTE, $donation_payment_details->id),
                'success_url' => route(self::SUCCESS_ROUTE, random_int(333333,999999).$donation_payment_details->id.random_int(333333,999999)),
                'description' => 'Payment For Donation Id: #' . $donation_payment_details->id . ' Payer Name: ' . $donation_payment_details->name . ' Payer Email:' . $donation_payment_details->email,
            ]);
            return $reponse;
        }
        return redirect()->route('homepage');
    }

    public function midtrans_ipn(Request $request){
        $payment_data = midtrans_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $payment_data['order_id'],
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $payment_data['order_id'] . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }
        abort(404);
    }
    public function flutterwave_callback(Request $request)
    {

        $payment_data = flutterwaverave_gateway()->ipn_response([
            'request' => $request
        ]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            $donation_log_details = CauseLogs::where('track', $payment_data['track'])->first();
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_log_details->id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $donation_log_details->id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }
        abort(404);
    }

    public function paypal_ipn(Request $request)
    {

        $donation_log_id = session()->get('donation_log_id');
        session()->forget('donation_log_id');

        $payment_data = paypal_gateway()->ipn_response([
            'request' => $request,
            'cancel_url' => route(self::CANCEL_ROUTE, $donation_log_id),
            'success_url' => route(self::SUCCESS_ROUTE, $donation_log_id)
        ]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_log_id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));

            $order_id = Str::random(6) . $donation_log_id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }
        return redirect()->route(self::CANCEL_ROUTE, $donation_log_id);

    }

    public function payfast_ipn(Request $request)
    {
        $payment_data = PaymentGatewaySetup::payfast()->ipn_response(['request' => $request]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $payment_data['order_id'],
                'transaction_id' => $payment_data['transaction_id'],
            ]));
        }
    }

    public function paytm_ipn(Request $request)
    {
        $donation_log_id = $request['ORDERID'];

        $payment_data = paytm_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_log_id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $encoded_order_id = Str::random(6) . $donation_log_id . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $encoded_order_id);
        }
        return redirect()->route(self::CANCEL_ROUTE, $donation_log_id);
    }


    public function stripe_charge(Request $request)
    {
        $donation_log_details = CauseLogs::findOrFail($request->order_id);
        $admin_charge = !empty(get_static_option('allow_user_to_add_custom_tip_in_donation')) ? $donation_log_details->admin_charge : null;
        $stripe_session = stripe_gateway()->charge_customer([
            'amount' => DonationHelpers::get_donation_total($donation_log_details->amount,false,$admin_charge),
            'product_name' => $donation_log_details->cause->title ?? __('Untitled Donation'),
            'description' => 'Payment From ' . get_static_option('site_title') . '. Donation Log ID #' . $donation_log_details->id . ', Payer Name: ' . $donation_log_details->name . ', Payer Email: ' . $donation_log_details->email,
            'ipn_url' => route('frontend.donation.stripe.ipn'),
            'order_id' => $donation_log_details->id,
            'cancel_url' => route(self::CANCEL_ROUTE, $donation_log_details->id)
        ]);
        return response()->json(['id' => $stripe_session['id']]);
    }

    public function stripe_ipn(Request $request)
    {
        $donation_log_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');

        $payment_data = stripe_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_log_id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $donation_log_id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success', $order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel', $donation_log_id);
    }

    public function razorpay_ipn(Request $request)
    {

        $donation_logs_id = $request->order_id;

        $payment_data = razorpay_gateway()->ipn_response(['request' => $request]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_logs_id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $donation_logs_id . Str::random(6);
            return redirect()->route('frontend.donation.payment.success', $order_id);
        }
        return redirect()->route('frontend.donation.payment.cancel', $donation_logs_id);

    }

    public function mollie_webhook()
    {
        $payment_data = mollie_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete') {
            $donation_log = CauseLogs::findOrFail($payment_data['order_id']);
            event(new Events\DonationSuccess([
                'donation_log_id' => $donation_log->id,
                'transaction_id' => $payment_data['transaction_id'],
            ]));
            $order_id = Str::random(6) . $payment_data['order_id'] . Str::random(6);
            return redirect()->route(self::SUCCESS_ROUTE, $order_id);
        }
        abort(404);
    }

    public function paystack_pay()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
}
