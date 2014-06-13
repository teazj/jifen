<?php
class GiftClassAction extends Action{
	public  function index(){
		$gift_class = M ( 'giftClass' );
		
		//左侧导航信息;
		$res = $gift_class->where ( "fid=0" )->select ();
		foreach ( $res as $key => $val ) {
			$rows = $gift_class->where ( "fid={$val['id']}" )->select ();
			$res [$key] ['pro'] = $rows;
		}
		
		//品牌
		$box=array();  // 用来装数据;
		foreach($res as $key=>$val){
			foreach($val['pro'] as $k=>$v){
				$box[]=$v;
			}
		}
		
		
		//默认信息的查询;
		
		$boxs= fPage('gift',12);
		$this->assign('box_list',$boxs['list']);
		$this->assign('box_page',$boxs['page']);
		$this->assign('box',$box);
		$this->assign('list',$res);
		$this->display('no_x');
	}
	
	
	//根据条件筛选查询;
	public function findMe(){
		
		fPage($table, $num);
		$this->display('no_x');
	}
}
?>