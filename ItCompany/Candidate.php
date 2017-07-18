<?php

require_once 'Person.php';
require_once 'IITWorker.php';

class Candidate extends Person implements IITWorker, JsonSerializable
{
    protected $experience;
    protected $wantedSalary;
    protected $profile;

    function __construct($name, $experience, $wantedSalary, $profile)
    {
        $this->experience = $experience;
        $this->wantedSalary = $wantedSalary;
        $this->profile = $profile;
        parent::__construct($name);
    }

    public function jsonSerialize()
    {
        return [
            'experience' => $this->getExperience(),
            'wantedSalary' => $this->getWantedSalary(),
            'profile' => $this->getProfile(),
            'name' => $this->getName()
        ];
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function getWantedSalary()
    {
        return $this->wantedSalary;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function doITWork()
    {
        return true;
    }
}