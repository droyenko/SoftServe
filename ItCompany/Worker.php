<?php

spl_autoload_register(function ($name) {
    require_once $name . '.php';
});

abstract class Worker extends Person implements JsonSerializable
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

    public function jsonSerialize()
    {
        return [
            'salary' => $this->getSalary(),
            'position' => $this->getPosition(),
            'team' => $this->getTeam(),
            'name' => $this->getName()
        ];
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