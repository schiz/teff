<div id="auth">
    <a class="modal_close" href="#"></a>
    <!-- Форма входа-->
    <div id="login">
        <h2 class="login-title padding-title"><?php echo Yii::t('strings', 'Authorization'); ?></h2>
        <div class="auth-wrapper">
            <p class="login-top-text">
                <?php echo Yii::t('strings', 'Already registered? Sign in below.'); ?>
            </p>

            <div class="auth-form">
                <?php echo CHtml::form('users/login' , 'post', array(
                    'class'=>'margin-top',
                ));  ?>
                <div class="register-error-form">
                    <?php echo CHtml::errorSummary($form); ?>
                </div>

                <?php echo CHtml::textField('Users[username]', null, array(
                    'placeholder'=> Yii::t('strings', 'Username')
                )); ?>

                <?php echo CHtml::passwordField('Users[password]', null, array(
                    'placeholder'=> Yii::t('strings', 'Password')
                )); ?>

                <?php echo CHtml::checkBox('remember'); ?><span><?php echo Yii::t('strings', 'Remember me'); ?></span>

                <?php echo CHtml::submitButton(Yii::t('strings', 'Login'), array(
                    'class'=>'auth-button'
                )); ?>

                <?php echo CHtml::endForm(); ?>

            </div>

            <p class="forgot-password">
                <a href="#" class="auth-link"><?php echo Yii::t('strings', 'I do not remember my password'); ?></a> <br>
                <a href="#" class="auth-link"><?php echo Yii::t('strings', 'I do not remember my username'); ?></a>
            </p>
        </div>
    </div>

    <!--Форма регистрации-->
    <div id="register">
        <h2 class="register-title padding-title"><?php echo Yii::t('strings', 'Registration') ?></h2>
        <div class="auth-wrapper">
            <p class="login-top-text">
                <?php echo Yii::t('strings', 'Registration is free. Anyone can join.'); ?>
            </p>

            <?php echo CHtml::form('/users/signup' , 'post', array(
                'class'=>'auth-form',
                'name'=>'Register',
                'id' => 'registration'
            ));  ?>
            <div class="register-error-form">
                <?php echo CHtml::errorSummary($form); ?>
            </div>

            <?php echo CHtml::textField('Users[username]', null, array(
                'placeholder'=> Yii::t('strings', 'Username')
            )); ?> <br>

            <?php echo CHtml::textField('Users[email]', null, array(
                'placeholder'=> Yii::t('strings', 'Email')
            )); ?> <br>

            <?php echo CHtml::passwordField('Users[password]', null, array(
                'placeholder'=> Yii::t('strings', 'Password')
            )); ?> <br>

            <?php echo CHtml::passwordField('Users[confirm_password]', null, array(
                'placeholder'=> Yii::t('strings', 'Confirm password')
            )); ?> <br>

            <?php echo CHtml::checkBox('agree'); ?>

            <div class="padd-left">
                <span><?php echo Yii::t('strings', 'Agree with'); ?><br>
                <a href="#" class="auth-link"><?php echo Yii::t('strings', 'terms of use'); ?></a></span>
            </div>

            <?php echo CHtml::submitButton(Yii::t('strings', 'Registration'), array(
                'class'=>'auth-button'
            )); ?>

            <?php echo CHtml::endForm(); ?>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#registration').submit( function() {
            if (!$('#agree').prop('checked')) {
                alert('Согласитесь с правилами');
                return false;
            }
        })

    })
</script>
<!-- Конец модульного окна регистрации и входа -->