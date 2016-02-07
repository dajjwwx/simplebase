#Usage

1. 特别说明：
（1）YKG-1.1为simple系列系统而设计





2. 模块使用说明：
	

2.1.yuekegu.form.js使用方法

###单选
	-- YKG.app().form().singleChoice($(this),'Subject_Course'); 
	
```html
	<?php $courses = Catalog::model()->getCourses();?>
	<?php for($i=0; $i < sizeof($courses); $i++):?>
		<span class="item">
			<a href="javascript:void(0);" onclick="YKG.app().form().singleChoice($(this),'Subject_Course');" id="<?php echo $courses[$i]['id'];?>">
				<?php echo $courses[$i]['course'];?>
			</a>
		</span>  
	<?php endfor;?>
	<input type="hidden" id="Subject_Course"  />
```