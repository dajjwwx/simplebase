<?php
$this->breadcrumbs=array(
	'Testbanks'=>array('index'),
    $model->testbank->title,
	$model->name,
);
?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo $model->name;?></div>
		<div class="panel-body">
			<div class="view_info">
				<h4><span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;<?php echo CHtml::encode($model->name);?></h4>
				<p>文件属性：<?php echo UtilFileInfo::formatSize($model->size);?></p>
				<p>上传时间：<?php echo date('Y/m/d',$model->created);?></p>
				<p>文件大小：<?php echo UtilFileInfo::formatSize($model->size);?></p>
				<br />
				<p>
					<a href="/testbank/space/download.html?id=<?php echo $model->id;?>">
						<button type="button" id="downloadButton" class="btn btn-primary btn-lg">
							<span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>	下载
						</button>
					</a>
				</p>

				<hr />

				<div>
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">评论</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">在线预览</a></li>
				    <li role="presentation"><a href="relative" aria-controls="relative" role="tab" data-toggle="tab">相关下载</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="home">
				    	<div class="view_info">
						
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="profile">    	
		
						
				    </div>

				    <div role="tabpanel" class="tab-pane" id="relative">
				    	<div id="loadRelative"></div>
				    	<script type="text/template" id="relativeItems">
	    		    		<ul class="list">
								<%if(list.length == 0){%>
									<li>还没上传文件哦</li>
								<%}else{%>
									<%for(var i=0;i<list.length;i++){%>
										<li>
											<div style="border-bottom:1px solid grey;">
											文件名：<a href="javascript:void(0);" id="<%=list[i].id%>">
											<%=list[i].filename%>
											</a><br />						

											</div>
										</li>
									<%}%>
								<%}%>
							</ul>
				    	</script>		
				    </div>
				  </div>

				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(function(){

		$("#downloadButton").click(function(){

			location.href = '/testbank/space/download.html?id=<?php echo $_GET['id'];?>';

		});

	});

</script>