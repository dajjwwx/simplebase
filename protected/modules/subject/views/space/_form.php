<?php
/* @var $this SpaceController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($subject,'period'); ?>
		<div class="btn-group" data-toggle="buttons">
		<label class="btn btn-primary">
		<input value="<?php echo Subject::SUBJECT_PERIOD_MIDDEL;?>" name="Subject[period]" id="Subject_period_1" autocomplete="off" type="radio">中考</label>
		<label class="btn btn-primary active">
		<input value="<?php echo Subject::SUBJECT_PERIOD_HIGH;?>" name="Subject[period]" id="Subject_period_2" autocomplete="off" checked="" type="radio">高考</label>
		</div>	
		<?php echo $form->error($subject,'period'); ?>
	</div>		

	<div class="form-group">
		<?php echo $form->labelEx($subject,'course'); ?>
		<div id="loadCourses" style="border:1px dashed grey;padding:5px;">
			<?php $courses = Catalog::model()->getCourses();?>
			<?php for($i=0; $i < sizeof($courses); $i++):?>
				<span class="item">
					<a href="javascript:void(0);" onclick="YKG.app().form().singleChoice($(this),'Subject_course');" id="<?php echo $courses[$i]['id'];?>">
						<?php echo $courses[$i]['course'];?>
					</a>
				</span>  
			<?php endfor;?>
			<?php echo $form->textField($subject,'course'); ?>
		</div>
		<?php echo $form->error($subject,'course'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'name'); ?>
		<label for="Category_name" class="required">专题名称 <span class="required">*</span></label>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'专题名称')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'weight'); ?>
		<label for="Category_weight" class="required">专题权重 <span class="required">*</span></label>
		<?php echo $form->textField($model,'weight',array('class'=>'form-control','placeholder'=>'权重')); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'type'); ?>
		<?php echo $form->hiddenField($model,'type',array('value'=>Category::CATEGORY_EDU_SUBJECT)); ?>
		<?php //echo $form->error($model,'type'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'description'); ?>
		<label for="Category_description" class="required">专题描述 <span class="required">*</span></label>
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>500,'class'=>'form-control','placeholder'=>'描述')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->hiddenField($model,'pid',array('value'=>$pid)); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>


	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	
</script>