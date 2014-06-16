<?php
//节点信息管理Action

class Rbac_nodeAction extends CommonAction{
	/*--------封装搜素条件-----------*/
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['name']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['mname']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['aname']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}

}