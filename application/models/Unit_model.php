<?php
/**
* Units Table
+-----------+-------------+------+-----+-------------------+-------+
| Field     | Type        | Null | Key | Default           | Extra |
+-----------+-------------+------+-----+-------------------+-------+
| unit_id   | int(4)      | NO   | PRI | NULL              |       |
| unit_code | varchar(8)  | NO   |     | NULL              |       |
| unit_name | varchar(45) | NO   |     | NULL              |       |
| created   | timestamp   | YES  |     | CURRENT_TIMESTAMP |       |
+-----------+-------------+------+-----+-------------------+-------+
*/
class Unit_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'units';
 	const DB_TABLE_PK = 'unit_id';
 	public $unit_id;
 	public $unit_code;
 	public $unit_name;
 	public $abbr;
}