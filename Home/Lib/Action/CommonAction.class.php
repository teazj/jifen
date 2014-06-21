<?php
header('Content-Type:text/html;charset=utf-8');
class CommonAction extends Action {
	/**
	 * 
	 * 页面权限判断;
	 */
	public function _initialize() {
		if(!session('FEUSER') || session('FEUSER')==''){
			$this->redirect('Login/login');
		}
	}
	
	
}
?>