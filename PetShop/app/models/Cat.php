<?php

require_once 'FluffyPet.php';
require_once 'Fluffy.php';

class Cat extends FluffyPet implements JsonSerializable
{
    use Fluffy;
    function __construct($price, $color, $name, $fluffiness)
    {
        parent::__construct($price, $color, $fluffiness);
        $this->name = $name;
    }

    public function jsonSerialize()
    {
        return [
            'price' => $this->isYourPrice(),
            'color' => $this->isYourColor(),
            'name' => $this->isYourName(),
            'fluffiness' => $this->getFluffiness(),
            'type' => 'cat'
        ];
    }
}