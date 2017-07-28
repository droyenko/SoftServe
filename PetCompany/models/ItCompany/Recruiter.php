<?php

abstract class Recruiter
{
    public abstract function getSpecialist(Need $need, ItCompany $company);
}