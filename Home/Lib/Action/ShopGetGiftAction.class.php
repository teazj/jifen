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
		$Orders = M('Qzorders');
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

		$orderCode = $_POST['orderCode'];
		if(!IS_AJAX)halt('非法访问');
		$Orders = M('Qzorders');
		$row = $Orders->where("qz_number='{$orderCode}'")->find();
		if($row){
			$data['status'] = 1;
			if($row['inte']==null){
				$data['info'] = "积分已兑光";
				$data['sign']= 'eo';
			}else if(empty($row['u_num'])){
				$data['info'] = "兑换人数已上限";	
			}else{
				$num = $row['inte'];
				$number = $orderCode;
		
				//更新订单(签证,认证);
				$data['u_num'] = $row['u_num']-1;
				$u_num = $Orders->where("qz_number='{$number}'")->save($data);
				if(!$u_num) {
					$data['info'] = '订单人数更新失败';
					$this->ajaxReturn($data,'json');
				}
				
				//新增积分记录;
				$inte_log = M('Intelog');
				$int['uid'] = $_SESSION['FEUSER']['id'];
				$int['inteTime'] = time();
				$int['orderNumber'] = $number;
				$int['billInte'] = $num;
				$ini = $inte_log->data($int)->add();
				if(!$ini){
					$data['info'] = '新增积分记录失败';
					$this->ajaxReturn($data,'json');
				} 
				
				//更新用户的积分;
				$where = "id=".$_SESSION['FEUSER']['id'];
				$in_data = $this->updateUserIntegral($where, $num, 'add');
				if($in_data){
					$data['info'] = '兑换成功';
					$data['status'] = 2;
				}else{
					$data['info'] = '兑换失败';
				}
			}
			
			$this->ajaxReturn($data,'json');
		}else{
			$data['msg'] = '查询失败或无此订单号';
			$this->ajaxReturn($data,'json');
		}	
	}
	/**
	 * 更新用户的积分数目;
	 * @param String $where
	 * @param Array $data
	 */
	public function updateUserIntegral($where,$num,$status){
		$User = M('Users');
		$row = $User->where($where)->getField('point');
		if($status=='add'){
			$data['point'] = $row+$num;
			return $User->where($where)->save($data);
		}
		
		if($status=='del'){
			$data['point'] = $row['point']-$num;
			return $User->where($where)->save($data);
		}
		
		
	}
	
}
?>