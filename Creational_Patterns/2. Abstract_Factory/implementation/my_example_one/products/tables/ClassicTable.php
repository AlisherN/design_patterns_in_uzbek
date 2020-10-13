<?php

include_once __DIR__ . '/../../base/IAbstractTables.php';
include_once __DIR__ . '/../../base/IAbstractChairs.php';

class ClassicTable implements IAbstractTables
{

    public function selectTableColor(): string
    {
        return 'Oq rangdagi klassik stol';
    }

    public function selectRelatedChair(IAbstractChairs $collaborator): string
    {
        return 'Sizning tanlagan ' . $this->selectTableColor() . 'ga ' . $collaborator->selectChairColor() . ' mos keladi';
    }
}
