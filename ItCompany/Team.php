<?php

class Team
{
    protected $teamName;
    protected $teamMembers = array();
    protected $needs = array();

    public function __construct($teamName)
    {
        $this->teamName = $teamName;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function getTeamMembers()
    {
        return $this->teamMembers;
    }

    public function getNeeds()
    {
        return $this->needs;
    }

    public function isComplete()
    {
        if (count($this->getNeeds()) === 0){
            return true;
        } else {
            return false;
        }
    }

    public function addNeed($experience, $wantedSalary, $profile)
    {
        $this->needs[] = new Need($experience, $wantedSalary, $profile);
    }

    public function addNeeds($needs)
    {
        $this->needs = $needs;
        return $this;
    }

    public function unsetNeed(Need $needToUnset)
    {
        foreach ($this->needs as $key => $need){
            if ($needToUnset === $need){
                unset($this->needs[$key]);
            }
        }
    }

    public function addTeamMembers($arrayOfTeamMembers){
        $this->teamMembers = $arrayOfTeamMembers;
        return $this;
    }

    public function closeNeed(Candidate $candidate, ItCompany $company, Need $need)
    {
        $salary = $candidate->getWantedSalary();
        $position = $candidate->getProfile();
        $name = $candidate->getName();

        switch ($position) {
            case ProfileEnum::Dev:
                $this->teamMembers[] = new Developer($name, $salary, $position, $this->teamName);
                $company->unsetCandidate($candidate);
                $this->unsetNeed($need);
                break;
            case ProfileEnum::PM:
                $this->teamMembers[] = new PM($name, $salary, $position, $this->teamName);
                $company->unsetCandidate($candidate);
                $this->unsetNeed($need);
                break;
            case ProfileEnum::QC:
                $this->teamMembers[] = new QC($name, $salary, $position, $this->teamName);
                $company->unsetCandidate($candidate);
                $this->unsetNeed($need);
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