<?php

spl_autoload_register(function ($name) {
    require_once $name . '.php';
});

abstract class HardSpecialist extends Worker implements IITWorker
{
    abstract protected function doWork();
}