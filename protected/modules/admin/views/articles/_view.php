<?php
/* @var $this PagesController */
/* @var $data Pages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_ru')); ?>:</b>
	<?php echo CHtml::encode($data->title_ru); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('title_ua')); ?>:</b>
    <?php echo CHtml::encode($data->title_ua); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('title_en')); ?>:</b>
    <?php echo CHtml::encode($data->title_en); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
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
    <?php switch(Yii::app()->language) :
        case 'ru' : ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
            <?php echo CHtml::encode($data->menu->name_ru); ?>
            <br />
            <?php break;
        case 'ua': ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
            <?php echo CHtml::encode($data->menu->name_ua); ?>
            <br />
            <?php break;
        case 'en': ?>
            <b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
            <?php echo CHtml::encode($data->menu->name_en); ?>
            <br />
            <?php break;
    endswitch ?>
    <b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
    <?php echo date('d-m-Y G:m',CHtml::encode($data->created_at)); ?>
    <br />

</div>
<br />
<br />
<br />