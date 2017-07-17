<?php

require_once 'Recruiter.php';

class DevRecruiter extends Recruiter
{
    public static function getSpecialist($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $key => $candidate) {
            if ($candidate->getProfile() == 'Dev') {
                if (($candidate->getExperience() >= $need->getExperience())
                    && ($candidate->getWantedSalary() <= $need->getWantedSalary())
                ) {
                    unset($candidates[$key]);
                    ItCompany::setCandidates($candidates);
                    return $candidate;
                }
            }
        }
    }
}