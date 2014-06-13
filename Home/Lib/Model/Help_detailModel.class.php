<?php

//自定义Model类(添加问题)

class Help_detailModel extends Model{
	protected $_auto = array (
		array('status','Myget',1,'callback'),
		array('addtime','Mytime',1,'callback'),
	);
	
	//添加时自动填充状态
	protected function Myget(){
		return 0;
	}
	//添加时自定填充时间戳
	protected function Mytime(){
		return time();
	}
}