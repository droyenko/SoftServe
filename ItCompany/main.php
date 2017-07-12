<?php

require_once 'Candidate.php';

$dev1Candidate = new Candidate('Adam', 3, 1500, 'PHP');
$dev2Candidate = new Candidate('Brian', 2, 1200, 'Java');
$pm1Candidate = new Candidate('John', 2, 1500, 'PM');
$pm2Candidate = new Candidate('Kevin', 5, 2000, 'PM');
$qc1Candidate = new Candidate('Andrew', 1, 700, 'QC');
$qc2Candidate = new Candidate('Kate', 4, 1500, 'QC');
$candidates = array($dev1Candidate, $dev2Candidate, $pm1Candidate, $pm2Candidate, $qc1Candidate, $qc2Candidate);

$dev1 = new Developer('Anthony', 2000, 'Middle PHP', 'PHP Team');
$dev2 = new Developer('Alex', 2300, 'Senior Java', 'Java Team');
$pm1 = new PM('Anastasia', 1500, 'Middle PM', 'PHP Team');
$pm2 = new PM('Elisabeth', 1900, 'Senior PM', 'Java Team');
$qc1 = new QC('Sara', 500, 'Junior QC', 'PHP Team');
$qc2 = new QC('Albert', 1000, 'Senior QC', 'Java Team');
$phpTeamMembers = array($dev1, $pm1, $qc1);
$javaTeamMembers = array($dev2, $pm2, $qc2);

$phpTeam = new Team('PHP Team', 'Fishing blog', $phpTeamMembers);
$phpTeam->addNeed(2, 1700, 'PHP');
$phpTeam->addNeed(4, 2300, 'PM');

$javaTeam = new Team('Java Team', 'Server for blog', $javaTeamMembers);
$javaTeam->addNeed(1, 1500, 'Java');
$javaTeam->addNeed(2, 1600, 'QC');

$teams = array($phpTeam, $javaTeam);

$itCompany = new ItCompany($candidates, $teams);