<?php
/* @var $this SpaceController */
/* @var $model Testbank */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'testbank-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<blockquote>
		<p>新建试题组名的命名规则为：</p>
		<small>写清哪一所学校的哪一届哪一季度哪个年级的什么考试，如会东中学2015-2016学年高二12月月考</small>
	</blockquote>

	<?php echo $form->errorSummary($model); ?>
	
	<div  class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>"form-control",'placeholder'=>$this->module->t('testbank','Title'),'size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div  class="form-group">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->dropDownList($model,'grade',Testbank::model()->getGradeList(),array('class'=>"form-control",'placeholder'=>$this->module->t('gaokao','Year'))); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-default")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->