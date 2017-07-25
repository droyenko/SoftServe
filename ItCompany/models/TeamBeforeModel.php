<?php

class TeamBeforeModel extends Model
{
    function __construct()
    {

    }

    public function showInfo($team)
    {
        $itCompany = new ItCompany();
        $data = new ReadFileController();
        $arrayOfData = $data->getArrayFromSource('InputData.json');
        $itCompany->setCandidates($arrayOfData['candidates']);
        if ($team == 'php'){
            $phpTeam = new Team('PHP Team');
            $phpTeam->addNeeds($arrayOfData['phpTeamNeeds'])->addTeamMembers($arrayOfData['phpTeamMembers']);
            $itCompany->addTeam($phpTeam);

            echo "PHP TeamMembers<br>";
            print_r($phpTeam->getTeamMembers());
            echo "<hr>";
            echo "PHP Team Needs<br>";
            print_r($phpTeam->getNeeds());
            echo "<hr>";
            echo "Candidates<br>";
            print_r($itCompany->getCandidates());
            echo "<hr>";

        } elseif ($team == 'java'){
            $javaTeam = new Team('Java Team');
            $javaTeam->addNeeds($arrayOfData['javaTeamNeeds'])->addTeamMembers($arrayOfData['javaTeamMembers']);
            $itCompany->addTeam($javaTeam);

            echo "Java TeamMembers<br>";
            print_r($javaTeam->getTeamMembers());
            echo "<hr>";
            echo "Java Team Needs<br>";
            print_r($javaTeam->getNeeds());
            echo "<hr>";
            echo "Candidates<br>";
            print_r($itCompany->getCandidates());
            echo "<hr>";
        }
    }
}