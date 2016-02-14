<?php
/* @var $this FuelsController */
/* @var $model Fuels */

$this->breadcrumbs=array(
	'Fuels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список топлив', 'url'=>array('index')),
	array('label'=>'Управлять', 'url'=>array('admin')),
);
?>

<h1>Create Fuels</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>