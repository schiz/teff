<?php
/* @var $this MenusController */
/* @var $model Menus */

$this->breadcrumbs=array(
	'Menuses'=>array('index'),
	$model->name_en,
);

$this->menu=array(
	array('label'=>'Список подменю', 'url'=>array('index')),
	array('label'=>'Создать подменю', 'url'=>array('create')),
	array('label'=>'Редактировать подменю', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить подменю', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление подменю', 'url'=>array('admin')),
);
?>

<h1>Просмотр подменю #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name_ru',
        'name_ua',
        'name_en',
		'parent_id',
	/*	'position',
		'url',
		'icon', */
	),
)); ?>
