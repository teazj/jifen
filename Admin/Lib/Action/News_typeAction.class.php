<?php
/*----------------------------新闻类型Action类(后台管理)--------------------------*/
class News_typeAction extends CommonAction{
	/*---------显示新闻类型------------*/
	public function index(){
		$m = M("news_type");
		
		//封装排序条件
		$order = " id asc ";
		if(!empty($_REQUEST['_order'])){
			$order = $_REQUEST['_order']." ".$_REQUEST['_sort'];
		}else{
			$order = "";
		}
		
		//封装搜索条件
		if(isset($_REQUEST['keyword'])){
			$keyword = " concat(id,tname) like '%{$_REQUEST['keyword']}%' ";
		}else{
			$keyword = "";
		}
		
		//分页处理(ThinkPHP部分)
		import('ORG.Util.Page');// 导入分页类
		$count = $m->where($keyword)->count();// 总数据条数
		$numPerPage = isset($_REQUEST['numPerPage'])?$_REQUEST['numPerPage']:10;//每页显示多少条数据
		$currentPage = isset($_REQUEST['pageNum'])?$_REQUEST['pageNum']+0:1;//当前页
		$Page = new Page($count,$numPerPage);// 实例化分页类 传入总记录数和每页显示的记录数
		
		//封装分页信息(dwz模板部分)
		$this->assign("totalCount",$count);	//总数据条数
		$this->assign("numPerPage",$numPerPage);	//每页显示多少条数据
		$this->assign("currentPage",$currentPage);	//当前页
		
		//封装limit条件
		$limit = ($currentPage-1)*$numPerPage.','.$numPerPage;
		
		$news_type = $m->field('id,tname')->where($keyword)->order($order)->limit($limit)->select();
		$this->assign("news_type",$news_type);
		$this->display("index");
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
		$m = M("news_type");
		$news_type_all = $m->select();
		$this->assign("news_type_all",$news_type_all);
		
		//获取要修改的数据
		$id = $_REQUEST['tid'];
		$news_type = $m->where("id={$id}")->find();
		$this->assign('news_type',$news_type);
		
		//显示
		$this->display("edit");
	}
	
	/*-----------执行修改--------------*/
	public function update(){
		//获取id
		$id = $_REQUEST['type'];
		$tname = $_REQUEST['title'];
		// dump($_REQUEST);
		
		//创建数据库对象
		$m = M("news_type");
		
		//封装条件
		$_POST['id'] = $id;
		$_POST['tname'] = $tname;
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