<?php
/* @var $this TraceController */
/* @var $model Trace */

$this->breadcrumbs=array(
	'Traces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Trace', 'url'=>array('index')),
	array('label'=>'Manage Trace', 'url'=>array('admin')),
);
?>

<h1>Create Trace</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>