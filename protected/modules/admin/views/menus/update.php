<?php
/* @var $this MenusController */
/* @var $model Menus */

$this->menu=array(
	array('label'=>'Список подменю', 'url'=>array('index')),
	array('label'=>'Создать подменю', 'url'=>array('create')),
	array('label'=>'Просмотр подменю', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление подменю', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin', 'Update') ?> подменю <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>