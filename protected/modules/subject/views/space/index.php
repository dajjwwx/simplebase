<?php
/* @var $this SpaceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::app()->getModule('subject')->t('subject','Subject'),
);

$this->menu=array(
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Categories</h1>

<?php $courses = Catalog::model()->getCourses();?>
<?php foreach ($courses as $course):?>
	<div class=" col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-paperclip"></span> <?php echo $course['course'];?>
					</div>
					<div class="panel-body">
						<?php UtilHelper::dump($course);?>
					</div>
				</div>
	</div>
<?php endforeach;?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
