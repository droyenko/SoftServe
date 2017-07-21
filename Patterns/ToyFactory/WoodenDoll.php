<?php

class WoodenDoll extends Doll
{
    public function sayGotClass()
    {
        return get_class($this);
    }
}