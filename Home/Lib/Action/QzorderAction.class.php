<?php
	class QzorderAction extends Action{
		//订单
		function index(){
			$_POST['total']=$_POST['price']*$_POST['num'];
			$this->assign('v',$_POST);
			$this->display('order');
			
		}
		//确认订单
		public function reorder(){
			$_POST['total']=$_POST['price']*$_POST['num'];
			$this->assign('vo',$_POST);
			$this->display('qr_order');
		}
		//生成订单
		public function tijiao(){
			$vo=$_POST['num']*$_POST['price'];
			$_POST['orderid']=date('YmdHis').mt_rand(0,1000000);
			$_POST['address']=$_POST['shen'].$_POST['shi'].$_POST['xian'].$_POST['xq'];
			$_POST['total']=$vo;
			$_POST['user_id']=$_SESSION['loginuser']['user_id']=1;
			$m=M('Qzorder');
			$order=$m->create();
			$i=$m->add();
			//添加订单详情
			$de=array();
			$de['price']=$_POST['price'];
			$de['num']=$_POST['num'];
			$de['sid']=$_POST['sid'];
			$de['gtime']=$_POST['gtime'];
			$de['place']=$_POST['place'];
			$de['oid']=$i;
			M('QzorderDetail')->add($de);
			//商品售出数量增加
			$condition['id']=$_POST['sid'];
			M('Vista')->where($condition)->setInc('buys',$_POST['num']);
			$this->assign('cash',$vo);
			$this->assign('orderid',$_POST['orderid']);
			$this->display('tj_order');
		}
		//联系人信息修改
		public function infochange(){
			echo json_encode($_GET);
		}
		
	}
	