<?php

require_once 'FluffyPet.php';
require_once 'Fluffy.php';

class Cat extends FluffyPet
{
    use Fluffy;
    function __construct($price, $color, $name, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = $name;
    }
}