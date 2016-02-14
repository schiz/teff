<?php
/* @var $this FuelsController */
/* @var $model Fuels */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuel_name_ru'); ?>
		<?php echo $form->textField($model,'fuel_name_ru',array('size'=>60,'maxlength'=>80)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'fuel_name_ua'); ?>
        <?php echo $form->textField($model,'fuel_name_ua',array('size'=>60,'maxlength'=>80)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'fuel_name_en'); ?>
        <?php echo $form->textField($model,'fuel_name_en',array('size'=>60,'maxlength'=>80)); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->