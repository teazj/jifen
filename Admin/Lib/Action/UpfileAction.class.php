<?php
/*-------------------------文件上传处理Action---------------------------*/

class UpfileAction extends Action{
	
	/*-------------上传商品图片处理-----------------------------*/
	public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Admin/Images/Upload/Goods/';// 设置附件上传目录
		
		//对上传图片的缩放设置
		$upload->thumb = true;
		$upload->thumbMaxWidth = '50,200,400,800';
		$upload->thumbMaxHeight = '50,200,400,800';
		$upload->thumbPrefix="50_,200_,400_,800_";
		$upload->thumbRemoveOrigin=false;//删除原图
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info = $upload->getUploadFileInfo();
			//dump($info);
			$name = $info[0]['savename'];//获取文件名
			return $name;
		}
	}
	
	/*-------------上传商品详情图片处理-----------------------------*/
	public function aupload(){
		//准备上传返回的结果
		$resinfo = array("err"=>"","msg"=>"");
		
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Admin/Images/Upload/Goods_detail/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			$resinfo['err']=$upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$resinfo['msg']=__ROOT__."/Public/Admin/Images/Upload/Goods_detail/".$info[0]['savename']; //获取上传的图片名
			//执行图片信息的添加
			$data['gid']=0;
			$data['status']=2;	//状态2为详情图片
			$data['pic']=$info[0]['savename'];	
			M("Goods_pic")->add($data);
			$_POST['pic']=$info[0]['savename'];	
		}
		
		echo json_encode($resinfo);
		exit();
	}
}