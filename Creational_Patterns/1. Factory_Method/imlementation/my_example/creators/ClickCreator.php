<?php
include_once __DIR__ . "/../base/PaymentSystemCreator.php";
include_once __DIR__ . "/../base/IPaymentSystem.php";
include_once __DIR__ . "/../payment_systems/Click.php";

class ClickCreator extends PaymentSystemCreator
{
    public function factoryMethod(): IPaymentSystem
    {
        return new Click;
    }
}
