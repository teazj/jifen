<?php
header('Content-type:text/html;charset=utf-8');
class ShopRegAction extends Action {
	//积分商城注册页面
	public function register() {
		
		if(session('check')) exit('非法访问');
		$User = D ( 'RegUser' );
		if ($_POST ['sub']) {
			if ($_SESSION ['verify'] != md5 ( $_POST ['verify'] )) {
				$this->error ( '验证码错误！' );
			}
			
			if (! $User->create ()) {
				 $this->error($User->getError());
			} else {
				//接收的数据;
			 	$data['uname'] = I('post.uname');
			 	$data['upwd'] = I('post.upwd','','md5');
			 	$data['repwd'] = I('post.repwd','','md5');
			 	$data['uemail'] = I('post.uemail');
			 	$data['yhj'] = 500;
			 	$data['regTime'] = time();
			 	$data['preTime'] = time();
			 	
			 	//先存储信息;
			 	$uReg = $User->data($data)->add();
			 	if($uReg){
			 		session('uname',$data['uname']);
			 		//购买.会员中心. 邮箱验证,有session 才可以购买,进入
			 		session('uid',$uReg);  //用来判断邮箱是否验证;
			 		$str = md5('SG'.$data['uname'].$data['upwd']);//邮箱验证发送的加密信息;
			 		session('check',$str);
$url = "http://localhost/integral/index.php/Index/ShopReg/checkEmail/";
$str_1.='
<html><head>   
<meta http-equiv="Content-Language" content="zh-cn"/>   
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>   
</head>   
<body> 
<div style="width:60%;padding:30px 20px;background:#F9F9F9;">
<span style="font-weight:bold;font-size:16px;">Hi,' . $data['uname'] . '</span><br/>
欢迎您注册<b>速格商城网站</b><br/>
请点击下面的连接完成注册:<br/>';
$str_1.="<a href='http://localhost/integral/index.php/Index/ShopReg/checkEmail/check/{$str}/id/{$uReg}'>{$url}</a>";
$str_1.="
<br/>
<font style='color:#999;'>如果以上链接无法点击,请将上面的地址复制到你的浏览器(如IE)的地址栏完成激活</font><br/>
http://www.xxx.com
</div>
</body> 
</html>";
					//发送邮件;
					SendMail($data['uemail'], '速格积分商城用户验证', $str_1);					

			 		$this->redirect('Index/Index/index','','1','注册成功');		
			 	}else{
			 		$this->error('注册失败,请联系网站管理员');
			 	}
			}
		
		}
		
		$this->display ();
	}
	
	
	//验证码;
	Public function verify() {
		import ( 'ORG.Util.Image' );
		Image::buildImageVerify ();
	}
	
	//邮箱验证;
	
	public function checkEmail(){
		 if($_GET['check']==!session('check')){
		 	$this->error('验证失败.!');
		 }else{
		 	$User = M('user');
		 	$res = $User->where("id={$_GET['id']}")->save(array('sign'=>'1'));
			if(!$res) exit('更改邮箱验证失败'); 
		 	$this->display();
		 }
		 
	}
	
	
	//退出
	public function logOut(){
		if($_GET['act']=='out'){
			session(null);
			$this->redirect('Index/Index/index',' ','0',' ');
		}else{
			halt('非法访问.!');
		}
	}

}
?>