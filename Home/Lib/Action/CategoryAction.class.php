<?php
//签证首页的地区
class CategoryAction extends CommonAction{
	public function index(){
		   $category = M('Category');
			$list =  $category->select();
			$res=self::list_to_tree($list,'id','pid');
			$this->assign('res',$res);
			$this->display("Index:index");
		}

	static function list_to_tree($list, $pk='id',$pid = 'pid',$child = '_child',$root=0) {
		// 创建Tree
		$tree = array();
		if(is_array($list)) {
			// 创建基于主键的数组引用
			$refer = array();
			foreach ($list as $key => $data) {
				$refer[$data[$pk]] =& $list[$key];
			}
			
			foreach ($list as $key => $data) {
				// 判断是否存在parent
				$parentId = $data[$pid];
				if ($root == $parentId) {
					$tree[] =& $list[$key];
				}else{
					if (isset($refer[$parentId])) {
						$parent =& $refer[$parentId];
						$parent[$child][] =& $list[$key];
					}
				}
			}
		}
		return $tree;
	}
}