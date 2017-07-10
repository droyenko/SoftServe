<?php

require_once '../tasks/Task.php';

/*Вывести треугольники в порядке убывания их площади.

Входные параметры: массив объектов треугольник
Выход: упорядоченный массив имён треугольников

Примечание:
•	Расчёт площади треугольника должен производится по формуле Герона.
•	Каждый треугольник определяется именами вершин и длинами его сторон.
•	Приложение должно обрабатывать ввод чисел с плавающей точкой:
{
vertices: ‘ABC’,
a: 10,
b: 20,
c: 22.36
}
*/

class Triangle extends Task
{
    protected function run($triangles)
    {
        return $this->getTriangleDesc($triangles);
    }

    protected function validate($triangles)
    {
        if (!is_array($triangles) || count($triangles) < 1){
            $this->error = "status: 'failed', reason: Input data is invalid";
        }
        foreach ($triangles as $triangle) {
            if (!is_object($triangle)) {
                $this->error = "status: 'failed', reason: Input data is invalid";
            } elseif ($triangle->a < 0 || $triangle->b < 0 || $triangle->c < 0) {
                $this->error = "status: 'failed', reason: Invalid properties of triangle object. Triangle sides should be greater then 0";
            } elseif ($triangle->a == 0 || $triangle->b == 0 || $triangle->c == 0) {
                $this->error = "status: 'failed', reason: Invalid properties of triangle object. Triangle sides can't be equal to 0";
            } elseif ((($triangle->a + $triangle->b) <= $triangle->c) || (($triangle->a + $triangle->c) <= $triangle->b) || (($triangle->c + $triangle->b) <= $triangle->a)){
                $this->error = "status: 'failed', reason: Invalid properties of triangle object. Sum of two triangle sides should be greater than third side";
            }
        }
        if ($this->error == '') {
            $this->isValid = 1;
        }
    }

    private function getTriangleDesc($triangles)
    {
        $arr = array(); //create associative array for storing vertices => square
        foreach ($triangles as $triangle) {
            $vars = (array)$triangle;   //cast object to array
            $vertices = $vars['vertices'];
            $a = $vars['a'];
            $b = $vars['b'];
            $c = $vars['c'];
            $p = ($a + $b + $c) / 2;  //calculation of half of the perimeter
            $arr["$vertices"] = round(sqrt($p * ($p - $a) * ($p - $b) * ($p - $c)), 2); // apply Heron's formula and pushing to associative array
        }
        arsort($arr);
        $result = array_keys($arr);
        return implode("; ", $result);
    }
}

class TriangleObj
{
    public $vertices = '';
    public $a, $b, $c;

    function __construct($vertices, $a, $b, $c)
    {
        $this->vertices = $vertices;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
}



