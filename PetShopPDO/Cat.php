<?php

require_once 'FluffyPet.php';
require_once 'SQLdbConnection.php';

class Cat extends FluffyPet
{
    function __construct($price, $color, $name, $fluffiness)
    {
        $this->addCat($price, $color, $name, $fluffiness);
    }

    private function addCat($price, $color, $name, $fluffiness)
    {
        $errorArr = array();

        if ($price == null) array_push($errorArr, "Failed price for cat");
        if ($color == null) array_push($errorArr, "Failed color for cat");
        if ($name == null) array_push($errorArr, "Failed name for cat");
        if ($fluffiness == null) array_push($errorArr, "Failed fluffiness for cat");

        if (count($errorArr) == 0) {
            SQLdbConnection::addPet($price,$color, $name, $fluffiness, 'cat');
            return "Cat added to database";
        } else {
            return $errorArr[0];
        }
    }
}
$sadf = new Cat(123, 'green', 'Pashtet', 3);