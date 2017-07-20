<?php

spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

class PaperFactory extends AbstractFactory
{
    public function getCar()
    {
        return new PaperCar();
    }

    public function getDoll()
    {
        return new PaperDoll();
    }
}