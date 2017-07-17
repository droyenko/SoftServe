<?php

require_once 'FluffyPet.php';
require_once 'Fluffy.php';

class Hamster extends FluffyPet
{
    use Fluffy;
    function __construct($price, $color, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = 'Hamster';
    }
}