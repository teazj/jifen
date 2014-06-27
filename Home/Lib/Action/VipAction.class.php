<?php
//会员中心
class VipAction extends CommonAction{
	
	//个人信息
	public function index(){
		$condition['id']=$_SESSION['FEUSER']['id'];
		$con['uid']=$_SESSION['FEUSER']['id'];
		$m=M('Users')->where($condition)->find();

		$rule=M('InitSystem')->getField('rule');//查询积分规则值
		$ms=M('InteLog')->where($con)->field('billInte,money,gInte')->select();//奖励积分、充值数、消费的积分
		foreach($ms as $v){
			$m['jifen']+=$v['billInte']+$v['money']*$rule-$v['gInte'];//当前总的积分=奖励积分+充值数*积分规则值-消费的积分
		}
		
		//会员信息
		$userInfo=M("Users_info")->where('users_id='.$_SESSION['FEUSER']['id'])->find();
		$this->assign('userinfo',$userInfo);
		//echo M("Users_info")->getLastSql();
		//dump($userInfo);
		if($m['point']<0){
			$m['point']=0;
		}
		$this->assign('v',$m);
		$this->display('Vip_persion');
	}
		
	//个人信息修改
	public function userinfo(){
			$condition['user_id']=$_SESSION['FEUSER']['id'];
			$m=M('Users_info')->where($condition)->find();
			//dump($m);
			// $rule=M('InitSystem')->getField('rule');//查询积分规则值
			// $ms=M('InteLog')->where($con)->field('billInte,money,gInte')->select();//奖励积分、充值数、消费的积分
			// foreach($ms as $v){
				// $m['jifen']+=$v['billInte']+$v['money']*$rule-$v['gInte'];//当前总的积分=奖励积分+充值数*积分规则值-消费的积分
			// }
			$this->assign('v',$m);
			$this->display('Vip_xperson');
		}
		
	//执行个人信息的修改
		public function userInfoUpdate(){
			$con['id']=$_POST['id'];
			$m=M('Users_info');
			$m->create();
			$i=$m->where($con)->save();
			//echo $m->getLastSql();die;
			if($i===FALSE){
				$this->error("更新个人信息失败");
			}else{
				$this->success("更新个人信息成功");
			}
		}
	
	//密码修改
	public function pwd(){
		$this->display('Vip_mm');
	}
	
	//验证原密码
	public function checkpwd(){
		$con['id']=$_POST['id'];
		$m=M('Users')->where($con)->getField('password');
		if($m!==md5($_POST['password'])){
			echo "error";
		}else{
			echo "true";
		}
	}
	
	//执行密码修改
	public function pwdUpdate(){
		$m=M('Users');
		$condition['id']=$_SESSION['FEUSER']['id'];
		$datas=$m->create();
		$data['password']=md5($_POST['upwd']);
		$i=$m->where($condition)->save($data);
		if($i){
			$this->redirect('Index/Vip/pwd');
		}else{
			$this->error("修改密码失败!");
		}
	}
	//新订单状态查询
	public function order(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		$condition['status']=0;
		$m=M('Qzorder')->where($condition)->select();
		$id=array();//存放订单对应的商品id
		foreach($m as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$condition['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($condition)->select();
		foreach($res as $key=>$v){
			$m[$key]['entimes']=$v['entimes'];
			$m[$key]['workday']=$v['workday'];
			$m[$key]['vday']=$v['vday'];
			$m[$key]['isface']=$v['isface'];
			$m[$key]['name']=$v['name'];
			$m[$key]['catename']=$v['catename'];
		}
			$this->assign('orderinfo',$m);//订单信息
			$this->display('Vip_order');
		}
	
	
	//订单详情
	public function qzdetails(){
		$condition['id']=$_GET['id'];
		$m=M('Qzorder')->where($condition)->find();
		//查询商品详情
		$con['id']=$m['sid'];
		$res=D('Vista')->relation(true)->where($con)->find();
			$m['entimes']=$res['entimes'];
			$m['workday']=$res['workday'];
			$m['vday']=$res['vday'];
			$m['isface']=$res['isface'];
			$m['name']=$res['name'];
			$m['catename']=$res['catename'];
			$this->assign('v',$m);//订单信息
			$this->display();
	}

	//订单详情
	public function rzdetails(){
		$condition['id']=$_GET['id'];
		$m=M('Rzorder')->where($condition)->find();
		//查询商品详情
		$con['id']=$m['sid'];
		$res=D('Vista')->relation(true)->where($con)->find();
			$m['entimes']=$res['entimes'];
			$m['workday']=$res['workday'];
			$m['vday']=$res['vday'];
			$m['isface']=$res['isface'];
			$m['name']=$res['name'];
			$m['catename']=$res['catename'];
			$this->assign('v',$m);//订单信息
			$this->display();
	}
	
	//积分订单详情
	public function jfdetails(){
		$condition['id']=$_GET['id'];
		$m=M('Orders')->where($condition)->find();
		//查询商品详情
		// $con['id']=$m['sid'];
		// $res=D('Vista')->relation(true)->where($con)->find();
		// $m['entimes']=$res['entimes'];
		// $m['workday']=$res['workday'];
		// $m['vday']=$res['vday'];
		// $m['isface']=$res['isface'];
		// $m['name']=$res['name'];
		// $m['catename']=$res['catename'];
		$this->assign('v',$m);//订单信息
		$this->display();
	}
	
	//签证取消订单
	public function qzcancel(){
		$con['id']=$_GET['id'];
		M('Qzorder')->where($con)->setField('status',1);
	}
	
	//认证取消订单
	public function rzcancel(){
		$con['id']=$_GET['id'];
		M('Rzorder')->where($con)->setField('status',1);
	}

	//积分取消订单
	public function jfcancel(){
		$con['id']=$_GET['id'];
		M('Orders')->where($con)->setField('status',1);
	}
		
	//所有订单
	public function qzorder(){
		if(isset($_GET['status'])){
			$condition['status']=$this->_get('status');
		}
		
		$condition['user_id']=$_SESSION['FEUSER']['id'];
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$m=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		// $id=array();//存放订单对应的商品id
		// foreach($m as $v){
			// $id[]=$v['sid'];
		// }
		// //查询商品详情
		// $con['id']=array('in',$id);
		// $res=D('Vista')->relation(true)->where($con)->limit($Page->firstRow.','.$Page->listRows)->select();
		// foreach($res as $key=>$v){
			// $m[$key]['entimes']=$v['entimes'];
			// $m[$key]['workday']=$v['workday'];
			// $m[$key]['vday']=$v['vday'];
			// $m[$key]['isface']=$v['isface'];
			// $m[$key]['name']=$v['name'];
			// $m[$key]['catename']=$v['catename'];
		// }
		//dump($m);
		$this->assign('page',$show);
		$this->assign('orderinfo',$m);//所有订单信息
		$this->display('Vip_qzorder');
	}
		
	//认证订单
	public function rzorder(){
		if(isset($_GET['status'])){
			$condition['status']=$this->_get('status');
		}
		
		$condition['user_id']=$_SESSION['FEUSER']['id'];
		import('ORG.Util.Page');
		$count =M('Rzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$m=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		// $id=array();//存放订单对应的商品id
		// foreach($m as $v){
			// $id[]=$v['sid'];
		// }
		// //查询商品详情
		// $con['id']=array('in',$id);
		// $res=D('Vista')->relation(true)->where($con)->limit($Page->firstRow.','.$Page->listRows)->select();
		// foreach($res as $key=>$v){
			// $m[$key]['entimes']=$v['entimes'];
			// $m[$key]['workday']=$v['workday'];
			// $m[$key]['vday']=$v['vday'];
			// $m[$key]['isface']=$v['isface'];
			// $m[$key]['name']=$v['name'];
			// $m[$key]['catename']=$v['catename'];
		// }
		//dump($m);
		$this->assign('page',$show);
		$this->assign('orderinfo',$m);//所有订单信息
		$this->display('Vip_qzorder');
	}

	//认证订单
	public function jforder(){
		if(isset($_GET['status'])){
			$condition['status']=$this->_get('status');
		}
		
		$condition['uid']=$_SESSION['FEUSER']['id'];
		import('ORG.Util.Page');
		$count =M('Orders')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$m=M('Orders')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('page',$show);
		$this->assign('orderinfo',$m);//所有订单信息
		$this->display('Vip_jforder');
	}
	
	//取消的订单
	public function cancelorder(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		$condition['status']=1;
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$cancel=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$id=array();//存放订单对应的商品id
		foreach($cancel as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$con['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($con)->select();
		foreach($res as $key=>$v){
			$cancel[$key]['entimes']=$v['entimes'];
			$cancel[$key]['workday']=$v['workday'];
			$cancel[$key]['vday']=$v['vday'];
			$cancel[$key]['isface']=$v['isface'];
			$cancel[$key]['name']=$v['name'];
			$cancel[$key]['catename']=$v['catename'];
		}
		$this->assign('page',$show);
		$this->assign('cancel',$cancel);//取消的订单信息
		$this->display();
	}
	
	//已付款订单
	public function readyorder(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		$condition['status']=2;
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$ready=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$id=array();//存放订单对应的商品id
		foreach($ready as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$con['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($con)->select();
		foreach($res as $key=>$v){
			$ready[$key]['entimes']=$v['entimes'];
			$ready[$key]['workday']=$v['workday'];
			$ready[$key]['vday']=$v['vday'];
			$ready[$key]['isface']=$v['isface'];
			$ready[$key]['name']=$v['name'];
			$ready[$key]['catename']=$v['catename'];
		}
		$this->assign('page',$show);
		$this->assign('ready',$ready);//已付款的订单信息
		$this->display();
	}
	
	//已成功订单
	public function okorder(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		$condition['status']=3;
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$ok=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$id=array();//存放订单对应的商品id
		foreach($ok as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$con['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($con)->select();
		foreach($res as $key=>$v){
			$ok[$key]['entimes']=$v['entimes'];
			$ok[$key]['workday']=$v['workday'];
			$ok[$key]['vday']=$v['vday'];
			$ok[$key]['isface']=$v['isface'];
			$ok[$key]['name']=$v['name'];
			$ok[$key]['catename']=$v['catename'];
		}
		$this->assign('page',$show);
		$this->assign('ok',$ok);//已成功的订单信息
		$this->display();
	}
	
	//删除
	public function delete(){
		$id=$_GET['id'];
		$i=M('Address')->delete($id);
		if($i){
			$this->redirect('Index/Vip/address');
		}else{
			$this->error("删除失败！");
		}
	}
	
	//兑换积分
	public function exchange(){
		$condition['uid']=$_SESSION['FEUSER']['id'];
		import('ORG.Util.Page');
		$count =M('inte.Inte_log',' ')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$m=M('inte.Inte_log',' ')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->display('Vip_exchange');
	}
	
	//
	
	
	//配送地址显示
	public function address(){
		$m=M('Address');
		$condition['userid']=$_SESSION['FEUSER']['id'];
		$re=$m->where($condition)->select();
		
		$this->assign('address',$re);
		$this->display('Vip_dz');
	}
	
	//添加配送地址
	public function addaddress(){
		$this->display('Vip_jdz');
	}
	
	//执行配送地址添加
	public function doaddress(){
		$m=M('Address');
		$_POST['shengfen']=$_POST['sheng'];
		$m->create();
		$i=$m->add();
		if($i && $i>0){
			//选为默认的时候让其他的地址为0
			if($_POST['ismr']){
				$m->where("userid=".$_POST['userid'].' and id!='.$i)->save(array('ismr'=>0));
			}
			
			$this->redirect('Index/Vip/address');
		}else{
			$this->error("添加失败!");
		}
	}
}