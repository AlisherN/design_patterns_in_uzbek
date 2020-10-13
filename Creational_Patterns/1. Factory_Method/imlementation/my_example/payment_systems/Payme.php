<?php
include_once __DIR__ . "/../base/IPaymentSystem.php";

class Payme implements IPaymentSystem
{
    public function pay(): array
    {
        return [
            'success' => true,
            'message' => 'Payed by Payme'
        ];
    }
}
