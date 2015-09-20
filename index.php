<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

error_reporting(E_ALL|E_STRICT);
// change the following paths if necessary
//$yii=dirname(__FILE__).'//yii-1.1.16.bca042/framework/yii.php';
$yii = dirname(__FILE__).'/protected/vendor/Libaray/yii-1.1.16.bca042/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

$autoload = dirname(__FILE__).'/protected/vendor/autoload.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($autoload);

require_once($yii);

Yii::createWebApplication($config)->run();
