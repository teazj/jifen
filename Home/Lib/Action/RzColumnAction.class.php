<?php
class RzColumnAction extends Action {
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
	}
	//知识宝鼎
	public function index(){
		if(isset($_GET['id']) && $_GET['id'] > 0){
			$this->detail();
			return ;
		}
		$tid = $_GET['tid'];
		$message_m = D('News');
		$where = array('tid'=>$tid);
		$count = $message_m->where($where)->count();
		import("ORG.Util.Page");
		$page = new Page($count,$this->page_size);
		$show = $page->show();
		$message = $message_m->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		
		//资讯类别
		$title_m = M('News_type');
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

		$this->display('zsbd');
	}

	public function detail(){
		$detail_m = D('News');
		$where = array('zid'=>$_GET['id']);
		$detail = $detail_m->relation(true)->where($where)->find();

		$this->assign('detail',$detail);

		$this->display('news');
	}

	//后面废。
	public function zsbd() {
		$column = M ( 'rzColumn' );
		$res = $column->where ( "fid=0" )->find ();
		$title = $column->where ( "fid={$res['id']}" )->select ();
		$id = $_GET ['id'];
		$class = M ( 'rzColClass' );
		$box = fPage('rzColClass', 5,"rcid={$id}");
		$this->assign ( 'list', $box['list'] );
		$this->assign('page',$box['page']);
		$this->assign ( 'title', $title );
		$this->display ();
	}
	
	public function zsbdBanner() {
		$column = M ( 'rzColumn' );
		$res = $column->select ();
		if (! res)
			exit ( '数据不存在' );
		$list = tree ( $res );
		$this->assign ( 'list', $list );
	}
	
	//知识宝鼎列表;
	public function zsList() {
		$column = M ( 'rzColumn' );
		
		$this->display ( 'zsbd' );
	}
	
	//新闻详情
	public function news(){
		$id = $_GET['id'];
		$class = M('rzColClass');
		$row = $class->where("id={$id}")->find();
		
		$data['click'] = $row['click']+1;
		$click = $class->where("id={$id}")->save($data);
		if(!click)exit('更新点击量失败');
		//最新消息;
		$newMsg = $class->order('sub_time')->field('id,title')->select();
		
		//阅读排行
		$clicks = $class->order('click')->field('id,title')->select();
		$this->assign('clicks',$clicks);
		$this->assign('new',$newMsg);
		$this->assign('row',$row);
		$this->display();
	}
}
?>