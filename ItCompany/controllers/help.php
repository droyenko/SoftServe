<?php

class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo 'We are inside help<br>';
    }

    public function other($arg = false)
    {
        echo 'Method other() is launched<br>';
        echo "with parameter ". $arg;

        require 'models/help_model.php';
        $model = new Help_model();
    }
}