<?php

class DefaultController extends Controller
{
	
	public $layout='//layouts/gaokao';
	
	public function actionIndex()
	{
		$courses = Gaokao::model()->getCourses();
		$provinces = Gaokao::model()->getProvinces();
		
		$this->render('index',array(
			'courses'=>$courses,
			'provinces'=>$provinces
		));
	}

	public function actionForm2()
	{
		UtilHelper::dump($_REQUEST);

		die();

		header("Access-Control-Allow-Origin: *");
	    if (isset($_POST['submit'])) {
	    	
	        echo "<pre>";
	        echo htmlspecialchars($_POST["mdeditor-markdown-doc"]);
	        
	        if(isset($_POST["mdeditor-html-code"])) {
	            echo "<br/><br/>";
	            echo htmlspecialchars($_POST["mdeditor-html-code"]);
	        }
	        
	        echo "</pre>";
	        
	        
	    }

	    exit;
	}

	public function actionForm()
	{

		header("Content-Type:text/html; charset=utf-8");

		$folder = Yii::app()->params['uploadPreparationPath'];
		// // echo File::model()->getFilePath(94,$folder);
		// $model = File::model()->findByPk(104);
		// $targetFile = File::model()->attributeAdapter($model)->getFilePath($folder, false, false);
		// echo $targetFile;

		// echo Yii::app()->params->fileServer;

		// $qiniu = new Qiniu();
		
		// $targetFile = '/public/log.txt';
		// // echo $qiniu->getFilePath($targetFile);
		// if($qiniu->delete($targetFile))
		// {
		// 	echo OK;
		// }
		// else
		// {
		// 	echo "Fail";
		// }

		$data = '';

		if($_FILES){
			// UtilHelper::dump($_FILES);

			$qiniu = new \API\Qiniu();
			// $data = $qiniu->putFile($_FILES['file']['name'], $_FILES['file']['tmp_name']);

			$data = UtilUploader2::uploadQiniu('file',File::FILE_TYPE_PREPARATION,$folder,$pid,'*.doc;*.ppt;*.docx;*.pptx;*.pdf',$prefix='');

			UtilHelper::dump($data);

			// $msg = UtilUploader2::uploadQiniu('file', File::FILE_TYPE_GAOKAO,$folder,$pid=null,$fileext='*.jpg;*.png;*.gif,*.pdf', $prefix = '');

			// UtilHelper::dump($msg);
		}    

   

		$this->render('form',array(
			'data'=>$data,
			'file'=>$_FILES
		));
		
	}


	public function actionRPC()
	{

		Yii::import('ext.hprose.*');
		require_once("Hprose.php");
		// require_once('Hprose.')
		
		UtilHelper::dump(get_included_files());

		// die();

	    $client = new HproseHttpClient('http://uustudio.sinaapp.com/Service/segment.php');
	    echo $client->hello('World');

	}
	

	public function actionTest()
	{
		$link = Gaokao::model()->getPaperLink(22,1,2013);

		echo $link;
	}
}