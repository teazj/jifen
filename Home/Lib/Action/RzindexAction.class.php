<?php
// 本类由系统自动生成，仅供测试用途
class RzindexAction extends Action {
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
        //幻灯片的显示
        $ppt=M('Ppt');
		$condition['isshow']=1;
		$condition['pid']=2;
        $plist=$ppt->where($condition)->order('ctime desc')->limit(4)->select();
        $this->assign('plist',$plist);

        //获取分类树
        $tree = $this->getCategoryData();
		$this->assign('tree',$tree);
		
		//热点签证
		$vista=D('Rzvista');
		$vlist = $vista->relation(true)->select();
		$this->assign('vlist',$vlist);
		
        //最新资讯 热点问题 政策动态
        $message=D('News');
        $mlist1=$message->relation(true)->where("tid=1")->order("ctime desc")->limit(5)->select();  //热点问题
        $mlist2=$message->relation(true)->where("tid=3")->order("ctime desc")->limit(10)->select();//知识宝典
        $mlist3=$message->relation(true)->where("tid=4")->order("ctime desc")->limit(10)->select();//行业政策
        $mlist4=$message->relation(true)->where("tid=24")->order("ctime desc")->limit(5)->select();//政策动态
        $this->assign('mlist1',$mlist1);
        $this->assign('mlist2',$mlist2);
        $this->assign('mlist3',$mlist3);
        $this->assign('mlist4',$mlist4);
		//友情链接
		$flink=M('Flink')->where('isshow=1')->select();
		$this->assign('flink',$flink);

		$this->display();
    }

	/**
     * 获取分类数据
     * @param $pid 父级id
     * @param $tb_name 数据表名
     */
    public function getCategoryData($pid = 0, $tb_name = 'rzcategory') {
        $tb_name = strtolower($tb_name);
        $tree = array(); //定义空数组
        $where = " pid = " . $pid; //定义查询条件

        if ($rs = M($tb_name)->where($where)->select()) {//查询表满足条件得到的数据如果有结果就进来
            foreach ($rs as $v) {
                $item = array(//定义数组
                    'id' => $v['id'],
                    'name' => $v['name'],
                    'url'=>U('Index/lists', 'id=' . $v['id'])
                );
                if (M($tb_name)->where(" pid = " . $v['id'])->count()) {//查询数据表满足条件的结果的数量
                    $item['sub'] = $this->getCategoryData($v['id'], $tb_name); //在$item数组中添加sub元素
                }
                $tree[$v['id']] = $item; //接收$item
            }
        }
        return $tree;
    }

}