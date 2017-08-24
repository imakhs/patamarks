<?php
/**
* Groups Table    _ _
*/
class Group_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'tuition_groups';
 	const DB_TABLE_PK = 'group_id';
 	public $group_id;
 	public $name;
 	public $course_id;
 	public $intake;
 	public $status;
 	public $graduation_date;
 	public $semester;

 	public function get_full_deets()
 	{
 		$this->db->select('tuition_groups.name AS group_name, courses.abbreviation AS course_name, intake, course_id, group_id')
 					->from($this::DB_TABLE)
 					->join('courses', 'courses.idcourse = tuition_groups.course_id', 'left')
 					->order_by('group_name DESC');
 					//->where($this::DB_TABLE_PK,$this->group_id);
 		return $this->db->get()->result();

 	}
}