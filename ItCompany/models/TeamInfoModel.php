<?php

class TeamInfoModel extends Model
{
    public function __construct()
    {

    }

    public function showBefore()
    {
        $itCompanyBefore = new ItCompany();
        $data = new ReadFileController();
        $arrayOfData = $data->getArrayFromSource('InputData.json');
        $itCompanyBefore->setCandidates($arrayOfData['candidates']);
        $phpTeam = new Team('PHP Team');
        $javaTeam = new Team('Java Team');
        $phpTeam->addNeeds($arrayOfData['phpTeamNeeds'])->addTeamMembers($arrayOfData['phpTeamMembers']);
        $javaTeam->addNeeds($arrayOfData['javaTeamNeeds'])->addTeamMembers($arrayOfData['javaTeamMembers']);
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
