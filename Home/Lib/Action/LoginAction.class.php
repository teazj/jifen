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
		$email_res=$m->where("email='".$_POST['email']."'")->limit(1)->find();
		if(!is_array($username_res)){
			if(!is_array($email_res)){
				$res=$m->add($_POST);
				if($res&&$res!=''){
					//查询数据库将该用户的信息存入session中
					session("FEUSER",$m->where('id='.$res)->find());
					
					//往users_info表中插入一条记录
					$data['users_id']=$res;
					$data['email']=$_POST['email'];
					M("Users_info")->add($data);
					
					//发送邮件
					$param="reg|".$res;
					$url=U("/Login/active_email",'code='.base64_encode($param));
					$subject="邮箱激活";
					$message="激活邮箱，开始您速格服务网的体验之游！<br/>";
					$message.="<a href='".$url."' style='height:30px;display:block;width:100px;background:blue;'>激活邮箱</a>";
					$message.="或点击链接<a href='".$url."'>".$url."</a><br/>";
					$message.="非常感谢您对我们的关心和支持！";
					
					$recipients= $_POST['email'];
					$this->send_register($subject, $message, $recipients,TRUE);
					
					$this->success('注册成功',U('Vip/index'));
				}else{
					$this->error('注册失败请稍后再试',U('Com/register'));
				}
			}else{
				$this->error('邮箱不能重复!',U('Com/register'));
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
			$this->success('登录成功',U('Vip/index'));
		}else{
			$this->error('登录失败，请检查用户名和密码',U('Com/login'));
		}
	}

	public function logout(){
		session("FEUSER",null);
		$this->success('退出成功',U('Index/index'));
	}
	
	/**
	 * 注册发送邮件
	 * $subject  邮件主题
	 * $message	 邮件内容
	 * $recipients	收件人邮箱
	 */
	 function send_register($subject,$message,$recipients,$html){
	 	if(!$subject || !$message || !$recipients || !$html ){
	 		return false;
	 	}else{
	 		return mysendMail($subject, $message, $recipients, $cc = '', $bcc = '', $replyTo = '', $mail_from = '', $mail_fromname = '', $html = $html, $attachment = '');
	 	}
	 }
	 
	 function active_email(){
	 	$code=$this->_get('code');
		$arr=explode('|', base64_decode($code));
		if($arr[0]=='reg' && $arr[1]==$_SESSION['FEUSER']['id']){
			$info= M("Users")->where('id='.$_SESSION['FEUSER']['id'])->find();
			
			if($info['status']){
				$this->error("邮箱已激活",U('Vip/index'));
			}else{
				$res= M("Users")->where("id=".$arr[1])->save(array('email_status'=>1));
				$this->success("邮箱激活成功",U('Vip/index'));
			}
		}else{
			$this->error("你还未登录,请先登录!",U('Com/login'));
		}
	 }

}
?>