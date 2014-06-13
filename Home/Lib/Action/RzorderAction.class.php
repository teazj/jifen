<?php
	class RzorderAction extends Action{
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
			$m=M('Rzorder');
			$m->create();
			$m->add();
			//商品售出数量增加
			$condition['id']=$_POST['sid'];
			M('Rzvista')->where($condition)->setInc('buys',$_POST['num']);
			$this->assign('cash',$vo);
			$this->assign('orderid',$_POST['orderid']);
			$this->display('tj_order');
		}
		//联系人信息修改
		public function infochange(){
			echo json_encode($_GET);
		}
		
	}
	