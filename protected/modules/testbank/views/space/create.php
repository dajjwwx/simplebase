<?php
/* @var $this SpaceController */
/* @var $model Testbank */

$this->breadcrumbs=array(
	'Testbanks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Testbank', 'url'=>array('index')),
	array('label'=>'Manage Testbank', 'url'=>array('admin')),
);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="glyphicon glyphicon-paperclip"></span>  创建试题组 </div>
	<div class="panel-body">
		
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>