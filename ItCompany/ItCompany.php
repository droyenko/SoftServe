<?php

class ItCompany
{
    protected $candidates = [];
    protected $teams = [];
    protected $hrTeam = null;

    public function __construct()
    {
        $this->hrTeam = new HrTeam($this);
    }

    public function getHrTeam()
    {
        return $this->hrTeam;
    }

    public function getCandidates()
    {
        return $this->candidates;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function addCandidate($name, $experience, $wantedSalary, $profile)
    {
        $this->candidates[] = new Candidate($name, $experience, $wantedSalary, $profile);
    }

    public function addTeam(Team $team)
    {
        $this->teams[] = $team;
        return $this;
    }

    public function setCandidates(array $candidates)
    {
        $this->candidates = $candidates;
        return $this;
    }

    public function hire(Team $team)
    {
        if (!$team->isComplete()) {
            $needs = $team->getNeeds();
            foreach ($needs as $key => $need) {
                if ($this->getHrTeam()->canFindSpecialist($need)) {
                    $tm = $this->getHrTeam()->getSpecialist($need, $this);
                    $team->closeNeed($tm, $this, $need);
                }
            }
        }
    }

    public function unsetCandidate(Candidate $candidateToUnset)
    {
        foreach ($this->getCandidates() as $key => $candidate){
            if ($candidateToUnset === $candidate){
                unset($this->candidates[$key]);
            }
        }
    }
}
