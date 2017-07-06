<?php

abstract class Pet implements iPet
{
    protected $price;
    protected $color;
    protected $name = "";
    protected $fluffiness = 0;

    function __construct($price, $color)
    {
        $this->price = $price;
        $this->color = $color;
    }

    public function isYourColor(){
        return $this->color;
    }

    public function isYourPrice()
    {
        return $this->price;
    }
}