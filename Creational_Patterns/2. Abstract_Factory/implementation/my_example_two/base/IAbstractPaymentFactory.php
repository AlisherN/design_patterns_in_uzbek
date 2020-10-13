<?php
interface IAbstractPaymentFactory
{
    public function createForeignPayments();

    public function createNationalPayments();
}
