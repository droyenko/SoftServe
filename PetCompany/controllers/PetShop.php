<?php


class PetShop extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('PetShop/index');
    }

    public function cats()
    {
        require 'models/PetShop/PetShopModel.php';
        $model = new PetShopModel();
        $this->view->data = $model->getCats();
        $this->view->render('PetShop/index');
    }

    public function highPrice()
    {
        require 'models/PetShop/PetShopModel.php';
        $model = new PetShopModel();
        $this->view->data = $model->getPriceHigherAvg();
        $this->view->render('PetShop/index');
    }

    public function whiteOrFluffy()
    {
        require 'models/PetShop/PetShopModel.php';
        $model = new PetShopModel();
        $this->view->data = $model->getWhiteOrFluffy();
        $this->view->render('PetShop/index');
    }
}