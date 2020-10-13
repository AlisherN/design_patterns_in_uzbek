<?php
include_once __DIR__ . '/base/IAbstractFurnitureFactory.php';
include_once __DIR__ . '/factories/ClassicFurnitureFactory.php';
include_once __DIR__ . '/factories/ModernFurnitureFactory.php';

function clientCode(IAbstractFurnitureFactory $factory) {
    $classicFurniture = $factory->createChair();
    $modernFurniture = $factory->createTable();

    echo $classicFurniture->selectChairColor() . PHP_EOL;
    echo $modernFurniture->selectRelatedChair($classicFurniture) . PHP_EOL;
}

echo 'Client: testing first factory' . PHP_EOL;
clientCode(new ClassicFurnitureFactory());
echo PHP_EOL;

echo 'Client: testing second factory' . PHP_EOL;
clientCode(new ModernFurnitureFactory());
echo PHP_EOL;
