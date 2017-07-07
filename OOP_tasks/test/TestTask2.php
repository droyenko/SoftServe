<?php

require_once '../tasks/task2.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask2 extends PHPUnit_Framework_TestCase
{
    /*
     * Test for the task2
     **/

    public function provider_fit_envelope()
    {
        $array = array(
            "status: 'failed', reason: Invalid properties of envelope object. Envelope sides should be greater then 0"
        );
        return array(
            array(6, 8, 8, 10, 1),//test for positive values
            array(6.5, 8.456, 5.67, 8.32, 2),
            array(5.67, 8.32, 6.5, 8.456, 1),
            array(-5, -4, 8, 10, $array[0])//test for negative values
        );
    }

    /**
     * @dataProvider provider_fit_envelope
     */
    public function test_task2($side1, $side2, $side3, $side4, $response)
    {
        $envelope = new Envelope();
        $envelope1 = new EnvObj($side1, $side2);
        $envelope2 = new EnvObj($side3, $side4);
        $envelopes = array($envelope1, $envelope2);
        $this->assertEquals($response,  $envelope->resolveAsString($envelopes));
    }
}
