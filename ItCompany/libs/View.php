<?php

class View
{
    public function render($name)
    {
        require 'views/header.php';
        require 'views/' . $name . '.php';
        require 'views/footer.php';
    }
}