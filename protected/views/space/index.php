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

	<div>

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
		 <li role="presentation" class="active">
		 	<a href="#home" aria-controls="home" role="tab" data-toggle="tab">最近动态</a>
		 </li>
		 <li role="presentation">
		 	<!--<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">我的备课本</a>-->
		 	        <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                Dropdown
		                <span class="caret"></span>
		                </a>
		                <ul class="dropdown-menu" aria-labelledby="drop1">
			                <li><a href="#">Action</a></li>
			                <li><a href="#">Another action</a></li>
			                <li><a href="#">Something else here</a></li>
			                <li role="separator" class="divider"></li>
			                <li><a href="#">Separated link</a></li>
		              </ul>

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
		    	正在进行中......
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
</div>