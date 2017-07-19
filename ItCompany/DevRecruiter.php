<?php

class DevRecruiter extends Recruiter
{
    public function getSpecialist(Need $need, ItCompany $company)
    {
        $candidates = $company->getCandidates();
        foreach ($candidates as $key => $candidate) {
            if ($candidate->getProfile() == ProfileEnum::Dev) {
                if (($candidate->getExperience() >= $need->getExperience())
                    && ($candidate->getWantedSalary() <= $need->getWantedSalary())
                ) {
                    return $candidate;
                }
            }
        }
    }
}