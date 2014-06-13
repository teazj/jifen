<?php
class NewsModel extends RelationModel{

	protected $_link = array(
		//资讯对栏目
		"NewsType"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"NewsType",
			"foreign_key"=>"tid",
			"mapping_name"=>"tname",
			"mapping_fields"=>"tname",
			"as_fields"=>"tname",
		),
		"NewsContent"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"NewsContent",
			"foreign_key"=>"zid",
			"mapping_name"=>"content",
			"mapping_fields"=>"content",
			"as_fields"=>"content",
		),
	);
}