<?php
/* @var $this FuelsController */
/* @var $data Fuels */
?>

<div class="view">

	<?php echo CHtml::link(Yii::t('admin',CHtml::encode($data->fuel_name_ru)), array('view', 'id'=>$data->id)); ?>
	<br />

</div>