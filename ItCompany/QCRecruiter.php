<?php

require_once 'Recruiter.php';

class QCRecruiter extends Recruiter
{
    public static function getSpecialist($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $key => $candidate) {
            if ($candidate->getProfile() == 'QC') {
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