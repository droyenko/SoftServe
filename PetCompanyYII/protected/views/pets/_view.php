<?php
/* @var $this PetsController */
/* @var $data Pets */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pet_id), array('view', 'id'=>$data->pet_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fluffiness')); ?>:</b>
	<?php echo CHtml::encode($data->fluffiness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>