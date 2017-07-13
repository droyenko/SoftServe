<?php

require_once 'HrTeam.php';

class ItCompany
{
    static protected $candidates = array();
    protected $teams = array();

    public function __construct($candidates, $teams)
    {
        self::$candidates = $candidates;
        $this->teams = $teams;
    }

    public static function getCandidates()
    {
        return self::$candidates;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function hire()
    {
        $teams = $this->getTeams();
        foreach ($teams as $team) {
            if (!$team->isComplete()) {
                $needs = $team->getNeeds();
                foreach ($needs as $need) {
                    switch ($need->getProfile()) {
                        case 'Dev':
                            $team->addTeamMember(HrTeam::getDev($need));
                            unset($need);
                            break;
                        case 'PM':
                            $team->addTeamMember(HrTeam::getPM($need));
                            unset($need);
                            break;
                        case 'QC':
                            $team->addTeamMember(HrTeam::getQC($need));
                            unset($need);
                            break;
                    }
                }
            }
        }
    }
}

$dev1Candidate = new Candidate('Adam', 3, 1500, 'Dev');
$dev2Candidate = new Candidate('Brian', 2, 1200, 'Dev');
$pm1Candidate = new Candidate('John', 2, 1500, 'PM');
$pm2Candidate = new Candidate('Kevin', 5, 2000, 'PM');
$qc1Candidate = new Candidate('Andrew', 1, 700, 'QC');
$qc2Candidate = new Candidate('Kate', 4, 1500, 'QC');
$candidates = array($dev1Candidate, $dev2Candidate, $pm1Candidate, $pm2Candidate, $qc1Candidate, $qc2Candidate);
