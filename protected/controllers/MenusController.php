<?php

class MenusController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array('index','view','contact'),
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
        $menu = Menus::model()->findByPk($id);
        if (isset($menu)) {
            if ($menu->parent_id != 0) {
                $menu = Menus::model()->findByPk($menu->parent_id);
            }
            $sub_menus = Menus::model()->findAll('parent_id=:parent_id',array(':parent_id' => $menu->id));
            //$articles = Articles::model()->findAll('menu_id=:menu_id',array(':menu_id' => $id));
            $articles = Articles::model()->findAll(array(
                'condition' => 'menu_id='.$id,
                'order' => 'id desc'
            ));
            $this->render('view',array(
                'articles'=>$articles,
                'sub_menus' => $sub_menus,
                'menu' => $menu,
                'active_id' => $id
            ));
        } else {
            $this->redirect('/');
        }

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

	}

    public function actionContact() {
        $this->render('contact');
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
