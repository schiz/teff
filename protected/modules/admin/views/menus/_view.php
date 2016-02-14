<?php
/* @var $this MenusController */
/* @var $data Menus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ru')); ?>:</b>
    <?php echo CHtml::encode($data->name_ru); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('name_ua')); ?>:</b>
    <?php echo CHtml::encode($data->name_ua); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
    <?php echo CHtml::encode($data->name_en); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icon')); ?>:</b>
	<?php echo CHtml::encode($data->icon); ?>
	<br />

</div>
<br />
<br />