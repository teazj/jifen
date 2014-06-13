<?php
	class GoodsAction extends Action{
		function index(){
			$goods_id = I('goods_id' , 0 , intval);
			$_SESSION['click'][$goods_id]['click'] += 1;
			$goods = M('goods') -> where(array('id' => $goods_id)) -> find();
			$goods['image_path'] = get_image_path($goods['image'] , 'detail');
			$this -> goods = $goods;
			$this -> head_leader = C('head_leader');
			$this->display();
		}
		
		function demo(){
			$_SESSION = array();
		}
		
	}
