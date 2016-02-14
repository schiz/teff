<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Просмотр статей', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление статьями', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('admin', 'Update') ?> статьи <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'menus' => $menus)); ?>