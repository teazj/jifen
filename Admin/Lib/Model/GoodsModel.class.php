<?php/*---------------------------商品Model类-------------------------------------*/class GoodsModel extends Model {	//字段映射	protected $_map=array(		"jiage"=>"price",	);	//自动验证	protected $_validate = array(		array("name","require","商品名称不可为空！"),		array("tid","number","商品类别必须是数据"),		array("price","/\d{1,6}/","价格必须是货币格式"),	);		//自动填充	protected $_auto = array( 		array("etime",'time',3,'function'),	);}