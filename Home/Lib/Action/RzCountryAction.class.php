<?php
class RzCountryAction extends Action{
	public function _initialize(){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);
		//友情链接
		$listflink=M("Flink")->where('isshow=1')->select();
		$this->assign("listflink",$listflink);
	}
	//全部认证;
	public function rzList(){
		$pid=$_GET["pid"];

		$emBassy = M('rzcategory');  //实例化ff数据库中的rzcategory表
		if($pid!=0){
		$name = $emBassy->where("id=".$pid)->select();  
		}else{
		$name = $emBassy->where("pid=0")->select();  //选出一级（pid=0），并存放到$name数组
		}
		foreach($name as $key=>$val){
			$rows = $emBassy->where("pid={$val['id']}")->select();  //对表rzcategory进行查询操作，选出二级栏目（pid=一级栏目id）
			$name[$key]['sublist']=$rows;
		}
		//$this->assign('name',$name);
		$this->assign('emb',$name);
		
		$this->display();
	}
	
	//常见认证,单证认证,各国使馆认证
	public function rzClass(){
		$qz = M('Rzcategory');
		$name = $qz->where("pid=0")->select();
		$id = $_GET['id'];
		$m=$qz->where("pid={$id}")->select();
		$this->assign('name',$name);
		$this->assign('msg',$m);
		$this->display();
	}
}
?>