<?php

include_once __DIR__ . '/../base/IAbstractFurnitureFactory.php';
include_once __DIR__ . '/../base/IAbstractChairs.php';
include_once __DIR__ . '/../base/IAbstractTables.php';
include_once __DIR__ . '/../products/chairs/ClassicChair.php';
include_once __DIR__ . '/../products/tables/ClassicTable.php';

class ClassicFurnitureFactory implements IAbstractFurnitureFactory
{

    public function createChair(): IAbstractChairs
    {
        return new ClassicChair;
    }

    public function createTable(): IAbstractTables
    {
        return new ClassicTable;
    }
}
