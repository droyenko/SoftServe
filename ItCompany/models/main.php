<?php

spl_autoload_register(function ($name) {
    require ( $name . ".php");
});

$itCompany = new ItCompany();
$phpTeam = new Team('PHP Team');
$javaTeam = new Team('Java Team');
$data = new ReadFileController();
$arrayOfData = $data->getArrayFromSource('InputData.json');
$phpTeam->addNeeds($arrayOfData['phpTeamNeeds'])->addTeamMembers($arrayOfData['phpTeamMembers']);
$javaTeam->addNeeds($arrayOfData['javaTeamNeeds'])->addTeamMembers($arrayOfData['javaTeamMembers']);
$itCompany->setCandidates($arrayOfData['candidates'])->addTeam($phpTeam)->addTeam($javaTeam);

echo "PHP TeamMembers<br>";
print_r($phpTeam->getTeamMembers());
echo "<br>====================================================================================<br>";
echo "PHP Team Needs<br>";
print_r($phpTeam->getNeeds());
echo "<br>====================================================================================<br>";
echo "Candidates<br>";
print_r($itCompany->getCandidates());
echo "<br>====================================================================================<br>";
$itCompany->hire($phpTeam);
echo "PHP TeamMembers<br>";
print_r($phpTeam->getTeamMembers());
echo "<br>====================================================================================<br>";
echo "PHP Team Needs<br>";
print_r($phpTeam->getNeeds());
echo "<br>====================================================================================<br>";
echo "Candidates<br>";
print_r($itCompany->getCandidates());
echo "<br>====================================================================================<br>";

print_r($phpTeam->doJob());
var_dump($phpTeam->isComplete());
