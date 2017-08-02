<?php


class Hamster extends Pet
{
    public function __construct($price, $color, $name, $fluffiness)
    {
        $this->price = $price;
        $this->color = $color;
        $this->name = $name;
        $this->fluffiness = $fluffiness;
    }

    public function isFluffy()
    {
        return true;
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function defaultScope()
    {
        return array(
            'condition' => "type = 'Hamster'",
        );
    }
}