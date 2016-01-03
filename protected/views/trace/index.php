<?php
/* @var $this TraceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Traces',
);

$this->menu=array(
	array('label'=>'Create Trace', 'url'=>array('create')),
	array('label'=>'Manage Trace', 'url'=>array('admin')),
);
?>

<h1>Traces</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
