<?php

class Team
{
    protected $teamName;
    protected $project;
    protected $teamMembers = array();
    protected $needs = array();
    protected $completeness = false;

    public function __construct($teamName, $project, $teamMembers, $completeness = "1")
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

    public function setNeeds(array $needs)
    {
        $this->needs = $needs;
        if (count($needs) == 0) {
            $this->completeness = true;
        } else {
            $this->completeness = false;
        }
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
                break;
            case 'PM':
                $newTeamMember = new PM($name, $salary, $position, $this->teamName);
                array_push($this->teamMembers, $newTeamMember);
                break;
            case 'QC':
                $newTeamMember = new QC($name, $salary, $position, $this->teamName);
                array_push($this->teamMembers, $newTeamMember);
                break;
        }
    }

    public function doJob()
    {
        $teamWork = "";
        $teamMembers = $this->getTeamMembers();
        foreach ($teamMembers as $teamMember) {
            $teamWork .= $teamMember->doWork() . "<br>";
        }
        return $teamWork;
    }
}