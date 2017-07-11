<?php

require_once 'iPet.php';

abstract class Pet
{
    protected $price;
    protected $color;
    protected $name = "";

    function __construct($price, $color)
    {
        $this->price = $price;
        $this->color = $color;
    }


}