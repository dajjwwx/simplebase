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
                            <?php $this->widget('preparation.components.recent.RecentWidget');?>
	</div>
</div>