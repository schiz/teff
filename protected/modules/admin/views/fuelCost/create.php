<?php
/* @var $this FuelCostController */
/* @var $model FuelCost */

$this->breadcrumbs=array(
	'Fuel Costs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FuelCost', 'url'=>array('index')),
	array('label'=>'Manage FuelCost', 'url'=>array('admin')),
);
?>

<h1>Create FuelCost</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>