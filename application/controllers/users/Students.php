<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * PataMarks - Lecturers Controller
 * register, edit, view the lecturers in the whole school
 *
 * PataMarks is a marks submission application using CodeIgniter 3
 *
 * @package     PataMarks
 * @author      Makhanu Sinja
 * @copyright   Copyright (c) 2016 - 2017 Makhanu Sinja(http://imakhs.com)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://github.com/imakhs/patamarks
 */

class Students extends MY_Controller 
{

	function __construct()
	{
		parent::__construct();
        $this->output->delete_cache();

        $this->load->helper('security');

        $this->load->library('form_validation');

        $this->load->model('examples/validation_callables');
	}
    public function index()
    {
        $data['title'] = "Register Lecturer";
        $html = $this->load->view('includes/header', '', TRUE);
        $html .= $this->load->view('includes/menu', '', TRUE);
        $html .= $this->load->view('add_student', '', TRUE);
        $html .= $this->load->view('includes/footer', '', TRUE);
        echo $html;
    }
    //----------------------------------------------------------------------
    /**
     * The password used in the $user_data array needs to meet the
     * following default strength requirements:
     *   - Must be at least 8 characters long
     *   - Must be at less than 72 characters long
     *   - Must have at least one digit
     *   - Must have at least one lower case letter
     *   - Must have at least one upper case letter
     *   - Must not have any space, tab, or other whitespace characters
     *   - No backslash, apostrophe or quote chars are allowed
     */
	public function register()
    {
		$data['title'] = "Register Student";
        $this->load->view('includes/header', $data);
        $validation_rules = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'max_length[12]|is_unique[' . config_item('user_table') . '.username]',
                'errors' => [
                    'is_unique' => 'Username already in use.'
                ]
            ],
            [
                'field' => 'passwd',
                'label' => 'passwd',
                'rules' => [
                    'trim',
                    'required',
                    [ 
                        '_check_password_strength', 
                        [ $this->validation_callables, '_check_password_strength' ] 
                    ]
                ],
                'errors' => [
                    'required' => 'The password field is required.'
                ]
            ],
            [
                'field'  => 'email',
                'label'  => 'email',
                'rules'  => 'trim|required|valid_email|is_unique[' . config_item('user_table') . '.email]',
                'errors' => [
                    'is_unique' => 'Email address already in use.'
                ]
            ],
            [
                'field' => 'auth_level',
                'label' => 'auth_level',
                'rules' => 'required|integer|in_list[1,4]'
            ]
        ];
        $this->form_validation->set_rules( $validation_rules );
        if ($this->form_validation->run() == FALSE)
        {                
            $this->load->view('add_student');
        } else {
            $this->load->model('user_model');
            $user = new user_model();
            $user->user_id    = (integer)$user->get_unused_id();
            $user->username   = (string)$this->input->post('username');
            $user->passwd     = (string)$this->authentication->hash_passwd($this->input->post('passwd'));
            $user->email      = (string)$this->input->post('email');
            $user->auth_level = (integer)$this->input->post('auth_level'); // 9 if you want to login @ examples/index.
            $user->created_at = date('Y-m-d H:i:s');

            //check if account exists. Will return true if account exists, false if not
            $this->is_logged_in();

            //Lecturer personal details procesing
            $this->load->model('lecturers_model');
            $student = new student_model();
            $student->staff_id = $this->input->post('staff_id');
            $student->user_id = $user->user_id;
            $student->fname = $this->input->post('fname');
            $student->sname = $this->input->post('sname');
            $student->email = $this->input->post('email');
            $student->nationality = $this->input->post('nationality');
            $student->identification = $this->input->post('identification');
            $student->dob = $this->input->post('dob');
            $student->gender = $this->input->post('gender');
            $student->marital = $this->input->post('marital');
            $student->salutation = $this->input->post('salutation');
            $student->status = $this->input->post('status');
            $student->status_deets = $this->input->post('status_deets');

            //Start transactions on strict mode, roll back when one group of queries fails
            $this->db->trans_start();//Turn to true for test mode(all transactions rolled back. blank for development 
                $user->insert();//create user login details first
                $student->insert();//insert student details
            $this->db->trans_complete();//successful upon two queries complete
            $this->load->view('success');
    	} 
        $this->load->view('includes/footer');
    }
}
