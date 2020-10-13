<?php
include_once __DIR__ . "/../base/PaymentSystemCreator.php";
include_once __DIR__ . "/../base/IPaymentSystem.php";
include_once __DIR__ . "/../payment_systems/Payme.php";

class PaymeCreator extends PaymentSystemCreator
{
    public function factoryMethod(): IPaymentSystem
    {
        return new Payme;
    }
}
