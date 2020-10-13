<?php


class MyUzcard implements IPaymentSystem
{

    public function pay(): array
    {
        return [
            'success' => true,
            'message' => 'Payed by MyUzcard'
        ];
    }
}
