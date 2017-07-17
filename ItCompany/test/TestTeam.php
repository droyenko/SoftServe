<?php

require_once '../Developer.php';
require_once '../PM.php';
require_once '../QC.php';
require_once '../Team.php';
require_once '../Candidate.php';

class TestTeam extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the addTeamMember()
    **/

    public function provider_add_team_member()
    {
        $array = array(
            "Anthony, Adam, "
        );
        return array(
//            array('Adam', 3, 1500, 'Dev'),
            array('Adam', 3, 1500, 'Dev', $array[0])
        );
    }

    /**
     * @dataProvider provider_add_team_member
     */
    public function test_addTeamMember($name, $experience, $wantedSalary, $profile, $response)
    {
        $dev1 = new Developer('Anthony', 2000, 'Dev', 'PHP Team');
        $phpTeamMembers = array($dev1);
        $phpTeam = new Team('PHP Team', 'Fishing blog', $phpTeamMembers);

        $candidate = new Candidate($name, $experience, $wantedSalary, $profile);
        $phpTeam->addTeamMember($candidate); //testing function
        $teamMembersNames = '';
        foreach ($phpTeam->getTeamMembers() as $teamMember) {
            $teamMembersNames .= $teamMember->getName() . ", ";
        }
        $this->assertEquals($response, $teamMembersNames);
    }


    /*
    * Test for the setNeeds()
    **/

    public function provider_set_needs()
    {
        $array = array(
            "experience 1, profile Dev, experience 3, profile PM, experience 5, profile QC, ",
            "experience 10, profile PM, experience 15, profile Dev, experience 20, profile Dev, "
        );
        return array(
            array(array('Any', 1, 500, 'Dev'),
                array('Any', 3, 700, 'PM'),
                array('Any', 5, 1200, 'QC'),
                $array[0]),
            array(array('Any', 10, 1500, 'PM'),
                array('Any', 15, 2700, 'Dev'),
                array('Any', 20, 3200, 'Dev'),
                $array[1])
        );
    }

    /**
     * @dataProvider provider_set_needs
     */
    public function test_setNeeds($arr1, $arr2, $arr3, $arr4)
    {
        $dev1 = new Developer('Fill', 2000, 'Dev', 'PHP Team');
        $phpTeamMembers = array($dev1);
        $phpTeam = new Team('PHP Team', 'Fishing blog', $phpTeamMembers);

        $phpTeam->addNeed(2, 1700, 'Dev');

        $argv = func_get_args();
        $needs = array();
        for ($i = 0; $i < (func_num_args() - 1); $i++) {
            $need[$i] = new Candidate($argv[$i][0], $argv[$i][1], $argv[$i][2], $argv[$i][3]);
            array_push($needs, $need[$i]);
        }

        $phpTeam->setNeeds($needs); //testing function
        $needsInfo = '';
        foreach ($phpTeam->getNeeds() as $need) {
            $needsInfo .= "experience {$need->getExperience()}, profile {$need->getProfile()}, ";
        }
        $response = $argv[func_num_args() - 1];
        $this->assertEquals($response, $needsInfo);
    }
}
