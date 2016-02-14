<?php

class FuelsController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='/layout/operations';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=new Fuels;

            if(isset($_POST['Fuels']))
            {
                $model->attributes=$_POST['Fuels'];
                $fuelCost = new FuelCost;
                $fuelCost->cost = $_POST['Fuels']['cost'];
                if ($model->validate() && $fuelCost->validate()) {
                    if($model->save(false)) {
                        $fuelCost->fuel_id = $model->id;
                        if ($fuelCost->save(false))
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }
            }

            $this->render('create',array(
                'model'=>$model,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=$this->loadModel($id);
            if(isset($_POST['Fuels']))
            {
                $model->attributes=$_POST['Fuels'];
                $fuelCost = FuelCost::model()->find(array('condition' => 'fuel_id='.$model->id));
                $fuelCost->cost = $_POST['FuelCost']['cost'];
                if ($model->validate() && $fuelCost->validate()) {
                    if($model->save(false)) {
                        $fuelCost->fuel_id = $model->id;
                        if ($fuelCost->save(false))
                            $this->redirect(array('view','id'=>$model->id));
                    }
                }
            }

            $this->render('update',array(
                'model'=>$model,
            ));
        } else {
            $this->redirect('/admin/user/login');
        }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        if(Yii::app()->user->checkAccess('admin')){
            $fuel = $this->loadModel($id);
            FuelCost::model()->find(array('condition' => 'fuel_id='.$fuel->id))->delete();
            $fuel->delete();

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
            $dataProvider=new CActiveDataProvider('Fuels');
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
            $model=new Fuels('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Fuels']))
                $model->attributes=$_GET['Fuels'];

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
	 * @return Fuels the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Fuels::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Fuels $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fuels-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
