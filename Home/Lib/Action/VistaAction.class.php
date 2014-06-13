<?php
//签证首页的国家详情页
class VistaAction extends CommonAction{
	public function index(){
		if(!empty($_GET['id'])){
		$vista=D('Vista');
		$condition['pid']=$_GET['id'];
		$vcate=M()->query("select id,catename from vcate where id in(select vid from vista where vid>0 and pid={$_GET['id']})");
		$this->assign('vcate',$vcate);
		import("ORG.Util.Page");
			if(empty($_GET['vid'])){
				$count= $vista->where($condition)->count();
				$Page= new Page($count,2);
				$show = $Page->show();
				$vo=$vista->relation(true)->where($condition)->order('vid asc')->limit($Page->firstRow.','.$Page->listRows)->select();
			}else{
				$condition['vid']=$_GET['vid'];
				$count= $vista->where($condition)->count();
				$Page= new Page($count,2);
				$show = $Page->show();
				$vo=$vista->relation(true)->where($condition)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
				}
		$this->assign('vo',$vo);
		$this->assign('page',$show);
		$this->display();
		return;
		}else{
			$vista=D('Vista');
			//判断关键字是否为空
			if(!empty($_REQUEST['keywords'])){
				$where['mian']  = array('like', "%{$_REQUEST['keywords']}%");
				$where['need']  = array('like', "%{$_REQUEST['keywords']}%");
				$where['vname']  = array('like',"%{$_REQUEST['keywords']}%");
				$where['_logic'] = 'or';
				$vo=$vista->where($where)->order('vid desc')->select();
				if($vo){
					$v=$vista->where($where)->getField("pid");
					$_GET['id']=$v;
					$this->index();
				}
			}else{
				echo "ss";
			}
		}
	}
}