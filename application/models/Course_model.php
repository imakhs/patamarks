<?php
/**
* Courses Table
*/
/*
+--------------------+-------------+------+-----+---------+----------------+
| Field              | Type        | Null | Key | Default | Extra          |
+--------------------+-------------+------+-----+---------+----------------+
| idcourse           | int(11)     | NO   | PRI | NULL    | auto_increment |
| name               | varchar(45) | YES  |     | NULL    |                |
| abbreviation       | varchar(45) | YES  |     | NULL    |                |
| semesters          | varchar(45) | YES  |     | NULL    |                |
| total_units        | varchar(45) | YES  |     | NULL    |                |
| college_offered_id | int(5)      | YES  |     | NULL    |                |
+--------------------+-------------+------+-----+---------+----------------+
*/
class Course_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'courses';
 	const DB_TABLE_PK = 'idcourse';
 	public $idcourse;
 	public $name;
 	public $abbreviation;
 	public $semesters;
 	public $total_units;
 	public $college_offered_id;
}