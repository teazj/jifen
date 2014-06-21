<?php

//自定义类
class Help_listModel extends Model{
	
	//自动完成添加状态
	protected $_auto = array ( 
			array('status','myst',1,'callback'),		//新增字段状态默认为1 
	);
	
	
	//自动完成添加状态
	protected function myst(){
		return 1;
	}

}