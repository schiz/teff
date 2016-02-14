<?php
/* @var $this NewsController */
/* @var $model News */
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
        <?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>70)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'title_ua'); ?>
        <?php echo $form->textField($model,'title_ua',array('size'=>60,'maxlength'=>70)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'title_en'); ?>
        <?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>70)); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content_ru'); ?>
		<?php echo $form->textArea($model,'content_ru',array('rows'=>6, 'cols'=>50)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'content_ua'); ?>
        <?php echo $form->textArea($model,'content_ua',array('rows'=>6, 'cols'=>50)); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'content_en'); ?>
        <?php echo $form->textArea($model,'content_en',array('rows'=>6, 'cols'=>50)); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->