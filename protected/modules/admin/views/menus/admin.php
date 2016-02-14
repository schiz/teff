<?php
/* @var $this MenusController */
/* @var $model Menus */

$this->menu=array(
	array('label'=>'Список подменю', 'url'=>array('index')),
	array('label'=>'Создать подменю', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление подменю</h1>

<?php echo CHtml::link(Yii::t('admin','Расширенный поиск'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menus-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name_ru',
        'name_ua',
        'name_en',
//		'position',
//		'icon',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
