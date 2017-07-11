<?php

require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Hamster.php';
require_once 'SQLdbConnection.php';

class PetShop
{

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
            if (get_parent_class($pet) == 'FluffyPet' && ($pet->isYourColor() == 'white' || $pet->isFluffy() == 1)) {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    public function getCats()
    {
        $result = array();
        foreach ($this->pets as $pet) {
            if (get_class($pet) == 'Cat') {
                $result[] = $pet->isYourName();
            }
        }
        return implode("; ", $result);
    }

    public function addPet(Pet $pet)
    {
        $pets[] = $pet;
    }

    public function getAllCats(){
        $dbh = SQLdbConnection::selectPetByType('cat');
        return $dbh;
    }
}



//$cat1 = new Cat(300,'black', 'Jack', 3);
//$cat2 = new Cat(150,'gray', 'Goose', 1);
//$cat3 = new Cat(400,'white', 'Snake', 0);
//
//$dog1 = new Dog(500, 'red', 'Heat');
//$dog2 = new Dog(700, 'white', 'Snowflake');
//$dog3 = new Dog(300, 'yellow', 'Submarine');
//
//$hams1 = new Hamster(100, 'white', '1');
//$hams2 = new Hamster(130, 'green', '2');
//$hams3 = new Hamster(85, 'blue', '0');
//
//$pets = array($cat1, $cat2, $cat3, $dog1, $dog2, $dog3, $hams1, $hams2, $hams3);
//
//$petShop = new PetShop($pets);
//
//echo "List of all cats: {$petShop->getCats()}.<br>";
//echo "List of expensive pets: {$petShop->getPriceHigherAvg()}.<br>";
//echo "List of fluffy or white pets: {$petShop->getWhiteOrFluffy()}";
