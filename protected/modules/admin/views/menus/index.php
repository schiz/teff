<?php
/* @var $this MenusController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Создать подменю', 'url'=>array('create')),
	array('label'=>'Управление подменю', 'url'=>array('admin')),
);
?>

<h1>Подменю</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
