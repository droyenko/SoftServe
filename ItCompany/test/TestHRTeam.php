<?php

//require_once '../Candidate.php';
//require_once '../ItCompany.php';
//require_once '../DevRecruiter.php';
//require_once '../PMRecruiter.php';
//require_once '../QCRecruiter.php';
spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

class TestHRTeam extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the addTeamMember()
    **/

    public function provider_get_specialist()
    {
        $array = array(
            "Mr.Dev, 3, 300, Dev",
            "Mr.QC, 2, 200, QC",
            "Mr.PM, 1, 100, PM"
        );
        return array(
            array('Any', 1, 500, 'Dev', $array[0]),
            array('Any', 1, 500, 'QC', $array[1]),
            array('Any', 1, 500, 'PM', $array[2])
        );
    }

    /**
     * @dataProvider provider_get_specialist
     */
    public function test_getSpecialist($arr1, $arr2, $arr3, $arr4, $response)
    {
        $teams = null;
        $pmCandidate = new Candidate('Mr.PM', 1, 100, 'PM');
        $qcCandidate = new Candidate('Mr.QC', 2, 200, 'QC');
        $devCandidate = new Candidate('Mr.Dev', 3, 300, 'Dev');
        $baseCandidates = array($pmCandidate, $qcCandidate, $devCandidate);
        $itCompany = new ItCompany($baseCandidates, $teams);
        $hrTeam = new HrTeam($itCompany);

        $tm = $hrTeam->getSpecialist(new Candidate($arr1, $arr2, $arr3, $arr4), $itCompany); //testing function
        $tmInfo = "{$tm->getName()}, {$tm->getExperience()}, {$tm->getWantedSalary()}, {$tm->getProfile()}";
        $this->assertEquals($response, $tmInfo);
    }
}
