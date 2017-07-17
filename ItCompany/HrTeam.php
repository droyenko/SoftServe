<?php

require_once 'Candidate.php';

class HrTeam
{
    public static function canFindSpecialist($need)
    {
        $candidates = ItCompany::getCandidates();
        foreach ($candidates as $key => $candidate)
            if (($candidate->getProfile() == $need->getProfile())
                && ($candidate->getExperience() >= $need->getExperience())
                && ($candidate->getWantedSalary() <= $need->getWantedSalary())
            ) {
                return true;
            } else {
                return false;
            }
    }

    public static function getSpecialist($need)
    {
        if ($need->getProfile() == "PM"){
            $tm = PMRecruiter::getSpecialist($need);
        } elseif ($need->getProfile() == "Dev"){
            $tm = DevRecruiter::getSpecialist($need);
        }elseif ($need->getProfile() == "QC"){
            $tm = QCRecruiter::getSpecialist($need);
        }
        return $tm;
    }
}