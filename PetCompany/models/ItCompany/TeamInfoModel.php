<?php

class TeamInfoModel extends Model
{
    private $data = [];

    public function __construct()
    {
        //change this depending on database you need
        parent::__construct();
//        $data = $this->db->convertCompanyDbToArray(DBSettings::itCompanyDbFileName);
        $data = $this->db->convertCompanyJsonToArray(DBSettings::itCompanyJsonFileName);
        $this->data = $data;
    }

    public function showBefore()
    {
        $itCompanyBefore = new ItCompany();
        $itCompanyBefore->setCandidates($this->data['candidates']);
        $phpTeam = new Team('PHP Team');
        $javaTeam = new Team('Java Team');
        $phpTeam->addNeeds($this->data['phpTeamNeeds'])->addTeamMembers($this->data['phpTeamMembers']);
        $javaTeam->addNeeds($this->data['javaTeamNeeds'])->addTeamMembers($this->data['javaTeamMembers']);
        $itCompanyBefore->addTeam($phpTeam)->addTeam($javaTeam);

        return $itCompanyBefore;
    }

    public function showAfter()
    {
        $itCompany = $this->showBefore();
        foreach ($itCompany->getTeams() as $team) {
            $itCompany->hire($team);
        }
        return $itCompany;
    }
}
