<?php

require_once '../tasks/task3.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask3 extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the task3
    **/

    public function setUp()
    {
        $this->Triangle = new Triangle();
    }

    public function tearDown()
    {
        unset($this->Triangle);
    }

    public function provider_get_triangle_desc()
    {
        $array = array(
            "status: 'failed', reason: Invalid properties of triangle object. Triangle sides should be > then 0"
        );
        return array(
            array(array('ABC', 5, 10, 8), //test for positive values
                array('DEF', 35, 100, 80),
                array('GHI', 20, 35, 50),
                array('DEF', 'GHI', 'ABC')),
            array(array('GHI', 5, 10, 8),
                array('ABC', 35, 100, 80),
                array('DEF', 20, 35, 50),
                array('ABC', 'DEF', 'GHI')),
            array(array('GHI', -5, 10, 8), //test for negative values
                array('ABC', 35, 100, 80),
                array('DEF', 20, 35, 50),
                $array[0])
        );
    }

    /**
     * @dataProvider provider_get_triangle_desc
     */
    public function test_task3($arr1, $arr2, $arr3, $arr4)
    {
        //universal version of parameterized test, applicable for any number of triangles in array, passed as parameter to getTriangleDesc() function
        $argv = func_get_args();
        $triangles = array();
        for ($i = 0; $i < (func_num_args() - 1); $i++) {
            $triangle[$i] = new TriangleObj($argv[$i][0], $argv[$i][1], $argv[$i][2], $argv[$i][3]);
            array_push($triangles, $triangle[$i]);
        }
        $response = $argv[func_num_args() - 1];
        $this->assertEquals($response, $this->Triangle->resolveAsString($triangles));
    }
}
