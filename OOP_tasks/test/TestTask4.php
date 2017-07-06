<?php

require_once '../tasks/task4.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask4 extends PHPUnit_Framework_TestCase
{
    /*
   * Test for the task4
   **/

    public function setUp()
    {
        $this->LuckyTicket = new LuckyTicket();
    }

    public function tearDown()
    {
        unset($this->LuckyTicket);
    }

    public function provider_count_happy_ticket()
    {
        return array(
            array(1, 200, 2, 0, 8),//test for positive values
            array(1, 1001, 2, 1, 30),
            array(1000, 2001, 2, 45, 54)
        );
    }

    /**
     * @dataProvider provider_count_happy_ticket
     */
    public function test_task4($min, $max, $win_method, $count_method1, $count_method2)
    {
        $context = new ContextObj($min, $max);
        $response = new LuckyTicket();
        $response->win_method = $win_method;
        $response->count_method1 = $count_method1;
        $response->count_method2 = $count_method2;
        $this->assertEquals($response, $this->LuckyTicket->initHappyTicket($context));
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
//            array(1, 200, $array[0]),
            array(-10, 200, $array[0])
        );
    }

    /**
     * @dataProvider provider_count_happy_ticket_exception
     */
    public function test_task4_exceptions($min, $max, $response)
    {
        $context = new ContextObj($min, $max);
        $this->assertEquals($response, $this->LuckyTicket->initHappyTicket($context));
    }
}
