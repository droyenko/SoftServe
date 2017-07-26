<?php

class Help extends Controller
{
    public function index()
    {
        $this->view->render('help/index');
    }

    public function blah($arg = false)
    {

        require 'models/help_model.php';
        $model = new Help_Model();
        $this->view->blah = $model->blah();
    }
}