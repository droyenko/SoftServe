<?php

require_once '../tasks/task5.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask5 extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the task5
    **/

    public function setUp()
    {
        $this->FibonacciSeries = new FibonacciSeries();
    }

    public function tearDown()
    {
        unset($this->FibonacciSeries);
    }

    public function provider_get_fibonacci_series()
    {
        $array = array(
            "status: 'failed', reason: Invalid properties for context object. \"min\", \"max\" and \"length\" values should be > then 0"
        );
        return array(//test for positive values
            array(array(6),
                array( 121393, 196418, 317811, 514229, 832040)),
            array(array(1, 2),
                array(1, 1, 2)),
            array(array(-6),
                $array[0]),
            array(array(-1, 2),
                $array[0])
        );
    }

    /**
     * @dataProvider provider_get_fibonacci_series
     */
    public function test_task5($arr1, $arr2)
    {
        $argv = func_get_args();
        if (count($argv[0]) == 1) {
            $context = new Context($arr1[0]);
        }else{
            $context = new Context($arr1[0], $arr1[1]);
        }
        $response = $arr2;
        $this->assertEquals($response, $this->FibonacciSeries->initFibonacciSeries($context));
    }
}
