<?php

class ItCompany
{
    static protected $candidates = array();
    protected $teams = array();

    function __construct($candidates, $teams)
    {
        self::$candidates = $candidates;
        $this->teams = $teams;
    }

    public function hire()
    {
        foreach ($this->getTeams() as $team){
            $result = $team->getNeeds();
            if (is_array($result)) {
                foreach ($result as $need) {
                    switch ($need['profile']) {
                        case 'PHP':
                            HrTeam::getDev($need);
                            break;
                        case 'Java':
                            HrTeam::getDev($need);
                            break;
                        case 'PM':
                            HrTeam::getPM($need);
                            break;
                        case 'QC':
                            HrTeam::getQC($need);
                            break;
                    }
                }
            } else {
                return 'All teams are complete';
            }
        }
    }

    public static function getCandidates()
    {
        return self::$candidates;
    }

    public function getTeams()
    {
        return $this->teams;
    }
}