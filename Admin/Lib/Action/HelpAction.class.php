<?php

//帮助中心类
class HelpAction extends Action{
	
	//浏览帮助列表
	public function index(){
		//判断法排序条件
		$order="status asc";
		$where=" 1=1";
		if(!empty($_REQUEST['title'])){
				$where.=" and title like '%{$_REQUEST['title']}%'";
		}
		if(!empty($_REQUEST['_order'])){
				$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
		}
		$m = M("help_list");
		//分页处理
		$_GET['p']=$_REQUEST['pageNum']+0;	//转换参数,实现当前页号的传递
		$numPerPage=isset($_REQUEST['numPerPage'])?$_REQUEST['numPerPage']:10;// 封装页大小
		import('ORG.Util.Page');	// 导入分页类
		$count = $m->count($where);		// 查询满足要求的总记录数
		$Page = new Page($count,$numPerPage);	// 实例化分页类 传入总记录数和每页显示的记录数
		$this->assign("totalCount",$count);				//封装总数据条数
		$this->assign("numPerPage",$numPerPage);		//封装页大小
		$this->assign("pageNumShown",2);				//封装页码数
		$this->assign("currentPage",$_REQUEST['pageNum']);	//封装当前页
		$this->assign("list",$m->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select());
		$this->assign("arr",(array(1=>"启用",2=>"禁用")));
		$this->assign("arr_r",array(1=>'未启用',2=>'已启用'));
		$this->display("index");
	}
	
	//请求添加帮助列表
	public function add(){
		$this->display("add");
	}
	
	//执行添加
	public function insert(){
		$m = D("Help_list");
		$m->create();
		if($m->add()){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}
	
	//查看单个列表详情(可修改)
	public function edit(){
		$m = M("Help_list");
		$this->assign("find",$m->find($_GET['id']));
		$this->display("edit");
	}
	
	//执行修改
	public function update(){
		$m = M("help_list");
		$m->create();
		if($m->save()){
			$this->success("修改成功");
		}else{
			$this->error("您没有修改内容");
		}
	}
	
	//执行删除
	public function delete(){
		$m = M("help_list");
		if($m->delete($_GET['id'])){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	
	//执行启动帮助列表(显示到页面)
 	public function start(){
		$m = M("help_list");
		$res = $m->find($_GET['id']);
		if($res['status']==1){
			$res['status']=2;
		}else{
			$res['status']=1;
		}
		if($m->save($res)){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}
	
	
	
	//实现图片上传处理方法
	public function doUpload(){
		//准备给在线编辑器返回JSON格式数据
		$resinfo = array('err'=>'','msg'=>'');
		import('ORG.Net.UploadFile');		//将文件上传类导入
		$upload = new UploadFile();			//实例化上传类
		$upload->maxSize=3145728;			//指定上传文件最大字节
		$upload->allowExts = array('jpg','gif','png','jpeg');	//指定文件上传的类型
		$upload->savePath = './Public/Home/Images/Help/';		//指定上传位置
		if(!$upload->upload()){									//判断是否上传成功
			$resinfo['err']=$upload->getErrorMsg();				//失败报错
		}else{
			$info = $upload->getUploadFileInfo();				//成功则获取上传文件信息
		}
		//返回网站路径的文件名
		$resinfo['msg']=__ROOT__."/Public/Home/Images/Help/".$info[0]['savename'];
		echo json_encode($resinfo);			//输出JSON格式 上传文件信息
		exit();								//可加可不加,防止特殊情况
	}
}