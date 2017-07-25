<?php

class Need implements JsonSerializable
{
    protected $experience;
    protected $wantedSalary;
    protected $profile;

    function __construct($experience, $wantedSalary, $profile)
    {
        $this->experience = $experience;
        $this->wantedSalary = $wantedSalary;
        $this->profile = $profile;
    }

    public function jsonSerialize()
    {
        return [
            'experience' => $this->getExperience(),
            'wantedSalary' => $this->getWantedSalary(),
            'profile' => $this->getProfile(),
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
}