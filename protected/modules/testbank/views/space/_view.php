<?php
/* @var $this SpaceController */
/* @var $data Testbank */
?>


<div class="view_info">
	<?php //echo Gaokao::model()->getPaperLink($province,$model->course,$model->year); ?>		
	<h5><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?php echo CHtml::link(CHtml::encode($data->title),array('space/view','id'=>$data->id));?></h5>
	<span class="item">
		Grade：<?php echo CHtml::encode($data->grade);?>
	</span>
	<span class="item">
		Year：<?php echo CHtml::encode(date('Y-m-d',$data->published)); ?>
	</span>

	<br />

</div>
