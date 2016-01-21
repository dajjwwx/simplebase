<?php
/* @var $this SpaceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Testbanks',
);

$this->menu=array(
	array('label'=>'Create Testbank', 'url'=>array('create')),
	array('label'=>'Manage Testbank', 'url'=>array('admin')),
);
?>


<div class="panel panel-default">
	<div class="panel-heading">
		<span class="glyphicon glyphicon-paperclip"></span> <?php echo $this->module->t('testbank','TestBank');?>
	</div>
	<div class="panel-body">
		<?php 
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'itemsCssClass'=>'table table-hover table-condensed clearfix',
			'pagerCssClass'=>'pull-right clearfix',
			'pager'=>array(
				'selectedPageCssClass'=>'active',
				'maxButtonCount'=>8,
				'header'=>'',
				'htmlOptions'=>array(
					'class'=>'pagination',
				)
			)
		));
		 ?>
	</div>
</div>
