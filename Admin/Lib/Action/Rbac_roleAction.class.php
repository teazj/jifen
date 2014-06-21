<?php
/*---------------------------权限分配角色信息管理Action类-------------------------*/
class Rbac_roleAction extends CommonAction{

	/*--------封装搜素条件-----------*/
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['name']  = array('like',"%{$_REQUEST['keyword']}%");
			$map = $where;
		}
	}
	/*---------------浏览当前角色的节点信息----------------*/
	public function nodelist(){
		//1. 获取当前角色信息
		$rid = $_GET['rid'];
		$role = M("Rbac_role")->find($rid); 
		//当前角色信息
		$this->assign("role",$role);
		//2. 获取所有节点信息
		$list = M("Rbac_node")->select();
		//所有节点信息
		$this->assign("list",$list);
		//3. 获取当前角色的节点信息
		$nodelist = M("Rbac_role_node")->where("rid={$rid}")->select();
		//对获取的结果进行处理
		$mynode=array();
		foreach($nodelist as $v){
			$mynode[]=$v['nid'];
		}
		//4.显示模版
		$this->assign("mynode",$mynode);
		$this->display("nodelist");
	}
	
	/*--------------------执行角色信息的保存--------------*/
	public function savenode(){
		//获取被操作的角色信息
		$rid = $_POST['rid'];
		//删除当前角色的所有节点信息
		$m = M("Rbac_role_node");
		$m->where("rid={$rid}")->delete();
		
		//将当前选择的节点信息添加上去
		if(!empty($_POST['nid'])){
			foreach($_POST['nid'] as $nid){
				$data['rid']=$rid;
				$data['nid']=$nid;
				$m->add($data);
			}
		}
		$this->success("修改成功！");
	}
}