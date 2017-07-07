<?php

require_once 'FluffyPet.php';

class Hamster extends FluffyPet
{
    function __construct($price, $color, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = 'Hamster';
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