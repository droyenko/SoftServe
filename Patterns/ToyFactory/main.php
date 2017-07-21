<?php

spl_autoload_register(function ($name)
{
    require_once $name . '.php';
});

$woodenFactory = new WoodenFactory();
$paperFactory = new PaperFactory();

echo $woodenFactory->getDoll()->sayGotClass()."<br>";
echo $woodenFactory->getCar()->sayGotClass()."<br>";
echo $paperFactory->getDoll()->sayGotClass()."<br>";
echo $paperFactory->getCar()->sayGotClass()."<br>";