<?php/*---------------------------商品Model类-------------------------------------*/class Goods_picModel extends Model {		//自动验证	protected $_validate = array(	);		//自动填充	protected $_auto = array( 		array('status','1',self::MODEL_INSERT,'string'),	);}