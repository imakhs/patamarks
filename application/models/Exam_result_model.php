<?php
/**
* Exam_results Table
+--------------+-------------+------+-----+---------+-------+
| Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| exam_type_id | int(3)      | NO   | PRI | NULL    |       |
| name         | varchar(45) | YES  |     | NULL    |       |
| description  | varchar(45) | YES  |     | NULL    |       |
| max_marks    | int(3)      | NO   |     | NULL    |       |
+--------------+-------------+------+-----+---------+-------+

*/
class Exam_result_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	//period describes the year and semester. Three exams per unit per period
 	const DB_TABLE = 'exam_results';
 	const DB_TABLE_PK = 'result_id';
 	public $result_id;
 	public $exam_type;
 	public $stud_id;
 	public $unit_id;
 	public $marks;
 	public $tcreated;
 	//used by api gets individual results for all units submitted
 	function get_iresults()
 	{
 		$this->db->select('*')
 					->from($this::DB_TABLE)
 					->join('students', 'students.stud_id = exam_results.stud_id', 'left')
 					->join('examination', 'examination.exam_id = exam_results.exam_id', 'left')
 					->where('exam_results.stud_id',$this->stud_id);
 		return $this->db->get()->result();
 	}
 	/*
 	** Get group results for a particular unit
 	*/
 	function get_gresults($r)
 	{
 		$this->db->select('*')
 					->from($this::DB_TABLE)
 					->join('students', 'students.stud_id = exam_results.stud_id', 'left')
 					->join('gradings', 'exam_results.marks >= gradings.min_score AND exam_results.marks <= gradings.max_score', 'left')
 					->where('students.group_id',$r);
 		return $this->db->get()->result();
 	}
}