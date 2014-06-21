<?php
class GlobalAction extends Action{
	Public function _initialize() {
		import("ORG.Util.Cart");	
		$userinfo=session('FEUSER');			
		$this->userID =$userinfo['id'];
		$this->cart = new Cart();
		$this->assign('cartCount', $_SESSION['cart']['total_num']);	
		$this->assign('cartbox',$_SESSION['cart']['goods_list']);	
	}
}