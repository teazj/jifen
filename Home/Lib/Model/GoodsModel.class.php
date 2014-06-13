<?php
/*---------------------创建一个商品关联Model类--------------------------*/

class GoodsModel extends RelationModel{
	
	 protected $_link = array(
		//商品对图片，找所有图片
		'Goods_pics'=> array(  
			'mapping_type'=>HAS_MANY,	//一对多
			'class_name'=>'Goods_pic',	//表名
			'foreign_key'=>'gid',	//外键
			'mapping_name'=>'pics',	//映射到数组下标中,在一对多使用的relation中使用此映射名，而不是Goods_pic
			'mapping_fields'=>'pic,status',	//查找字段
			'mapping_order'=>'id desc',	//排序
		),
		//商品详情，只找公司名
		'Goods_detail'=> array(  
			'mapping_type'=>HAS_ONE,	//一对一
			'class_name'=>'Goods_detail',	//表名
			'foreign_key'=>'id',
			'as_fields'=>'company',
		),
		//商品详情，找所有详情
		'Goods_details'=> array(  
			'mapping_type'=>HAS_ONE,	//一对一
			'class_name'=>'Goods_detail',	//表名
			'foreign_key'=>'id',
			'as_fields'=>'company,snum,content,details',
		),
		//类别查询，找商品类别
		'Goods_type'=> array(  
			'mapping_type'=>BELONGS_TO,	//一对一
			'class_name'=>'Goods_type',	//表名
			'foreign_key'=>'tid',
			'mapping_fields'=>'pid tpid,name tname', //查找字段，并映射成别名
			'as_fields'=>'tpid,tname',	//映射到数组下标中
		),

	  );
	  
	  
	  
}