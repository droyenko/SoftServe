<?php

require_once 'Candidate.php';

class HrTeam
{
    public static function getDev($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $candidate) {
            if ($candidate->getProfile() == 'Dev') {
                if (($candidate->getExperience() >= $need->getExperience())
                 && ($candidate->getWantedSalary() <= $need->getWantedSalary())) {
                    return $candidate;
                }
            }
        }
    }

    public static function getQC($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $candidate) {
            if ($candidate->getProfile() == 'PM') {
                if (($candidate->getExperience() >= $need->getExperience())
                 && ($candidate->getWantedSalary() <= $need->getWantedSalary())) {
                    return $candidate;
                }
            }
        }
    }

    public static function getPM($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $candidate) {
            if ($candidate->getProfile() == 'QC') {
                if (($candidate->getExperience() >= $need->getExperience())
                 && ($candidate->getWantedSalary() <= $need->getWantedSalary())) {
                    return $candidate;
                }
            }
        }
    }
}