<?php
class QzCountryAction extends Action{
	public function _initialize(){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);
	}
	//全部签证;
	public function qzList(){
		$qz = M('Category');
		$name = $qz->where("pid=0")->select();
		//循环里面查询，傻逼
		foreach($name as $key=>$val){
			$rows = $qz->where("pid={$val['id']}")->select();
			$name[$key]['sublist']=$rows;
		}
		$this->assign('name',$name);
		$this->display();
	}
	
	//常见签证,单证签证,各国使馆签证
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