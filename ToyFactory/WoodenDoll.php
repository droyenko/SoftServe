<?php

spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

class WoodenDoll extends Doll
{
    public function sayGotClass()
    {
        return get_class($this);
    }
}