<?php
/* @var $this SpaceController */
/* @var $model Testbank */

$this->breadcrumbs=array(
	'Testbanks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Testbank', 'url'=>array('index')),
	array('label'=>'Create Testbank', 'url'=>array('create')),
	array('label'=>'Update Testbank', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Testbank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Testbank', 'url'=>array('admin')),
);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="glyphicon glyphicon-paperclip"></span> 
		<?php echo $model->title;?>
	</div>
	<div class="panel-body">
		<a name="head"></a>
		<section id="introduce">
			<a  href="#uploader" class="btn btn-primary pull-right">
				上传试卷
				<span class="glyphicon glyphicon-menu-right"></span>
			</a>	
			<h4>
				<span class="glyphicon glyphicon-book"></span> 简介
			</h4>
			<p>这里是有关<?php echo $model->title;?>的简介</p>
							
		</section>
		<hr />	
		<section id="list" class="clearfix">
			<h4>
				<span class="glyphicon glyphicon-th"></span>
				相关试卷
			</h4>

			<div id="loadRelative"></div>

			<script type="text/template" id="relativeItems">
			<table class="table table-hover">
			      <thead>
			        <tr>
			          <th>#</th>
			          <th>名称</th>
			          <th>创建时间</th>
			        </tr>
			      </thead>
			      <tbody>
					<%if(list.length == 0){%>
						<tr>
						<th></th>
						<td>还没上传文件哦</td>
						<td></td>
						</tr>
					<%}else{%>
						<%for(var i=0;i<list.length;i++){%>
							<tr>
							<th><%=(i+1)%></th>
							<td><a href="/testbank/space/detail.html?id=<%=list[i].id%>"><%=list[i].name%></a></td>
							<td><%=list[i].created%></td>
							</tr>
						<%}%>
					<%}%>
				</tbody>
			    	</table>
			</script>
		</section>
		<hr />
						    	

		 <script type="text/javascript">
			$(function(){				
				loadList();
			});
		</script>


		<section id="uploader" class="clearfix">
			<h4>
				<span class="glyphicon glyphicon-cloud-upload"></span>
				文件上传
			</h4>
			<a  class="btn btn-default pull-right" name="uploader" href="#head">返回</a>
			
			<?php $this->renderPartial('_uploader',array('model'=>$model));?>
		</section>

</div>
</div>
<script type="text/javascript">

	function loadList()
	{
		YKG.app().dom().preAjax($("#loadRelative"));
		$.get('/testbank/space/list/id/<?php echo $_GET['id'];?>.html',{'r':Math.random()},function(data){
			console.log(data);
			var datalist = {
				'list': data
			};
			var html = baidu.template('relativeItems',datalist);
			$("#loadRelative").html(html);
		},'json');
	}
		


	function checkPreparationData()
	{
		var uploadData = checkUploadData();
		if(uploadData){
			var fid = $("#Preparation_fid").val();

			if(fid != ""){
				return true;
			}else{

				YKG.app("bootstrap").showModal({
					"id":"defaultModal",
					"title":"操作提示",
					"body":"请先上传课件",
					"showEvent":function(){
						// alert("HEllo wrld");
					}
				}).show().showEvent();

			}

		}
	}



	function loadExistsFiles(id)
	{
		YKG.app().dom().preAjax($("#existsFilesBox"));

		$(".ajax-file-upload-statusbar").empty();

		$.get('/preparation/space/chapterfiles/id/'+ id +'.html',{'r':Math.random()},function(data){

			var datalist = {
				'list': data
			};
			var html = baidu.template('existsFiles',datalist);
			$("#existsFilesBox").html(html);


		},'json');
	}

	function setCatalogID(object)
	{
		YKG.app().form().singleChoice(object,'Preparation_cid');

		loadExistsFiles(object.attr('id'));
	}

	function deleteCatalog(object)
	{
		var id = object.attr('id');

		$.post('/preparation/catalog/delete/'+id + '.html',function(data){
			console.log(data);
		});
	}



	/**
	 * 添加章节目录
	 */
	function addCatalog(pid, object, func)
	{
		var course = $("#Preparation_Course").val();

		if(course == ""){
			body = "请选择科目"
		}

		if(pid == ""){
			body = "请选择章节目录"
		}

		if(course == "" || pid == "")
		{
			YKG.app("bootstrap").showModal({
				"id":"defaultModal",
				"title":"操作提示",
				"body":body,
				"showEvent":function(){
					// alert("HEllo wrld");
				}
			}).show().showEvent();		
			return false;			
		}

		var params = {
			'Catalog':{
				'course':course,
				'pid':pid,
				'name':object.val()
			}
		};
		$.post('/preparation/catalog/create.html',params,function(data){
			if(data.success == true)
			{
				func();
			}			
			console.log(data);
		},'json');		
	}

	function addTextBooksCatalog(object)
	{
		var pid = 0;
		addCatalog(pid, object, function(){
			loadTextBooks($("#loadCourses span.selected a"));
		});
	}

	function addChapterCatalog(object)
	{
		var pid = $("#Preparation_cid").val()	 || $("#Preparation_Chapter").val();

		addCatalog(pid, object, function(){
			loadChapters($("#loadTextBooks .list li.selected a"));
		});							
	}
	
</script>