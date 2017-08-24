<?php
/**
* Lecturer Table
+----------------+-------------+------+-----+---------+----------------+
| Field          | Type        | Null | Key | Default | Extra          |
+----------------+-------------+------+-----+---------+----------------+
| tutor_id       | int(5)      | NO   | PRI | NULL    | auto_increment |
| staff_id       | varchar(10) | YES  |     | NULL    |                |
| user_id        | int(11)     | YES  |     | NULL    |                |
| fname          | varchar(45) | YES  |     | NULL    |                |
| sname          | varchar(45) | YES  |     | NULL    |                |
| email          | varchar(45) | YES  |     | NULL    |                |
| nationality    | varchar(30) | NO   |     | NULL    |                |
| identification | varchar(12) | NO   |     | NULL    |                |
| dob            | date        | YES  |     | NULL    |                |
| gender         | tinyint(1)  | YES  |     | NULL    |                |
| marital        | varchar(45) | YES  |     | NULL    |                |
| salutation     | varchar(45) | YES  |     | NULL    |                |
| status         | varchar(45) | YES  |     | NULL    |                |
| status_deets   | varchar(45) | YES  |     | NULL    |                |
+----------------+-------------+------+-----+---------+----------------+
*/
class Lecturer_model extends MY_Model
{
	const DB_TABLE = 'tutors';
 	const DB_TABLE_PK = 'tutor_id';
 	public $tutor_id;
 	public $staff_id;
 	public $user_id;
 	public $fname;
 	public $sname;
 	public $email;
 	public $nationality;
 	public $identification;
 	public $dob;
 	public $gender;
 	public $marital;
 	public $salutation;
 	public $status;
 	public $status_deets;
/*
CREATE VIEW lecturer_acc AS SELECT lecturer.lec_id,lecturer.id_no, lecturer.fname, lecturer.sname, lecturer.username, user.email, user.password FROM lecturer INNER JOIN user ON lecturer.username=user.username;*/

	function __construct()
		{
			parent::__construct();
	 	}
}