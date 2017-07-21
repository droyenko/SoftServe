<?php

class PetShopController extends Controller
{
    public function cats()
    {
        $model = $this->model('PetShop');

        $this->view('home/index', ['data' => $model->getCats()]);
    }

    public function hiPrice()
    {
        $model = $this->model('PetShop');

        $this->view('home/index', ['data' => $model->getPriceHigherAvg()]);
    }

    public function whiteOrFluffy()
    {
        $model = $this->model('PetShop');

        $this->view('home/index', ['data' => $model->getWhiteOrFluffy()]);
    }
}