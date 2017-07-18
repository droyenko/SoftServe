<?php

require_once 'Recruiter.php';

class DevRecruiter extends Recruiter
{
    public function getSpecialist(Candidate $need, ItCompany $company)
    {
        $candidates = $company->getCandidates();
        foreach ($candidates as $key => $candidate) {
            if ($candidate->getProfile() == 'Dev') {
                if (($candidate->getExperience() >= $need->getExperience())
                    && ($candidate->getWantedSalary() <= $need->getWantedSalary())
                ) {
                    unset($candidates[$key]);
                    $tmpCandidates = array_values($candidates);
                    $company->setCandidates($tmpCandidates);
                    return $candidate;
                }
            }
        }
    }
}