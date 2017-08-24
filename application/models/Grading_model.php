<?php
/**
* Grading Table
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| idgrading | int(2)      | NO   | PRI | NULL    |       |
| name      | varchar(45) | YES  |     | NULL    |       |
| min_score | int(2)      | YES  |     | NULL    |       |
+-----------+-------------+------+-----+---------+-------+
*/
class Grading_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'gradings';
 	const DB_TABLE_PK = 'grade';
 	public $grade;
 	public $name;
 	public $min_score;
 	public $max_score;
 	public $points;

}