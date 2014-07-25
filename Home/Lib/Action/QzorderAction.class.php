<?php
	class QzorderAction extends Action{
		//登录的判断
		public function _initialize() {
			if(!session('FEUSER') || session('FEUSER')==''){
				$this->redirect('Login/login');
			}
			//友情链接
			$listflink=M("Flink")->where('isshow=1')->select();
			$this->assign("listflink",$listflink);
		}
		//订单
		function index(){
			$_POST['total']=$_POST['price']*$_POST['num'];
			$this->assign('v',$_POST);
			$this->assign('user_info',session('FEUSER'));
			$this->display('order');
			
		}
		//确认订单
		public function reorder(){
			$_POST['total']=$_POST['price']*$_POST['num'];
			$this->assign('vo',$_POST);
			$this->assign('user_info',session('FEUSER'));
			$this->display('qr_order');
		}
		//生成订单
		public function tijiao(){
			$vo=$_POST['num']*$_POST['price'];

			$de=array();
			$user_info = session('FEUSER');
			$de['user_id'] = $user_info['id'];
			$de['username'] = $_POST['username'];
			$de['phone'] = $_POST['phone'];
			$de['email'] = $_POST['email'];
			$de['qq'] = $_POST['qq'];
			$de['use'] = $_POST['use'];
			$de['address'] = $_POST['shen'].$_POST['shi'].$_POST['xian'].$_POST['xq'];
			$de['vname'] = $_POST['vname'];
			$de['price'] = $_POST['price'];
			$de['num'] = $_POST['num'];
			// $de['userinfo'] = '';
			$de['sid'] = $_POST['sid'];
			$de['ctime'] = $_POST['gtime'];
			$de['place'] = $_POST['place'];
			$de['orderid'] = date('YmdHis').mt_rand(1000000,9999999);
			//应该有一个订单已提交的判断
			M('Qzorder')->add($de);
			//商品售出数量增加
			$condition['id']=$_POST['sid'];
			M('Vista')->where($condition)->setInc('buys',$_POST['num']);
			$this->assign('cash',$vo);
			$this->assign('orderid',$de['orderid']);
			$this->display('tj_order');
		}
		//联系人信息修改
		public function infochange(){
			echo json_encode($_GET);
		}
		
	}
	