<?php
class SendModel extends Model{
	protected $trueTableName = 'rz_country';
	protected $_validate = array(
    array('title','require','认证标题不为空.!'),
    array('title','','认证标题已经存在！',0,'unique',1),
    array('slfw','require','受理范围不为空.!'),
    array('blsj','require','办理时间不为空.!'),
    array('sg_price','number','价格必须是整数.!'),
    array('sell','number','销售次数必须是整数.!'),
    array('slfw','require','受理范围不为空.!'),
);
}
?>