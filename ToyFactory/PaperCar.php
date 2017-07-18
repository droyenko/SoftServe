<?php


class PaperCar extends Car
{
    public function sayGotClass()
    {
        return get_class($this);
    }
}