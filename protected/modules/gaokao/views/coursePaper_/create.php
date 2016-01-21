<?php
/* @var $this CoursePaperController */
/* @var $model CoursePaper */

$this->breadcrumbs=array(
	'Course Papers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CoursePaper', 'url'=>array('index')),
	array('label'=>'Manage CoursePaper', 'url'=>array('admin')),
);
?>

<h1>Create CoursePaper</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>