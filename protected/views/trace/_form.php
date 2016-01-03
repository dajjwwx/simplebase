<?php
/* @var $this TraceController */
/* @var $model Trace */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trace-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'event'); ?>
		<?php echo $form->textField($model,'event',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_type'); ?>
		<?php echo $form->textField($model,'event_type'); ?>
		<?php echo $form->error($model,'event_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->