<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	function _initialize(){
		//友情链接
		$listflink=M("Flink")->where('isshow=1')->select();
		$this->assign("listflink",$listflink);
		
	}
	

    public function index(){
        //商品分类
        $tree=$this->getCategoryData(0,'goods_type');
		$this->assign("tree",$tree);
		$this->assign("tree_length",count($tree));
        
		//礼品一级分类
		$goods_type=M("Goods_type")->where('pid=0')->field('id,name')->select();
		$this->assign("goods_type",$goods_type);
		
		//积分范围数组
		$jifen_arr=array(
			array('id'=>1,'name'=>'0~100'),
			array('id'=>2,'name'=>'100~1000'),
			array('id'=>3,'name'=>'1000~5000'),
			array('id'=>4,'name'=>'5000~10000'),
			array('id'=>5,'name'=>"10000~50000"),
			array('id'=>6,'name'=>"50000以上"),
		);
		$this->assign("jifen_arr",$jifen_arr);
		
		//热门兑换的商品
		$hotgoods=$this->getGoods(3);
		$this->assign("hotgoods",$hotgoods);
		
		//2畅销热惠
		$sellgoods=$this->getGoods(2);
		$this->assign("sellgoods",$sellgoods);
		
		//1精品推荐
		$bestgoods=$this->getGoods(1);
		$this->assign("bestgoods",$bestgoods);
		
		//1清仓商品
		$cleargoods=$this->getGoods(0);
		$this->assign("cleargoods",$cleargoods);
		
		$this->display();
		
    }
	
	//热门对兑换页面
	public function lists(){
		//根据传过来的id做为父id来查询下面的小分类
		$pid=0;
		if($this->_get('id')){
			$pid=$this->_get("id");
		}
		
		//商品分类
        $tree=$this->getCategoryData($pid,'goods_type');
		$this->assign("tree",$tree);
		$this->assign("tree_length",count($tree));
		
		//1精品推荐(左边)
		$bestgoods=$this->getGoods(1);
		$this->assign("bestgoods",$bestgoods);
		
		//搜索条件的url状态维持
        $sta_jf = isset($_GET['jf']) ? "&jf={$_GET['jf']}" : ''; //价格区间状态
        $sta_brand = isset($_GET['brand']) ? "&brand={$_GET['brand']}" : ''; //品牌
       	
       	$sta_bnum = isset($_GET['bnum']) ? "&bnum={$_GET['bnum']}" : ''; //兑换量排序状态
        $sta_sprice = isset($_GET['sprice']) ? "&sprice={$_GET['sprice']}" : ''; //价格排序状态
        $sta_cdate = isset($_GET['cdate']) ? "&cdate={$_GET['cdate']}" : ''; //上架时间排序状态
        
        $sta_id = isset($_GET['id']) ? "&id={$_GET['id']}" : '';	//商品分类id
		$sta_keyword = isset($_GET['keyword']) ? "&keyword={$_GET['keyword']}" : '';	//关键字
        
        $sta_url = "Index/lists?id={$_GET['id']}";	//基本url
		
		//积分范围数组
		$jifen_arr=array(
			array('id'=>0,'name'=>'全部'),
			array('id'=>1,'name'=>'0~100'),
			array('id'=>2,'name'=>'100~1000'),
			array('id'=>3,'name'=>'1000~5000'),
			array('id'=>4,'name'=>'5000~10000'),
			array('id'=>5,'name'=>"10000~50000"),
			array('id'=>6,'name'=>"50000以上"),
		);
        foreach ($jifen_arr as $k => &$v) {//分配积分区间url
            if ($_GET['jf'] == $v['id']) {
                $v['class'] = 'active';
                $v['url'] = 'javascript:void(0)';
            } else {
                $v['url'] = U("{$sta_url}&jf={$v['id']}{$sta_sprice}{$sta_cdate}{$sta_keyword}{$sta_bnum}{$sta_brand}");
            }
        }
        $this->assign("jifen_arr",$jifen_arr);
		
        $rule=$this->getJifen();	//1元==100积分
        //封装价格搜索条件
        if (isset($_GET['jf'])) {
            switch ($_GET['jf']) {
            	case 1:$map['price'] = array('between', '0,'.intval(100/$rule));
                    break;
                case 2:$map['price'] = array('between', intval(100/$rule).','.intval(1000/$rule));
                    break;
                case 3: $map['price'] = array('between', intval(1000/$rule).','.intval(5000/$rule));
                    break;
                case 4: $map['price'] = array('between', intval(5000/$rule).','.intval(10000/$rule));
                    break;
                case 5: $map['price'] = array('between', intval(10000/$rule).','.intval(50000/$rule));
                    break;
                case 6:$map['price'] = array('gt', intval(50000/$rule));
                    break;

                default:$map['price'] = array('gt', 0);
            }
        }
		
		//封装价格排序
        $order_price = array();
        if (isset($_GET['sprice'])) {
            $order_price['class'] = 'active';
            if ($_GET['sprice'] == 'h') {
                $order['price'] = 'desc';
                $order_price['b_class'] = 'arrow2';
                $order_price['url'] = U("{$sta_url}&sprice=nh{$sta_jf}{$sta_cdate}{$sta_keyword}{$sta_bnum}{$sta_brand}");
            } elseif ($_GET['sprice'] == 'nh') {
                $order['price'] = 'asc';
                $order_price['b_class'] = 'arrow';
                $order_price['url'] = U("{$sta_url}&sprice=h{$sta_jf}{$sta_cdate}{$sta_keyword}{$sta_bnum}{$sta_brand}");
            }
        } else {
            $order_price['class'] = '';
            $order_price['b_class'] = 'arrow';
            $order_price['url'] = U("{$sta_url}&sprice=nh{$sta_jf}{$sta_cdate}{$sta_keyword}{$sta_bnum}{$sta_brand}");
        }
        $this->assign('order_price', $order_price); //分配价格排序
        
        //封装品牌
		$brand_arr = array();
		$brand_arr = M("Brand")->field("id,brand_name")->select();
		array_unshift($brand_arr, array('brand_name'=>"全部"));
		foreach ($brand_arr as $k => &$v) {//分配积分区间url
            if ($_GET['brand'] == $v['id']) {
                $v['class'] = 'active';
                $v['url'] = 'javascript:void(0)';
            } else {
                $v['url'] = U("{$sta_url}&brand={$v['id']}{$sta_jf}{$sta_sprice}{$sta_cdate}{$sta_keyword}{$sta_bnum}");
            }
        }
		$this->assign("brand_arr",$brand_arr);
        
        //封装上架时间排序
        $order_cdate = array();
        if (isset($_GET['cdate'])) {
            $order_cdate['class'] = 'active';
            if ($_GET['cdate'] == 'n') {
                $order['etime'] = 'desc';
                $order_cdate['b_class'] = 'arrow2';
                $order_cdate['url'] = U("{$sta_url}&cdate=nn{$sta_jf}{$sta_sprice}{$sta_keyword}{$sta_bnum}{$sta_brand}");
            } elseif ($_GET['cdate'] == 'nn') {
                $order['etime'] = 'asc';
                $order_cdate['b_class'] = 'arrow';
                $order_cdate['url'] = U("{$sta_url}&cdate=n{$sta_jf}{$sta_sprice}{$sta_keyword}{$sta_bnum}{$sta_brand}");
            }
        } else {
            $order_cdate['class'] = '';
            $order_cdate['b_class'] = 'arrow';
            $order_cdate['url'] = U("{$sta_url}&cdate=nn{$sta_jf}{$sta_sprice}{$sta_keyword}{$sta_bnum}{$sta_brand}");
        }
        $this->assign('order_cdate', $order_cdate); //分配上架时间排序
        
        //封装兑换量排序
        $order_bnum = array();
        if (isset($_GET['bnum'])) {
            $order_bnum['class'] = 'active';
            if ($_GET['bnum'] == 'bn') {
                $order['bnum'] = 'desc';
                $order_bnum['b_class'] = 'arrow2';
                $order_bnum['url'] = U("{$sta_url}&bnum=bn{$sta_jf}{$sta_cdate}{$sta_sprice}{$sta_keyword}{$sta_brand}");
            } elseif ($_GET['bnum'] == 'pn') {
                $order['bnum'] = 'asc';
                $order_bnum['b_class'] = 'arrow';
                $order_bnum['url'] = U("{$sta_url}&bnum=pn{$sta_jf}{$sta_cdate}{$sta_sprice}{$sta_keyword}{$sta_brand}");
            }
        } else {
            $order_bnum['class'] = '';
            $order_bnum['b_class'] = 'arrow';
            $order_bnum['url'] = U("{$sta_url}&bnum=pn{$sta_jf}{$sta_cdate}{$sta_sprice}{$sta_keyword}{$sta_brand}");
        }
        $this->assign('order_bnum', $order_bnum); //分配上架时间排序
		
		$map['status']=array('eq',1);	//上架的商品
		if (!is_array($order)) {//默认搜索条件为添加时间倒序
            $order = 'etime desc';
        }
		//关键字
		if($this->_get('keyword')){
			$map['name']=array('like','%'.$this->_get('keyword').'%');
		}
		
		//id
		if($this->_get('id')){
			$map['tid']=array('eq',$this->_get('id'));
		}
		
		//t 商品类型
		if($this->_get('t')){
			$map['location']=array('eq',$this->_get('t'));
		}
		
		//品牌
		if($this->_get("brand")){
			$map['bid'] = array("eq", $this->_get("brand"));
		}
		
		$goods = M('Goods'); //实例化一个model
        import('ORG.Util.Page'); // 导入分页类
        $count = $goods->where($map)->count(); // 查询满足要求的总记录数 $map表示查询条件

        $Page = new Page($count, 12); // 实例化分页类 传入总记录数
        $totalpage = ceil($count / 12);

        $this->assign('count', $count);
        $this->assign('totalpage', $totalpage);
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询
        $list = $goods->where($map)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
		//echo $goods->getLastSql();
		foreach ($list as $key => $value) {
			 $list[$key]['jifen']=$rule*intval($value['price']);
		}
		
		
		$this->assign("lists",$list);	//数据
		$this->assign('page', $show); // 赋值分页输出
		
		$this->display();
	}
	
	//商品详细页面
	public function info(){
		if(intval($_GET['id'])){
			$rule=$this->getJifen();
			$info=M("Goods")->where('id='.$_GET['id'])->find();
			$info['jifen']=$rule*intval($info['price']);
			//商品详情
			$goods_detail_info=M("Goods_detail")->where('pid='.$_GET['id'])->find();
			$this->assign('goods_detail_info',$goods_detail_info);
			
			// 导航
			$itme=$this->getPdata($info['tid']);
			$this->assign("bcn",$itme);
			
			//成交记录
			$model= M("");
			$success_where="d.gid=".$_GET['id']." AND o.status=3";	//成功记录条件
			import("ORG.Util.Page");// 导入分页类
			$count = $model->table("ff_orders_detail d")
				    	   ->join("ff_orders o  on o.id=d.oid")
						   ->where($success_where)
						   ->count();	// 查询满足要求的总记录数
			$Page  = new Page($count,10);		// 实例化分页类 传入总记录数和每页显示的记录数
			$show  = $Page->show();		// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$success_list = $model->table("ff_orders_detail d")
				    	   ->join("ff_orders o  on o.id=d.oid")
						   ->where($success_where)
						   ->order('o.addtime')
						   ->field("o.phone,d.price,d.num,o.status,o.addtime")
						   ->limit($Page->firstRow.','.$Page->listRows)
						   ->select();
 			
 			foreach ($success_list as $key => $value) {
				 $value['phone'] = substr($value['phone'],0,7).'****';
				 $value['addtime'] = date("Y-m-d H:i:s",$value['addtime']);
				 $value['status']="成交";
				 $value['price']=$value['price'] * $rule;
				 $success_list[$key]=$value;
			 }
			$this->assign('success_page',$show);// 赋值分页输出
			$this->assign("success_list",$success_list);
			
			
			
			//评论列表
			$model= M("");
			//$comment_where="g.gid=".$_GET['id']." AND g.status=2";	//评论条件状态值为2
			$comment_where="g.gid=".$_GET['id']." ";	//评论条件状态值为2
			import("ORG.Util.Page");// 导入分页类
			$count = $model->table("ff_goods_comment g")
				    	   ->join("ff_users u  on u.id=g.uid")
						   ->where($comment_where)
						   ->count();	// 查询满足要求的总记录数
			$Page  = new Page($count,10);		// 实例化分页类 传入总记录数和每页显示的记录数
			$show  = $Page->show();		// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$comment_list = $model->table("ff_goods_comment g")
				    	   ->join("ff_users u  on u.id=g.uid")
						   ->where($comment_where)
						   ->order('g.id DESC')
						   ->field("u.username,g.content,g.crdate")
						   ->limit($Page->firstRow.','.$Page->listRows)
						   ->select();
 			
 			foreach ($comment_list as $key => $value) {
				 $value['crdate'] = date("Y-m-d H:i:s",$value['crdate']);
				 $comment_list[$key]=$value;
			}
			
			$this->assign('comment_page',$show);// 赋值分页输出
			$this->assign("comment_list",$comment_list);
			
			//用户登录信息
			$iflogin = session('FEUSER')?1:0;
			$this->assign('iflogin',$iflogin);

			$this->assign("info",$info);
		}else{
			$this->redirect("Index/index");
		}
		
		//1精品推荐(左边)
		$bestgoods=$this->getGoods(1);
		$this->assign("bestgoods",$bestgoods);

		$this->display();
	}
	
	
	//商品添加评论
	function comment(){
		$gid=$this->_post('id');
		if($gid){
			$data=array();
			$data['gid']=$gid;
			$data['uid']=$_SESSION['FEUSER']['id'];
			$data['content']=$this->_post("content");
			$data['crdate']=time();
			$data['status']=0;
			$res=M("Goods_comment")->add($data);
			if($res){
				$this->success("评论成功!","info/id/".$gid);	
			}else{
				$this->error("评论失败!");
			}
		}else{
			$this->error("评论失败!");
		}	
	}
	
	
	/**
     * 获取分类数据
     * @param $pid 父级id
     * @param $tb_name 数据表名
     */
     function getCategoryData($pid = 0, $tb_name = 'goods_type') {
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
				if ($v['pid'] == 0) {
                    $item['hot'] = M('Goods_type')->where("pid=".$v['id'])->limit(3)->select();
                }
				
                if (M($tb_name)->where(" pid = " . $v['id'])->count()) {//查询数据表满足条件的结果的数量
                    $item['sub'] = $this->getCategoryData($v['id'], $tb_name); //在$item数组中添加sub元素
                }
                $tree[] = $item; //接收$item
            }
        }
        return $tree;
    }
	 
	 //根据类型来获取商品(0清仓兑换,1精品推荐,2畅销热惠,3热门兑换)
	 function getGoods($location){
	 	$listsgoods=M("Goods")->where('status=1 and location='.$location)->limit(5)->select();
	 	$rule=$this->getJifen();
	 	if($listsgoods){
	 		foreach ($listsgoods as $key => $value) {
				 $listsgoods[$key]['jifen']=$rule*intval($value['price']);
			 }
	 	}
	 	return $listsgoods;
	 }
	 
	 //获取积分的配置值1元==积分
	 function getJifen(){
		$InitSys= M('inte.InitSystem',' ');
		$data = $InitSys->find ();
		$jifen=$data['rule'];
		return $jifen;
	 }
	 
	 //获取他的父级
	 //@param  $tid 为商品的类别id
	 //$return  $item 数组
	 function getPdata($tid){
	 	$info=M('Goods_type')->where('id='.$tid)->field('id,name,rank,pid')->find();
		 $item=array();
		 if($info['rank']>1){
			 $item=array_merge($item,$this->getPdata($info['pid']));
		 }
		$item[]=$info;
		return $item;
	 }

}