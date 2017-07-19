<?php

abstract class HardSpecialist extends Worker implements IITWorker
{
    abstract protected function doWork();
}
