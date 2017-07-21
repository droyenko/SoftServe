<?php

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