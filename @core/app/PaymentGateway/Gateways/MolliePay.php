<?php


namespace App\PaymentGateway\Gateways;

use App\PaymentGateway\PaymentGatewayBase;
use Mollie\Laravel\Facades\Mollie;

class MolliePay extends PaymentGatewayBase
{
    /**
     * to work this payment gateway you must have this laravel package
     * https://github.com/mollie/laravel-mollie
     * */
    /**
     * @since 1.0.0
     * return how them amount need to change
     * */
    public function charge_amount($amount)
    {
        // TODO: Implement charge_amount() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_usd($amount);
    }

    /**
     * @param array $args
     * @return array|string[]
     * @since 1.0.0
     * handle payment gateway ipn response
     */
    public function ipn_response(array $args = [])
    {
        // TODO: Implement ipn_response() method.
        $payment_id = session()->get('mollie_payment_id');
        $payment = Mollie::api()->payments->get($payment_id);
        session()->forget('mollie_payment_id');

        if ($payment->isPaid()) {
            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => $payment->id,
                'order_id' => $payment->metadata->order_id
            ]);
        }
        return ['status' => 'failed'];
    }

    /**
     * @since 1.0.0
     * charge customer account by this method
     * @required param list
     * amount
     * description
     * web_hook
     * order_id
     * track
     * */
    public function charge_customer(array $args)
    {
        
        // TODO: Implement charge_customer() method.
        $charge_amount = (int) $this->charge_amount($args['amount']);
        try{
            $payment = Mollie::api()->payments->create([
            "amount" => [
                    "currency" => $this->charge_currency(),
                    "value" => number_format((float) $this->charge_amount($charge_amount), 2, '.', ''),//"10.00" // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                "description" => $args['description'],
                "redirectUrl" => $args['web_hook'],
                "metadata" => [
                    "order_id" => $args['order_id'],
                    "track" => $args['track'],
                ],
            ]);

        }catch(\Exception $e){
            // dd($e);
            $msg = '';
            switch($e->getCode()){
                case(400):
                    $msg = __('Bad Request – The Mollie API was unable to understand your request. There might be an error in your syntax.');
                    break;
                case(401):
                    $msg = __('Unauthorized – Your request was not executed due to failed authentication. Check your API key.');
                    break;
               case(403):
                    $msg = __('	Forbidden – You do not have access to the requested resource.');
                    break;
                case(404):
                    $msg = __('Not Found – The object referenced by your URL does not exist.');
                    break;
                case(405):
                    $msg = __('Method Not Allowed – You are trying to use an HTTP method that is not applicable on this URL or resource. Refer to the Allow header to see which methods the endpoint supports.');
                    break;
                case(409):
                    $msg = __('Conflict – You are making a duplicate API call that was probably a mistake (only in v2).');
                    break;
                case(410):
                    $msg = __('Gone – You are trying to access an object, which has previously been deleted (only in v2).');
                    break;
                case(415):
                    $msg = __('Unsupported Media Type – Your request’s encoding is not supported or is incorrectly understood. Please always use JSON.');
                    break;
                case(422):
                    $msg = __('Unprocessable Entity – We could not process your request due to your amount is higher than the maximum. ');
                    break;
                case(429):
                    $msg = __('Too Many Requests – Your request has hit a rate limit. Please wait for a bit and retry.');
                    break;
                case(409):
                    $msg = __('Conflict – You are making a duplicate API call that was probably a mistake (only in v2).');
                    break;
                case(500):
                    $msg = __('Internal Server Error – An internal server error occurred while processing your request. Our developers are notified automatically, but if you have any information on how you triggered the problem, please contact us.');
                    break;
                case(502):
                    $msg = __('Bad Gateway – The service is temporarily unavailable, either due to calamity or (planned) maintenance. Please retry the request at a later time.');
                    break;
                case(503):
                    $msg = __('Service Unavailable – The service is temporarily unavailable, either due to calamity or (planned) maintenance. Please retry the request at a later time.');
                    break;
                case(504):
                    $msg = __('Gateway Timeout – Your request is causing an unusually long process time.');
                    break;
                default:
                    $msg = amount_with_currency_symbol($charge_amount).' '. __('This amount is higher than the maximum.');
                    break;
            }
            return back()->with(['msg' => $msg,'type' => 'danger']);
        }
        
        $payment = Mollie::api()->payments->get($payment->id);

        session()->put('mollie_payment_id', $payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * @since 1.0.0
     * list of all supported currency by payment gateway
     * */
    public function supported_currency_list()
    {
        // TODO: Implement supported_currency_list() method.
        return ['AED', 'AUD', 'BGN', 'BRL', 'CAD', 'CHF', 'CZK', 'DKK', 'EUR', 'GBP', 'HKD', 'HRK', 'HUF', 'ILS', 'ISK', 'JPY', 'MXN', 'MYR', 'NOK', 'NZD', 'PHP', 'PLN', 'RON', 'RUB', 'SEK', 'SGD', 'THB', 'TWD', 'USD', 'ZAR'];
    }

    /**
     * charge_currency()
     * @since 1.0.0
     * get charge currency for payment gateway
     * */
    public function charge_currency()
    {
        // TODO: Implement charge_currency() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "USD";
    }

    /**
     * geteway_name()
     * @since 1.0.0
     * add payment gateway name
     * */
    public function gateway_name()
    {
        // TODO: Implement geteway_name() method.
        return 'mollie';
    }
}