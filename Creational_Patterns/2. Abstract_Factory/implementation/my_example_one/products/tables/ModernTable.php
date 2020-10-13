<?php

include_once __DIR__ . '/../../base/IAbstractTables.php';
include_once __DIR__ . '/../../base/IAbstractChairs.php';

class ModernTable implements IAbstractTables
{

    public function selectTableColor(): string
    {
        return  'Sut rangli zamonaviy stol';
    }

    public function selectRelatedChair(IAbstractChairs $collaborator): string
    {
        return 'Siz tanlagan ' . $this->selectTableColor() . 'ga ' . $collaborator->selectChairColor() . ' mos keladi';
    }
}
