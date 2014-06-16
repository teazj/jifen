<?php
class EmbassyAction extends CommonAction{
	public function manager(){
		$alphabets = alphabets();
		$RzEmbassy = M('rzEmbassy');
		$rows = $RzEmbassy->select();
		$getTree = tree($rows);
		
		//显示地点
		$address = M('rzAddress');
		$res = $address->select();
		$this->assign('rows',$res);
		$this->assign('list',$getTree);
		$this->assign('alpha',$alphabets);
		$this->display();
	}
	
	//使馆添加
	public function addEmbassyClass(){
		$fid = $_POST['fid'];
		$className = I('post.embassy','','');
		$Class = M('rzEmbassy');
		$data = array(
					'fid'=>$fid,
					'embassy'=>$className,
					'pinyin'=>$_POST['pinyin'],
					'area'=>$_POST['area']
					);
		$row = $Class->data($data)->add();
		if($row){
			$this->success('添加成功');
		}else {
			$this->error('添加失败');
		}
	}
	
	//删除分类
	public function delEmbassyClass () {
		$id = $_GET['id'];
		$clssName = I("get.name","","htmlspecialchars");
		$rzEmbassy = M('rzEmbassy');
		$row = $rzEmbassy->where("fid={$id}")->find();
		if($row){
			$this->error("分类下面有子栏目,请先删除子栏目,在删除分类...");
		}else{
			$res = $rzEmbassy->where("id={$id}")->delete();
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
	public function delEmbassy(){
		$rzEmbassy = M('rzEmbassy');
		$res = $rzEmbassy->where("id={$_GET['id']}")->delete();
		if($res){
			$root_act = M ( 'rootAct' );
			$arr = array ('rname' => session ( 'rname' ), 'actTime' => time (), 'actIp' => get_client_ip (), 'logMsg' => "删除 认证国家-{$_GET['name']}" );
			logInsert ( $arr, $root_act );			
			$this->success('删除认证国家成功');
		}else {
			$this->error('删除失败');
		}
		
	}
	
	
	//栏目修改;
	public function editEmbassy(){
		$id = $_GET['id'];
		$embassy = $_GET['emName'];
		$rzEmbassy = M('rzEmbassy');
		$alpha = alphabets();
		$getRow = $rzEmbassy->where("id={$id}")->find();
		$fRes = $rzEmbassy->where("id={$getRow['fid']}")->find(); //获取父栏目
		$this->assign('embassy',$embassy);
		$this->assign('fRes',$fRes);
		$this->assign('alpha',$alpha);
		$this->assign('getAlpha',$getRow);
		$this->display();
	}
	
	public  function editEm(){
		$id = $_GET['id'];
		$data['embassy'] = $_POST['embassy'];
		$data['pinyin'] = $_POST['pinyin'];
		$data['hot'] = $_POST['hot'];
		$data['are'] = $_POST['area'];
		$rzEmbassy = M('rzEmbassy');
		$res = $rzEmbassy->where("id={$id}")->save($data);
		if($res){
			$this->redirect('Admin/Embassy/manager','','1','修改成功.!');
		}else{
			$this->error('修改失败.!');
		}
	}
	//认证地点添加;
	public function rzddAdd(){
		if(!IS_AJAX)exit('非法提交');
		$name = $_POST['name'];
		$address = M('rzAddress');
		$data = array("name"=>$name);
		$res = $address->data($data)->add();
		$json['status'] = 1;
		$json['info'] = '添加成功.!';
		if($res){
			$this->ajaxReturn($json,'json');
		}else{
			$this->ajaxReturn(array('status'=>0),'json');
		}
	}
	
	//发布使馆国家认证信息;
	public function sendCountry(){
		$id = I('get.id');
		session('id',$id);
		//查询是否已经发布;
		$sendCountry = M('rzCountry');
		$row = $sendCountry->where("eid={$id}")->find();
		if($row['eid']){
			$this->error('信息已经发布');
			return false;
		}
		$img = $_GET['imgInfo'];
		session('emName',I('get.name'));
		$Send = D('Send');
		if($_POST['sub']){
			if (!$Send->create()){
				exit($Send->getError());
			}else{
				$data['eid'] = $_POST['eid'];
				$data['rzType'] = implode(',',$_POST['rzType']);
				$data['title'] = $_POST['title'];
				$data['code'] = date('Ymdhis') . mt_rand(1000,9999);
				$data['slfw'] = $_POST['slfw'];
				$data['blsj'] = $_POST['blsj'];
				$data['sg_price'] = $_POST['sg_price'];
				$data['sell'] = $_POST['sell'];
				$data['hzyj'] = $_POST['hzyj'];
				$data['zpyj'] = $_POST['zpyj'];
				$data['hint'] = $_POST['hint'];
				$data['ydxz'] = $_POST['ydxz'];
				$data['img'] = $_POST['imgInfo'];
				$res = $Send->data($data)->add();
				if($res){
					$this->redirect('Admin/Embassy/manager/','','1',' 发布成功.!');			
					return false;
				}else{
					$this->error('添加失败');
					return false;
				}
			}
		}
		$this->assign('id',session('id'));
		$this->assign('imgInfo',$img);
		$this->assign('emName',session('emName'));
		$this->display();
	}
	
	
	//使馆信息修改;
	public function sendCountryEdit(){
		$id = $_GET['id'];
		$name = I('get.name');
		$Send = D('Send');
		$res = $Send->where("eid=$id")->find();
		
		if($_POST['sub']){
				$eid = $_POST['eid'];
				$data['rzType'] = implode(',',$_POST['rzType']);
				$data['title'] = $_POST['title'];
				$data['code'] = date('Ymdhis') . mt_rand(1000,9999);
				$data['slfw'] = $_POST['slfw'];
				$data['blsj'] = $_POST['blsj'];
				$data['sg_price'] = $_POST['sg_price'];
				$data['sell'] = $_POST['sell'];
				$data['hzyj'] = $_POST['hzyj'];
				$data['zpyj'] = $_POST['zpyj'];
				$data['hint'] = $_POST['hint'];
				$data['ydxz'] = $_POST['ydxz'];
				$row = $Send->where("eid=$eid")->save($data);
			if($row){
				$this->success('修改成功.!');
				return  true;
			}else{
				$this->error('修改失败.!');
				return  false;
			}
		}
		$this->assign('res',$res);
		$this->assign('name',$name);
		$this->assign('id',$id);
		$this->display();
	}
	public function upload(){
		if($_POST['btn']=='上传'){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Gq/';// 设置附件上传目录
			if(!$upload->upload()) {// 上传错误提示错误信息
				$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
				$info =  $upload->getUploadFileInfo();
			}
			$this->redirect('Admin/Embassy/SendCountry/',array('imgInfo'=>$info[0]['savename']),'1',' 上传成功.!');			
		}

	}
		
}
?>