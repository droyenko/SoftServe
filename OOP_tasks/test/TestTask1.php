<?php

require_once '../tasks/task1.php';
require_once 'c:/xampp/phpunit/phpunit-5.7.19.phar';

class TestTask1 extends PHPUnit_Framework_TestCase
{
    /*
    * Test for the task1
    **/

    public function provider_chess_desk()
    {
        $array = array(
            '*  *  
',
            "status: 'failed', reason: Input data is invalid",
            "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns should be greater then 0",
            "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns can't be equal to 0",
            "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns should be integer"
        );
        return array(
            array(1, 2, "*", $array[0]),//test for positive values
            array('t', 2, "*", $array[4]),
            array(3.56, 2.85, "*", $array[4]),
            array(0, 4, "*", $array[3]),
            array(2, -2, "*", $array[2]), //test for negative values
            array(-3, 2, "#", $array[2])
        );
    }

    /**
     * @dataProvider provider_chess_desk
     */
    public function test_task1($rows, $cols, $sign, $response)
    {
        $Chessboard = new Chessboard();
        $chessBoardArr = array();
        $chessBoardArr[] = new ChessBoardObj($rows, $cols, $sign);
        $this->assertEquals($response, $Chessboard->resolveAsString($chessBoardArr));
    }
}
