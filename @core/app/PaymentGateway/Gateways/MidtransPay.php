<?php

namespace App\PaymentGateway\Gateways;

use App\PaymentGateway\PaymentGatewayBase;

class MidtransPay extends PaymentGatewayBase
{

    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_idr($amount);
    }

    public function ipn_response(array $args=[])
    {
        // TODO: Implement ipn_response() method.
        $midtrans_last_order_id = session()->get('midtrans_last_order_id');
        session()->forget('midtrans_last_order_id');
        if (empty($midtrans_last_order_id)){
            abort(405,'midtrans order missing');
        }
        if ($midtrans_last_order_id !== request()->get('order_id')){
            abort(403);
        }
        $this->setConfig([
            'order_id' => $midtrans_last_order_id,
            'ipn_url' => $args['ipn_url'] ?? ''
        ]);

        $status = \Midtrans\Transaction::status($midtrans_last_order_id);
        if ($status->transaction_status === 'capture' && $status->fraud_status === 'accept' && $status->channel_response_message === 'Approved'){
            return $this->verified_data(['transaction_id' => $status->transaction_id,'order_id' => substr($midtrans_last_order_id,5,-5)]);
        }

        abort(404);
    }

    /**
     * @throws \Exception
     */
    public function charge_customer(array $args)
    {
        $order_id =  random_int(01234,99999).$args['order_id'].random_int(01234,99999);
        $this->setConfig([
            'order_id' => $order_id,
            'ipn_url' => $args['ipn_url']
        ]);
        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => ceil($this->charge_amount($args['amount'])),
            ),
            "callbacks" => [
                "finish" => $args['ipn_url']
            ]
        );

        session()->put('midtrans_last_order_id',$order_id);
        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            return redirect()->away($paymentUrl);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function supported_currency_list()
    {
        return ['IDR'];
    }

    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "IDR";
    }

    public function gateway_name()
    {
        return 'midtrans';
    }

    private function setConfig(array $args = [])
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = get_static_option('midtrans_server_key');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = !(get_static_option('midtrans_test_mode') === 'on');
// Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$overrideNotifUrl = $args['ipn_url'];
        \Midtrans\Config::$paymentIdempotencyKey = $args['order_id'];

    }
}