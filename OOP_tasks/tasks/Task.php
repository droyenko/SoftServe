<?php

abstract class Task
{
    protected $isValid = 0;
    protected $error = '';

    abstract protected function run($arrObj);

    abstract protected function validate($arrObj);

    public function isValid()
    {
        return $this->isValid;
    }

    public function getError()
    {
        return $this->error;
    }

    public function resolveAsString($arrObj)
    {
        $this->validate($arrObj);
        $isValid = $this->isValid();
        if ($isValid == 1) {
            return $this->run($arrObj);
        } else {
            return $this->getError();
        }
    }
}