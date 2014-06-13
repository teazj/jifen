<?php
class LoginAction extends Action{
	//ajax返回数据检测是否已存在用户名
	public function check_username(){
		$username=$_POST['username'];
		$res=M('User')->where("username='{$username}'")->find();
		if($res&&$res>0){
			echo 'no';
		}else{
			echo 'ok';
		}
	}

	//用户注册方法
	public function register(){
		if(md5($_POST['code'])!=$_SESSION['code']){
			$this->error('验证码不正确');
			exit();
		}
		$m=M('User');
		$_POST['addtime']=time();
		$_POST['regip']=$_SERVER['REMOTE_ADDR'];
		$_POST['password']=md5($_POST['password']);
		$_POST['username']=$_POST['username'];
		$m->create();
		$res=$m->add();
		if($res&&$res!=''){
			$_SESSION['loginuser']['uid']=$res;
			$_SESSION['loginuser']['uname']=$_POST['username'];//
			//把注册成功的用户id和用户名写入session登陆用户中
			//print_r($_SESSION);
			$this->success('注册成功');
		}else{
			$this->error('注册失败请稍后再试',"__APP__/Publc/dosign");
		}
	}

	public function login(){
		if(md5($_POST['code'])!=$_SESSION['code']){
			$this->error('验证码不正确');
			exit();
		}
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$res=M('User')->where("username='{$username}' and password='{$password}'")->getField('id');
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

	public function logout(){
		unset($_SESSION['loginuser']);
		$this->success('退出成功');
	}

}
?>