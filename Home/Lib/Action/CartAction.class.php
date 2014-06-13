<?php
class CartAction extends GlobalAction {
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
			$Cdty = M("commodity");
			$map=array();
			$map['id']=$item_id;
			$listarr=$Cdty->where($map)->find();
			$this->assign('p_name',$listarr["title"]);	
			$this->cart->add_goods($item_id);
			$this->assign('isshow',"1");
		}
		else
		{
			$this->assign('isshow',"0");
		}
			
		$this->assign('OrderCount',$_SESSION['cart']['total_price']);
		$this->assign('cartCount', $_SESSION['cart']['total_num']);		
		$this->assign('C_list',$_SESSION['cart']['goods_list']);
		//dump($_SESSION['cart']['goods_list']);
		$this->display('myche');
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
		$Address = M("address");
		$map = array();
		$map['userid']= $_SESSION["userID"];
		$listarr=$Address->where($map)->select();
		$this->assign('A_list',$listarr);
		
		$Delivery = M('delivery');
		$map = array();
		$map['show'] = 1;
		$listarr=$Delivery->where($map)->select();
		$this->assign('d_list',$listarr);
		
		$this->assign('OrderCount',$_SESSION['cart']['total_price']);
		//$this->assign('OrderCount',$_SESSION['cart']['total_price']);
		//echo $_SESSION['cart']['goods_list'][4]['item_name'];
		//$this->assign('cartCount', $_SESSION['cart']['total_num']);	
		$this->assign('C_list',$_SESSION['cart']['goods_list']);		
		$this->display();
	}
	
	public function ordersuccess()
	{
		if(!empty($_GET["oid"]))
		{
			$Order = M('order');
			$map = array();
			$map["orId"] = $_GET["oid"];
			$listarr=$Order->where($map)->find();
			$this->assign('orid',$listarr['orId']);
			$this->assign('orprice',$listarr['orPrice'].$listarr['orPostage']);
			$oid = $listarr['orId'];
			$orname = $listarr['orName']."订单";
			$orprice = $listarr['orPrice'].$listarr['orPostage'] ;
			$this->assign('url','__ROOT__/alipay/alipayapi.php?oid='.$oid.'&orname='.$orname.'&orprice='.$orprice.'');
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
		$dizhi= $_POST["dizhi"];
		$kuaidi = $_POST["kd"] ;
		$daishou = empty($_POST["daishou"])?0:1;
		$zhifu = $_POST["zhifu"];
		$beizhu = $_POST["beizhu"];
		
		$orderID =date("YmdHis") . mt_rand(0,9999);
		$userID	=	intval(session("userID"));
		$userName	=session("userName");
		//订单地址
		$Address = M('address');
		$map = array();
		$map['id']= $dizhi;
		$map['userid'] = $userID;
		$listarr=$Address->where($map)->find();
		$dz = $listarr['shengfen'].$listarr['shi'].$listarr['qu'].$listarr['address'];  //收件地址
		
		$orName = $listarr['lianxiren']; //收件人姓名
		$orPhone = $listarr['phone'];  //收件人电话
		
		//计算运费
		$Delivery = M('sk_delivery');
		$map = array();
		$map['id']= $kuaidi;
		$listarr=$Delivery->where($map)->find();
		//$orPrice = $_SESSION['cart']['total_price'] . $listarr['price'];//订单总价格（包含运费）
		$orCreateDateTime =time();//订单生成时间
		$orPostage = $listarr['price'];//邮费
		
		$orDelivery = 0;
		
		
		$proids="";
		$cartlist = $_SESSION['cart']['goods_list'];
		$OrderDetail = M('order_detail');
		foreach($cartlist as $k=>$v){
			$proids .= $v['item_id'] .",";
			$data['pid'] = $orderID;
			$data['title'] = $v['item_name'];			
			$data['quantity'] = $v['quantity'];
			$data['price'] = $v['price'];	
			$data['fanxian'] = 0;	
			$data['score'] = $v['score'];	
			$date['item_id'] = $v['item_id'];		
			$OrderDetail->add($data); 	
		}
		
		$Order = M('order');
		$data['id'] = $orderID;
		$data['user_id'] = $userID;			
		$data['name'] ="af";//$orName;
		$data['area'] = $dz;
		$data['phone'] = 352535;//$orPhone;
		$data['total_price'] = $_SESSION['cart']['total_price'];
		$data['time'] = $orCreateDateTime;
		//$data['orPostage'] = $orPostage;
		$data['proids'] = $proids;
		//$data['bz'] = $beizhu;
		$return = $Order->add($data); 
		dump($data);
		echo $Order->getLastSql();
		dump($return);
		
		//发票写入
		if(!empty($_POST["isinvoice"]))
		{
			$fapiao = $_POST["fapiao"];
			$taitou = $_POST["taitou"];
			$title = $_POST["title"];
			$Invoice = M("invoice");
			$data['orId'] = $orderID;
			$data['userId'] = $userID;			
			$data['stype'] =$fapiao;
			$data['taitou'] = $taitou;
			$data['title'] = $title;
			$return = $Invoice->add($data); 
		}
		if($return  > 1)
		{
			$this->assign("jumpUrl","__ROOT__/index.php/Cart/ordersuccess/oid/".$orderID."")	;
			$this->success("订单提交成功！");
		}else{
			echo "ssd";
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
}