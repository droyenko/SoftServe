<?php

class HrTeam
{
    public $itCompany = null;
    public $recruiters = [];

    function __construct(ItCompany $itCompany)
    {
        $this->itCompany = $itCompany;
        $this->recruiters = [ProfileEnum::QC => new QCRecruiter(),
                             ProfileEnum::PM => new PMRecruiter(),
                             ProfileEnum::Dev => new DevRecruiter()];
    }

    public function canFindSpecialist(Need $need)
    {
        $candidates = $this->itCompany->getCandidates();
        foreach ($candidates as $key => $candidate)
            if (($candidate->getProfile() === $need->getProfile())
                && ($candidate->getExperience() >= $need->getExperience())
                && ($candidate->getWantedSalary() <= $need->getWantedSalary())
            ) {
                return true;
            } else {
                return false;
            }
    }

    public function getSpecialist(Need $need, ItCompany $company)
    {
        $position = $need->getProfile();
        return $this->recruiters[$position]->getSpecialist($need, $company);
    }
}