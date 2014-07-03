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
	
	//验证码;
	Public function verify() {
		import ( 'ORG.Util.Image' );
		Image::buildImageVerify ();
	}
	
	
	//用户注册方法
	public function register(){
		if($_POST['code']!=$_SESSION['code']){
			$this->error('验证码不正确');
			exit();
		}
		$m=M('Users');

		$_POST['logip']=get_client_ip();
		$_POST['password']=md5($_POST['password']);
		$_POST['username']=$_POST['username'];
		$username_res=$m->where("username='".$_POST['username']."'")->limit(1)->find();
		if(!is_array($username_res)){
			$res=$m->add($_POST);
			if($res&&$res!=''){
				//查询数据库将该用户的信息存入session中
				session("FEUSER",$m->where('id='.$res)->find());
				
				//往users_info表中插入一条记录
				$data['users_id']=$res;
				$data['email']=$_POST['email'];
				M("Users_info")->add($data);
				$this->success('注册成功',U('Vip/index'));
			}else{
				$this->error('注册失败请稍后再试',U('Com/register'));
			}
		}else{
			$this->error('用户名不能重复!',U('Com/register'));
		}
	}

	public function login(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$res=M('Users')->where("username='{$username}' and password='{$password}'")->find();
		if($res&&$res!=''){
			//登陆成功把用户信息写入session
			session("FEUSER",M('Users')->where('id='.$res['id'])->find());
			if($_POST['remberpass']==1){//记住密码  一定要加个'/'网站根 不然取不到
				cookie('username',$username,3600);
				cookie('password',$_POST['password'],3600);
			}else{//取消记住密码
				cookie('username',null);
				cookie('password',null);
			}
			$this->success('登陆成功',U('Vip/index'));
		}else{
			$this->error('登陆失败，请检查用户名和密码',U('Com/login'));
		}
	}

	public function logout(){
		session("FEUSER",null);
		$this->success('退出成功',U('Index/index'));
	}

}
?>