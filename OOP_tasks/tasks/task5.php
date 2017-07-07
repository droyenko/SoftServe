<?php

require_once '../tasks/Task.php';

/*Вывести все числа Фибоначчи, которые удовлетворяют переданному
в функцию ограничению: находятся в указанном диапазоне, либо
имеют указанную длину (количество разрядов).

Входные параметры: объект context с полями min и max, либо с полем
length
Выход: массив чисел*/

class FibonacciSeries extends Task
{
    protected function run($context)
    {
        return $this->getFibonacciSeries($context);
    }

    protected function validate($context)
    {
        if (!is_array($context) || count($context) < 1 || count($context) > 2 || !is_object($context[0])) {
            $this->error = "status: 'failed', reason: Input data is invalid";
        } elseif ($context[0]->min < 0 || $context[0]->max < 0 || $context[0]->lenght < 0) {
            $this->error = "status: 'failed', reason: Invalid properties for context object. \"min\", \"max\" and \"length\" values should be > then 0";
        } elseif ($context[0]->min > $context[0]->max){
            $this->error = "status: 'failed', reason: Invalid properties for context object. \"min\" can't be greater then \"max\" value";
        }
        if ($this->error == '') {
            $this->isValid = 1;
        }
    }

    private function getFibonacciSeries($context)
    {
        $fib_result = array();
        $f1 = -1;
        $f2 = 1;
        if (!is_null($context[0]->length)) {//calculating Fibonacci series for given number of digits
            for ($i = 1; strlen($f1 + $f2) <= $context[0]->length; $i++) {
                $f = $f1 + $f2;
                $f1 = $f2;
                $f2 = $f;
                if (strlen($f) == $context[0]->length) {
                    array_push($fib_result, $f);
                }
            }
        } else {//calculating Fibonacci series for given range
            for ($i = 1; ($f1 + $f2) <= $context[0]->max; $i++) {
                $f = $f1 + $f2;
                $f1 = $f2;
                $f2 = $f;
                if ($f >= $context[0]->min) {
                    array_push($fib_result, $f);
                }
            }
        }
        return implode("; ", $fib_result);
    }
}

class Context
{ //class containing min and max range for showing Fibonacci series
    public $min, $max, $length;

    function __construct()
    {//simulating multiple constructors
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);//call function if one parameter is passed
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);//call function if two parameters are passed
                break;
        }
    }

    function __construct1($arg1)
    {
        $this->length = $arg1;
    }

    function __construct2($arg1, $arg2)
    {
        $this->min = $arg1;
        $this->max = $arg2;
    }
}

