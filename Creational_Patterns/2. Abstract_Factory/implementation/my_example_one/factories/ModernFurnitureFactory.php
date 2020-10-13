<?php

include_once __DIR__ . '/../base/IAbstractFurnitureFactory.php';
include_once __DIR__ . '/../base/IAbstractChairs.php';
include_once __DIR__ . '/../base/IAbstractTables.php';
include_once __DIR__ . '/../products/chairs/ModernChair.php';
include_once __DIR__ . '/../products/tables/ModernTable.php';

class ModernFurnitureFactory implements IAbstractFurnitureFactory
{

    public function createChair(): IAbstractChairs
    {
        return new ModernChair;
    }

    public function createTable(): IAbstractTables
    {
        return new ModernTable;
    }
}
