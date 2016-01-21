<?php
/* @var $this TraceController */
/* @var $model Trace */

$this->breadcrumbs=array(
	'Traces'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Trace', 'url'=>array('index')),
	array('label'=>'Create Trace', 'url'=>array('create')),
	array('label'=>'Update Trace', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Trace', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Trace', 'url'=>array('admin')),
);
?>

<h1>View Trace #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'event',
		'event_id',
		'created',
		'event_type',
		'uid',
	),
)); ?>
