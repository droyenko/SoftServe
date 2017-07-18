<?php

spl_autoload_register(function ($name)
{
    require_once '../' . $name . '.php';
});

class TestITCompany extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the getCandidates()
    **/

    public function provider_get_candidates()
    {
        $array = array(
            "experience 1, profile Dev, experience 3, profile PM, experience 5, profile QC, ",
            "experience 10, profile PM, experience 15, profile Dev, experience 20, profile Dev, "
        );
        return array(
            array(array('Mr.A', 1, 500, 'Dev'),
                array('Mr.B', 3, 700, 'PM'),
                array('Mr.C', 5, 1200, 'QC'),
                $array[0]),
            array(array('Mr.D', 10, 1500, 'PM'),
                array('Mr.E', 15, 2700, 'Dev'),
                array('Mr.F', 20, 3200, 'Dev'),
                $array[1])
        );
    }

    /**
     * @dataProvider provider_get_candidates
     */
    public function test_getCandidates($arr1, $arr2, $arr3, $arr4)
    {
        $teams = null;
        $cand1 = new Candidate('Freeman', 1, 100, 'QC');
        $baseCand = array($cand1);
        $itCompany = new ItCompany($baseCand, $teams);

        $argv = func_get_args();
        $candidates = array();
        for ($i = 0; $i < (func_num_args() - 1); $i++) {
            $candidate[$i] = new Candidate($argv[$i][0], $argv[$i][1], $argv[$i][2], $argv[$i][3]);
            array_push($candidates, $candidate[$i]);
        }

        $itCompany->setCandidates($candidates); //testing function
        $candidatesInfo = '';
        foreach ($itCompany->getCandidates() as $candidate) {
            $candidatesInfo .= "experience {$candidate->getExperience()}, profile {$candidate->getProfile()}, ";
        }
        $response = $argv[func_num_args() - 1];
        $this->assertEquals($response, $candidatesInfo);
    }
}
