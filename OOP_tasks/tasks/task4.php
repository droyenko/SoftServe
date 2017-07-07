<?php

require_once '../tasks/Task.php';

/*Есть 2 способа подсчёта счастливых билетов:
1. Простой — если на билете напечатано шестизначное число, и сумма первых
трёх цифр равна сумме последних трёх, то этот билет считается счастливым.
2. Сложный — если сумма чётных чисел в билете равна сумме нечётных чисел,
то билет считается счастливым.
Определить программно какой вариант подсчёта счастливых билетов даст их
большее количество на заданном интервале.

Входные параметры: объект context с полями min и max
Номер билета не может содержать больше 6 знаков, но если знаков
меньше – недостающие считаются нулями.
Выход: объект с информацией о победившем методе и количестве
счастливых билетов для каждого способа подсчёта.
*/

class LuckyTicket extends Task
{

    public $win_method;
    public $count_method1;
    public $count_method2;

    protected function run($context)
    {
        return $this->countHappyTicket($context);
    }

    protected function validate($context)
    {
        if (!is_array($context) || count($context) != 1 || !is_object($context[0])) {
            $this->error = "status: 'failed', reason: Input data is invalid";
        } elseif ($context[0]->min < 0 || $context[0]->max < 0) {
            $this->error = "status: 'failed', reason: Invalid properties for context object. \"min\" and \"max\" values should be > then 0";
        } elseif ($context[0]->min > $context[0]->max){
            $this->error = "status: 'failed', reason: Invalid properties for context object. \"min\" can't be greater than \"max\" value";
        } elseif ($context[0]->min > 999999 || $context[0]->max > 999999){
            $this->error = "status: 'failed', reason: Invalid properties for context object. \"min\" and \"max\" values should be < then 999999";
        } elseif (count($context[0]) != 2) {
            $this->error = "status: 'failed', reason: Invalid properties for context object. Object should have only two properties";
        }
        if ($this->error == '') {
            $this->isValid = 1;
        }
    }

    private function countHappyTicket($context)
    {
        $result = new LuckyTicket();
        $count_method1 = 0;
        $count_method2 = 0;
        $min = $context[0]->min;
        $max = $context[0]->max;
        if (strlen($min) < 6) { //adding 0's to the beginning if the number of digits is less than 6
            do {
                $min = "0" . $min;
            } while (strlen($min) < 6);

            //6 задать константой

        }
        if (strlen($max) < 6) {
            do {
                $max = "0" . $max;
            } while (strlen($max) < 6);
        }
        for ($i = $min; $i <= $max; $i++) { //iterating through all ticket numbers in the range
            $even_part = 0;
            $odd_part = 0;
            $ticket_array = str_split($i); //casting ticket number to array
            $left_part = array_slice($ticket_array, 0, 3);
            $right_part = array_slice($ticket_array, 3);//splitting that array in two equal parts of 3 digits
            if (array_sum($left_part) == array_sum($right_part)) {
                $count_method1++;
            }
            foreach ($ticket_array as $ticket_digit) {//check if the digit is odd or even
                if ($ticket_digit % 2 == 0) {
                    $even_part += $ticket_digit;
                } else {
                    $odd_part += $ticket_digit;
                }
            }
            if ($even_part == $odd_part) {
                $count_method2++;
            }
        }
        if ($count_method1 > $count_method2) { //adding winning method to the object field
            $result->win_method = 1;
        } else {
            $result->win_method = 2;
        }
        $result->count_method1 = $count_method1;
        $result->count_method2 = $count_method2;
        return implode("; ", $result);
    }
}

class ContextObj
{ //class containing min and max range for lucky ticket calculation
    public $min, $max;

    function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}
