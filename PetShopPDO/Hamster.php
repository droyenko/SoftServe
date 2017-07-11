<?php

require_once 'FluffyPet.php';
require_once 'SQLdbConnection.php';

class Hamster extends FluffyPet
{
    function __construct($price, $color, $fluffiness)
    {
        $this->addHamster($price, $color, $fluffiness);
    }

    private function addHamster($price, $color, $fluffiness)
    {
        $errorArr = array();

        if ($price == null) array_push($errorArr, "Failed price for hamster");
        if ($color == null) array_push($errorArr, "Failed color for hamster");
        if ($fluffiness == null) array_push($errorArr, "Failed fluffiness for hamster");

        if (count($errorArr) == 0) {
            SQLdbConnection::addPet($price,$color, 'Hamster', $fluffiness, 'hamster');
            return "Hamster added to database";
        } else {
            return $errorArr[0];
        }
    }
}