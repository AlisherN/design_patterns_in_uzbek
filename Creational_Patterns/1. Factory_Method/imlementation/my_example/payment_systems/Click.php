<?php
include_once __DIR__ . "/../base/IPaymentSystem.php";

class Click implements IPaymentSystem
{
    public function pay(): array
    {
        return [
            'success' => true,
            'message' => 'Payed by Click'
        ];
    }
}
