<?php
/* @var $this NewsController */
/* @var $model News */


$this->menu=array(
	array('label'=>'Список новостей', 'url'=>array('index')),
	array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Редактировать новость', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h1>Просмотр новости #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
        'title_ua',
        'title_en',
        'content_ru',
        'content_ua',
        'content_en'
	/*	'content',
		'thumb',
		'image', */
	),
)); ?>
