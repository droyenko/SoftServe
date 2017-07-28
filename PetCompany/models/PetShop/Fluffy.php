<?php

trait Fluffy
{
    public function isFluffy()
    {
        if ($this->fluffiness > 1) {
            return 1;
        } else {
            return 0;
        }
    }
}