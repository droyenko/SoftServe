<?php

require_once 'Recruiter.php';

class PMRecruiter extends Recruiter
{
    public static function getSpecialist($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $key => $candidate) {
            if ($candidate->getProfile() == 'PM') {
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