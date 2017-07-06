<?php

require_once 'Pet.php';

class PetShop
{
    //3 метода возвращаею массив строк с именами
    /* @var $entity \ */
    private $pets = array();

    public function __construct(Pet $pet)
    {
        $this->pets = $pet;
        //пушим массив петов
    }

    public function getPriceHigherAvg($pets)
    {
        $result = array();
        $avgPrice = $this->getAvgPrice($pets);
        foreach ($pets as $pet) {
            if ($pet->isYourPrice() > $avgPrice) {
                $result[] = $pet;
            }
        }
        return $result;
    }

    private function getAvgPrice($pets)
    {
        $sum = 0;
        $count = 0;
        foreach ($pets as $pet) {
            $sum += $pet->isYourPrice();
            $count++;
        }
        $avgPrice = $sum / $count;
        return $avgPrice;
    }

    public function getWhiteOrFluffy($pets)
    {
        $result = array();
        foreach ($pets as $pet) {
            if ($pet->isYourColor() == 'white' || $pet->isFluffy() == true) {
                $result[] = $pet;
            }
        }
        return $result;
    }

    public function getCats($pets)
    {
        $result = array();
        foreach ($pets as $pet){
            if($pet instanceof Cat){
                $result[] = $pet;
            }
        }
        return $result;
    }

    public function addPet(Pet $pet)
    {
        $pets[] = $pet;
    }
}