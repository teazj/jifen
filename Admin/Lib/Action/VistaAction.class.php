<?php
class VistaAction extends CommonAction{
	//签证列表
	public function _filter(&$map){
		//搜索条件有值则做封装
			$where['vid']  = array('eq', "{$_REQUEST['vid']}");
	}
	
	public function index() {
		//为类型搜索准备
		$this->assign('vcate',M('Vcate')->select());
		//列表过滤器，生成查询Map对象
		$map = $this->_search();
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		$model=D('Vista');
		$this->_list($model, $map);
		$this->display();
		return;
	}
	public function insert(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Admin/Images/Vista/';// 设置附件上传目录
		$upload->thumb = true;
		$upload->thumbMaxWidth = '50,237';
		$upload->thumbMaxHeight = '32,157';
		$upload->thumbPrefix = 's_,m_';
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$_POST['logo']= $info[0]['savename'];
		$_POST['protectid']=date('YmdHis').mt_rand(0,1000000);
		$m=M('Vista');
		$m->create();
		$j=$m->add();
		if($j && $j>0)
		{
			//合并数组过滤空值
			$res=array_filter(array_combine($_POST['id'],$_POST['vname']));
			$id=array();
			$vname=array();
			$price=array();
			foreach($res as $k=>$v){
				$id[]=$k;
				$vname[]=$v;
			}
			//数组过滤
			$prices=array_filter($_POST['price']);
			foreach($prices as $key=>$v){
				$price[]=$v;
			}
			$data=array(); //创建临时变量用以存储数据
			$length=count($vname);
			for($i=0; $i<=$length-1;$i++)
			{
			$data["sid"]=$j;
			$data["vname"]=$vname[$i]; 
			$data["pid"]=$id[$i]; 
			$data["price"]=$price[$i]; 
			$k=M('Vistainfo')->add($data);
			}
			if($k){
				$this->success(L('新增成功'));
			} else {
				//失败提示
				$this->error(L('新增失败').M('Vistainfo')->getLastSql());
			}
		}
	}
	
	public function add(){
		$model=M('Category');
		$condition['pid']=array('eq',0);
		$cate=$model->where($condition)->field('id,name')->select();
		$this->assign('cate',$cate);
		$place=M('Place')->getField('id,name');
		$this->assign('place',$place);
		$this->assign('vcate',M('Vcate')->select());
		$this->display();
	}
	
	public function edit(){
		$this->assign('vcate',M('Vcate')->select());
		$this->assign('category',M('Category')->where('pid>0')->select());
		$model = D('Vista');
		$id=$_REQUEST['id'];
		$vo = $model->relation(true)->find($id);
		$this->assign('vo', $vo);
		$this->display();
	}
	
	public function delete(){
		$cate=M('Vista');
		$condition=$_GET['id'];
		$logo=$cate->where("id={$condition}")->getField('logo');
		$res=$cate->delete($condition);
		unlink("__PUBLIC__/Admin/Images/Vista/s_{$logo}");
		unlink("__PUBLIC__/Admin/Images/Vista/m_{$logo}");
		//删除产品的同时删除相关的办理地区信息
		M('Vistainfo')->where("sid={$condition}")->delete();
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
?>