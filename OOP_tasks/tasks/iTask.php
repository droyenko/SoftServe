<?php

interface iTask
{
    public function run($arrObj);
    public function validate($arrObj);
    public function resolveAsString($arrObj);
}