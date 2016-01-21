				<?php
					$this->widget('ext.jqueryupload.JqueryUploadWidget',array(
						'url'=>Yii::app()->createUrl('/testbank/space/upload'),
						'method'=>'POST',
						'id'=>'multiplyfileuploader',
						'allowedTypes'=>'pdf,doc,docx,ppt,pptx,wps',//只允许上传PDF文件
						'fileName'=>'Filedata',
						// 'returnType'=>"json",
						'maxFileSize'=>5*1024*1024,
						//'showDownload'=>true,
						//'statusBarWidth'=>600,
						//'dragdropWidth'=>600,
						'multiple'=>true,
						'extErrorStr'=>'允许上传的文件格式为：',
						'sizeErrorStr'=>'您的文件太大了，最大只能上传',
						'dynamicFormData'=>'js:function(){
					                return {"pid":$("#Testbank_id").val()};
					            }',
						'showDelete'=>true,
						'deleteCallback'=>'js:function (data, pd) {
							for (var i = 0; i < data.length; i++) {
								$.post("delete.php", {op: "delete",name: data[i]},function (resp,textStatus, jqXHR) {
										//Show Message	
										alert("File Deleted");
									});
							}
							pd.statusbar.hide(); //You choice.

						}',
						'onSelect'=>'js:function(files){

							var testname = $("#Testbank_title").val();

							return checkUploadData(files,testname);


						}',
						'onLoad'=>'js:function(obj){
							console.log($("#gaokao_form").serializeArray());
							
							console.log(obj);
							
							alert($("#Gaokao_course").val());
							
							return false;
						}',
						'onSuccess'=>'js:function(files,data,xhr)
						{	
							eval("data="+data);

							$("#status").html("<font color=\'green\'>Upload is success</font>").fadeOut(1000);
							
							console.log(data);	
							console.log(files);		
							$("#Preparation_fid").val(data.id);
							
						}',
						'onError'=>'js:function(files,status,errMsg){		
							console.log(errMsg);	
							$("#status").html("<font color=\"red\">Upload is Failed</font>");
						}'	
					));
				?>
					<div id="multiplyfileuploader"><?php echo $this->module->t('gaokao','Add Paper');?></div>  
					<div id="status"></div> 
					<input type="hidden" id="Testbank_id" value="<?php echo $_GET['id'];?>" />
					<input type="hidden" id="Testbank_title" value="<?php echo $model->title;?>" />

<script type="text/javascript">
	function loadChapters(object){
		YKG.app().form().singleChoice(object,'Preparation_Chapter');

		YKG.app().dom().preAjax($("#loadChapters"));

		$.get('/preparation/catalog/catalog.html',{'pid':object.attr('id'),'course':$("#Preparation_Course").val()},function(data){
			
			var datalist = {
				'list': data
			};

			var html = baidu.template('chapters',datalist);
			$("#loadChapters").html(html);
		},'json');	
	}

	function checkUploadData(files,testname){
		var id = $("#Testbank_id").val();

		var body = "";

		var filename = files[0].name;

		if(id != "" && filename.indexOf(testname) >= 0 ){
			return true;
		}

		if(id == ""){
			body = "请选择试卷";
		}

		if(filename.indexOf(testname) == -1)
		{
			body = '请先修改文件名为'+name +'[科目]，如2015-2016学年度春季学期12月月考数学卷';
		}

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
</script>