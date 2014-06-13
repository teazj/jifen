<?php
//导入公共配置文件：
$config1 = require("./config.inc.php");

$config2 = array(
	//指定后台用户的session下标键值
	'USER_AUTH_KEY'=>'loginuser', 
	//自定义跳转页面
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	'TMPL_ACTION_ERROR' => 'Public:jump',
	'TMPL_TEMPLATE_SUFFIX' =>'.html',	//设置默认模版后缀
	//设置伪静态
	'URL_HTML_SUFFIX'=>'.html',

	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' =>true, 
	'SHOW_ERROR_MSG'=> true,
	
);
//合并配置信息，并返回
return array_merge($config1,$config2);
?>