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
 * @link        http://github.com/makhsinja/patamarks
 */

class Lecturers extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->model('examples/validation_callables');
	}
    public function index()
    {
        $data['title'] = "Register Lecturer";
        $html = $this->load->view('includes/header', '', TRUE);
        $html .= $this->load->view('includes/menu', '', TRUE);
        $html .= $this->load->view('add_lecturer', '', TRUE);
        $html .= $this->load->view('includes/footer', '', TRUE);
        echo $html;
    }
    // -----------------------------------------------------------------------

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
        $data['title'] = "Register Lecturer";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/menu');
        if ($this->form_validation->run('lecturer') == FALSE)
        {                
            $this->load->view('add_lecturer');
        } else {
            $this->load->model('user_model');
            $user = new user_model();
            $user->user_id    = (integer)$user->get_unused_id();
            $user->username   = (string)$this->input->post('email');
            $user->passwd     = (string)$this->authentication->hash_passwd($this->input->post('passwd'));
            $user->email      = (string)$this->input->post('email');
            $user->auth_level = (integer)$this->input->post('auth_level'); 
            $user->created_at = date('Y-m-d H:i:s');
            //check if account exists. Will return true if account exists, false if not
            $this->is_logged_in();
            //Lecturer personal details procesing
            $this->load->model('lecturer_model');
            $lecturer = new lecturer_model();
            $lecturer->staff_id = $this->input->post('staff_id');
            $lecturer->user_id = $user->user_id;
            $lecturer->fname = $this->input->post('fname');
            $lecturer->sname = $this->input->post('sname');
            $lecturer->email = $this->input->post('email');
            $lecturer->nationality = $this->input->post('nationality');
            $lecturer->identification = $this->input->post('identification');
            $lecturer->dob = $this->input->post('dob');
            $lecturer->gender = $this->input->post('gender');
            $lecturer->marital = $this->input->post('marital');
            $lecturer->salutation = $this->input->post('salutation');
            $lecturer->status = $this->input->post('status');
            $lecturer->status_deets = $this->input->post('status_deets');
            //Start transactions on strict mode, roll back when one group of queries fails
            $this->db->trans_start();//Turn to true for test mode(all transactions rolled back. blank for development 
                $user->insert();//create user login details first
                $lecturer->insert();//insert tutor details
            $this->db->trans_complete();//successful upon two queries complete*/
            $this->load->view('success');
    	} 
        $this->load->view('includes/footer');
	}
    public function edit()
    {
        
    }

} 