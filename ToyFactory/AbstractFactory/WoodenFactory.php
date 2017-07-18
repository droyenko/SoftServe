<?php

spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

class WoodenFactory extends AbstractFactory
{
    public function getCar()
    {
        return new WoodenCar();
    }
    public function getDoll()
    {
        return new WoodenDoll();
    }
}