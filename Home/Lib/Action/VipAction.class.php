<?php
//会员中心
class VipAction extends CommonAction{
	//个人信息
	public function index(){
			$condition['id']=$_SESSION['index']['user_id'];
			$con['uid']=$_SESSION['index']['user_id'];
			$m=M('User')->where($condition)->find();
			//dump($m);
			$rule=M('InitSystem')->getField('rule');//查询积分规则值
			$ms=M('InteLog')->where($con)->field('billInte,money,gInte')->select();//奖励积分、充值数、消费的积分
			foreach($ms as $v){
				$m['jifen']+=$v['billInte']+$v['money']*$rule-$v['gInte'];//当前总的积分=奖励积分+充值数*积分规则值-消费的积分
			}
			$this->assign('v',$m);
			$this->display('Vip_persion');
		}
		
	//个人信息修改
	public function userinfo(){
			$condition['id']=$_SESSION['index']['user_id'];
			$con['uid']=$_SESSION['index']['user_id'];
			$m=M('User')->where($condition)->find();
			//dump($m);
			$rule=M('InitSystem')->getField('rule');//查询积分规则值
			$ms=M('InteLog')->where($con)->field('billInte,money,gInte')->select();//奖励积分、充值数、消费的积分
			foreach($ms as $v){
				$m['jifen']+=$v['billInte']+$v['money']*$rule-$v['gInte'];//当前总的积分=奖励积分+充值数*积分规则值-消费的积分
			}
			$this->assign('v',$m);
			$this->display('Vip_xperson');
		}
		
	//执行个人信息的修改
		public function userInfoUpdate(){
			$con['id']=$_POST['uid'];
			$m=M('User');
			$m->create();
			dump($_POST);
			$i=$m->where($con)->save();
			if($i>0){
				//$this->userinfo();
			}else{
				//$this->userinfo();
			}
		}
	
	//密码修改
	public function pwd(){
		$this->display('Vip_mm');
	}
	
	//验证原密码
	public function checkpwd(){
		$con['id']=$_POST['id'];
		$m=M('User')->where($con)->getField('upwd');
		if($m!==md5($_POST['upwd'])){
			echo "error";
		}else{
			echo "true";
		}
	}
	
	//执行密码修改
	public function pwdUpdate(){
		$m=M('User');
		$condition['id']=$_SESSION['index']['user_id'];
		$datas=$m->create();
		$data['upwd']=md5($datas['upwd']);
		$i=$m->where($condition)->save($data);
		if($i){
			$this->redirect('Index/Vip/pwd');
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
	public function details(){
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
	
	//取消订单
	public function cancel(){
		$con['id']=$_GET['id'];
		M('Qzorder')->where($con)->setField('status',1);
		$this->order();
	}
		
	//所有订单
	public function myorder(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$m=M('Qzorder')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		$id=array();//存放订单对应的商品id
		foreach($m as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$con['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($con)->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($res as $key=>$v){
			$m[$key]['entimes']=$v['entimes'];
			$m[$key]['workday']=$v['workday'];
			$m[$key]['vday']=$v['vday'];
			$m[$key]['isface']=$v['isface'];
			$m[$key]['name']=$v['name'];
			$m[$key]['catename']=$v['catename'];
		}
			$this->assign('page',$show);
			$this->assign('orderinfo',$m);//所有订单信息
			$this->display('Vip_myorder');
		}
		
	//待付款订单
	public function daiorder(){
		$condition['user_id']=$_SESSION['index']['user_id'];
		$condition['status']=0;
		import('ORG.Util.Page');
		$count =M('Qzorder')->where($condition)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$dai=M('Qzorder')->where($condition)->select();
		$id=array();//存放订单对应的商品id
		foreach($dai as $v){
			$id[]=$v['sid'];
		}
		//查询商品详情
		$con['id']=array('in',$id);
		$res=D('Vista')->relation(true)->where($con)->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($res as $key=>$v){
			$dai[$key]['entimes']=$v['entimes'];
			$dai[$key]['workday']=$v['workday'];
			$dai[$key]['vday']=$v['vday'];
			$dai[$key]['isface']=$v['isface'];
			$dai[$key]['name']=$v['name'];
			$dai[$key]['catename']=$v['catename'];
		}
		$this->assign('page',$show);
		$this->assign('dai',$dai);//待付款订单信息
		$this->display();
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
		$i=M('UserAddress')->delete($id);
		if($i){
			$this->redirect('Index/Vip/address');
		}
	}
	//积分兑换
	public function exchange(){
		$this->display('Vip_exchange');
	}
	
	//配送地址显示
	public function address(){
		$m=M('UserAddress');
		$condition['uid']=$_SESSION['index']['user_id'];
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
		$m=M('UserAddress');
		$_POST['address']=$_POST['shen'].$_POST['shi'].$_POST['xian'].$_POST['xq'];
		$m->create();
		$i=$m->add();
		if($i && $i>0){
			$this->redirect('Index/Vip/address');
		}
	}
}