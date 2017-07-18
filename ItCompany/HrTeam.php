<?php

require_once 'Candidate.php';

class HrTeam
{
    public $itCompany = null;
    public $recruiters = array();

    function __construct(ItCompany $itCompany)
    {
        $this->itCompany = $itCompany;
        $this->recruiters = ["PM" => new PMRecruiter(),
                             "QC" => new QCRecruiter(),
                             "Dev" => new DevRecruiter()];
    }

    public function canFindSpecialist(Candidate $need)
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

    public function getSpecialist(Candidate $need, ItCompany $company)
    {
        $position = $need->getProfile();
        return $this->recruiters[$position]->getSpecialist($need, $company);
    }
}