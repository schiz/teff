<?php
/* @var $this SiteController
 *@var $news
 */

$this->pageTitle=Yii::t('strings', 'Home');
?>

<!--Анимация с банерами-->
<?php $this->widget('BannerSlider'); ?>
<!--Конец анимации с банерами-->

<!--Специализация-->
<div class="row">
    <h1 class="specialization"><?php echo Yii::t('strings', 'Our specialization'); ?></h1>
</div>

<div class="row spec-info">
    <div class="column6">
        <a href="heatandpower" class="teploenerg-button">
            <div class="side-block">
                <i class="icons icons-teploenergetika"></i>
            </div>
        </a>
        <a href="/menus/2" class="titles">
            <h3><?php echo Yii::t('strings', 'Combined heat and power') ?></h3>
        </a>
        <p>
<?php echo Yii::t('strings', 'In our time, given the environmental challenges of the environment and the negative impact on the livelihoods of people, there is a need for proper use of traditional and non-traditional sources of energy.') ?>
        </p>
        <a href="/menus/2" class="spec-link"><?php echo Yii::t('strings', 'Read more'); ?></a>
    </div>
    <div class="column6">
        <a href="consulting" class="consal-button">
            <div class="side-block">
                <i class="icons icons-consalting"></i>
            </div>
        </a>
        <a href="/menus/3" class="titles">
            <h3><?php echo Yii::t('strings', 'Technology consulting') ?></h3>
        </a>
        <p>
        <?php echo Yii::t('strings', 'We offer our customers two main the principle of cost savings in the use of Company: avoiding expensive gas, coal and liquid fuel and waste disposal of own production.') ?>
        </p>
        <a href="/menus/3" class="spec-link"><?php echo Yii::t('strings', 'Read more'); ?></a>
    </div>
</div>

    <div class="row">
        <!--Calculator-->
        <?php  $this->widget('Calculator');?>
        <!--End calculator-->
        <!--Block news-->
        <?php  $this->widget('LatestNews');?>
        <!--End news-->
    </div>
</div>



<div class="equipment">
    <?php echo Yii::t('strings', 'Equipment') ?>
</div>

<div class="bottom">
    <?php $this->widget('BottomSlider'); ?>
</div>


