<?php
/*---------------------------商品Model类-------------------------------------*/
class Goods_detailModel extends Model {

	//自动验证
	protected $_validate = array(
		array("snum","require","库存不可为空！"),
	);
	
	//自动填充
	protected $_auto = array( 
		array('ctime','time',self::MODEL_INSERT,'function'),	
	);
}