<?php
/*---------------------创建一个商品关联Model类--------------------------*/

class Goods_appraiseModel extends RelationModel{
	
	 protected $_link = array(
		//用户信息，获取用户昵称，图片
		'Users_info'=> array(  
			'mapping_type'=>BELONGS_TO,	//一对一
			'class_name'=>'Users_info',	//表名
			'foreign_key'=>'uid',
			'as_fields'=>'nickname,picname',
		),
	  );
	  
	  
	  
}