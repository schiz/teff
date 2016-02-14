<?php


Yii::import('zii.widgets.CPortlet');

class BottomSlider extends CPortlet
{
    public function renderContent()
    {
        $articles = Articles::model()->findAll(array('condition' => 'menu_id=1'));
        $this->render('bottomSlider',array('articles' => $articles));
    }
}