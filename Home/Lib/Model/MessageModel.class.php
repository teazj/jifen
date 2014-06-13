<?php
class MessageModel extends RelationModel{

	protected $_link = array(
		//资讯对栏目
		"Messagetype"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Messagetype",
			"foreign_key"=>"tid",
			"mapping_name"=>"tname",
			"mapping_fields"=>"tname",
			"as_fields"=>"tname",
		),
		"Messagecontent"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Messagecontent",
			"foreign_key"=>"zid",
			"mapping_name"=>"content",
			"mapping_fields"=>"content",
			"as_fields"=>"content",
		),
	);
}