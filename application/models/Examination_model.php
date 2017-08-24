<?php
/**
* Examinations Table
+-----------+--------+------+-----+---------+-------+
| Field     | Type   | Null | Key | Default | Extra |
+-----------+--------+------+-----+---------+-------+
| exam_id   | int(6) | NO   | PRI | NULL    |       |
| exam_type | int(3) | YES  |     | NULL    |       |
| unit_id   | int(4) | YES  |     | NULL    |       |
| max_marks | int(3) | YES  |     | NULL    |       |
| date      | date   | YES  |     | NULL    |       |
+-----------+--------+------+-----+---------+-------+

*/
class Examination_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'examinations';
 	const DB_TABLE_PK = 'exam_id';
 	public $exam_id;
 	public $exam_type;
 	public $unit_id;
 	public $period;
 	public $date;

 	public function get_id()
 	{
 		//get id of an exam schedule using exam_type, unit_id and period
		$this->db->select('exam_id')
 					->from($this::DB_TABLE)
 					->where('exam_results.exam_type',$this->exam_type)
 					->where('exam_results.unit_id',$this->unit_id)
 					->where('exam_results.period',$this->period);
 		return $this->db->get()->result();
 	}
 	public function get_unit_schedule()
 	{
 		//get id of an exam schedule using exam_type, unit_id and period
 		$this->db->select('*')
 					->from($this::DB_TABLE)
 					->join('units', 'units.unit_id = examinations.unit_id', 'left')
 					->where('exam_results.stud_id',$this->unit_id);
 		return $this->db->get()->result();
 	}
 	public function get_batch_schedule()
 	{
 		//get details of exams schedule for a tutorial group
		$this->db->select('*')
 					->from($this::DB_TABLE)
 					->join('units', 'units.unit_id = examinations.unit_id', 'left')
 					->join('assignments', 'assignments.period = examinations.period', 'left')
 					->where('assignments.group_id',$this->group_id);
 		return $this->db->get()->result();
 	}
}