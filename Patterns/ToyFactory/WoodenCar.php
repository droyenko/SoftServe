<?php

require_once 'Car.php';

class WoodenCar extends Car
{
    public function sayGotClass()
    {
        return get_class($this);
    }
}