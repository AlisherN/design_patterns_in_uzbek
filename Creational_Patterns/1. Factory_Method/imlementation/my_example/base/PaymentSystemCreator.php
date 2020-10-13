<?php

include_once __DIR__ . "/IPaymentSystem.php";

abstract class PaymentSystemCreator
{
    abstract public function factoryMethod(): IPaymentSystem; // mahsulot obyektini qaytaradi (new operatori bilan)

    public function runPaying()
    {
        $paymentSystem = $this->factoryMethod(); // mahsulot obyektini oladi
        return $paymentSystem->pay(); // va undagi asosiy ishga tushadigan metodni ishlatadi. Metod mahsulot interfeysida e'lon qilingan
    }
}
