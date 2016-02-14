<?php
/* @var $this MenusController */
/* @var $model Menus */


?>

<h1>Создать подменю</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'menus' => $menus)); ?>