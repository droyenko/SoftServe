<?php

abstract class Worker extends Person
{
    protected $salary;
    protected $position;
    protected $team;

    function __construct($name, $salary, $position, $team)
    {
        parent::__construct($name);
        $this->salary = $salary;
        $this->position = $position;
        $this->team = $team;
    }
}