<?php

abstract class Person
{
    protected $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}