<?php
//签证首页的国家详情页
class VistaAction extends Action{
	//分页的每页记录数。
	public $page_size = 10;
	public function index(){
		//判断登录
		if(!session('FEUSER') || session('FEUSER')==''){
			$iflogin = 0;
		}else{
			$iflogin = 1;
			$this->assign('user_info',session('FEUSER'));
		}
		$this->assign('iflogin',$iflogin);

		if(!empty($_GET['id'])){
		$vista=D('Vista');
		$condition['pid']=$_GET['id'];
		//这里需要表前缀
		$vcate=M()->query("select id,catename from ff_vcate where id in(select vid from ff_vista where vid>0 and pid={$_GET['id']})");
		$this->assign('vcate',$vcate);
		import("ORG.Util.Page");
		if(empty($_GET['vid'])){
			$vo=$vista->relation(true)->where($condition)->order('vid asc')->select();
		}else{
			$condition['vid']=$_GET['vid'];
			$vo=$vista->relation(true)->where($condition)->order('id asc')->select();
		}
		
		//通过关联表vistainfo获取办理地点
		$ids = array();
		foreach($vo as $k=>$v){
			$ids[$k] = $v['id'];
		}
		$ids_str = implode(',', $ids);
		$vistainfo_m = M('Vistainfo');
		$vistainfo = $vistainfo_m->where("`sid` in ($ids_str)")->select();
		$place_ids = array();
		$vistainfo_format = array();
		foreach($vistainfo as $k=>$v){
			$place_ids[$k] = $v['pid'];
			$vistainfo_format[$v['sid']][$v['pid']] = $v;
		}
		$place_m = M('Place');
		$place = $place_m->where("`id` in (".implode(',',$place_ids).")")->order('id')->getField('id,name');

		foreach($vo as $k=>$v){
			$vo[$k]['place_info'] = $vistainfo_format[$v['id']];
			foreach($vo[$k]['place_info'] as $k1=>$v1){
				$vo[$k]['place_info'][$k1]['place_name'] = $place[$v1['pid']];
			}
		}

		//数组分页 || 数据量不大的情况下 可控 perfectly.
		$count= count($vo);
		$Page= new Page($count,$this->page_size);
		$show = $Page->show();
		$vo = array_slice($vo, $Page->firstRow,$Page->listRows);

		//获取默认地区列表
		$place_a = array_flip($place);
		$place_id = isset($_GET['place_id'])?$_GET['place_id']:current($place_a);
		$place_select = isset($_GET['place_id'])?$place[$_GET['place_id']]:current($place);

		//place_list地区选择列表
		$place_list = array();
		foreach($place as $k=>$v){
			$place_list[$k]['id'] = $k;
			$place_list[$k]['name'] = $v;
		}

		$this->assign('place_select',$place_select);
		$this->assign('place_id',$place_id);
		$this->assign('vo',$vo);
		$this->assign('place',$place);
		$this->assign('place_list',$place_list);
		$this->assign('page',$show);
		$this->display();

		}else{
			$vista=D('Vista');
			//判断关键字是否为空
			if(!empty($_REQUEST['keywords'])){
				$where['mian']  = array('like', "%{$_REQUEST['keywords']}%");
				$where['need']  = array('like', "%{$_REQUEST['keywords']}%");
				$where['vname']  = array('like',"%{$_REQUEST['keywords']}%");
				$where['_logic'] = 'or';
				$vo=$vista->where($where)->order('vid desc')->select();
				if($vo){
					$v=$vista->where($where)->getField("pid");
					$_GET['id']=$v;
					$this->index();
				}
			}else{
				//更多点击则跳转至a 没有all页
				$category = M('category');
				$more_country = $category->where('`pid` = 3')->order('piny')->limit('1')->select();
				$_GET['id']=$more_country[0]['id'];
				$this->index();
			}
		}
	}
}