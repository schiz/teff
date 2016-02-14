<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->pageTitle; ?></title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/elrte.min.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/imgareaselect-default.css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.imgareaselect.pack.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.13.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/elrte.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/elrte.ru.js"></script>
</head>
<body>

<!--Верхняя навигация-->
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="/">Teff</a>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        array('label'=> Yii::t('admin', 'Articles'), 'url'=>array('/admin/articles')),
        array('label'=> Yii::t('admin', 'News'), 'url'=>array('/admin/news')),
        array('label'=> Yii::t('admin', 'Menu') , 'url'=>array('/admin/menus')),
        array('label'=> Yii::t('admin', 'Users'), 'url'=>array('/admin/user')),
        array('label'=> Yii::t('admin', 'Fuels'), 'url' => array('/admin/fuels')),
    ),
    'htmlOptions'=>array(
        'class'=> 'nav',
    ),
));
?>
    </div>

</div>
<!--Конец навигации-->
    <div class="container">
        <?php echo $content; ?>
    </div>

</body>
</html>