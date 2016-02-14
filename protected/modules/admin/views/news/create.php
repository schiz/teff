<?php
/* @var $this NewsController */
/* @var $model News */

$this->menu=array(
	array('label'=>'Список новостей', 'url'=>array('index')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h1>Создание новости</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>