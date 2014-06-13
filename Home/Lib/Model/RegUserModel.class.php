<?php
class RegUserModel extends Model {
	protected $trueTableName = 'user';
		protected $_validate = array (
		array ('uname', 'require', '用户名不为空.!' ), 
		array ('uname', '', '认证标题已经存在！', 0, 'unique', 1 ),
		array ('upwd', 'require', '登陆密码不为空.!' ), 
		array ('repwd', 'require', '确认密码不为空.!' ), 
		array('repwd','upwd','确认密码不正确',0,'confirm'),
		array ('uemail', '', '邮箱已经存在', 0, 'unique', 1 ),
		array ('uemail', 'email', '邮箱格式不正确' ) 
	);
}
?>