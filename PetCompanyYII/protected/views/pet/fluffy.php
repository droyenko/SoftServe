<?php
/* @var $this PetController */

$this->breadcrumbs=array(
	'Pet' =>array('/pet'),
	'Fluffy',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<ol>
    <?php foreach ($pets as $pet): ?>
        <li><?= $pet->name . ' is a ' . get_class($pet) .
            ' it is ' . $pet->color . ' and costs '
            . $pet->price . ' $'; ?></li>
    <?php endforeach; ?>
</ol>
