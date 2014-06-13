<?php
class ShopIndexAction extends Action{
	public function index(){
		$category = M('giftClass');
		$getTree = tree($list);
		$this->display();
	}
}
?>