<?php
/**
 * Description of RecentWidget
 *
 * @author jerry
 */
class RecentWidget extends CWidget
{

	private $baseUrl;
	
	public $view = 'recent';	//year
	
	public $data;
	
	public function init()
	{
                           $dataProvider=new CActiveDataProvider('File',array(
		'criteria'=>array(
                                            'condition'=>'filetype = :type AND owner = :uid',
                                            'order'=>'id DESC',
                                            'params'=>array(
                                                    ':type'=>File::FILE_TYPE_PREPARATION,
                                                    ':uid'=>Yii::app()->user->id
                                            )
                                    )
                            ));
                           
                           $this->data = $dataProvider;

	}

	
	private function getCourses()
	{

	}
	
                    /**
                     * Publishes the assets
                     */
                    public function publishAssets()
                    {
//                       $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
//
//                       $this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
                    }

                       /**
                     * Registers the external javascript files
                     */
                    public function registerClientScripts()
                    {
//                       if ($this->baseUrl === '')
//                          throw new CException('Can not find the base folder');
//
//                        Yii::app()->getClientScript()->registerCssFile($this->baseUrl.'/style.css');
                    }
	
	public function run()
	{		
//	$this->publishAssets();
//	$this->registerClientScripts();
	
                        $this->render($this->view,array(
                                           'dataProvider'=>$this->data
                        ));
	}
}
?>
