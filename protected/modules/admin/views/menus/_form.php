<?php
/* @var $this MenusController */
/* @var $model Menus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menus-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_ru'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'name_ua'); ?>
        <?php echo $form->textField($model,'name_ua',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name_ua'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'name_en'); ?>
        <?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name_en'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->dropDownList($model,'parent_id', $menus); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'url'); ?>
		<?php // echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save') ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->