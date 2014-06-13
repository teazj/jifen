<?php
class DownDataAction extends Action{
	public function download(){
		$boxs = fPage('rzDownFile', 1);
		$this->assign('files',$boxs['list']);
		$this->assign('page',$boxs['page']);
		$this->display();
	}
}
?>