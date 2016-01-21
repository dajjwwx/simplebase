#ToDo
 The testBank Module is designed to collect some important test questions,

 As a customer, we just need to create a test name and upload the test files, the system will auto recognize the course according to the filename. 

#TestBank Module Installation

Add the module id and db info to the main.php configuaration

##Prepare to upload files
1.Modify the File Model
```php
	const FILE_TYPE_TESTBANK = 100;		//TestBank Module
    
    'testbank'=>array(self::BELONGS_TO, 'Testbank','pid'),  //update the relations
```
2.Modify the params.php
```php
	//Testbank文件上传路径
	'uploadTestbankPath'		=>	'/public/upload/Testbank',
```

