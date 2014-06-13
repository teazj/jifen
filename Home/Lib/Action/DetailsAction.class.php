<?php
class DetailsAction extends Action{
	public function index(){
		$model=D('Vista');
		$condition['id']= $_GET['id'];
		$con['sid']= $_GET['id'];
		$vo = $model->relation(true)->where($condition)->find();
		$pid=M('Vistainfo')->where($con)->field('pid')->select();
		$pids=M('Vistainfo')->where($con)->limit(1)->getField('vname,price');
		foreach($pid as &$v){
			$v['place']=M('Place')->where("id={$v['pid']}")->getField('name');
		}
		foreach($pids as $key=>$value){
			$a=explode('|',$value);
			$b=explode('|',$key);
		}
		$this->assign('place',$pid);
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->assign('vo', $vo);
		$this->display();
	}
	
	public function detail(){
		$detail=D('Message');
		$condition['id']=$_GET['id'];
		$details=$detail->relation(true)->where($condition)->find();
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
		$ms=M('Vistainfo')->where($condition)->find();
		echo json_encode($ms);
	}
}