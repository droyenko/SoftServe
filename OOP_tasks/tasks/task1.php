<?php


/*Вывести шахматную доску с заданными размерами высоты и ширины, по принципу:
*  *  *  *  *  *
  *  *  *  *  *  *
*  *  *  *  *  *
  *  *  *  *  *  *

Входные параметры: ширина, высота, символ для отображения.
Ширина – количество символом, не считая пробелы.
Выход: строка с представлением шахматной доски */

class Chessboard extends Task
{
    public function run($chessBoard)
    {
        return $this->getChessBoard($chessBoard);
    }

    public function validate($chessBoard)
    {
        $msg ="";
        if (!$this->isValid($chessBoard)) {
            $msg = "status: 'failed', reason: Input data is invalid";
        } elseif ($chessBoard[0]->rows < 0 || $chessBoard[0]->cols < 0) {
            $msg = "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns should be greater then 0";
        } elseif ($chessBoard[0]->rows = 0 || $chessBoard[0]->cols = 0){
            $msg = "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns can't be equal to 0";
        } elseif (!is_int($chessBoard[0]->rows) || !is_int($chessBoard[0]->cols)){
            $msg = "status: 'failed', reason: Invalid values for number of rows or columns. Number of rows and columns should be integer";
        }
        return $msg;
    }

    public function resolveAsString($chessBoard)
    {
        $msg = $this->validate($chessBoard);
        if ($msg != ""){
            return $msg;
        } else {
            return $this->run($chessBoard);
        }
    }

    private function isValid($chessBoard)
    {
        $isValid = true;
        if (!is_array($chessBoard) || count($chessBoard) != 1 || !is_object($chessBoard[0]))
            $isValid = false;
        return $isValid;
    }

    private function getChessBoard($chessBoard)
    {
        $result = '';
        for ($x = 0; $x < $chessBoard[0]->rows; $x++) {
            for ($y = 0; $y < $chessBoard[0]->cols; $y++) {
                if ($x % 2 == 0) {
                    $result .= $chessBoard[0]->sign . chr(32) . chr(32);
                } else {
                    $result .= chr(32) . chr(32) . $chessBoard[0]->sign;
                }
            }
            $result .= "\n";
        }
        return $result;
    }
}

class ChessBoardObj
{
    public $rows, $cols, $sign;

    function __construct($rows, $cols, $sign)
    {
        $this->rows = $rows;
        $this->cols = $cols;
        $this->sign = $sign;
    }
}

