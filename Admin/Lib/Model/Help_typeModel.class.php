<?php

//自定义Model类
class Help_typeModel extends Model{
	
	protected $_auto = array(
    array('status','getStautus',1,'callback'),  // 新增的时候把status字段设置为1
);

	
	protected function getStautus(){
		return 1;
	}

}