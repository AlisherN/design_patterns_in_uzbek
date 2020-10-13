<?php
include __DIR__ . "/base/PaymentSystemCreator.php";
include __DIR__ . "/creators/PaymeCreator.php";
include __DIR__ . "/creators/ClickCreator.php";
include __DIR__ . "/creators/MyUzcardCreator.php";

function clientCode(PaymentSystemCreator $creator) {
    print_r($creator->runPaying());
}


echo 'Payme' . PHP_EOL;
clientCode(new PaymeCreator());
echo PHP_EOL . PHP_EOL;

echo 'Click' . PHP_EOL;
clientCode(new ClickCreator());
echo PHP_EOL . PHP_EOL;

echo 'MyUzcard' . PHP_EOL;
clientCode(new MyUzcardCreator());
echo PHP_EOL;
