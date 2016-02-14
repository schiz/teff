<?php

class DefaultController extends AdminController
{
	public function actionIndex()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $this->render('index');
        } else {
            $this->redirect('/admin/user/login');
        }
	}

}