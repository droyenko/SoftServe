<?php

require_once 'Worker.php';

abstract class HardSpecialist extends Worker implements IITWorker
{
    abstract protected function doWork();
}