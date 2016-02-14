<?php
/* @var $this FuelsController */
/* @var $model Fuels */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fuels-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fuel_name_ru'); ?>
		<?php echo $form->textField($model,'fuel_name_ru',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'fuel_name_ru'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'fuel_name_ua'); ?>
        <?php echo $form->textField($model,'fuel_name_ua',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'fuel_name_ua'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'fuel_name_en'); ?>
        <?php echo $form->textField($model,'fuel_name_en',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'fuel_name_en'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'cost'); ?>
        <?php echo $form->textField($model,'cost',array('size'=>60,'maxlength'=>80)); ?>
        <?php echo $form->error($model,'cost'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->