<?php
/* @var $this FuelsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Топливо',
);

$this->menu=array(
	array('label'=>'Создать топливо', 'url'=>array('create')),
	array('label'=>'Управлять', 'url'=>array('admin')),
);
?>

<h1>Топливо</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
