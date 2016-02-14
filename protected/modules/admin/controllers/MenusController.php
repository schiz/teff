<?php

class MenusController extends Controller
{
    public $layout='/layout/operations';

    public function getParentItem()
    {
        $parentItem = CHtml::listData(Menus::model()->findAll() , 'id', 'name');
        return $parentItem;
    }

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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

	public function actionCreate()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=new Menus;
            if(isset($_POST['Menus']))
            {
                $model->attributes=$_POST['Menus'];
                if($model->save())
                    $this->redirect(array('view','id'=>$model->id));
            }
            $menu_model = Menus::model()->findAll(array('condition' => 'dynamic=1 AND parent_id=0'));
            $menus  = array();
            switch(Yii::app()->language) {
                case 'ru':
                    foreach ($menu_model as $_menu_model) {
                        $menus[$_menu_model->id] = Yii::t('strings',$_menu_model->name_ru);
                    }
                    break;
                case 'ua':
                    foreach ($menu_model as $_menu_model) {
                        $menus[$_menu_model->id] = Yii::t('strings',$_menu_model->name_ua);
                    }
                    break;
                case 'en':
                    foreach ($menu_model as $_menu_model) {
                        $menus[$_menu_model->id] = Yii::t('strings',$_menu_model->name_en);
                    }
                    break;
            }

            $this->render('create',array(
                'model'=>$model,
                'menus' => $menus
            ));
        } else {
            $this->redirect('/admin/user/login');
        }

	}

	public function actionUpdate($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=$this->loadModel($id);
            if(isset($_POST['Menus']))
            {
                $model->attributes=$_POST['Menus'];
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

            $model=Menus::model()->with('articles')->findByPk($id);
            foreach($model->articles as $article)
                $article->delete();
            $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $dataProvider=new CActiveDataProvider('Menus', array(
                'criteria'=>array(
                    'condition'=>'parent_id>0',
                )));
            $this->render('index',array(
                'dataProvider'=>$dataProvider,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model= new Menus('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Menus']))
                $model->attributes = $_GET['Menus'];

            $this->render('admin',array(
                'model'=>$model,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Menus the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menus::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Menus $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
