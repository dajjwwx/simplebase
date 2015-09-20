<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

	<div class="container">
		<div class="row" style="margin-top:60px;opacity:0.9;">
				<?php echo Profile::model()->getUserAvatar(Yii::app()->user->id,array('style'=>'margin-top:30px;opcity:0.9;','class'=>'img-circle','id'=>'profile_avatar'),80);?>
		</div>
		<div class="row"  style="margin-top:20px;opacity:0.9;">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-paperclip"></span> 个人资料
					</div>
					<div class="panel-body">
					<?php echo $content; ?>
					</div>
				</div>		
			</div>		
		</div>
	</div>	
<?php $this->endContent(); ?>