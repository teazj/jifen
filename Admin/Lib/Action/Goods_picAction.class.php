<?php
/*---------------------------商品图片管理Action---------------------------*/
class Goods_picAction extends CommonAction{
	//指定上传文件的目录
	private $path="./Public/Admin/Images/Upload/Goods/"; 

	/*--------------重写首页显示-----------------*/
	public function index(){
		$this->assign("gid",$_GET['gid']);
		$model=M("Goods_pic");
		$this->assign("pic",$model->field("id,gid,pic,status")->where("gid={$_GET['gid']} and status=1")->select());
		parent::index();
	}
	
	/*--------------执行图片上传显示-----------------*/
	public function upload(){
		//保存图片
		//$pic=new UpfileAction();
		//$picName=$pic->upload();
		
		if(!empty($_SESSION['swfpic'])){
			foreach($_SESSION['swfpic'] as $v){
				//录入商品图片信息
				$goodsPic=D("Goods_pic");
				$goodsPic->gid=$_POST['gid'];
				//初始为1，显示
				$goodsPic->status=1;
				$goodsPic->pic=$v;
				//dump($goodsPic);
				//执行商品图片添加
				//$info=$goodsPic->add();
				$goodsPic->add();
			}
			//增加数据库图片数量
			$model=M("Goods");
			$model->where("id={$_POST['gid']}")->setInc("pnum",count($_SESSION['swfpic']));
			//清空session
			$_SESSION['swfpic']=null;
			//跳转回页面
			$this->success("图片添加成功！",U("Goods_pic/index"));	
		}else{
			//跳转回页面
			$this->success("没有图片上传！",U("Goods_pic/index"));	
		}
	}
	
	/*--------------执行图片删除操作-----------------*/
	public function del(){
		//获取图片名
		$model=M("Goods_pic");
		$picture=$model->where("id={$_POST['id']}")->find();
		//图片数量减1
		$model=M("Goods");
		$model->where("id={$picture['gid']}")->setDec("pnum",1);

		//删除图片
		@unlink("./Public/Admin/Images/Upload/Goods/800_800_{$picture['pic']}");
		@unlink("./Public/Admin/Images/Upload/Goods/400_400_{$picture['pic']}");
		@unlink("./Public/Admin/Images/Upload/Goods/300_180_{$picture['pic']}");
		@unlink("./Public/Admin/Images/Upload/Goods/300_600_{$picture['pic']}");
		@unlink("./Public/Admin/Images/Upload/Goods/240_320_{$picture['pic']}");
		@unlink("./Public/Admin/Images/Upload/Goods/{$picture['pic']}");
		//执行数据库删除
		parent::delete();
	}
	
	/*-----------------------多文件显示分帧页面-------------------------------*/
	public function loadswf(){
		$this->display("swfindex");
	}
	
	/*-----------------------使用插件执行多图片上传-------------------------------*/
	public function doupload(){
		//判断文件上传信息是否有效
		if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
			echo "ERROR:invalid upload";
			exit(0);
		}

		// 获取图片上传临时文件名及路径
		$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
		if (!$img) {
			echo "ERROR:could not create image handle ". $_FILES["Filedata"]["tmp_name"];
			exit(0);
		}
		//保存图片信息
		$filename = substr(md5($_FILES["Filedata"]["tmp_name"] + rand()*100000),0,20).".jpg";
		move_uploaded_file($_FILES["Filedata"]["tmp_name"],$this->path.$filename);
		
		//进行图片缩放小图
		
		$pics=array();
		//缩放成不同尺寸比例的五张图片
		$this->loadpic($img,$filename,800,800,"800_800_",false);
		$this->loadpic($img,$filename,400,400,"400_400_",false);
		$this->loadpic($img,$filename,308,180,"300_180_",false);
		$this->loadpic($img,$filename,300,600,"300_600_",false);
		$this->loadpic($img,$filename,240,320,"240_320_",true);
		//把文件名存入session中
		$_SESSION['swfpic'][]=$filename;
		
	}
	
	/*-----------------------使用插件时自定义的执行图片缩放函数-------------------------------*/
	private function loadpic($img,$filename,$w,$h,$prex="s_",$show=false){
		$width = imageSX($img);
		$height = imageSY($img);
		$target_width = $w;
		$target_height = $h;
		$target_ratio = $target_width / $target_height;

		$img_ratio = $width / $height;

		if ($target_ratio > $img_ratio) {
			$new_height = $target_height;
			$new_width = $img_ratio * $target_height;
		} else {
			$new_height = $target_width / $img_ratio;
			$new_width = $target_width;
		}

		if ($new_height > $target_height) {
			$new_height = $target_height;
		}
		if ($new_width > $target_width) {
			$new_height = $target_width;
		}

		$new_img = ImageCreateTrueColor($w, $h);
		$c = imagecolorallocate($new_img,255,255,255); //分配一个颜色
		imagefill($new_img,0,0,$c); //填充背景颜色
		if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
			echo "ERROR:Could not resize image";
			exit(0);
		}
		imagejpeg($new_img,$this->path.$prex.$filename); //输出图像。
		if($show==true){
			echo "FILEID:".__ROOT__."/Public/Admin/Images/Upload/Goods/".$prex.$filename;
		}	
		return;
	}
	
}
