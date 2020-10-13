<?php
include_once __DIR__ . "/../base/PaymentSystemCreator.php";
include_once __DIR__ . "/../base/IPaymentSystem.php";
include_once __DIR__ . "/../payment_systems/MyUzcard.php";

class MyUzcardCreator extends PaymentSystemCreator
{

    public function factoryMethod(): IPaymentSystem
    {
        return new MyUzcard;
    }
}
