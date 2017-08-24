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

class Admins extends MY_Controller {
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
        $html .= $this->load->view('students', '', TRUE);
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

    }
}