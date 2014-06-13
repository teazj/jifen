<?php
class QzCountryAction extends Action{
	//全部签证;
	public function qzList(){
		$qz = M('Category');
		$name = $qz->where("pid=0")->select();
		foreach($name as $key=>$val){
			$rows = $qz->where("pid={$val['id']}")->select();
			$name[$key]['sublist']=$rows;
		}
		$this->assign('name',$name);
		$this->display();
	}
	
	//常见认证,单证认证,各国使馆认证
	public function qzClass(){
		$qz = M('Category');
		$name = $qz->where("pid=0")->select();
		$id = $_GET['id'];
			$m=$qz->where("pid={$id}")->select();
			$this->assign('name',$name);
			$this->assign('msg',$m);
			$this->display();
	}
}
?>