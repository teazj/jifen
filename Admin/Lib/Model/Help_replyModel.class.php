<?php

	//自定义回复添加类
class Help_replyModel extends Model{
	protected $_auto = array (
		array('replytime','mytime',1,'callback'),
	);
	
	protected function mytime(){
		return time();
	}
}