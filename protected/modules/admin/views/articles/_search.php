<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_ru'); ?>
		<?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>150)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'title_ua'); ?>
        <?php echo $form->textField($model,'title_ua',array('size'=>60,'maxlength'=>150)); ?>
    </div><div class="row">
        <?php echo $form->label($model,'title_en'); ?>
        <?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>150)); ?>
    </div>


	<div class="row">
		<?php echo $form->label($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>150)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'name_ua'); ?>
        <?php echo $form->textField($model,'name_ua',array('size'=>60,'maxlength'=>150)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'name_en'); ?>
        <?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>150)); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->