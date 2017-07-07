<?php

require_once 'Pet.php';

class Dog extends Pet
{
    function __construct($price, $color, $name)
    {
        parent::__construct($price, $color);
        $this->name = $name;
    }
}