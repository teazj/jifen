<?php
/*---------------------------显示首页类-------------------------------------*/
class QzincAction extends 	Action {

	/*------------------显示头部页面---------------------*/
	function header(){
		$this->display("Qzinc:header");
	}
	
	/*------------------显示NAV页面---------------------*/
	function nav(){
		$this->display("Qzinc:nav");
	}
	
	/*------------------显示菜单栏页面-----------------------*/
	// function menu(){
		// $model=M("Goods_type");
			// $list =$model->select();
			// $res=self::list_to_tree($list,'id','pid');
			// $this->assign("list",$res);
			// dump($res);
			// $this->display("Qzinc:menu");
	// }
		
		// static function list_to_tree($list, $pk='id',$pid = 'pid',$child = '_child',$root=0) {
		// // 创建Tree
		// $tree = array();
		// if(is_array($list)) {
			// // 创建基于主键的数组引用
			// $refer = array();
			// foreach ($list as $key => $data) {
				// $refer[$data[$pk]] =& $list[$key];
			// }
			
			// foreach ($list as $key => $data) {
				// // 判断是否存在parent
				// $parentId = $data[$pid];
				// if ($root == $parentId) {
					// $tree[] =& $list[$key];
				// }else{
					// if (isset($refer[$parentId])) {
						// $parent =& $refer[$parentId];
						// $parent[$child][] =& $list[$key];
					// }
				// }
			// }
		// }
		// return $tree;
	// }

	/*------------------显示尾部页面-----------------------*/
	function footer(){
		//友情链接
		$flink=M('Flink')->where('isshow=1')->select();
		$this->assign('flink',$flink);
		$this->display("Qzinc:footer");
	}
	
	/*------------------加载文件页面--------------------------*/
	public function loadfile($filename=null){
		if(!empty($filename)){
			$this->display($filename);
		}else{
			$this->display("loadfile");
		}
	}
	
	/*----------------综合加载页面--------------------*/
	public function init($filename=null){
		$this->header();
		$this->loadfile($filename);
		$this->nav();
	}
	
}