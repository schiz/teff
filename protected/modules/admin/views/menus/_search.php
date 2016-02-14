<?php
/* @var $this MenusController */
/* @var $model Menus */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->request->baseUrl.$this->route,
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>255)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'name_ua'); ?>
        <?php echo $form->textField($model,'name_ua',array('size'=>60,'maxlength'=>255)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'name_en'); ?>
        <?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>255)); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->