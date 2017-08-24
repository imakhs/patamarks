<?php
/**
+--------------+-------------+------+-----+---------+-------+
| Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| exam_type_id | int(3)      | NO   | PRI | NULL    |       |
| name         | varchar(45) | YES  |     | NULL    |       |
| description  | varchar(45) | YES  |     | NULL    |       |
| max_marks    | int(3)      | NO   |     | NULL    |       |
+--------------+-------------+------+-----+---------+-------+

*/
class Exam_type_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'exam_types';
 	const DB_TABLE_PK = 'exam_type_id';
 	public $exam_type_id;
 	public $name;
 	public $description;
 	public $max_marks;

}