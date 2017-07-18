<?php

spl_autoload_register(function ($name) {
    require_once $name . '.php';
});

class Developer extends HardSpecialist
{
    public function doWork()
    {
        return "My name is {$this->getName()}, and I'm doing my Development work as a member of {$this->getTeam()}";
    }

    public function doITWork()
    {
        return true;
    }
}