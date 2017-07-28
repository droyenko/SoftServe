<?php

class Hamster extends FluffyPet implements JsonSerializable
{
    use Fluffy;
    function __construct($price, $color, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = 'Hamster';
    }

    public function jsonSerialize()
    {
        return [
            'price' => $this->isYourPrice(),
            'color' => $this->isYourColor(),
            'name' => 'hamster',
            'fluffiness' => $this->getFluffiness(),
            'type' => 'hamster'
        ];
    }
}