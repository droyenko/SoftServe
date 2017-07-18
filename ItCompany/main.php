<?php

spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

//Creating array of candidates
$dev1Candidate = new Candidate('Adam', 3, 1500, 'Dev');
$dev2Candidate = new Candidate('Brian', 2, 1200, 'Dev');
$pm1Candidate = new Candidate('John', 2, 1500, 'PM');
$pm2Candidate = new Candidate('Kevin', 5, 2000, 'PM');
$qc1Candidate = new Candidate('Andrew', 1, 700, 'QC');
$qc2Candidate = new Candidate('Kate', 4, 1500, 'QC');
$candidates = array($dev1Candidate, $dev2Candidate, $pm1Candidate, $pm2Candidate, $qc1Candidate, $qc2Candidate);

//Creating two arrays of team members
$dev1 = new Developer('Anthony', 2000, 'Dev', 'PHP Team');
$dev2 = new Developer('Alex', 2300, 'Dev', 'Java Team');
$pm1 = new PM('Anastasia', 1500, 'PM', 'PHP Team');
$pm2 = new PM('Elisabeth', 1900, 'PM', 'Java Team');
$qc1 = new QC('Sara', 500, 'QC', 'PHP Team');
$qc2 = new QC('Albert', 1000, 'QC', 'Java Team');
$phpTeamMembers = array($dev1, $pm1, $qc1);
$javaTeamMembers = array($dev2, $pm2, $qc2);

//Creating two teams with needs
$phpTeam = new Team('PHP Team', 'Fishing blog', $phpTeamMembers);
$phpTeam->addNeed(2, 1700, 'Dev');
$phpTeam->addNeed(4, 2300, 'PM');


$javaTeam = new Team('Java Team', 'Server for blog', $javaTeamMembers);
$javaTeam->addNeed(1, 1500, 'Dev');
$javaTeam->addNeed(2, 1600, 'QC');

//Creating array of teams
$teams = array($phpTeam, $javaTeam);

//creating new object of ItCompany
$itCompany = new ItCompany($candidates, $teams);

$hrTeam = new HrTeam($itCompany);


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
var_dump($phpTeam->isComplete());
print_r($phpTeam->doJob());
var_dump($phpTeam->isComplete());

//print_r($phpTeam->getTeamMembers());
//echo "<br>====================================================================================<br>";
//$needs = $phpTeam->getNeeds();
//print_r($needs);
//echo "<br>====================================================================================<br>";
//foreach ($needs as $key => $need) {
//    $dev = $hrTeam->getSpecialist($need, $itCompany);
//    $phpTeam->addTeamMember($dev);
//}
//print_r($phpTeam->getTeamMembers());
//echo "<br>====================================================================================<br>";
//print_r($phpTeam->getNeeds());

//print_r($phpTeam->getTeamMembers());
//$needs = $phpTeam->getNeeds();
//foreach ($needs as $key => $need) {
//    $dev = HrTeam::getPM($need);
//    $phpTeam->addTeamMember($dev);
//    print_r($dev);
//}
//echo "<br>====================================================================================<br>";
//print_r($phpTeam->getTeamMembers());

