<?php
class RzCountryAction extends Action{
	//全部认证;
	public function rzList(){
	$pid=$_GET["pid"];
	
	
		$emBassy = M('rzcategory');  //实例化ff数据库中的rzcategory表
		if($pid!=0){
		$name = $emBassy->where("id=".$pid)->select();  
		}else{
		$name = $emBassy->where("pid=0")->select();  //选出一级（pid=0），并存放到$name数组
		}
	//$name1 = $emBassy->where("pid=1")->select(); 
	//$name2 = $emBassy->where("pid=2")->select(); 
//$name3 = $emBassy->where("pid=3")->select(); 
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
		$emBassy = M('rzcategory');
		$name = $emBassy->where("fid=0")->select();
		$id = $_GET['id'];
		if($id == 6){
			$abc = alphabets();
			foreach($abc as $key=>$val){
				$rows = $emBassy->query("SELECT * FROM `rz_rzcategory` where piny = '{$val}'");
				$abc[$key]=$rows;	
			}
			$this->assign('abc',$abc);
			$this->assign('name',$name);
			$this->display('gg_aut');
			return false;			
		}else{
			$msg = $emBassy->where("fid={$id}")->select();
		}
		$this->assign('id',$id);
		$this->assign('name',$name);
		$this->assign('msg',$msg);
		$this->display();
	}
	
	//详情页
	public function rzMain(){
		$id = $_GET['id'];
		$emBassy = M('rzCountry');
		$res = $emBassy->where("eid={$id}")->find();
		$adr = M('rzAddress');
		$adr = $adr->select();
		
		//评论
		$pl = M('rz_pj');
		$num = $pl->where("eid={$id}")->count();
		$box = fPage('rz_pj', 5,"eid={$id}");
		$this->assign('list',$box['list']);
		$this->assign('page',$box['page']);
		$this->assign("num",$num);
		$this->assign('adr',$adr);
		$this->assign('res',$res);
		$this->display();
	}
}
?>