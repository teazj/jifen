<?php
class VistaModel extends RelationModel{
	protected $_link = array(
		"Category"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Category",
			"foreign_key"=>"pid",
			"mapping_name"=>"name",
			"mapping_fields"=>"name",
			"as_fields"=>"name",
		),
		"Vcate"=>array(
			"mapping_type"=>BELONGS_TO,
			"class_name"=>"Vcate",
			"foreign_key"=>"vid",
			"mapping_name"=>"catename",
			"mapping_fields"=>"catename",
			"as_fields"=>"catename",
		),
	);
}