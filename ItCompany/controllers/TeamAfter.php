<?php

class TeamAfter extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function showInfo($team)
    {
        require 'models/TeamAfterModel.php';
        $model = new TeamAfterModel();
        $model->showInfo($team);
        $this->view->msg ='This is Team after recruitment';
    }

    function index()
    {
        $this->view->render('TeamAfter/index');
    }
}
