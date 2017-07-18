<?php

spl_autoload_register(function ($name) {
    require_once $name . '.php';
});


class ItCompany
{
    protected $candidates = array();
    protected $teams = array();
    protected $hrTeam = null;

    public function __construct($candidates, $teams)
    {
        $this->candidates = $candidates;
        $this->teams = $teams;
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

    public function setCandidates(array $candidates)
    {
        $this->candidates = $candidates;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function hire(Team $team)
    {
        if (!$team->isComplete()) {
            $needs = $team->getNeeds();
            foreach ($needs as $key => $need) {
                if ($this->getHrTeam()->canFindSpecialist($need)) {
                    $tm = $this->getHrTeam()->getSpecialist($need, $this);
                    $team->addTeamMember($tm);
                    unset($needs[$key]);
                    $tmpNeeds = array_values($needs);
                    $team->setNeeds($tmpNeeds);
                }
            }
        }
    }
}
