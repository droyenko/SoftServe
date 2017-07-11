<?php

require_once 'Pet.php';
require_once 'SQLdbConnection.php';

class Dog extends Pet
{
    function __construct($price, $color, $name)
    {
        $this->addDog($price, $color, $name);
    }

    public static function addDog($price, $color, $name)
    {
        $errorArr = array();

        if ($price == null) array_push($errorArr, "Failed price for dog");
        if ($color == null) array_push($errorArr, "Failed color for dog");
        if ($name == null) array_push($errorArr, "Failed name for dog");

        if (count($errorArr) == 0) {
            SQLdbConnection::addPet($price,$color, $name, null, 'dog');
            return "Dog added to database";
        } else {
            return $errorArr[0];
        }
    }
}

echo Dog::addDog(400,'brown', 'Dino');