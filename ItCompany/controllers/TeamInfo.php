<?php

class TeamInfo extends Controller
{
    public function index()
    {
        $this->view->render('TeamInfo/index');
    }

    public function showBefore()
    {
        require 'models/TeamInfoModel.php';
        $model = new TeamInfoModel();
        $this->view->data = $model->showBefore();
        $this->view->render('TeamInfo/index');
    }

    public function showAfter()
    {
        require 'models/TeamInfoModel.php';
        $model = new TeamInfoModel();
        $this->view->data = $model->showAfter();
        $this->view->render('TeamInfo/index');
    }

    public function showAll()
    {
        require 'models/TeamInfoModel.php';
        $model = new TeamInfoModel();
        $this->view->beforeData = $model->showBefore();
        $this->view->afterData = $model->showAfter();
        $this->view->render('TeamInfo/showAll');
    }
}
