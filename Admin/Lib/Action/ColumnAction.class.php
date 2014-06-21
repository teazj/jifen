<?php
//认证的速格动态,知识宝殿
class ColumnAction extends CommonAction{
	//栏目列表;
	public function index(){
		$giftClass = M('rzColumn');
		$rows = $giftClass->select();
		$getTree = tree($rows);
		$this->assign('list',$getTree);
		$this->display();
	}
	/**
	 * 
	 * 删除分类,栏目整合;
	 * @param Int $id  
	 * @param String $name  
	 * @param String $class  分类
	 * @param String $part   栏目
	 * @param String $msg  提示信息
	 */
	public function giftClassAndPart($id,$name,$class,$msg='',$part=''){
		$id = $_GET[$id];
		$clssName = I("get.{$name}","","htmlspecialchars");
		$giftClass = M('giftClass');
		$row = $giftClass->where("fid={$id}")->find();
		if($row){
			$this->error("请先删除{$msg}");
		}else{
			$res = $giftClass->where("id={$id}")->delete();
			if($res){
			$root_act = M ( 'rootAct' );
			$arr = array ('rname' => session ( 'rname' ), 'actTime' => time (), 'actIp' => get_client_ip (), 'logMsg' => "删除 {$class}-{$clssName}" );
			logInsert ( $arr, $root_act );
				$this->success("删除{$class}成功");
			}else {
				$this->error("删除{$class}失败");
			}
		}
	}

	//栏目添加
	public function addColClass(){
		$fid = $_POST['fid'];
		$className = I('post.className','','');
		$Class = M('rzColumn');
		$data = array(
					'fid'=>$fid,
					'col_name'=>$className
					);
		$row = $Class->data($data)->add();
		if($row){
			$this->success('添加成功');
		}else {
			$this->error('添加失败');
		}
	}	
	
	
	//删除分类
	public function delColClass () {
		$id = $_GET['id'];
		$clssName = I("get.name","","htmlspecialchars");
		$giftClass = M('rzColumn');
		$row = $giftClass->where("fid={$id}")->find();
		if($row){
			$this->error("分类下面有子栏目,请先删除子栏目,在删除分类...");
		}else{
			$res = $giftClass->where("id={$id}")->delete();
			if($res){
			$root_act = M ( 'rootAct' );
			$arr = array ('rname' => session ( 'rname' ), 'actTime' => time (), 'actIp' => get_client_ip (), 'logMsg' => "删除 分类-{$clssName}" );
			logInsert ( $arr, $root_act );
				$this->success("删除分类成功");
			}else {
				$this->error("删除分类失败");
			}
		}
	}
	
	//删除栏目;
	public function delClass(){
		$id = $_GET['id'];
		$clssName = I("get.name","","htmlspecialchars");
		$Gift = M('rz_col_class');
		$sql = "delete rz_col_class,rz_column from rz_column left join rz_col_class on rz_col_class.rcid=rz_column.id where rz_column.id={$id}";
		$res = $Gift->query($sql);
		$row = mysql_affected_rows();		
		if($row>0){
			$root_act = M ( 'rootAct' );
			$arr = array ('rname' => session ( 'rname' ), 'actTime' => time (), 'actIp' => get_client_ip (), 'logMsg' => "删除 栏目-{$clssName}" );
			logInsert ( $arr, $root_act );
			$this->success('删除栏目成功');
		}else{
			$this->error('删除栏目失败');
		}
	}
	
	//栏目编辑的信息
	public function editMsg(){
		//栏目名称
		$id = $_GET['id'];
		$Gift = M('rzColumn');
		$row =$Gift->where("id={$id}")->find();
		$this->assign('row',$row);
		//栏目所属分类
		$giftClass = M('rzColumn');
		$rows = $giftClass->select();
		$getTree = tree($rows);
		$this->assign('list',$getTree);
		$this->display();
	}
	
	//栏目编辑信息修改;
	public function edit(){
		$cId = $_POST['cId'];
		$className = I('post.className','','htmlspecialchars');
		$classVal = $_POST['classVal'];
		$sub = $_POST['sub'];
		if(!IS_POST) exit('非法提交');
		$Gift = M('rzColumn');
		$data = array(
					'fid'=>$classVal,
					'col_name'=>$className
					 );
		$num = $Gift->where("id={$cId}")->save($data);
		if($num){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}
	
	//发布信息;
	public function sendMsg(){
		$id = $_GET['id'];
		if($_POST['sub']){
			$col_class = M('rz_col_class');
			$data = array(
					'rcid'=>$_POST['id'],
					'title'=>$_POST['title'],
					'from'=>$_POST['from'],
					'author'=>$_POST['author'],	
					'content'=>$_POST['uEditor'],
					'sub_time'=>time()
						);
			$res = $col_class->data($data)->add();
			if(!$res){
				$this->error('发布失败');
				return false;
			}
			$arr = array ('rname' => session ( 'rname' ), 'actTime' => time (), 'actIp' => get_client_ip (), 'logMsg' => "添加栏目id为{$_POST['id']}的栏目标题{$_POST['title']}" );
			$Act = M('root_act');
			logInsert($arr, $Act);
			$this->redirect('Admin/Column/index','','1','添加成功');
		}
	
			
		$this->assign('id',$id);
		$this->display('bulletin');
	}
	
	//栏目列表;
	public function columnList(){
		$id = $_GET['id'];
		$col_class = M('rz_col_class');
		$res = $col_class->where("rcid={$id}")->select();
	 	$this->assign('list',$res);
		$this->display();
	}
	
	//删除栏目
	public function delCol(){
		$id = $_GET['id'];
		$col_class = M('rz_col_class');
		$res = $col_class->where("id={$id}")->delete();		
		if(!$res){
			$this->error();
			return false;
		}
		$this->success('删除成功');
	}
	
	
	//修改栏目
	public  function editCol(){
		$id = $_GET['id'];
		$col_class = M('rz_col_class');
		$res = $col_class->where("id={$id}")->find();
		
		if($_POST['sub']){
			$id  = $_POST['id'];
			$data['title'] = $_POST['title'];
			$data['from'] = $_POST['from'];
			$data['author'] = $_POST['author'];
			$data['uEditor'] = $_POST['uEditor'];
			$res  = $col_class->where("id={$id}")->save($data);
			if($res){
				$this->success('修改成功');
				return true;
			}else{
				$this->error('修改失败');
				return false;
			}
		}
		$this->assign('res',$res);
		$this->display();
	}
}
?>