<?php
/* @var $this FuelCostController */
/* @var $model FuelCost */

$this->breadcrumbs=array(
	'Fuel Costs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FuelCost', 'url'=>array('index')),
	array('label'=>'Create FuelCost', 'url'=>array('create')),
	array('label'=>'Update FuelCost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FuelCost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FuelCost', 'url'=>array('admin')),
);
?>

<h1>View FuelCost #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fuel_id',
		'cost',
	),
)); ?>
