<?php
//导入公共配置
$config1 = require("./config.inc.php");

$config2 = array(
	//'配置项'=>'配置值'
	
	//指定后台用户的session下标键值
	'USER_AUTH_KEY'=>'adminuser', 
	
	/*----------Smarty模板的配置----------*/
	//开启Smarty模板的支持
	//使用的模板引擎名
	'TMPL_ENGINE_TYPE'     => 'Smarty',
	//url不区分大小写
	//'URL_CASE_INSENSITIVE' => true,
	//模板引擎相关的设置
	'TMPL_ENGINE_CONFIG'   => array(
		//是否缓存模板
		'caching'          => false,
		//模板目录
		'template_dir'     => TMPL_PATH,
		//模板编译目录
		'compile_dir'      => CACHE_PATH,
		//缓存目录
		'cache_dir'        => TEMP_PATH,
		//左定界符
		'left_delimiter'   => '{',
		//右定界符
		'right_delimiter'  => '}',
		'CS'=>'尚科',
	),
	//自定义跳转页面
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	'TMPL_ACTION_ERROR' => 'Public:jump',
	//'TMPL_TEMPLATE_SUFFIX' =>'.html',	//设置默认模版后缀
	
	// 显示页面Trace信息
	//'SHOW_PAGE_TRACE' =>true, 
	//'SHOW_ERROR_MSG'=> true,
	
);
//合并配置信息，并返回
return array_merge($config1,$config2);
?>