<?php
class QzColumnAction extends Action {
	protected $page_size = 10;
	public function _initialize(){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);
		//友情链接
		$listflink=M("Flink")->where('isshow=1')->select();
		$this->assign("listflink",$listflink);
	}
	//知识宝鼎
	public function index(){
		if(isset($_GET['id']) && $_GET['id'] > 0){
			$this->detail();
			return ;
		}
		$tid = $_GET['tid'];
		$message_m = D('Message');
		$where = array('tid'=>$tid);
		$count = $message_m->where($where)->count();
		import("ORG.Util.Page");
		$page = new Page($count,$this->page_size);
		$show = $page->show();
		$message = $message_m->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		
		//资讯类别
		$title_m = M('Messagetype');
		$title = $title_m->select();
		foreach($title as $k=>$v){
			if($v['id'] == $tid){
				$current_title_type = $v['tname'];
			}
		}
		$this->assign('current_title_type',$current_title_type);
		$this->assign('title',$title);
		$this->assign('page',$show);
		$this->assign('list',$message);

		$this->display('zsbj');
	}

	public function detail(){
		$detail_m = D('Message');
		$where = array('zid'=>$_GET['id']);
		$detail = $detail_m->relation(true)->where($where)->find();

		$this->assign('detail',$detail);

		$this->display('news');
	}

}
?>