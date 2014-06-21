<?php
class DownDataAction extends CommonAction {
	public function downList() {
		$DownData = M('Rzdownfile');
		$rows = $DownData->select();		
		$this->assign('list',$rows);
		$this->display();
	}
	
	
	//上传资料
	Public function upload() {
		import ( 'ORG.Net.UploadFile' );
		$upload = new UploadFile (); // 实例化上传类
		$upload->savePath = './Public/Admin/Images/Rzdown'; // 设置附件上传目录
		if (! $upload->upload ()) { // 上传错误提示错误信息
			$this->error ( $upload->getErrorMsg ()."sss" );
		} else { // 上传成功 获取上传文件信息
			$info = $upload->getUploadFileInfo ();
		}
		$DownData = M('Rzdownfile');
		$data = array(
					'fileTitle'=>$_POST['fileTitle'],
					'upfile'=>$info[0]['savename'],
					'up_time'=>time()
					);
		$res = $DownData->data($data)->add();
		if($res){
			$this->success('上传成功');
		}else{
			$this->error('上传失败');
		}
	}
	
	public function editFile(){
		$id = $_GET['id'];
		$DownData = M('Rzdownfile');
		$res = $DownData->where("id={$id}")->find();
		$this->assign('res',$res);
		$this->display();
	}
	
	//修改的判断;
	public function editIf(){
		$id = $_GET['id'];
		$title = $_POST['fileTitle'];
		$hid  = $_POST['hid'];  //上一次的文件名;
		$DownData = M('Rzdownfile');
		if(isset($id) && empty($_FILES['upFile']['name'])){
			$data=array('fileTitle'=>$title,'up_time'=>time());
			$res = $DownData->where("id={$id}")->save($data);
			if(!$res){
				$this->error('修改失败');
				return  false;
			}else{
				$this->success('修改成功');
				return false;
			}
		}
		
		if(isset($id) && isset($_FILES['upFile']['name'])){
			import ( 'ORG.Net.UploadFile' );
			$upload = new UploadFile (); // 实例化上传类
			$upload->savePath = './Public/Admin/Images/Rzdown'; // 设置附件上传目录
			if (! $upload->upload ()) { // 上传错误提示错误信息
				$this->error ( $upload->getErrorMsg () );
			} else { // 上传成功 获取上传文件信息
				$info = $upload->getUploadFileInfo ();
			}
			$DownData = M('Rzdownfile');
			$data = array(
						'fileTitle'=>$_POST['fileTitle'],
						'upfile'=>$info[0]['savename'],
						'up_time'=>time()
						);
			
			$res = $DownData->where("id={$id}")->save($data);
			if($res){
				$filePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__.$upload->savePath . $hid;
				if(!file_exists($filePath)){exit('文件未找到.!');} ;
				if(!unlink($filePath))exit('删除文件失败');
 				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}	
		}
	}
	
	
	//删除资料
	public  function delFile(){
		$id = $_GET['id'];
		$upfile = $_GET['upfile'];
		$DownData = M('Rzdownfile');
		$res = $DownData->where("id=$id")->delete();
		$filePath = $_SERVER['DOCUMENT_ROOT'].__ROOT__. '/Public/Admin/Images/Rzdown/' . $upfile;
		if(!unlink($filePath)) exit ('删除文件失败');
		if(!$res) exit('删除失败');
		$this->success('删除条目,文件成功.!');
	}

}
?>