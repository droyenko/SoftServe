<?php

require_once '../tasks/task1.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask1 extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the task1
    **/

    public function setUp()
    {
        $this->Chessboard = new Chessboard();
    }

    public function tearDown()
    {
        unset($this->Chessboard);
    }

    public function provider_chess_desk()
    {
        $array = array(
            "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns should be > then 0"
        );
        return array(
//            array(2, 2, "*", $array[0]),//test for positive values
//            array(3, 2, "#", $array[1]),
            array(2, -2, "*", $array[0]), //test for negative values
            array(-3, 2, "#", $array[0])
        );
    }

    /**
     * @dataProvider provider_chess_desk
     */
    public function test_task1($rows, $cols, $sign, $response)
    {
        $this->assertEquals($response, $this->Chessboard->initChessBoard($rows, $cols, $sign));
    }
}
