<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Пользователи</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
