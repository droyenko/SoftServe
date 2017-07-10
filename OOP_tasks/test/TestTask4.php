<?php

require_once '../tasks/task4.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask4 extends PHPUnit_Framework_TestCase
{
    /*
   * Test for the task4
   **/

    public function provider_count_happy_ticket()
    {
        return array(
            array(100000, 200000, 1, 5280, 2455),//test for positive values
            array(1, 1001, 2, 1, 30),
            array(1000, 2001, 2, 45, 54)
        );
    }

    /**
     * @dataProvider provider_count_happy_ticket
     */
    public function test_task4($min, $max, $win_method, $count_method1, $count_method2)
    {
        $luckyTicket = new LuckyTicket();
        $contextObj = new ContextObj($min, $max);
        $response = "$win_method; $count_method1; $count_method2";
        $context = array($contextObj);
        $this->assertEquals($response, $luckyTicket->resolveAsString($context));
    }

    /*
    * Test for the task4 with exceptions
    **/
    public function provider_count_happy_ticket_exception()
    {
        $array = array(
            "status: 'failed', reason: Invalid properties for context object. \"min\" and \"max\" values should be > then 0"
        );
        return array( //test for negative values
            array(-10, 200, $array[0])
        );
    }

    /**
     * @dataProvider provider_count_happy_ticket_exception
     */
    public function test_task4_exceptions($min, $max, $response)
    {
        $luckyTicket = new LuckyTicket();
        $contextObj = new ContextObj($min, $max);
        $context = array($contextObj);
        $this->assertEquals($response, $luckyTicket->resolveAsString($context));
    }
}
