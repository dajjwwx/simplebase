<?php
/* @var $this CoursePaperController */
/* @var $model CoursePaper */

$this->breadcrumbs=array(
	'Course Papers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CoursePaper', 'url'=>array('index')),
	array('label'=>'Create CoursePaper', 'url'=>array('create')),
	array('label'=>'View CoursePaper', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CoursePaper', 'url'=>array('admin')),
);
?>

<h1>Update CoursePaper <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>