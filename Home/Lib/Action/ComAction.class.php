<?php
class ComAction extends Action {
	public function login(){
		$this->display();
	}
	
	public function register(){
		$this->display();
	}
	
	public function dologin(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$res=M('Users')->where("username='{$username}' and password='{$password}'")->getField('id');
		if($res&&$res!=''){
			//登陆成功把用户信息写入session
			$_SESSION['loginuser']['uname']=$username;
			$_SESSION['loginuser']['uid']=$res;
			if($_POST['remberpass']==1){//记住密码  一定要加个'/'网站根 不然取不到
				setcookie('logusername',$username,time()+10000,'/');
				setcookie('loguserpass',$_POST['password'],time()+10000,'/');
			}else{//取消记住密码
				setcookie('logusername',$username,time()-1,'/');
				setcookie('loguserpass',$_POST['password'],time()-1,'/');
			}

			$this->success('登陆成功');
		}else{
			$this->error('登陆失败，请检查用户名和密码',"__APP__/Public/index");
		}
	}

	public function findpwd(){
		$this->display();
	}

	public function savepwd(){
		if(md5($_POST['code'])!=$_SESSION['verify']){
			$this->error('验证码不正确');
			exit();
		}
		if($_POST['newpwd']!=$_POST['newpwd2']){
			$this->error('两次密码不一致');
			exit();
		}
		$email = M('Users')->where('`username` = "'.$_POST['username'].'"')->find();
		if($email['email']==$_POST['email']){
			if(M('Users')->where('`username` = "'.$_POST['username'].'"')->save(array('password' => md5($_POST['newpwd'])))){
				$this->success('密码修改成功，请登录',U('Com/login'));
			}else{
				$this->error('密码修改失败');
			}
		}else{
			$this->error('用户名与邮箱不匹配');
		}
	}
}
?>