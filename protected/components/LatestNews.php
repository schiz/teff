<?php

Yii::import('zii.widgets.CPortlet');

class LatestNews extends CPortlet
{
    public function renderContent()
    {
        $lastTwoNews = News::model()->getLastTwoNews();

        $this->render('latestNews', array(
            'lastNews'=>$lastTwoNews
        ));
    }
}