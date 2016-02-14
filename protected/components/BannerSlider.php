<?php

Yii::import('zii.widgets.CPortlet');

class BannerSlider extends CPortlet
{
    public function renderContent()
    {
        $this->render('bannerSlider');
    }
}