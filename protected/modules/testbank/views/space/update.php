<?php
/* @var $this SpaceController */
/* @var $model Testbank */

$this->breadcrumbs=array(
	'Testbanks'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Testbank', 'url'=>array('index')),
	array('label'=>'Create Testbank', 'url'=>array('create')),
	array('label'=>'View Testbank', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Testbank', 'url'=>array('admin')),
);
?>

<h1>Update Testbank <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>