<?php
include_once __DIR__ . '/IAbstractChairs.php';
include_once __DIR__ . '/IAbstractTables.php';

interface IAbstractFurnitureFactory {
    public function createChair(): IAbstractChairs;

    public function createTable(): IAbstractTables;
}
