<?php

class SpaceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/testbank';

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
				'actions'=>array('index','view','list','detail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','download'),
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
		$models = File::model()->findAll(array(
			'condition'=>'pid = :pid AND filetype=:filetype',
			'params'=>array(
				':pid'=>$_GET['id'],
				':filetype'=>File::FILE_TYPE_TESTBANK 
			)
		));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'models'=>$models
		));
	}

	public function actionList()
	{

		$data = array();

		$models = File::model()->findAll(array(
			'condition'=>'pid = :pid AND filetype=:filetype',
			'params'=>array(
				':pid'=>$_GET['id'],
				':filetype'=>File::FILE_TYPE_TESTBANK 
			)
		));

		if($models)
		{
			foreach ($models as $item) {
				$data[] = array(
					'id'=>$item->id,
					'name'=>$item->name,
					'created'=>date('Y/m/d', $item->created)
				);
			}			
		}

		// UtilHelper::dump($data);

		echo json_encode($data);


	}
	
	public function actionDetail($id)
	{
		
		
		$model=File::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$this->render('detail',array(
				'model'=>$model
			)		
		);
	}
	
	/**
	 * 文件下载
	 */
	public function actionDownload($id)
	{
		$model = File::model()->findByPk($id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$folder = Yii::app()->params->uploadTestbankPath;

		$filename = File::model()->attributeAdapter($model)->getFilePath($folder, false, false);


		// $file = fopen($filename,"r"); 

		$download = new UtilDownLoad('doc,docx,ppt,pptx,pdf',false);
		$download->setDownloadFilename($model->name);
		if (!$download->downloadfile($filename))
		{
			echo $download->geterrormsg();
		}
	}


	/**
	 *为方便浏览，只允许上传PDF,文件
	 ****************************************************
	 *@used 上传试题
	 */
	public function actionUpload()
	{
		if(Yii::app()->user->isGuest) throw new CHttpException(403,'bad');

		
		if (!empty($_FILES)) {			
			$folder = Yii::app()->params['uploadTestbankPath'];
			$fileext = $_REQUEST['fileext'];
			$pid = $_REQUEST['pid'];

			UtilHelper::writeToFile($_REQUEST);

			// echo UtilUploader2::uploadNormal('Filedata',File::FILE_TYPE_TESTBANK,Yii::app()->params['uploadTestbankPath'],$pid,'*.doc;*.ppt;*.docx;*.pptx;*.pdf');
			
			try{
				// // $data = UtilUploader2::uploadQiniu('Filedata',File::FILE_TYPE_PREPARATION,$folder,$pid,'*.doc;*.ppt;*.docx;*.pptx;*.pdf');
				$data = UtilUploader2::uploadQiniu('Filedata', File::FILE_TYPE_TESTBANK, $folder, $pid, '*.doc;*.ppt;*.docx;*.pptx;*.pdf', $prefix='');
				echo $data;
			}catch(Exception $e){
				UtilHelper::writeToFile($e,'a+');
			}
			
		}

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Testbank;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Testbank']))
		{
			$model->attributes=$_POST['Testbank'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Testbank']))
		{
			$model->attributes=$_POST['Testbank'];
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Testbank');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Testbank('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Testbank']))
			$model->attributes=$_GET['Testbank'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Testbank the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Testbank::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Testbank $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='testbank-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
