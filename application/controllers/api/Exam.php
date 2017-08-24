<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Exam extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('security');
  	}
  	public function index_get()
    {}
    public function grade_post()
    {
    	$this->load->model('exam_grade');
    	
    }
}
