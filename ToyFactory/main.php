<?php

require_once 'AbstractFactory/WoodenFactory.php';
require_once 'AbstractFactory/PaperFactory.php';

$woodenFactory = new WoodenFactory();
$paperFactory = new PaperFactory();

echo $woodenFactory->getDoll()->sayGotClass()."<br>";
echo $woodenFactory->getCar()->sayGotClass()."<br>";
echo $paperFactory->getDoll()->sayGotClass()."<br>";
echo $paperFactory->getCar()->sayGotClass()."<br>";