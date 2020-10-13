<?php

include_once __DIR__ . '/../../base/IAbstractChairs.php';

class ClassicChair implements IAbstractChairs
{

    public function selectChairColor(): string
    {
        return 'Jigarrangli klassik stul';
    }
}
