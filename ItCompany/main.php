<?php

require_once 'Candidate.php';
require_once 'Developer.php';
require_once 'PM.php';
require_once 'QC.php';
require_once 'Team.php';
require_once 'ItCompany.php';

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



//echo "PHP TeamMembers<br>";
//print_r($phpTeam->getTeamMembers());
//echo "<br>====================================================================================<br>";
//$phpTeam->addTeamMember($dev1Candidate);
//echo "<br>====================================================================================<br>";
//echo $dev1Candidate->getProfile();
//echo "<br>====================================================================================<br>";
//print_r($phpTeam->getTeamMembers());

echo "PHP TeamMembers<br>";
print_r($phpTeam->getTeamMembers());
echo "<br>====================================================================================<br>";
echo "PHP Team Needs<br>";
print_r($phpTeam->getNeeds());
echo "<br>====================================================================================<br>";
$itCompany->hire();
echo "PHP TeamMembers<br>";
print_r($phpTeam->getTeamMembers());
echo "<br>====================================================================================<br>";
echo "PHP Team Needs<br>";
print_r($phpTeam->getNeeds());

//echo "Java TeamMembers<br>";
//print_r($javaTeam->getTeamMembers());
//echo "<br>====================================================================================<br>";
//echo "Java Team Needs<br>";
//print_r($javaTeam->getNeeds());
//echo "<br>====================================================================================<br>";
//$itCompany->hire();
//echo "Java TeamMembers<br>";
//print_r($javaTeam->getTeamMembers());
//echo "<br>====================================================================================<br>";
//echo "Java Team Needs<br>";
//print_r($javaTeam->getNeeds());

//$candidates = ItCompany::getCandidates();
//foreach ($candidates as $candidate) {
//    print_r($candidate->getProfile());
//}