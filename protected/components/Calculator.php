<?php

Yii::import('zii.widgets.CPortlet');

class Calculator extends CPortlet
{
    public function renderContent()
    {
        $fuels = Fuels::model()->findAll();

        $this->render('calculator',array('fuels' => $fuels));
    }
}