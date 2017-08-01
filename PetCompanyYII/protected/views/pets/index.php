<?php
/* @var $this PetsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pets',
);

$this->menu=array(
	array('label'=>'Create Pets', 'url'=>array('create')),
	array('label'=>'Manage Pets', 'url'=>array('admin')),
);
?>

<h1>Pets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
