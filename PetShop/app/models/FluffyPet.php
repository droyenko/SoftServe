<?php

require_once 'Pet.php';

abstract class FluffyPet extends Pet
{
    protected $fluffiness = 0;

    function __construct($price, $color, $fluffiness)
    {
        parent::__construct($price, $color);
        $this->fluffiness = $fluffiness;
    }

    /**
     * @return int
     */
    public function getFluffiness()
    {
        return $this->fluffiness;
    }
}