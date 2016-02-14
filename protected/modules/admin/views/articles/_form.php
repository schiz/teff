<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
    'htmlOptions'=>array(
        'class'=>'form',
        'enctype' => 'multipart/form-data'
    ),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title_ru'); ?>
		<?php echo $form->textField($model,'title_ru',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title_ru'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_ua'); ?>
        <?php echo $form->textField($model,'title_ua',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'title_ua'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title_en'); ?>
        <?php echo $form->textField($model,'title_en',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'title_en'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_ru'); ?>
		<?php echo $form->textField($model,'name_ru',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name_ru'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_ua'); ?>
        <?php echo $form->textField($model,'name_ua',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'name_ua'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name_en'); ?>
        <?php echo $form->textField($model,'name_en',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'name_en'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'content_ru'); ?>
        <div id='content_ru' name='Articles[content_ru]'></div>
        <?php echo $form->error($model,'content_ru');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'content_ua'); ?>
        <div id='content_ua' name='Articles[content_ua]'></div>
        <?php echo $form->error($model,'content_ua');  ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'content_en'); ?>
        <div id='content_en' name='Articles[content_en]'></div>
        <?php echo $form->error($model,'content_en');  ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('id' => 'uploadImage','accept' => 'image/jpeg,image/gif,image/png')); ?>
		<?php echo $form->error($model,'image'); ?>
        <img id="uploadPreview" style="display:none;max-width: none;"/>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->dropDownList($model, 'menu_id', $menus) ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

    <input type="hidden" id="x" name="x" />
    <input type="hidden" id="y" name="y" />
    <input type="hidden" id="w" name="w" />
    <input type="hidden" id="h" name="h" />

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript" charset="utf-8">
    function setInfo(i, e) {
        $('#x').val(e.x1);
        $('#y').val(e.y1);
        $('#w').val(e.width);
        $('#h').val(e.height);
    }

    $(document).ready(function() {
        var opts = {
            cssClass : 'el-rte',
            // lang     : 'ru',
            height   : 450,
            toolbar  : 'maxi',
            cssfiles : ['css/elrte-inner.css']
        }
        $('#content_ru').elrte(opts);
        $('#content_ua').elrte(opts);
        $('#content_en').elrte(opts);

        var p = $("#uploadPreview");

        // prepare instant preview
        $("#uploadImage").change(function(){
            // fadeOut or hide preview
            p.fadeOut();

            // prepare HTML5 FileReader
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        // implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
        $('img#uploadPreview').imgAreaSelect({
            // set crop ratio (optional)
            aspectRatio: '1:1',
            onSelectEnd: setInfo
        });
    });
</script>