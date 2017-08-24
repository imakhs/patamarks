<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Assignments extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
        $this->load->model('assignment_model');
  	}
  	public function group_get($period)
    {
        $groupid = $this->uri->segment(4, 0);
        $assignments = new assignment_model();
        $this->response($assignments->get($groupid, array('group_id' => $groupid, 'period' => $period), REST_Controller::HTTP_OK));
    }
    public function tutor_get($status)
    {
        $tutorid = $this->uri->segment(4, 0);
        $assignments = new assignment_model();
        $this->response($assignments->get($tutorid, array('tutor_id' => $tutorid, 'status' => $status), REST_Controller::HTTP_OK));
    }
    public function exams_get($status)
    {
        $groupid = $this->uri->segment(4, 0);
        $assignments = new assignment_model();
        $assignments->group_id = $groupid;
        $this->response($assignments->get_exams_date(), REST_Controller::HTTP_OK);
    }
    /*public function tutor_get($status)
    {
        $tutorid = $this->uri->segment(4, 0);
        $assignments = new assignment_model();
        $this->response($assignments->get($tutorid, array('tutor_id' => $tutorid, 'status' => $status), REST_Controller::HTTP_OK));
    }
    */
}