<?php
include_once __DIR__ . '/IAbstractChairs.php';

interface IAbstractTables {
    public function selectTableColor(): string ;

    public function selectRelatedChair(IAbstractChairs $collaborator): string ;
}
