<?php
class GlobalAction extends Action{
	Public function _initialize() {
		import("ORG.Util.Cart");				
		$this->userID =session('userID');
		$this->cart = new Cart();
		$this->assign('cartCount', $_SESSION['cart']['total_num']);	
		$this->assign('cartbox',$_SESSION['cart']['goods_list']);	
	}
}