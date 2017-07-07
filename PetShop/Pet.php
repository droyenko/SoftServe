<?php

require_once 'iPet.php';

abstract class Pet implements iPet
{
    protected $price;
    protected $color;
    protected $name = "";

    function __construct($price, $color)
    {
        $this->price = $price;
        $this->color = $color;
    }

    public function isYourColor()
    {
        return $this->color;
    }

    public function isYourPrice()
    {
        return $this->price;
    }

    public function isYourName()
    {
        return $this->name;
    }
}