<?php
// 本类由系统自动生成，仅供测试用途
class QzindexAction extends Action {

    public function index(){
        //幻灯片的显示
        $ppt=M('Ppt');
		$condition['isshow']=1;
		$condition['pid']=3;
        $plist=$ppt->where($condition)->order('ctime desc')->limit(4)->select();
        $this->assign('plist',$plist);

        //地区签证 各国
		$cate=M('Category');
		$a_d_country = $cate->where("`pid` = 3 and `piny` in ('A','B','C','D')")->order('piny')->select();
		$e_j_country = $cate->where("`pid` = 3 and `piny` in ('E','F','G','H','I','J')")->order('piny')->select();
		$k_m_country = $cate->where("`pid` = 3 and `piny` in ('K','L','M')")->order('piny')->select();
		$n_w_country = $cate->where("`pid` = 3 and `piny` in ('N','O','P','Q','R','S','T','U','V','W')")->order('piny')->select();
		$x_z_country = $cate->where("`pid` = 3 and `piny` in ('X','Y','Z')")->order('piny')->select();

		$this->assign('a_d_country',$a_d_country);
		$this->assign('e_j_country',$e_j_country);
		$this->assign('k_m_country',$k_m_country);
		$this->assign('n_w_country',$n_w_country);
		$this->assign('x_z_country',$x_z_country);

		//地区签证 常见
		$common_country = $cate->where("`pid` = 1")->order('piny')->select();
		$this->assign('common_country',$common_country);
		
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
	//	echo $message->getLastSql();
		$this->display();
		
    }

}