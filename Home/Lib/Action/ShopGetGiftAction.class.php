<?php
class ShopGetGiftAction extends CommonAction{
    public function _initialize(){
        //友情链接
        $listflink=M("Flink")->where('isshow=1')->select();
        $this->assign("listflink",$listflink);
    }
	public function index(){
		$this->display();
	}
	
	
	//查询积分
	public function getGift(){
		$orderCode = $_POST['orderCode'];
		if(!IS_AJAX)halt('非法访问');
		$Orders = M('inte.qzOrders',' ');
		$row = $Orders->where("qz_number='{$orderCode}'")->find();
		if($row){
			$data['status'] = 1;
			if($row['inte']==null){
				$data['info'] = "积分已兑光";
				$data['sign']= 'eo';
			}else if(empty($row['u_num'])){
				$data['info'] = "兑换人数已上限";	
			}else{
				$data['info'] = "剩余".$row['inte']."积分";
			}
			
			$this->ajaxReturn($data,'json');
		}else{
			$data['msg'] = '查询失败或无此订单号';
			$this->ajaxReturn($data,'json');
		}
		
	}
	
	//获取积分;
	public function gain(){
		if(!IS_POST) exit('非法访问');
		$number = I('post.orderNumber');
		$num = I('post.num');
		$order = M('qzOrders');
		$row = $order->where()->find();
		if($num  > $row['inte'])halt('积分兑换数目大于剩余积分数目');
		
		//更新订单(签证,认证);
		$data['u_num'] = $row['u_num']-1;
		$u_num = $order->where("qz_number='{$number}'")->save($data);
		if(!$u_num) exit('订单人数更新失败');
		
		//新增积分记录;
		$inte_log = M('inteLog');
		$int['uid'] = session('uid');
		$int['inteTime'] = time();
		$int['orderNumber'] = $number;
		$int['billInte'] = $num;
		$ini = $inte_log->data($int)->add();
		if(!$ini) exit('新增积分记录失败');
		
		//更新用户的积分;
		$where = "id={session('uid')}";
		$in_data = $this->updateUserIntegral($where, $num, 'add');
		if($in_data){
			$this->success('');
		}else{
			halt('兑换失败');
		}
			
	}
	/**
	 * 更新用户的积分数目;
	 * @param String $where
	 * @param Array $data
	 */
	public function updateUserIntegral($where,$num,$status){
		$User = M('User');
		$row = $User->where($where)->getField('howInte');
		if($status=='add'){
			$data['howInte'] = $row['howInte']+$num;
			return $User->where($where)->save($data);
		}
		
		if($status=='del'){
			$data['howInte'] = $row['howInte']-$num;
			return $User->where($where)->save($data);
		}
		
		
	}
	
}
?>