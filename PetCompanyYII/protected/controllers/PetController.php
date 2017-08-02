<?php

class PetController extends Controller
{
	public function actionCats()
	{
		$pet = new Pet();
		$pets = $pet->getCats();
	    $this->render('cats', array('pets'=>$pets));
	}

	public function actionExpensive()
	{
        $pet = new Pet();
        $pets = $pet->getExpensive();
        $this->render('cats', array('pets'=>$pets));
	}

	public function actionFluffy()
	{
        $pet = new Pet();
        $pets = $pet->getWhiteOrFluffy();
        $this->render('cats', array('pets'=>$pets));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}