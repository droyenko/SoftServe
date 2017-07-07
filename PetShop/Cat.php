<?php

require_once 'FluffyPet.php';

class Cat extends FluffyPet
{
    function __construct($price, $color, $name, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = $name;
    }

    public function isFluffy()
    {
        if ($this->fluffiness > 1) {
            return 1;
        } else {
            return 0;
        }
    }
}