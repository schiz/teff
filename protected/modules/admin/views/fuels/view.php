<?php
/* @var $this FuelsController */
/* @var $model Fuels */

$this->breadcrumbs=array(
	'Fuels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список топлив', 'url'=>array('index')),
	array('label'=>'Создать новое топливо', 'url'=>array('create')),
	array('label'=>'Изменить топливо', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить топливо', 'url'=>array('delete','id' => $model->id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управлять', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin',$model->fuel_name_ru); ?></h1>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'fuels-form',
    'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>
Стоимость топливо:
<?php echo $form->textField($model->cost,'cost',array('size'=>60,'maxlength'=>80)); ?>
<?php

