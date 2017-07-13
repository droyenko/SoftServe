<?php

require_once 'Person.php';

abstract class Worker extends Person
{
    protected $salary;
    protected $position;
    protected $team;

    public function __construct($name, $salary, $position, $team)
    {
        parent::__construct($name);
        $this->salary = $salary;
        $this->position = $position;
        $this->team = $team;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getTeam()
    {
        return $this->team;
    }
}