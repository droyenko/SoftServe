<?php

require_once 'Worker.php';
require_once 'IITWorker.php';

abstract class HardSpecialist extends Worker implements IITWorker
{
    abstract protected function doWork();
}