<?php
/* @var $this PagesController */
/* @var $model Pages */

?>

<h1>Создание статьи</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'menus' => $menus)); ?>