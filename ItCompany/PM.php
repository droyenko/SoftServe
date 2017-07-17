<?php

require_once 'HardSpecialist.php';

class PM extends HardSpecialist
{
    public function doWork()
    {
        return "My name is {$this->getName()}, and I'm doing my PM work as a member of {$this->getTeam()}";
    }

    public function doITWork()
    {
        return true;
    }
}