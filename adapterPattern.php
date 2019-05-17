<?php
interface PaymentGateway{
    function sendMoney($payment);
}

class PaymentProcess{
    private $pg;
    function __construct(PaymentGateway $pg)
    {
        $this->pg = $pg;
    }
    function processManager($amount){
        $this->pg->sendMoney($amount);
    }
}

class Paypal implements PaymentGateway{
    function sendMoney($amount){
        echo "{$amount} processed by Paypal";
    }
}

class Strip{
    function makePayment($amount, $currency){
        echo "{$amount} in {$currency} processed by Strip";       
    }
}

class StripAdapter implements PaymentGateway{
    private $strip;
    private $currency;
    function __construct(Strip $strip, $currency){
        $this->strip = $strip;
        $this->currency = $currency;
    }
    function sendMoney($amount){
        $this->strip->makePayment($amount, $this->currency);
    }
}

$paypal = new Paypal();
$strip = new Strip();
$stripAdapter = new StripAdapter($strip, "Dollar");
$pp = new PaymentProcess($stripAdapter);
$pp->processManager(100);