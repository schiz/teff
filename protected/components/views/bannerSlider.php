<?php
Yii::t('strings', 'Technology transition to alternative fuel');
Yii::t('strings', 'will get the same amount of heat');
Yii::t('strings', 'with savings on investment');
?>

<!--Анимированные баннеры-->
<div class="banner row">
    <ul>
        <li class="slide animated">
            <h3 class="center-title">
            Технологии перехода на альтернативный вид топлива <br/>
            позволят получить то же количество тепла <br/>
            с экономией вложенных средств</h3>
            <!--Левая часть-->
            <div class="money-1">
                <div class="left-money"></div>
                <div class="left-money-description">вложенный <br/>капитал</div>
                <div class="right-money"></div>
                <div class="right-money-description">вложенный <br/> капитал</div>
            </div>
            <div class="money-arrows">
                <div class="left-money-arrow"></div>
                <div class="right-money-arrow"></div>
            </div>
            <div class="gas-fire">
                <div class="natural-gas"></div>
                <div class="right-biotoplivo"></div>
                <div class="right-biotoplivo-description">твердое <br/> биотопливо</div>
            </div>
            <div class="next-arrows">
                <div class="left-gas-arrow"></div>
                <div class="right-biotoplivo-arrow"></div>
            </div>
            <div class="generators">
                <div class="left-teplogenerator"></div>
                <div class="left-teplogenerator-description">теплогенерирующее <br/> устройство</div>
                <div class="right-teplogenerator"></div>
                <div class="right-teplogenerator-description">теплогенерирующее <br/> устройство</div>
            </div>
            <div class="seven-step">
                <div class="left-teplogenerator-arrow"></div>
                <div class="right-teplogenerator-arrow"></div>
            </div>
            <div class="eghty-step">
                <div class="center-description">количество<br/>полученного тепла</div>
                <div class="sun"></div>
            </div>
            <div class="effect"></div>
        </li>
        <li class="slide"> <!-- class="slide" -->
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/slides/slide_2.png" alt=""/>
        </li>

    </ul>
    <!--Переключатели -->
    <ul class="switches"></ul>
</div>