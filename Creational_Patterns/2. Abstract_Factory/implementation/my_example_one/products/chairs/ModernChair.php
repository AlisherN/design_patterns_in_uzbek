<?php

include_once __DIR__ . '/../../base/IAbstractChairs.php';

class ModernChair implements IAbstractChairs
{

    public function selectChairColor(): string
    {
        return  'Moviy rangli zamonaviy stul';
    }
}
