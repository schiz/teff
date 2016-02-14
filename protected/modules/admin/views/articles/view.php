<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Редактировать статью', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Управление статьями', 'url'=>array('admin')),
);
?>

<h1>Просмотр статей: <?php echo $model->name_ru; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ru',
        'title_ua',
        'title_en',
		'name_ru',
        'name_ua',
        'name_en',
        'description',
        'content_ru',
        'content_ua',
        'content_en',
	),
)); ?>
