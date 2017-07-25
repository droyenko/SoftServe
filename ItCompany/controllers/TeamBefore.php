<?php

class TeamBefore extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('TeamBefore/index');
    }

    public function showInfo($team)
    {
        require 'models/TeamBeforeModel.php';
        $model = new TeamBeforeModel();
        $this->view->showInfo = $model->showInfo($team);
    }
}
