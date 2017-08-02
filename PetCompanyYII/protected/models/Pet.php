<?php

class Pet extends CActiveRecord
{
    public $name;
    public $price;
    public $color;
    public $fluffiness;
    public $type;

    /**
     * We're overriding this method to fill findAll() and similar method result
     * with proper models.
     *
     * @param array $attributes
     * @return Pet
     */

    protected function instantiate($attributes)
    {
        switch ($attributes['type']) {
            case 'cat':
                $class = 'Cat';
                break;
            case 'dog':
                $class = 'Dog';
                break;
            case 'hamster':
                $class = 'Hamster';
                break;
            default:
                $class = get_class($this);
        }
        $model = new $class(
            $attributes['price'],
            $attributes['color'],
            $attributes['name'],
            $attributes['fluffiness']
        );
        return $model;
    }

    public function getPets()
    {
        return self::model()->findAll();
    }

    public function getCats()
    {
        $criteria = new CDbCriteria();
        $criteria->compare('type', 'cat');
        return self::model()->findAll($criteria);
    }

    public function getAvgPrice()
    {
        $price = [];
        foreach ($this->getPets() as $pet){
            $price [] = $pet->price;
        }
        $avgPrice = array_sum($price)/ count ($price);
        return $avgPrice;

//        $criteria = new CDbCriteria();
//        $criteria->select = new CDbExpression('AVG(price) as avgPrice');
//        $avgPrice = $this->find($criteria);
//        return $avgPrice;
    }

    public function getExpensive()
    {
        $avgPrice = $this->getAvgPrice();
        $criteria = new CDbCriteria();
        $criteria->condition = "price > $avgPrice";

        return self::model()->findAll($criteria);
    }

    public function getWhiteOrFluffy()
    {
        $result = [];
        foreach ($this->getPets() as $pet) {
            if ($pet->isFluffy() || $pet->color == 'white') {
                $result[] = $pet;
            }
        }
        return $result;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Pet';
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pet the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
$pet = new Pet();
$pet->getExpensive();