<?php

//这是一个自动验证类
class UsersModel extends Model{
	//执行要进行验证的表名.
	//因为用D的时候默认会找user表,但是我们要验证的是users_info表,所以要进行指定!
	//protected $tableName = 'users_info'; 

	protected $_validate = array(
	    array('verify','require','验证码必须！'), //默认情况下用正则进行验证
	    array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	    array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
	    array('username','/^[a-zA-Z0-9_]{8,16}$/','账号格式不正确!'),//验证用户名格式是否正确
	    array('password','/^[a-zA-Z0-9_]{8,16}$/','密码格式不符合要求!'),//验证密码格式是否正确.
	    array('repassword','/^[a-zA-Z0-9_]{8,16}$/','密码格式不符合要求!'),
	);

}
