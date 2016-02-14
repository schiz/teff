<?php
/* @var $this FuelCostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fuel Costs',
);

$this->menu=array(
	array('label'=>'Create FuelCost', 'url'=>array('create')),
	array('label'=>'Manage FuelCost', 'url'=>array('admin')),
);
?>

<h1>Fuel Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
