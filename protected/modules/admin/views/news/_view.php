<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ru')); ?>:</b>
	<?php echo CHtml::encode($data->title_ru); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('title_ua')); ?>:</b>
    <?php echo CHtml::encode($data->title_ua); ?>
    <br /><b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo date('d-m-Y G:i',CHtml::encode($data->created_at)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_ru')); ?>:</b>
	<?php echo CHtml::encode($data->content_ru); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('content_ua')); ?>:</b>
    <?php echo CHtml::encode($data->content_ua); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('content_en')); ?>:</b>
    <?php echo CHtml::encode($data->content_en); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

</div>
<br />
<br />