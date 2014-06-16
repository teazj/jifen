<?php
//Ppt
class PptAction extends CommonAction{
	//封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keywords'])){
			$where['title']  = array('like', "%{$_REQUEST['keywords']}%");
			$where['url']  = array('like',"%{$_REQUEST['keywords']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}
	
	public function index() {
		//赋值轮播图片显示位置
		$this->assign('types',M('Ppttype')->where('isshow=1')->select());
		//列表过滤器，生成查询Map对象
		$map = $this->_search();
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		$model=D('Ppt');
		$this->_list($model, $map);
		$this->display();
		return;
	}
	
	public function add(){
		//赋值轮播图片显示位置
		$this->assign('types',M('Ppttype')->where('isshow=1')->select());
		parent::add();
	}
	
	public function edit() {
		$model = M($this->getActionName());
		$id = $_REQUEST[$model->getPk()];
		$vo = $model->find($id);
		$this->assign('vo', $vo);
		$this->assign('types',M('Ppttype')->where('isshow=1')->select());
		$this->display('edit');
	}
	//重写insert方法
	public function insert(){
		//实现图片上传
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath = './Public/Admin/Images/Ppt/';// 设置附件上传目录
		$upload->thumb = true;
		$upload->thumbMaxWidth = '100,800';
		$upload->thumbMaxHeight = '100,800';	
		$upload->thumbPrefix="s_,l_";
		$upload->thumbRemoveOrigin=true;//删除原图

		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$_POST['pic'] = $info[0]['savename']; // 保存上传的照片根据需要自行组装
		parent::insert();//调用父类的添加方法执行添加操作。
	}

	//重写update方法
	public function update(){
		$upfile=$_FILES['pic'];
		if($upfile['error']==4){
			parent::update();
			return;
		}
		//实现图片上传

		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath = './Public/Admin/Images/Ppt/';// 设置附件上传目录
		$upload->thumb = true;
		$upload->thumbMaxWidth = '100,650';
		$upload->thumbMaxHeight = '100,650';	
		$upload->thumbPrefix="s_,l_";
		$upload->thumbRemoveOrigin=true;//删除原图

		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}

		$_POST['pic'] = $info[0]['savename']; // 保存上传的照片根据需要自行组装
		
		parent::update();//调用父类的添加方法执行添加操作。
	}
	
	//删除指定记录
	public function deleteAll() {
		$model = M($this->getActionName());
		if (!empty($model)) {
			$pk = $model->getPk();
			$id = $_REQUEST[$pk];
			if (isset($id)) {
				$condition = array($pk => array('in', explode(',', $id)));
				$pics=$model->where($condition)->field('pic')->select();
				foreach($pics as $v){
					@unlink("./Public/Admin/Images/Ppt/s_{$v}");
					@unlink("./Public/Admin/Images/Ppt/l_{$v}");
				}
				if (false !== $model->where($condition)->delete()) {
					$this->success(L('删除成功'));
				} else {
					$this->error(L('删除失败'));
				}
			} else {
				$this->error('非法操作');
			}
		}
	}
	
	//重写delete方法
	public function delete(){
		$m = M('Ppt');
		$list = $m->find($_GET['id']);
		unlink("./Public/Admin/Images/Ppt/l_{$list['pic']}");
		unlink("./Public/Admin/Images/Ppt/s_{$list['pic']}");
		parent::delete();
	}
	
	protected function _list($model, $map = array(), $sortBy = '', $asc = false) {
		
		//排序字段 默认为主键名
		if (!empty($_REQUEST['_order'])) {
			$order = $_REQUEST['_order'];
		} else {
			$order = !empty($sortBy)?$sortBy:$model->getPk();
		}
		
		//排序方式默认按照倒序排列
		//接受 sort参数 0 表示倒序 非0都 表示正序
		if (!empty($_REQUEST['_sort'])) {
			$sort = $_REQUEST['_sort'] == 'asc'?'asc':'desc';
		} else {
			$sort = $asc ? 'desc' : 'asc';
		}
		
		//取得满足条件的记录数
		$count = $model->where($map)->count();
		
		//每页显示的记录数
		if (!empty($_REQUEST['numPerPage'])) {
			$listRows = $_REQUEST['numPerPage'];
		} else {
			$listRows = '10';
		}
		
		
		//设置当前页码
		if(!empty($_REQUEST['pageNum'])) {
			$nowPage=$_REQUEST['pageNum'];
		}else{
			$nowPage=1;
		}
		$_GET['p']=$nowPage;
		
		//创建分页对象
		import("ORG.Util.Page");
		$p = new Page($count, $listRows);
		
		
		//分页查询数据
		$list = $model->relation(true)->where($map)->order($order.' '.$sort)
						->limit($p->firstRow.','.$p->listRows)
						->select();
						
		//回调函数，用于数据加工，如将用户id，替换成用户名称
		if (method_exists($this, '_tigger_list')) {
			$this->_tigger_list($list);
		}
		//分页跳转的时候保证查询条件
		foreach ($map as $key => $val) {
			if (!is_array($val)) {
				$p->parameter .= "$key=" . urlencode($val) . "&";
			}
		}
	
		//分页显示
		$page = $p->show();
		
		//列表排序显示
		$sortImg = $sort;                                 //排序图标
		$sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列';   //排序提示
		$sort = $sort == 'desc' ? 1 : 0;                  //排序方式
		
		
		//模板赋值显示
		$this->assign('list', $list);
		$this->assign('sort', $sort);
		$this->assign('order', $order);
		$this->assign('sortImg', $sortImg);
		$this->assign('sortType', $sortAlt);
		$this->assign("page", $page);
		
		$this->assign("search",			$search);			//搜索类型
		$this->assign("values",			$_POST['values']);	//搜索输入框内容
		$this->assign("totalCount",		$count);			//总条数
		$this->assign("numPerPage",		$p->listRows);		//每页显多少条
		$this->assign("currentPage",	$nowPage);			//当前页码
		
		
	}
}
