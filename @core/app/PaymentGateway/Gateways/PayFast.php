<?php

namespace App\PaymentGateway\Gateways;
use App\Helpers\DonationHelpers;
use App\PaymentGateway\PaymentGatewayBase;
use Illuminate\Support\Facades\Log;

class PayFast extends PaymentGatewayBase
{
    public function __construct(){
    }
    /**
     * this payment gateway will not work without this package
     * @ https://github.com/kingflamez/laravelrave
     * */
    public function charge_amount($amount)
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_zar($amount);
    }


    /**
     *
     * @param array $args
     * @required param list
     * request
     *
     * @return array
     */
    public function ipn_response( array $args)
    {
        $payfast = new \Billow\Payfast();
        // Verify the payment status.
        $request = $args['request'];
        $status = $payfast->verify($request, $request->amount_gross, $request->m_payment_id)->status();
        $return_val = ['status' => 'failed'];
        // Handle the result of the transaction.
        switch( $status )
        {
            case 'COMPLETE': // Things went as planned, update your order status and notify the customer/admins.
                $return_val = $this->verified_data([
                    'status' => 'complete',
                    'order_id' => $request->m_payment_id,
                    'transaction_id' => $request->pf_payment_id,
                ]);
                break;
            case 'FAILED': // We've got problems, notify admin and contact Payfast Support.
                break;
            case 'PENDING': // We've got problems, notify admin and contact Payfast Support.
                break;
            default: // We've got problems, notify admin to check logs.
                break;
        }

        return $return_val;

    }

    /**
     *
     * @param array $args
     * name
     * email
     * ipn_route
     * amount
     * description
     * order_id
     * track
     *
     */
    public function charge_customer(array $args)
    {
        if($this->charge_amount($args['amount']) > 500000){
            return back()->with(['msg' => __('We could not process your request due to your amount is higher than the maximum.'),'type' => 'danger']);
        }


        $payfast = new \Billow\Payfast();
        $payfast->setBuyer( $args['name'], null, $args['email']);
        $payfast->setAmount(number_format($this->charge_amount($args['amount']),2));
        $payfast->setItem( $args['description'] , null);
        $payfast->setMerchantReference($args['order_id']);
        $payfast->setCancelUrl($args['cancel_url']);
        $payfast->setReturnUrl($args['success_url']);
        $payfast->setNotifyUrl($args['ipn_url']);
        $submit_form =  $payfast->paymentForm('Pay Now');

        return view('payment.payfast',compact('submit_form'));
    }

    public function supported_currency_list()
    {
        return ['ZAR'];

    }

    public function charge_currency()
    {
        if (in_array(self::global_currency(), $this->supported_currency_list())) {
            return self::global_currency();
        }
        return "ZAR";
    }

    public function gateway_name()
    {
        return 'payfast';
    }

}