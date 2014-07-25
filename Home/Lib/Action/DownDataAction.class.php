<?php
class DownDataAction extends Action{
	public function _initialize(){
		//友情链接
		$listflink=M("Flink")->where('isshow=1')->select();
		$this->assign("listflink",$listflink);
	}
	public function download(){
		$boxs = fPage('Rzdownfile', 10);
		// print_r($boxs);
		$this->assign('files',$boxs['list']);
		$this->assign('page',$boxs['page']);
		$this->display();
	}

	//下载资料
	public function down(){
		import("ORG.Net.Http"); 
		$file = $_GET['file'];
		$file = "Public/Download/".$file;
		if(!file_exists($file)){
			echo "文件不存在或已移除！";
			exit();
		}
		M('Rzdownfile')->where('id='.$_GET['id'])->setInc('click');
		Http::download($file);
	} 
}
?>