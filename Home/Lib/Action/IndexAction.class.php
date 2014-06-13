<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        //幻灯片的显示
        $ppt=M('Ppt');
		$condition['isshow']=1;
		$condition['pid']=3;
        $plist=$ppt->where($condition)->order('ctime desc')->limit(4)->select();
        $this->assign('plist',$plist);
		
		//地区签证
		$cate=M('Category');
		$word=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$a=array();
		$list=$cate->where("pid>0")->order('piny')->select();
		foreach($list as $v){
			$a[]=$v['piny'];
		}
		$this->assign('cate',$list);
		
		//热点签证
		$vista=D('Vista');
		$this->assign('vlist',$vista->relation(true)->select());
		
        //最新资讯显示
        $message=D('Message');
        $mlist1=$message->relation(true)->where("tid=1")->order("ctime desc")->limit(5)->select();
        $mlist2=$message->relation(true)->where("tid=2")->order("ctime desc")->limit(10)->select();
        $mlist3=$message->relation(true)->where("tid=3")->order("ctime desc")->limit(10)->select();
        $mlist4=$message->relation(true)->where("tid=4")->order("ctime desc")->limit(5)->select();
        $this->assign('mlist1',$mlist1);
        $this->assign('mlist2',$mlist2);
        $this->assign('mlist3',$mlist3);
        $this->assign('mlist4',$mlist4);
		$this->display();
		
    }

}