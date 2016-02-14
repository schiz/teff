<?php
/* @var $this FuelCostController */
/* @var $model FuelCost */

$this->breadcrumbs=array(
	'Fuel Costs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FuelCost', 'url'=>array('index')),
	array('label'=>'Create FuelCost', 'url'=>array('create')),
	array('label'=>'View FuelCost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FuelCost', 'url'=>array('admin')),
);
?>

<h1>Update FuelCost <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>