<?php

class PaperController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/gaokao';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','list','paper'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$result = array();

		$model=new Paper;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Paper']))
		{
			$model->attributes=$_POST['Paper'];

			if(Paper::model()->exists('name = :name AND year = :year',array(':name'=>$_POST['Paper']['name'],':year'=>$_POST['Paper']['year'])))
			{
				$result = array('status'=>'fail','message'=>'已经有了!');

				return ;
			}
			else
			{
				if($model->validate() && $model->save())
				{
					$result = array('status'=>'success','message'=>'添加成功！');
				}
				else
				{
					$result = array('status'=>'fail','message'=>$model->errors);
				}
			}


			echo json_encode($result);

			return ;
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paper']))
		{
			$model->attributes=$_POST['Paper'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionPaper()
	{

		$this->layout = '/layouts/blank';

		$year = isset($_GET['year'])?$_GET['year']:date('Y');

		$model = Paper::model()->getPapers($year);

		$this->render('paper',array(
			'model'=>$model
		));


	}

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$this->layout = '/layouts/blank';

		$year = isset($_GET['year'])?$_GET['year']:date('Y');

		$criteria = new CDbCriteria(array(
			'condition'=>'year = :year',
			'limit'=>30,
			'params'=>array(
				':year'=>$year
			)
		));

		$dataProvider=new CActiveDataProvider('Paper',array(
			'criteria' => $criteria
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('Paper');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Paper('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paper']))
			$model->attributes=$_GET['Paper'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Paper the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Paper::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Paper $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='paper-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
