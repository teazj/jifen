<?php
class PpttypeAction extends CommonAction{
	//轮播图片位置
	//封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keywords'])){
			$where['url']  = array('like', "%{$_REQUEST['keywords']}%");
			$where['title']  = array('like',"%{$_REQUEST['keywords']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}
}
?>