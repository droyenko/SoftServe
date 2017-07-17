<?php

require_once 'HardSpecialist.php';

class QC extends HardSpecialist
{
    public function doWork()
    {
        return "My name is {$this->getName()}, and I'm doing my QC work as a member of {$this->getTeam()}";
    }

    public function doITWork()
    {
        return true;
    }
}