Installation Guid
--------
1. 添加layouts/subject.php

2. 在Category.php中添加专题资料特别分类类型
···php
	const CATEOGRY_EDU = 70;		//教育资料分类
	const CATEGORY_EDU_SUBJECT= 73;	//专题资料分类
```
在getCategoryTypeName($id)方法中添加如下信息
```php
			case self::CATEOGRY_EDU:
				return Yii::t('basic','Education');
				break;
			case self::CATEGORY_EDU_SUBJECT:
				return Yii::t('basic','Test Subject');
				break;
```

