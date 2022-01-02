<?php


namespace App\PaymentGateway;


use App\PaymentGateway\Gateways\FlutterWaveRave;
use App\PaymentGateway\Gateways\MidtransPay;
use App\PaymentGateway\Gateways\MolliePay;
use App\PaymentGateway\Gateways\PayFast;
use App\PaymentGateway\Gateways\Paypal;
use App\PaymentGateway\Gateways\PaystackPay;
use App\PaymentGateway\Gateways\Paytm;
use App\PaymentGateway\Gateways\Razorpay;
use App\PaymentGateway\Gateways\StripePay;
use Billow\Contracts\PaymentProcessor;

class PaymentGatewaySetup
{
    public static function paypal(){
        return new Paypal();
    }
    public static function paytm(){
        return new Paytm();
    }
    public static function stripe(){
        return new StripePay();
    }
    public static function paystack(){
        return new PaystackPay();
    }
    public static function razorpay(){
        return new Razorpay();
    }
    public static function flutterwaverev(){
        return new FlutterWaveRave();
    }
    public static function mollie(){
        return new MolliePay();
    }
    public static function payfast(){
        return new PayFast();
    }
    public static function midtrans(){
        return new MidtransPay();
    }
}