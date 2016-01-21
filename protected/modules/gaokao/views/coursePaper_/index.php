<?php
/* @var $this CoursePaperController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Papers',
);

$this->menu=array(
	array('label'=>'Create CoursePaper', 'url'=>array('create')),
	array('label'=>'Manage CoursePaper', 'url'=>array('admin')),
);
?>

<h1>Course Papers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
