<?php

class NewsController extends Controller
{
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
				'users'=>array('*'),  // @
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'), // admin
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if(Yii::app()->user->checkAccess('admin')){
            $model=new News;

            if(isset($_POST['News']))
            {
                $model->attributes= $_POST['News'];
                $image = CUploadedFile::getInstance($model,'image');
                if (isset($image)) {
                    $extension =  $image->extensionName;
                    $image_name = md5(time());
                    $file_name = $image_name.'.'.$extension;
                    $file_name_origin = $image_name.'_origin'.'.'.$extension;
                    $model->image = $file_name;

                    $size = getimagesize($_FILES['News']['tmp_name']['image']);
                    $x = (int) $_POST['x'];
                    $y = (int) $_POST['y'];
                    $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
                    $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];
                    $data = file_get_contents($image->getTempName());
                    $vImg = imagecreatefromstring($data);
                    //$nw = $nh = 200;
                    $nw = $w;
                    $nh = $h;
                    $dstImg = imagecreatetruecolor($nw, $nh);
                    # copy image
                    imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
                    # save image
                    imagejpeg($dstImg, Yii::app()->basePath. '/../images/news/'.$file_name);
                    # clean memory
                    imagedestroy($dstImg);
                    $new_image = true;
                }
                if($model->save()) {
                    if (isset($image))
                        $image->saveAs(Yii::app()->basePath. '/../images/news/'.$file_name_origin);
                    $this->redirect(array('view','id'=>$model->id));
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

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['News']))
            {
                $model->attributes=$_POST['News'];
                $image = CUploadedFile::getInstance($model,'image');
                $new_image = false;
                if (isset($image)) {
                    $old_image = $model->image;
                    if (isset($old_image)) {
                        $old_image_full_name = explode('.',$old_image);
                        $old_image_name = $old_image_full_name[0];
                        $old_image_extension = $old_image_full_name[1];
                        $old_origin_image_name = $old_image_name.'_origin';
                        unlink(Yii::app()->basePath."/../images/news/".$old_image);

                        unlink(Yii::app()->basePath."/../images/news/".$old_origin_image_name.'.'.$old_image_extension);
                    }
                    $extension =  $image->extensionName;
                    $image_name = md5(time());
                    $file_name = $image_name.'.'.$extension;
                    $file_name_origin = $image_name.'_origin'.'.'.$extension;
                    $model->image = $file_name;

                    $size = getimagesize($_FILES['News']['tmp_name']['image']);
                    $x = (int) $_POST['x'];
                    $y = (int) $_POST['y'];
                    $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
                    $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];
                    $data = file_get_contents($image->getTempName());
                    $vImg = imagecreatefromstring($data);
                    //$nw = $nh = 200;
                    $nw = $w;
                    $nh = $h;
                    $dstImg = imagecreatetruecolor($nw, $nh);
                    # copy image
                    imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
                    # save image
                    imagejpeg($dstImg, Yii::app()->basePath. '/../images/news/'.$file_name);
                    # clean memory
                    imagedestroy($dstImg);
                    $new_image = true;
                } else {
                    $image = $model->image;
                }
                if($model->save()) {
                    if ($new_image)
                        $image->saveAs(Yii::app()->basePath. '/../images/news/'.$file_name_origin);
                    $this->redirect(array('view','id'=>$model->id));
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
            $model = $this->loadModel($id);
            $old_image = $model->image;
            if (isset($old_image)) {
                $old_image_full_name = explode('.',$old_image);
                $old_image_name = $old_image_full_name[0];
                $old_image_extension = $old_image_full_name[1];
                $old_origin_image_name = $old_image_name.'_origin';
                unlink(Yii::app()->basePath."/../images/news/".$old_image);
                unlink(Yii::app()->basePath."/../images/news/".$old_origin_image_name.'.'.$old_image_extension);
            }
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
            $dataProvider=new CActiveDataProvider('News');
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
            $model=new News('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['News']))
                $model->attributes=$_GET['News'];

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
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
