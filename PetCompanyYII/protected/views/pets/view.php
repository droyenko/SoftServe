<?php
/* @var $this PetsController */
/* @var $model Pets */

$this->breadcrumbs=array(
	'Pets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Pets', 'url'=>array('index')),
	array('label'=>'Create Pets', 'url'=>array('create')),
	array('label'=>'Update Pets', 'url'=>array('update', 'id'=>$model->pet_id)),
	array('label'=>'Delete Pets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pet_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pets', 'url'=>array('admin')),
);
?>

<h1>View Pets #<?php echo $model->pet_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pet_id',
		'name',
		'price',
		'color',
		'fluffiness',
		'type',
	),
)); ?>
