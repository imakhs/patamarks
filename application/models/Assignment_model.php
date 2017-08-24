<?php
/**
* Assignments Table
+----------+-------------+------+-----+---------+----------------+
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| id       | int(7)      | NO   | PRI | NULL    | auto_increment |
| tutor_id | int(5)      | NO   |     | NULL    |                |
| group_id | int(5)      | NO   |     | NULL    |                |
| unit_id  | int(4)      | NO   |     | NULL    |                |
| period   | int(6)      | NO   |     | NULL    |                |
| status   |													|
+----------+-------------+------+-----+---------+----------------+
*/
class Assignment_model extends MY_Model
{
	
	const DB_TABLE = 'assignments';
 	const DB_TABLE_PK = 'id';
 	public $id;
 	public $tutor_id;
 	public $group_id;
 	public $unit_id;
 	public $period;
 	public $status;

 	function __construct()
	{
		parent::__construct();
 	}
 	
 	public function get_exams_date()
 	{
 		//get details of exams schedule for a tutorial group
		$this->db->select('*')
 					->from($this::DB_TABLE)
 					->join('units', 'units.unit_id = assignments.unit_id', 'left')
 					->join('examinations', 'examinations.period = assignments.period AND examinations.unit_id = assignments.unit_id', 'left')
 					->where('assignments.group_id',$this->group_id);
 		return $this->db->get()->result();
 	}

 	/**
     * seed users
     *
     * @param int $limit
     */
    function _seed($limit)
    {
 
        // create a bunch of base assignments
        for ($i = 0; $i < $limit; $i++) {

            $data = [
                'tutor_id' => $this->faker->unique()->userName, // get a unique nickname
                'group_id' => md5('12345'), // run this via your password hashing function
                'unit_id' => $this->faker->firstName,
                'period' => $this->faker->lastName,
                'status' => rand(0, 1) ? 'male' : 'female',
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, rem, est! Omnis perferendis, nisi obcaecati modi aliquam, neque! Culpa quia, animi itaque numquam praesentium nemo ut repudiandae eius, debitis nulla.',
                'address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'country' => $this->faker->country,
                'postcode' => $this->faker->postcode,
                'email' => $this->faker->email,
                'email_verified' => mt_rand(0, 1) ? '0' : '1',
                'phone' => $this->faker->phoneNumber,
                'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'registration_date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                'ip_address' => mt_rand(0, 1) ? $this->faker->ipv4 : $this->faker->ipv6,
                'status' => $i === 0 ? true : rand(0, 1)
            ];
            $this->db->insert($data);
        }
        $this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        redirect('user/index', 'location');
    }
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */