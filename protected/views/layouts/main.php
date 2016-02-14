<?php /* @var $this Controller */ ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.8.13.custom.css"/>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slides.min.jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.textchange.js"></script>
</head>
<body>

<!--Голова сайта-->
<div class="top-header">
    <div class="container ">
        <div class="column2">
            <div class="choise_lang">
                <?php   $this->widget('application.components.widgets.LanguageSelector'); ?>
            </div>
        </div>
        <?php if (Yii::app()->user->isGuest) :?>
            <div class="column10 sign_in push_right">
                <!-- Разметка быстрой формы входа -->
                <div class="fast-login-form">
                    <?php  echo CHtml::form('/users/login' , 'post', array(
                        'id' => 'fast-login'
                    ));  ?>
                    <a href="#"><?php echo Yii::t('strings', 'I do not remember my password'); ?></a> / <?php echo Yii::t('strings', 'Remember me'); ?>
                    <input type="checkbox">
                    <input type="text" name='Users[username]' class="fast-log-input" placeholder="<?php echo Yii::t('strings', 'Username'); ?>">
                    <input type="password"  name='Users[password]' class="fast-log-input" placeholder="<?php echo Yii::t('strings', 'Your pass'); ?>">
                    <input type="submit" value="<?php echo Yii::t('strings', 'Login'); ?>" class="fast-log-butt">
                    <div class="close-fast-login"></div>
                    <?php echo CHtml::endForm(); ?>
                </div>
                <a href="#auth" rel="auth" name="auth" class="auth"><?php echo Yii::t('strings', 'Login'); ?></a>
                <div class="divider"></div>
                <a href="#auth" rel="auth" name="auth" class="registration"><?php echo Yii::t('strings', 'Registration') ?></a>
            </div>

        <?php else : ?>
            <div class="column10 sign_in push_right">
                <a href="users/logout" rel="<?php echo Yii::t('strings', 'Logout') ?>" class="registration"><?php echo Yii::t('strings', 'Logout') ?></a>
            </div>
        <?php endif ?>
    </div>
</div>
<!-- Конец головы сайта -->

<!-- Модульное окно регистрации и входа -->
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel*=auth]").leanModal({ top : 80, overlay : .6, closeButton: ".modal_close" });
    });
</script>

<?php $this->widget('Feedback'); ?>


<!--Модальное окно авторизации, регистрации-->
<?php  $this->widget('UserAuth');?>

<div class="container">
    <!-- Логотип + описание к нему -->
    <div class="row header">
        <a href="/">
            <img class="site-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" alt=""/>
        </a>

        <div class="top-icons">
            <div class="top-forum"></div>
            <a href="#feedback" rel="feedback" name="feedback">
                <div class="top-feetback"></div>
            </a>
        </div>
        <div class="logo-description">
            <p><?php echo Yii::t('strings', 'The basis of OOO «TEFF» is') ?></p>
            <p><?php echo Yii::t('strings', 'the use of efficient technology') ?></p>
            <p><?php echo Yii::t('strings', 'resources of our customers in the daily activities of enterprises.') ?></p>
        </div>
    </div>
    <!--Конец лого + описание-->

    <!-- Навигация -->
    <?php  $this->widget('Menu'); ?>
    <!-- Конец навигации -->
</div>
    <?php echo $content; ?>


<!--Подвал-->
<div class="footer-content">
    <div class="container ">
        <div class="column3">
            <span class="copyrights">&copy; 2013, Design by <a href="http://integra.od.ua">Integra-group</a></span>
        </div>
        <div class="column3">
                <span class="footer-email">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mail.png" alt=""/>
                    <a href="mailto:teff@meta.ua">teff@meta.ua</a>
                </span>
        </div>
        <div class="column3">
                <span class="footer-phone">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/phone.png" alt=""/>
                    <a href="tel:0487786776">[048] 778-67-76</a>
                </span>
        </div>
        <div class="column3 brand-name">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/teff.png" alt="">
        </div>
    </div>
</div>

</body>
</html>