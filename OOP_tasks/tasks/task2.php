<?php

require_once '../tasks/Task.php';

/*Есть два конверта со сторонами (a,b) и (c,d).
Требуется определить, можно ли один конверт вложить в другой.
Программа должна обрабатывать ввод чисел с плавающей точкой.

Входные параметры: объекты конверт1 и конверт2
Выход: номер меньшего конверта (1 или 2), если вложение возможно,
0 – если вложение невозможно.*/


class Envelope extends Task
{
    protected function run($envelopes)
    {
        return $this->getLowestEnvelope($envelopes);
    }

    protected function validate($envelopes)
    {
        if (!is_array($envelopes) || count($envelopes) != 2 || !is_object($envelopes[0]) || !is_object($envelopes[1])) {
            $this->error = "status: 'failed', reason: Input data is invalid";
        } elseif ($envelopes[0]->a < 0 || $envelopes[0]->b < 0 || $envelopes[1]->a < 0 || $envelopes[1]->b < 0) {
            $this->error = "status: 'failed', reason: Invalid properties of envelope object. Envelope sides should be greater then 0";
        } elseif ($envelopes[0]->a == 0 || $envelopes[0]->b == 0 || $envelopes[1]->a == 0 || $envelopes[1]->b == 0) {
            $this->error = "status: 'failed', reason: Invalid properties of envelope object. Envelope sides can't be equal to 0";
        }
        if ($this->error == '') {
            $this->isValid = 1;
        }
    }

    private function getLowestEnvelope($envelopes)
    {
        $result = null;
        if ((($envelopes[0]->a) > ($envelopes[1]->a)) and (($envelopes[0]->b) > ($envelopes[1]->b)) or (($envelopes[0]->a) > ($envelopes[1]->b)) and (($envelopes[0]->b) > ($envelopes[1]->a))) {
            $result = "2";
        } elseif ((($envelopes[0]->a) < ($envelopes[1]->a)) and (($envelopes[0]->b) < ($envelopes[1]->b)) or (($envelopes[0]->b) < ($envelopes[1]->a)) and (($envelopes[0]->a) < ($envelopes[1]->b))) {
            $result = "1";
        } else {
            $result = "0";
        }
        return $result;
    }
}

class EnvObj
{
    public $a, $b;

    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
}
