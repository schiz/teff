<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h1>Новости</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
