<?php

abstract class Task
{
    abstract protected function run($arrObj);
    abstract protected function validate($arrObj);
    protected function resolveAsString($arrObj){
        $msg = $this->validate($arrObj);
        if ($msg != ""){
            return $msg;
        } else {
            return $this->run($arrObj);
        }
    }
}