<?php
/*----------------------------办理地点Action类(后台管理)--------------------------*/
class PlaceAction extends CommonAction{
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['name']  = array('like', "%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}
	/*------------添加页---------------*/
	public function add(){
		$this->display("add");
	}
	
	/*-----------执行添加--------------*/
	public function insert(){
		parent::insert();
	}
	
	/*------------修改页---------------*/
	public function edit(){
		//遍历所有news_type表数据
		$m = M("Place");
		//获取要修改的数据
		$id = $_REQUEST['id'];
		$vo = $m->where("id={$id}")->find();
		$this->assign('vo',$vo);
		//显示
		$this->display("edit");
	}
	
	/*-----------执行修改--------------*/
	public function update(){
		//获取id
		$id = $_REQUEST['id'];
		$name = $_REQUEST['name'];
		
		//创建数据库对象
		$m = M("Place");
		//封装条件
		$_POST['id'] = $id;
		$_POST['name'] = $name;
		$rel = $m->create();
		
		//执行修改
		if($rel){
			$m->save();
			$this->success("修改成功!");
		}else{
			$this->error("修改失败!");
		}
	}
	
	/*-----------执行删除--------------*/
	public function del(){
		parent::delete();
	}
	
}