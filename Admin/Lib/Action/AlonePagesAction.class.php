<?php
class AlonePagesAction extends CommonAction {
	Public function _initialize() {
		C('DB_NAME','inte');
		C('DB_PREFIX','');
		C('TMPL_ENGINE_TYPE', 'Think');
	}
	public function comAndcredit($id) {
		$oAlonepage = M ( 'alonepage' );
		$row = $oAlonepage->where ( "id={$id}" )->find ();
		//$title = I ( 'post.pageTitle', '', 'htmlspecialchars' );
		$title = htmlspecialchars($_POST ['pageTitle']);
		$uEditor = $_POST ['uEditor'];
		$sub = $_POST ['sub'];
		$data ['pageTitle'] = $title;
		$data ['pageMain'] = $uEditor;
		if ($sub) {
			if (isset ( $row ['id'] )) {
				$res = $oAlonepage->where ( "id={$row['id']}" )->save ( $data );
				if ($res) {
					$this->success ( '修改成功' );
					exit ();
				} else {
					$this->success ( '修改失败' );
					exit ();
				}
			} else {
				$ress = $oAlonepage->data ( $data )->add ();
				if ($ress) {
					$this->success ( '新增成功' );
					exit ();
				} else {
					$this->success ( '新增失败' );
					exit ();
				}
			}
		}
		return $row;
	}
	
	//独立页面显示;
	public function pageList() {
		$oAlonepage = M ( 'alonepage' );
		$row = $oAlonepage->select ();
		$this->assign ( 'list', $row );
		$this->display ();
	}
	
	//添加页面;
	public function addPage() {
		$oPage = M ( 'alonepage' );
		//$pageName = I ( 'post.pageName', '', 'htmlspecialchars' );
		$pageName = htmlspecialchars($_POST['pageName']);
		//$pageTitle = I ( 'post.pageTitle', '', 'htmlspecialchars' );
		$pageTitle = htmlspecialchars($_POST['pageTitle']);
		//$pageMain = I ( 'post.uEditor' );
		$pageMain = htmlspecialchars($_POST['uEditor']);
		$sub = $_POST ['sub'];
			if ($sub) {
				$data = array ('pageName' => $pageName, 'pageTitle' => $pageTitle, 'pageMain' => $pageMain );
				$res = $oPage->data ( $data )->add ();
				if ($res) {
					$this->success("添加成功!");
					//echo "a";
					//echo "添加成功";
				} else {
					$this->error('信息添加失败...');
					//echo "添加失败";
				}
			}else{
				$this->display ();
			}
		//$this->assign('act',$_GET['act']);
	}
	
	public function editPage(){
		$id = $_REQUEST['id'];
		$oPage = M('alonepage');
		$row = $oPage->where("id={$id}")->find();
		if($_POST['sub']){
			//$pid = $_POST['pid'];//修改
			$data = array(
						'pageName'=>$_POST['pageName'],
						'pageTitle'=>$_POST['pageTitle'],
						'pageMain'=>$_POST['uEditor']
						);
			$res = $oPage->where("id={$id}")->save($data);
			if($res){
				$this->success('修改成功');
				return true;
			}else{
				$this->error('修改失败');
				return false;
			}			
		}
		$this->assign('list',$row);
		$this->display('editPage');
	}
	
	
	//删除单页
	public function delPage(){
		$id = $_GET['id'];
		$oPage = M('alonepage');
		$res = $oPage->where("id={$id}")->delete();
		if($res){
			$this->success('删除成功.!');
		}else{
			$this->error('删除失败.!');
		}
	}
}
?>