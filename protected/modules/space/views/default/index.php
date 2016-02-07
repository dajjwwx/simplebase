<?php
/* @var $this SpaceController */

$this->breadcrumbs=array(
	'Space',
);
?>

<div class="panel panel-default">
	<div class="panel-heading">
                <h4><span class="glyphicon glyphicon-list"></span> 我的动态</h4>
	</div>
	<div class="panel-body">
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
		 <li role="presentation" class="active">
		 	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">最近动态</a>
		 </li>
		 <li role="presentation">
		 	 <a id="preparation" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                我的备课本
		        	<span class="caret"></span>
		        </a>
		        <ul class="dropdown-menu" aria-labelledby="preparation">
		        	<li><a href="#profile"  aria-controls="settings" role="tab" data-toggle="tab">我的课件</a></li>
			        <li><a href="<?php echo $this->createUrl('/preparation/space/create'); ?>">上传课件</a></li>
<!-- 			        <li><a href="#">Something else here</a></li>
			        <li role="separator" class="divider"></li>
			        <li><a href="#">Separated link</a></li> -->
		        </ul>
		         <li role="presentation">
		 	 <a id="preparation" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                高考真题库
		        	<span class="caret"></span>
		        </a>
		        <ul class="dropdown-menu" aria-labelledby="preparation">
		        	<li><a href="<?php echo $this->createUrl('/gaokao/space/create');?>">上传真题</a></li>
		        	<li><a href="#gaokao"  aria-controls="settings" role="tab" data-toggle="tab">我的上传</a></li>
			        <li><a href="<?php echo $this->createUrl('/gaokao/space/favourite'); ?>">我的收藏</a></li>
				<?php if(Yii::app()->user->name == 'admin'):?>
				<li role="separator" class="divider"></li>
				<li><?php echo CHtml::link('添加试卷类型',array('/gaokao/paper/create'));?></li>
				<li><?php echo CHtml::link('添加特殊试卷',array('/gaokao/coursePaper/create'));?></li>
				<?php endif;?>
<!-- 			        <li><a href="#">Something else here</a></li>
			        <li role="separator" class="divider"></li>
			        <li><a href="#">Separated link</a></li> -->
		        </ul>
		 </li>	
		 </li>
		 <li role="presentation">
		 	<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">我的文章</a>
		 </li>
		 <li role="presentation">
		 	<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">我的书籍</a>
		 </li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
		    	<?php $this->widget('preparation.components.recent.RecentWidget');?>
		 </div>
		 <div role="tabpanel" class="tab-pane" id="profile">
		    	<?php $this->widget('preparation.components.recent.RecentWidget');?>
		 </div>
		 <div role="tabpanel" class="tab-pane" id="messages">
		    	正在进行中......
		 </div>
		 <div role="tabpanel" class="tab-pane" id="settings">
		    	正在进行中......
		 </div>
	  </div>                      
	</div>
</div>