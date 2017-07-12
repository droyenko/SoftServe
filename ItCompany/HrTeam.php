<?php

class HrTeam
{
    public static function getDev($need)
    {
        foreach (ItCompany::getCandidates() as $candidate){
            if (($candidate['profile'] == 'PHP') || ($candidate['profile'] == 'Java')){
                if (($candidate['experience'] >= $need['experience']) && ($candidate['wantedSalary'] <= $need['wantedSalary'])){
                    return $candidate;
                }
            }
        }
    }

    public static function getQC($need)
    {
        foreach (ItCompany::getCandidates() as $candidate){
            if ($candidate['profile'] == 'PM'){
                if (($candidate['experience'] >= $need['experience']) && ($candidate['wantedSalary'] <= $need['wantedSalary'])){
                    return $candidate;
                }
            }
        }
    }

    public static function getPM($need)
    {
        foreach (ItCompany::getCandidates() as $candidate){
            if ($candidate['profile'] == 'QC'){
                if (($candidate['experience'] >= $need['experience']) && ($candidate['wantedSalary'] <= $need['wantedSalary'])){
                    return $candidate;
                }
            }
        }
    }
}