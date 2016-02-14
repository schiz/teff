<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Редактирование пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>