<?php

require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Hamster.php';
require_once 'SQLdbConnection.php';

class PetShop
{
    private $pets = array();

    public function __construct()
    {
        $pets = SQLdbConnection::getAllPetsAsArray();
        $this->pets = $pets;
    }

    public function getPriceHigherAvg()
    {
        $result = array();
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
        $result = array();
        foreach ($this->pets as $pet) {
            if (($pet instanceof FluffyPet) && ($pet->isYourColor() == 'white' || $pet->isFluffy())) {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    public function getCats()
    {
        $result = array();
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

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'cats':
            $petShop = new PetShop();
            echo "List of all cats: {$petShop->getCats()}.<br > ";
            break;
        case 'hiPrice':
            $petShop = new PetShop();
            echo "List of expensive pets: {$petShop->getPriceHigherAvg()}.<br > ";
            break;
        case 'whiteOrFluffy':
            $petShop = new PetShop();
            echo "List of fluffy or white pets: {$petShop->getWhiteOrFluffy()}";
            break;
    }
}
