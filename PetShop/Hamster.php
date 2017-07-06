<?php

class Hamster extends Pet
{
    function __construct($price, $color, $fluffiness)
    {
        parent::__construct($price, $color);
        $this->fluffiness = $fluffiness;
    }

    public function isFluffy()
    {
        if($this->fluffiness>0){
            return true;
        } else {
            return false;
        }
    }
}