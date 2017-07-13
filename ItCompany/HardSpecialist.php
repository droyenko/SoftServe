<?php

require_once 'Worker.php';

abstract class HardSpecialist extends Worker
{
    abstract protected function doWork();
}