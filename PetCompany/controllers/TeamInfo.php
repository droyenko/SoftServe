<?php

class TeamInfo extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        require 'models/ItCompany/TeamInfoModel.php';
        $model = new TeamInfoModel();
        $this->view->beforeData = $model->showBefore();
        $this->view->afterData = $model->showAfter();
        $this->view->render('TeamInfo/index');
    }
}
