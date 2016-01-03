<?php
/* @var $this CoursePaperController */
/* @var $model CoursePaper */

$this->breadcrumbs=array(
	'Course Papers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CoursePaper', 'url'=>array('index')),
	array('label'=>'Create CoursePaper', 'url'=>array('create')),
	array('label'=>'Update CoursePaper', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CoursePaper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoursePaper', 'url'=>array('admin')),
);
?>

<h1>View CoursePaper #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'province',
		'course',
		'paper',
		'year',
	),
)); ?>
