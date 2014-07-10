<?php
class HelpAction extends Action{
	public function help(){
		$id = $_GET['id']?$_GET['id']:1;
		$content = M('Help_list')->where('id='.$id.' and status = 2')->find();
		if(!$content){
			$this->error('该页已禁用');
		}
		$this->assign('content',$content);
		$this->display();
	}
}