<?php

require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Hamster.php';
require_once 'SQLdbConnection.php';

class PetShop
{
    private $pets = [];

    public function __construct()
    {
//        $pets = SQLdbConnection::convertDBToArray();
        $pets = SQLdbConnection::convertJsonToArray();
        $this->pets = $pets;
    }

    public function getPriceHigherAvg()
    {
        $result = [];
        $avgPrice = $this->getAvgPrice();
        foreach ($this->pets as $pet) {
            if ($pet->isYourPrice() > $avgPrice) {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    private function getAvgPrice()
    {
        $sum = 0;
        $count = 0;
        foreach ($this->pets as $pet) {
            $sum += $pet->isYourPrice();
            $count++;
        }
        $avgPrice = $sum / $count;
        return $avgPrice;
    }

    public function getWhiteOrFluffy()
    {
        $result = [];
        foreach ($this->pets as $pet) {
            if (($pet instanceof FluffyPet) && ($pet->isYourColor() == 'white' || $pet->isFluffy())) {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    public function getCats()
    {
        $result = [];
        foreach ($this->pets as $pet) {
            if ($pet instanceof Cat) {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    public function addPet(Pet $pet)
    {
        $pets[] = $pet;
    }
}