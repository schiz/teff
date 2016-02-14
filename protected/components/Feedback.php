<?php

Yii::import('zii.widgets.CPortlet');

class Feedback extends CPortlet
{
    public function getForm()
    {
        $feedback = new FeedbackForm();
        return $feedback;
    }

    public function renderContent()
    {
        $this->render('feedback', array(
            'feedback'=> $this->getForm()
        ));
    }
}