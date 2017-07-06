<?php

class Cat extends Pet
{
    function __construct($price, $color, $name, $fluffiness)
    {
        parent::__construct($price, $color);
        $this->name = $name;
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