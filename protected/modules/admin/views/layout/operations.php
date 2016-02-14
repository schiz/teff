<?php
/**
 * @var $this DefaultController
 */
$this->beginContent('/layout/main'); ?>

<div class="row">
    <div class="span9">
        <?php echo $content; ?>
    </div>
    <div class="span3">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'Операции',
        ));

        $this->widget('zii.widgets.CMenu', array(
            'items'=>$this->menu,
            'htmlOptions'=>array(
                'class'=>'nav nav-list'
            ),
        ));
        $this->endWidget();
        ?>
    </div>
</div>
<?php $this->endContent(); ?>