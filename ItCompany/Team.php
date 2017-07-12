<?php

class Team
{
    protected $name;
    protected $project;
    protected $teamMembers = array();
    protected $needs = array();
    protected $completeness = true;

    function __construct($name, $project, $teamMembers)
    {
        $this->name = $name;
        $this->project = $project;
        $this->teamMembers = $teamMembers;
    }

    public function isComplete()
    {
        return $this->completeness;
    }

    public function setCompleteness($val)
    {
        $this->completeness = $val;
    }

     public function getNeeds()
    {
        if ($this->isComplete()) {
            return "This team is complete";
        } else {
            return $this->needs;
        }
    }

    public function addNeed($experience, $wantedSalary, $profile)
    {
        $this->needs[] = new Candidate('Any', $experience, $wantedSalary, $profile);
        $this->setCompleteness(false);
    }

    public function doJob()
    {

    }
}