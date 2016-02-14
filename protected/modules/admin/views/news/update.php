<?php
/* @var $this NewsController */
/* @var $model News */


$this->menu=array(
	array('label'=>'Список новостей', 'url'=>array('index')),
	array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Просмотр новости', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin', 'Update') ?> новости <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>