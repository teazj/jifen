<?php
class RzdetailsAction extends Action{
	public function _initialize(){
		//友情链接
		$listflink=M("Flink")->where('isshow=1')->select();
		$this->assign("listflink",$listflink);
	}
	public function index(){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);

		$model=D('Rzvista');
		$condition['id']= $_GET['id'];
		$con['sid']= $_GET['id'];
		$vo = $model->relation(true)->where($condition)->find();
		$pid=M('Rzvistainfo')->where($con)->field('pid')->select();
		$pids=M('Rzvistainfo')->where($con)->limit(1)->getField('vname,price');
		foreach($pid as &$v){
			$v['place']=M('Place')->where("id={$v['pid']}")->getField('name');
		}
		foreach($pids as $key=>$value){
			$a=explode('|',$value);
			$b=explode('|',$key);
		}
		
		$this->assign('place_id',$_GET['place_id']);
		$this->assign('gotime',date('Y-m-d',strtotime('+7days')));
		$this->assign('place',$pid);
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->assign('vo', $vo);
		$this->display();
	}
	
	public function xq(){
		$this->display();
	}

	public function detail(){
		$detail=D('Message');
		$condition['id']=$_GET['id'];
		$details=$detail->relation('rootUser')->where($condition)->find();
		$detail->where($condition)->setInc('traffic',1);
		// if(!isset($_COOKIE['ltime'])){
			// $detail->where($condition)->setInc('traffic',1);
			// setcookie('ltime',time());
			// }else{
				// if($_COOKIE['ltime']+10<time()){
					// $detail->where($condition)->setInc('traffic',1);
					// setcookie('ltime',time());
				// }
			// }
			$hot=$detail->order('traffic desc')->limit(10)->select();
			$new=$detail->order('addtime desc')->limit(10)->select();
			$this->assign('new',$new);
			$this->assign('detail',$details);
			$this->assign('hot',$hot);
			$this->display();
	}
	
	public function info(){
		$condition['sid']=$_GET['id'];
		$condition['pid']=$_GET['pid'];
		$ms=M('Rzvistainfo')->where($condition)->find();
		echo json_encode($ms);
	}
}