<?php


class PaperDoll extends Doll
{
    public function sayGotClass()
    {
        return get_class($this);
    }
}