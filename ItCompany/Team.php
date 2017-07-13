<?php

class Team
{
    protected $teamName;
    protected $project;
    protected $teamMembers = array();
    protected $needs = array();
    protected $completeness = true;

    public function __construct($teamName, $project, $teamMembers)
    {
        $this->teamName = $teamName;
        $this->project = $project;
        $this->teamMembers = $teamMembers;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function getTeamMembers()
    {
        return $this->teamMembers;
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
        return $this->needs;

    }

    public function addNeed($experience, $wantedSalary, $profile)
    {
        $this->needs[] = new Candidate('Any', $experience, $wantedSalary, $profile);
        $this->setCompleteness(false);
    }

    public function addTeamMember(Candidate $candidate)
    {
        $salary = $candidate->getWantedSalary();
        $position = $candidate->getProfile();
        $name = $candidate->getName();

        switch ($position) {
            case 'Dev':
                $newTeamMember = new Developer($name, $salary, $position, $this->teamName);
                array_push($this->teamMembers, $newTeamMember);
            case 'PM':
                $newTeamMember = new PM($name, $salary, $position, $this->teamName);
                array_push($this->teamMembers, $newTeamMember);
            case 'QC':
                $newTeamMember = new QC($name, $salary, $position, $this->teamName);
                array_push($this->teamMembers, $newTeamMember);
        }
    }

    public function doJob()
    {
        $teamMembers = $this->teamMembers;
        foreach ($teamMembers as $teamMember) {
            return $teamMember->doWork();
        }
    }
}