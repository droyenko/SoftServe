<?php


abstract class Recruiter
{
    public abstract function getSpecialist(Candidate $need, ItCompany $company);
}