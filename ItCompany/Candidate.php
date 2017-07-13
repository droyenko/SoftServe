<?php

require_once 'Person.php';

class Candidate extends Person
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
}