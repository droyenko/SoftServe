<?php

spl_autoload_register(function ($class){
    $pathControllers = 'controllers/' . $class . '.php';
    $pathLibs = 'libs/' . $class . '.php';
    $pathModels = 'models/' . $class . '.php';
    $pathViews = 'views/' . $class . '.php';
    $pathPublicCss = 'public/css/' . $class . '.php';

    if (file_exists($pathControllers)){
        require_once $pathControllers;
    } elseif (file_exists($pathLibs)){
        require_once $pathLibs;
    } elseif (file_exists($pathModels)){
        require_once $pathModels;
    } elseif (file_exists($pathViews)){
        require_once $pathViews;
    } elseif (file_exists($pathPublicCss)){
        require_once $pathPublicCss;
    }
});

$app = new Router();
