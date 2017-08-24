<?php
/**
* Assignment Table
*/
class Guardian_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'guardians';
 	const DB_TABLE_PK = 'family_id';
 	/*
 	*	Properties same as column names
 	*/
 	public $family_id;
 	public $primary_fname;
 	public $primary_sname;
  	public $primary_email;
 	public $primary_phone;
 	public $primary_relation;
 	public $secondary_fname;
 	public $secondary_sname;
 	public $secondary_email;
 	public $secondary_phone;
 	public $secondary_relation
}