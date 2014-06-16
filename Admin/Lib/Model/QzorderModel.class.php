<?php
class QzorderModel extends RelationModel{
	protected $_link = array(
		"UsersInfo"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"UsersInfo",
			"foreign_key"=>"user_id",
			"mapping_name"=>"nickname",
			"mapping_fields"=>"nickname",
			"as_fields"=>"nickname",
		),
	);
}