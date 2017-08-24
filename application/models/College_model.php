<?php
/**
* Colleges Table
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| col_id   | int(5)      | NO   | PRI | NULL    |       |
| col_name | varchar(45) | YES  |     | NULL    |       |
| lec_id   | int(5)		 | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+
*/
class College_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'colleges';
 	const DB_TABLE_PK = 'col_id';
 	public $col_id;
 	public $col_name;
 	public $abbr;
 	public $dean;
}