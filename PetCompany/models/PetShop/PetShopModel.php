<?php

class PetShopModel extends Model
{
    private $pets = [];

    public function __construct()
    {
        //change this depending on database you need
        parent::__construct();
        $pets = $this->db->convertPetsDbToArray(DBSettings::petShopDbFileName);
//        $pets = $this->db->convertPetsJsonToArray(DBSettings::petShopJsonFileName);
        $this->pets = $pets;
    }

    public function getPriceHigherAvg()
    {
        $result = [];
        $avgPrice = $this->getAvgPrice();
        foreach ($this->pets as $pet) {
            if ($pet->isYourPrice() > $avgPrice) {
                $result[] = $pet;
            }
        }
        return $result;
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
                $result[] = $pet;
            }
        }
        return $result;
    }

    public function getCats()
    {
        $result = [];
        foreach ($this->pets as $pet) {
            if ($pet instanceof Cat) {
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