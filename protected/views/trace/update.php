<?php
/* @var $this TraceController */
/* @var $model Trace */

$this->breadcrumbs=array(
	'Traces'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trace', 'url'=>array('index')),
	array('label'=>'Create Trace', 'url'=>array('create')),
	array('label'=>'View Trace', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Trace', 'url'=>array('admin')),
);
?>

<h1>Update Trace <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>