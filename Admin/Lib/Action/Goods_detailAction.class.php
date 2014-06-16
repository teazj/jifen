<?php
header('Content-Type:text/html;charset=utf-8');
/*---------------------------商品管理Action---------------------------*/
class Goods_detailAction extends CommonAction{

	/*----------显示商品详情页面-------------*/
	public function show(){
		//获取商品常用信息
		$model=M("Goods");
		$this->assign("goods",$model->where("id='{$_GET['gid']}'")->find());
		//获取商品详细信息
		$model=M("Goods_detail");
		$this->assign("vo",$model->where("pid='{$_GET['gid']}'")->find());
		//获取所有类别名
		$this->assign("typelist",$this->typelist());
		$this->display();
	}
	
	/*-------------获取所有类别名，转换显示商品类别名用------------------------*/
	public function typelist(){
		//商品分类的名称转换
		$model=	M("Goods_type");
		$typecount=$model->field("id,name")->select();
		$typelist=array();
		foreach($typecount as $v){
			$typelist[$v['id']]=$v['name'];
		}
		return $typelist;
	}
	
	/*-----------------重写显示添加表单页面-------------------------------*/
	public function add(){
		//查询主商品类别
		$model=M("Goods_type");
		$this->assign("maintype",$model->field("id,name")->where("rank=1")->select());
		//调用父类方法
		parent::add();
	}
	
	/*----------------重写执行添加操作，多表查询--------------------------*/
	public function insert(){
		//商品详情添加
		$model=D("Goods");
		//print_r($_FILES);
		$upload=$this->upload();

		$_POST['thumb']='/data/attachments/m_'.$upload[0]['savename'];
		//echo $upload[0]['savepath']."/".$upload[0]['savename'];
		//exit;
		$model->create();
		//保存成功
		if ($result = $model->add()) { 
		//成功提示
			$_POST['pid']=$result;
			parent::insert();
		} else {
			//失败提示
			$this->error(L('新增失败').$model->getLastSql());
		}
	}
	
	/*--------添加成功后回调方法(在这里主要处理添加商品的图片信息)-----------*/
	public function _tigger_insert($model){
		//获取所有关联图片
		$mod = M("Goods_pic");
		$plist = $mod->where("gid=0")->select();
		if(!empty($plist)){
			//遍历查出的每个图片
			foreach($plist as $v){
				//使用正则匹配并判断图片是否存在
				if(preg_match("/{$v['pic']}/",$_POST['details'])){
					$mod->where("id='{$v['id']}'")->setField('gid',$model->id);
				}else{
					//若图片不在详情内，则执行删除。
					$mod->delete($v['id']);
					unlink("./Public/Admin/Images/Upload/Goods_detail/".$v['pic']);
				}
			}
		}
	}
	
	/*----------重写显示编辑状态页面-------------*/
	public function edit(){
		//获取商品常用信息
		$model=M("Goods");
		$goods=$model->where("id='{$_GET['gid']}'")->find();
		$this->assign("goods",$goods);
		//获取商品详细信息
		$model=M("Goods_detail");
		$this->assign("vo",$model->where("pid='{$_GET['gid']}'")->find());
		//获取所有类别名
		$this->assign("typelist",$this->typelist());
		//查询主商品类别
		$model=M("Goods_type");
		$tid=$goods['tid'];
		if($tid!=0){
			$mid=	$model->where("id=".$tid)->getField('pid');
			$this->assign("tid",$tid);
			$this->assign("mid",$mid);
		}
		$this->assign("maintype",$model->field("id,name")->where("rank=1")->select());
		$this->assign("subtype",$model->field("id,name")->where("pid=".$mid)->select());
		//图片上传session
		$_SESSION['article_img']=array();
		$this->display();
	}
	
	/*----------重写执行编辑操作-------------*/
	public function update(){
		//修改商品常用信息
		$model = D("Goods");
		if(!empty($_FILES)){
			
			$upload=$this->upload();
			//print_r($upload);
			//exit;
			$_POST['thumb']='/data/attachments/m_'.$upload[0]['savename'];
		}else{
			unset($_POST['thumb']);	
		}
		if(false === $model->create()) {
			$this->error($model->getError());
		}
		// 更新数据
		if(false !== $model->save()) {
			//成功则更新详细信息
			$pid=$_POST['pid'];
			$_POST['pid']=$_POST['id'];
			$_POST['id']=$pid;
			parent::update();
		} else {
			//错误提示
			$this->error(L('更新失败'));
		}
	}
	
	/*---------修改成功后回调方法(在这里主要处理添加商品的详细图片信息)----------*/
	public function _tigger_update($model){
		//获取所有关联图片
		$mod = M("Goods_pic");
		$plist = $mod->where("gid=0")->select();
		if(!empty($plist)){
			//遍历查出的每个图片
			foreach($plist as $v){
				//使用正则匹配并判断图片是否存在
				if(preg_match("/{$v['pic']}/",$_POST['details'])){
					$mod->where("id='{$v['id']}'")->setField('gid',$_POST['id']);
				}else{
					//若图片不在详情内，则执行删除。
					$mod->delete($v['id']);
					unlink("./Public/Admin/Images/Upload/Goods_detail/".$v['pic']);
				}
			}
		}
	}
	
}
