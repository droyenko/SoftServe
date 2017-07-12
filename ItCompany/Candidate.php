<?php

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

}