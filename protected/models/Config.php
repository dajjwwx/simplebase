<?php
/**
 * Config类用于合并各个模块的配置数据合并
 * 
 * *******************************************************************************
 * 使用方法：
 * 1.在对应模块下建相应的文件(menu/nav/quick)
 * 2.在文件内容中至少写入一个空数组
 * 
 * @author Administrator
 *
 */
class Config
{
	public static function mergeConfig($item='menu')
	{
		$list = array();
// 		$list = require_once Yii::getPathOfAlias('administrator.config.'.$item).'.php';
		$modules = Yii::app()->modules;
		unset($modules['gii']);
// 		unset($modules['administrator']);
		foreach ($modules as $name=>$module)
		{
			$config =  Yii::getPathOfAlias($name.'.config.'.$item).'.php';
			if (file_exists($config))
			{
				$menu = require_once $config;
				$list = CMap::mergeArray($list, $menu);
			}
		}
		
		return $list;
	}
}