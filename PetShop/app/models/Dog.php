<?php

require_once 'Pet.php';

class Dog extends Pet implements JsonSerializable
{
    function __construct($price, $color, $name)
    {
        parent::__construct($price, $color);
        $this->name = $name;
    }

    public function jsonSerialize()
    {
        return [
            'price' => $this->isYourPrice(),
            'color' => $this->isYourColor(),
            'name' => $this->isYourName(),
            'fluffiness' => '0',
            'type' => 'dog'
        ];
    }
}