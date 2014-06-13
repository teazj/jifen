<?php
class RzvistaModel extends RelationModel{

	protected $_link = array(
		"Rzcategory"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Rzcategory",
			"foreign_key"=>"pid",
			"mapping_name"=>"name",
			"mapping_fields"=>"name",
			"as_fields"=>"name",
		),
		"Rzvcate"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Rzvcate",
			"foreign_key"=>"vid",
			"mapping_name"=>"catename",
			"mapping_fields"=>"catename",
			"as_fields"=>"catename",
		),
		

	);
}