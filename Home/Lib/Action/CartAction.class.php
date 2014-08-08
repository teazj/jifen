<?php
class CartAction extends Action {
	public function _initialize() {
		import("ORG.Util.Cart");	
		$userinfo=session('FEUSER');			
		$this->userID =$userinfo['id'];
		$this->cart = new Cart();
		$this->assign('cartCount', $_SESSION['cart']['total_num']);	
		$this->assign('cartbox',$_SESSION['cart']['goods_list']);	
	}
	
	
    public function index(){
		$item_id = isset($_GET['item_id'])?$_GET['item_id']:0;
		if($this->userID == false)
		{
			session("URL",U("Cart/index","item_id=".$item_id));
			$this->assign("jumpUrl","__ROOT__/index.php/Com/login")	;
			$this->error("您还未登陆！请先登陆！");
		}
		if($item_id != 0)
		{
			$Cdty = M("Goods");
			$map=array();
			$map['id']=$item_id;
			$listarr=$Cdty->where($map)->find();
			$this->assign('p_name',$listarr["title"]);
			$q=$_GET['q'];	
			$this->cart->add_goods($item_id,$q);	//添加到购物车里面
			$this->assign('isshow',"1");
		}
		else
		{
			$this->assign('isshow',"0");
		}
			
		$this->assign('OrderCount',$_SESSION['cart']['total_price']);
		$this->assign('cartCount', $_SESSION['cart']['total_num']);		
		$this->assign('C_list',$_SESSION['cart']['goods_list']);
		//dump($_SESSION['cart']);
		$this->display('index');
    }
	
	//添加购物车
	public function add_goods()
	{
		$item_id = $this->_GET("item_id") * 1;
		if(!empty($_GET["q"])){
			$result = $this->cart->add_goods($item_id,-1);
		}else{
			$result = $this->cart->add_goods($item_id);
		}
		if($result!=false){
			echo $_SESSION['cart']['total_price'];	
		}else{
			echo "f";	
		}
	}
	
	public function cartinformation()
	{
		//绑定购物地址
		$Address = M("Address");
		$map = array();
		$map['userid']= $_SESSION["FEUSER"]["id"];
		$listarr=$Address->where($map)->select();
		$this->assign('A_list',$listarr);
		
		//获取默认地址的id
		$map['ismr']=1;
		$mrid=$Address->where($map)->getField('id');
		$this->assign("mrid",$mrid);
		
		$this->assign('OrderCount',$_SESSION['cart']['total_price']);
		$rule=$this->getJifen();
		$this->assign("totaljifen",intval($rule*$_SESSION['cart']['total_price']));
		
		$this->assign('C_list',$_SESSION['cart']['goods_list']);	
		
		//将自己的积分弄过去
		$point=M("Users")->where("id=".$_SESSION['FEUSER']['id'])->getField("point");	
		$this->assign("point",$point);
		$this->display();
	}
	
	public function ordersuccess()
	{
		if(!empty($_GET["oid"]))
		{
			$Order = M('Orders');
			$map = array();
			$map["id"] = $_GET["oid"];
			$listarr=$Order->where($map)->find();
			//兑换商品应该需要的积分
			$rule=$this->getJifen();	//获得积分和钱的比例
			$this->assign("rule",$rule);
			
			$total_jifen=intval($rule*$listarr['total']);
			
			$this->assign("total_jifen",$total_jifen);
			//查询该用户的积分
			$point=M("Users")->where("id=".$_SESSION['FEUSER']['id'])->getField("point");
			//echo $point;
			if($point<0){	//要支付金钱
				$money=abs(intval($point/$rule));
				$this->assign("money",$money);	//还要付多少钱
				$this->assign('mypoint',0);
			}else{		//积分足以支付
				$mypoint=intval($point);	//剩余积分
				$this->assign('mypoint',$mypoint);
			}
			
			// $this->assign('orid',$listarr['orId']);
			// $this->assign('orprice',$listarr['orPrice'].$listarr['orPostage']);
			// $oid = $listarr['orId'];
			// $orname = $listarr['orName']."订单";
			// $orprice = $listarr['orPrice'].$listarr['orPostage'] ;
			// $this->assign('url','__ROOT__/alipay/alipayapi.php?oid='.$oid.'&orname='.$orname.'&orprice='.$orprice.'');
		}
		$this->display();
	}
	public function delgoods(){
		$item_id = $this->_GET("item_id") * 1;
		$result = $this->cart->delete_goods($item_id);
		if($result!=false){
			echo "<script>parent.location.href='".U("Cart/index")."';</script>";	
		}
	}
	public function empty_cart(){
		$result = $this->cart->empty_cart();
		echo "<script>parent.location.href='".U("Cart/index")."';</script>";	
	}
	public function address(){
		$this->assign("userid",$this->userID);
		$this->display();	
	}
	public function saveadd(){
		$Address=M("address");
		foreach($this->addarr as $v)
		{
			$data[$v]=trim($_POST[$v]);	
		}
		$addid=$Address->add($data);
		if($data["ismr"]==1){
			$this->swmr($addid,$data["userid"],$Address);	
		}
		if(!empty($addid))
		{
			echo "<script>parent.location.href='".U("Cart/cartinformation")."';</script>";	
		}else{
			echo "<script>alert('设置失败!');parent.location.replace(parent.location.href);</script>";	
		}
	}
	public function swmr($addid,$userid,$Address){
		$Address->where("userid=".$userid." and id<>".$addid)->setField("ismr",0);
	}
	
	public function SaveOrder()
	{
		$dizhi= $_POST["address"];
		//订单号
		$orderID =date("YmdHis") . mt_rand(0,9999);
		$userinfo=session("FEUSER");
		$userID	=	intval($userinfo['id']);
		$userName	=$userinfo['username'];
		//订单地址
		$Address = M('address');
		$map = array();
		$map['id']= $dizhi;
		$map['userid'] = $userID;
		$listarr=$Address->where($map)->find();
		//dump($listarr);
		//echo $Address->getLastSql();die();
		$dz = $listarr['shengfen'].$listarr['shi'].$listarr['qu'].$listarr['address'];  //收件地址
		$orName = $listarr['lianxiren']; //收件人姓名
		$orPhone = $listarr['phone'];  //收件人电话
		$orCreateDateTime =time();//订单生成时间
		
		$Order = M('Orders');
		$data['oid'] = $orderID;	//订单号
		$data['uid'] = $userID;			
		$data['nickname'] =$orName;//$orName;
		$data['address'] = $dz;
		$data['phone'] = $orPhone;//$orPhone;
		$data['total'] = $_SESSION['cart']['total_price'];
		$data['addtime'] = $orCreateDateTime;

		$return = $Order->add($data); 
		//dump($data);
		//echo $Order->getLastSql();
		//dump($return);die();
		if($return  > 1){
			//将购物车的数据往orders_detail表中差
			$cartlist = $_SESSION['cart']['goods_list'];
			$OrderDetail = M('Orders_detail');
			foreach($cartlist as $k=>$v){
				$data['oid']=$return;
				$data['gid']=$v['item_id'];
				$data['name'] = $v['item_name'];			
				$data['num'] = $v['quantity'];
				$data['price'] = $v['price'];	
				$orderid=$OrderDetail->add($data); 	
				//每个session购物车里面插入数据库之后要进行销毁
				//M("Goods")->where('id='.$v['item_id'])->delete();
			}
			//修改该用户的积分
			$rule=$this->getJifen();
			$total_jifen=intval($_SESSION['cart']['total_price']*$rule);
			M("Users")->where("id=".$_SESSION['FEUSER']['id'])->setDec('point',$total_jifen);
			//echo M("Users")->getLastSql();die;	
			
			//清空购物车
			$this->cart->empty_cart();
			
			$this->assign("jumpUrl","__ROOT__/index.php/Cart/ordersuccess/oid/".$return."")	;
			$this->success("订单提交成功！");
		}else{
			$this->error("订单提交失败！");
		}
	}
	
	
    public function notify()
	{
		require_once("alipay/alipay.config.php");
		require_once("alipay/lib/alipay_notify.class.php");
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();		
		if($verify_result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代		
			
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
			
			//获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
			
			//商户订单号
		
			$out_trade_no = $_POST['out_trade_no'];
		
			//支付宝交易号
		
			$trade_no = $_POST['trade_no'];
		
			//交易状态
			$trade_status = $_POST['trade_status'];
		
		
			if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
				//该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款			
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序					
				//echo "success";		//请不要修改或删除
				$this->assign('trade_status','订单提交成功，等待付款！');
				modeOrderState(0);		
				//调试用，写文本函数记录程序运行情况是否正常
				//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
			else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货			
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				//echo "success";		//请不要修改或删除
				$this->assign('trade_status','付款成功，我们会尽快为您发货！');
				modeOrderState(1);
				$Order=M("order");
				$map=array();
				$map["orId"]=$trade_no;
				$Orderlist=$Order->where($map)->find();
				$this->ScoreRebate($Orderlist["orPrice"],$this->userID,$trade_no);
				//调试用，写文本函数记录程序运行情况是否正常
				//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
			else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
				//该判断表示卖家已经发了货，但买家还没有做确认收货的操作
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				//echo "success";		//请不要修改或删除
				$this->assign('trade_status','货已发出！');
				modeOrderState(2);
				//调试用，写文本函数记录程序运行情况是否正常
				//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
			else if($_POST['trade_status'] == 'TRADE_FINISHED') {
				//该判断表示买家已经确认收货，这笔交易完成
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				//echo "success";		//请不要修改或删除
				$this->assign('trade_status','交易完成！');
				modeOrderState(3);
				//调试用，写文本函数记录程序运行情况是否正常
				//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
			else {
				//其他状态判断
				echo "success";
				//调试用，写文本函数记录程序运行情况是否正常
				//logResult ("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
				//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
		}
		else {
			//验证失败
			echo "fail";
		
			//调试用，写文本函数记录程序运行情况是否正常
			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		}
	
		$this->display();
	}
	
	//
	public function modeOrderState($trade_status)
	{
		$Order = M("order");
		$data['orState'] = $trade_status;
		$return = $Order->save($data); 

	}
	//
	
    public function returnurl()
	{
		require_once("alipay/alipay.config.php");
		require_once("alipay/lib/alipay_notify.class.php");	
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
			//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表		
			//商户订单号		
			$out_trade_no = $_GET['out_trade_no'];		
			//支付宝交易号
			$trade_no = $_GET['trade_no'];		
			//交易状态
			$trade_status = $_GET['trade_status'];	
			if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
			}
			else {
			  echo "trade_status=".$_GET['trade_status'];
			}				
			echo "验证成功<br />";
			echo "trade_no=".$trade_no;
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

		}
		else {
			//验证失败
			//如要调试，请看alipay_notify.php页面的verifyReturn函数
			echo "验证失败";
		}
		$this->display();	
		
	}

	//获取积分的配置值1元==积分
	 function getJifen(){
		$InitSys= M('inte.InitSystem',' ');
		$data = $InitSys->find ();
		$jifen=$data['rule'];
		return $jifen;
	 }
}