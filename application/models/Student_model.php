<?php
/**
* Assignment Table
+----------------+---------------+------+-----+---------+-----------------------------+
| Field          | Type          | Null | Key | Default | Extra                       |
+----------------+---------------+------+-----+---------+-----------------------------+
| stud_id        | int(5)        | NO   | PRI | NULL    | auto_increment              |
| admission_no   | varchar(10)   | YES  |     | NULL    |                             |
| fname          | varchar(45)   | YES  |     | NULL    |                             |
| sname          | varchar(45)   | YES  |     | NULL    |                             |
| userid         | int(11)       | YES  |     | NULL    |                             |
| group_id       | int(5)        | YES  |     | NULL    |                             |
| email          | varchar(45)   | YES  |     | NULL    |                             |
| nationality    | varchar(30)   | NO   |     | NULL    |                             |
| identification | varchar(12)   | NO   |     | NULL    |                             |
| dob            | date          | YES  |     | NULL    |                             |
| gender         | smallint(1)   | YES  |     | NULL    |                             |
| marital        | enum('0','1') | NO   |     | NULL    |                             |
| salutation     | varchar(4)    | NO   |     | NULL    |                             |
| status         | varchar(45)   | YES  |     | NULL    |                             |
| status_deets   | varchar(45)   | YES  |     | NULL    |                             |
| updated_at     | datetime      | YES  |     | NULL    | on update CURRENT_TIMESTAMP |
+----------------+---------------+------+-----+---------+-----------------------------+
*/
class Student_model extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
 	}
 	const DB_TABLE = 'students';
 	const DB_TABLE_PK = 'stud_id';
 	public $stud_id;
 	public $admission_no;
 	public $fname;
 	public $sname;
 	public $userid;
 	public $group_id;
 	public $rep;
 	public $email;
 	public $nationality;
 	public $identification;
 	public $dob;
 	public $gender;
 	public $marital;
 	public $salutation;
 	public $family_id;
 	public $status;
 	public $status_deets;
}