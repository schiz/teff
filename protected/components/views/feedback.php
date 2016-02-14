<?php
/**
 * @var $this Feedback
 * @var $feedback [form]
 */
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("a[rel*=feedback]").leanModal({ top: 80, overlay: .6, closeButton: ".modal_close" });
    });
</script>

<div id="feedback">
    <div id="calculate">
        <div id="modal-title-back">
            <h2 class="modal-title"><?php echo Yii::t('strings', 'Feedback Form') ?></h2>
            <a class="modal_close" href="#"></a>
        </div>

        <?php if (Yii::app()->user->hasFlash('feedback')): ?>
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('feedback'); ?>
            </div>
        <?php else: ?>

            <div class="feedback-padding">
                <?php echo Yii::t('strings', 'Write us a letter. Our experts will answer any question.'); ?>
                <br><br>

                <?php echo CHtml::form('site/feedback', 'post', array(
                    'class' => 'auth-form',
                    'name' => 'feedback'
                )) ?>

                <?php echo CHtml::textField('name', '', array(
                    'placeholder' => Yii::t('strings', 'Your name'),
                )); ?>

                <?php echo CHtml::textField('email', '', array(
                    'placeholder' => Yii::t('strings', 'Your email'),
                )); ?>

                <?php echo CHtml::textArea('message', '', array(
                    'placeholder' => Yii::t('strings', 'Your message'),
                )); ?>

                <?php echo CHtml::submitButton(Yii::t('strings', 'Send'), array(
                    'class' => 'auth-button'
                )); ?>

                <?php echo CHtml::endForm(); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
