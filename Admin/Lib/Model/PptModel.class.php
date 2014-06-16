<?php
class PptModel extends RelationModel{
	protected $_link = array(
		"Ppttype"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Ppttype",
			"foreign_key"=>"pid",
			"mapping_name"=>"typename",
			"mapping_fields"=>"typename",
			"as_fields"=>"typename",
		),
	);
}