<?php

class UserController extends AdminController
{
    public $layout = "/layout/operations";

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'), // @
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),  // admin
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        } else {
            $this->redirect('/admin/user/login');
        }

	}

	public function actionUpdate($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=$this->loadModel($id);

            if(isset($_POST['Users']))
            {
                $model->attributes=$_POST['Users'];
                $model->role = $_POST['Users']['role'];
                if($model->save())
                    $this->redirect(array('view','id'=>$model->id));
            }

            $this->render('update',array(
                'model'=>$model,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	public function actionDelete($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	public function actionIndex()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $dataProvider=new CActiveDataProvider('Users');
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	public function actionAdmin()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=new Users('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Users']))
                $model->attributes=$_GET['Users'];

            $this->render('admin',array(
                'model'=>$model,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionLogin() {
        if(isset($_POST['Users'])) {
            $identity=new UserIdentity($_POST['Users']['username'],$_POST['Users']['password']);
            if($identity->authenticate()) {
                Yii::app()->user->login($identity);
            }
            else {
                echo $identity->errorMessage;
            }
            $this->redirect(Yii::app()->homeUrl.'admin');
        }
        $this->render('login');
    }
}
